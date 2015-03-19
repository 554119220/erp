<?php
namespace Home\Model;
use Think\Model;
use Think\Page;

class SalaryModel extends PublicModel{
    //工资套账
    public function salaryClass($fields='',$where){
        $fields = empty($fields) ? '*' : $fields;
        $res       = M('oa_salary_class')->field($fields)->where($where)->select();
        $staffList = D('Hrm')->staffListSelect(0);
        $roleList  = M('role')->getField('role_id,role_name');
        $itemListDesk  = $this->salaryItem('',2);   //工资项
        if ($res && $fields == '*') {
            foreach ($res as &$val) {
                $val['item_list'] = unserialize($val['item_list']);
                sort($val['item_list'],SORT_NUMERIC);
                foreach ($val['item_list'] as &$i) {
                    foreach ($itemListDesk as &$v) {
                        if ($v['item_id'] == $i) {
                            $i = $v['item_name'];
                            $val['item_list_desk'][] = $v;
                        }
                    }
                }
                if ($val['type']) {
                    if ($val['staff_list']) {
                        $val['staff_list'] = unserialize($val['staff_list']);
                        foreach ($val['staff_list'] as &$v) {
                            foreach($staffList as $s){
                                if ($v == $s['staff_id']) { $val['participant'][] = $s;}
                            }
                        }
                    }else{
                        $val['participant'] = D('Hrm')
                            ->staffListSelect(false,false,"role_id={$val['role_id']}");  
                    }
                }else{
                    $val['participant'][] = array(
                        'staff_id'   => 0,
                        'staff_name' => '部门所有人适用'
                    );
                }
                $val['add_time'] = date('Y-m-d',$val['add_time']);
            }
        }
        return $res;
    }

    /*添加工资套账*/
    public function addSalaryClass($data){
        $classId = M('oa_salary_class')->filter('strip_tags')->add($data);     
        /*修改指定员工的工资套账*/
        if ($classId) {
            if ($data['role_id']) {
                $where = "role_id={$data['role_id']}";
            }elseif($data['staff_list']){
                $staffList = unserialize($data['staff_list']);
                $staffList = join(',',$staffList);
                $where = "staff_id IN($staffList)";
            }

            $arr = array('salary_class'=>$classId);
            $res = M('oa_staff_records')->where($where)->save($arr);
        }
        return $res;
    }

    /*工资项目列表*/
    public function salaryItem($where='',$type=1){
        if ($type) {
            $res = M('oa_salary_item')->where($where)->order('item_id ASC,editable ASC')->select(); 
            if (1 == $type) {
                $operationType = array('增项','减项','不操作');
                $operation = array('加','减','乘','除');
                $salaryObject  = $this->salaryObject(1);
                foreach($res as &$val){
                    $val['operation_type'] = $operationType[$val['operation_type']];
                    if ($val['expression']) {
                        $ex = explode(' ',$val['expression']);
                        $val['expression'] = $salaryObject[$ex[0]].$operation[$ex[1]].$ex[2];
                    }
                }
            }
            return $res;
        }else{
            return M('oa_salary_item')->where($where)->getField('item_id,item_name'); 
        }

    }

    /*添加工资项目*/
    public function addSalaryItem($data){
        return M('oa_salary_item')->filter('strip_tags')->add($data);     
    }

    /*工资审批列表*/
    public function salaryApproval($where=''){
        if (empty($where)) {
            $res =  M('oa_salary_approval')->alias('s')
                ->join(array('LEFT JOIN __ADMIN_USER__ a ON a.user_id=s.admin_id ',
                    'LEFT JOIN __ROLE__ r ON r.role_id=s.role_id'
                ))->field('s.*,a.user_name AS admin_name,r.role_name')->order('s.add_time DESC')->select();
            if ($res) {
                foreach ($res as &$val) {
                    $val['add_time'] = date('Y-m-d',$val['add_time']);
                }
            }
            return $res;
        }else{
            return M('oa_salary_approval')->where($where)->count();
        }
    }

    /*添加工资审批人*/
    public function addSalaryApproval($data){
        return M('oa_salary_approval')->filter('strip_tags')->add($data);
    }

    /*添加提成规则*/
    function addCommissionRule($data){
        return M('oa_commission_rule')->filter('strip_tags')->add($data);
    }

    /*提成规则表*/
    public function commissionRule($where='',$fields=''){
        if (!$fields) {
            $filter = true;
            $fields = 'c.*,a.user_name AS add_admin,r.role_name AS platform,s.shipping_name';
        }
        $res = M('oa_commission_rule')->alias('c')
            ->join(array('LEFT JOIN __ADMIN_USER__ a ON c.add_admin=a.user_id',
                'LEFT JOIN __ROLE__ r ON c.platform=r.role_id',
                'LEFT JOIN __SHIPPING__ s ON s.shipping_id=c.shipping'
            ))
            ->field($fields)->where($where)->select();
        if ($res) {
            if ($filter) {
                $cardinality = array(
                    '1'=>'销售额',
                    '2'=>'销售平台',
                    '3'=>'配送方式',
                    '4'=>'毛利',
                    '5'=>'产品实际销售额'
                ); 
                $proportionType = array('同一','累加','产品');
                foreach ($res as &$val) {
                    $val['add_time']         = date('Y-m-d',$val['add_time']);
                    $val['cardinality']      = $cardinality[$val['cardinality']];
                    $val['proportion_type']  = $proportionType[$val['proportion_type']];
                    $val['participant_name'] = unserialize($val['participant_name']);
                    $val['platform']         = empty($val['platform']) ? '-':$val['platform'];
                    $val['shipping_name']    = empty($val['shipping_name']) ? '-':$val['shipping_name'];
                }
            }else{
                foreach ($res as &$val) {
                    $val['participant'] = unserialize($val['participant']);
                }
            }
        }
        return $res;
    }

    /*提成记录表*/
    public function commissionList($where=' 1 ',$type='wait'){
        switch ($type) {
        case 'wait' : $where  .= ' AND status = 0'; break;
        case 'check' : $where .= ' AND status = 1'; break;
        case 'send' : $where  .= ' AND status = 2'; break;
        }
        $res = M('oa_commission_list')->where($where)->order('phase DESC')->select();
        if ($res) {
            foreach ($res as &$v) {
                $v['add_time'] = date('Y-m-d',$v['add_time']);
            }
        }
        return $res;
    }

    /*添加调薪记录*/
    public function addAdjustSalary($data){
        $res = M('oa_adjustsalarylog')->filter('str_tags')->add($data);
        $staffId = $data['staff_id'];
        $salary = $data['salary'];
        unset($data);
        if ($res) {
            $data['salary'] = $salary;
            M('oa_staff_records')->where("staff_id=$staffId")->save($data);
        }
        return $res;
    }

    /*调薪记录*/
    public function countAdjustSalaryLog($where){
        $count =  M('oa_adjustsalarylog')->alias('ad')
            ->join(array(
                'LEFT JOIN __OA_STAFF_RECORDS__ st ON ad.staff_id=st.staff_id',
                'LEFT JOIN __ADMIN_USER__ a ON ad.add_admin=a.user_id',
            ))->where($where)->count();
        return $count;
    }

    public function adjustSalaryLog($where='',$p){
        $res =  M('oa_adjustsalarylog')->alias('ad')
            ->join(array(
                'LEFT JOIN __OA_STAFF_RECORDS__ st ON ad.staff_id=st.staff_id',
                'LEFT JOIN __ADMIN_USER__ a ON ad.add_admin=a.user_id',
            ))
            ->field('ad.*,st.staff_name,a.user_name')
            ->where($where)->order('add_time DESC')->page($p,15)->select();

        foreach ($res as &$val) {
            $val['add_time'] = date('Y-m-d',$val['add_time']);
            $val['start_time'] = date('Y-m-d',$val['start_time']);
        }
        return $res;
    }

    /*查询员工的基本工资*/
    public function selectSalary($where){
        return M('oa_staff_records')->where($where)->getField('staff_id,salary'); 
    }

    /*组织各员工的工资数据源*/
    public function salaryListTable($field,$where){
        return M('oa_staff_records')->field($field)->where($where)->select();
    }

    /*工资表中的工资项目取值*/
    public function salaryListItem(){
        return false;
    }

    //平台销量
    public function sales($startTime,$endTime,$status){
        // 获取平台的销售数据
        $field = 'platform,order_type,COUNT(*) order_number,SUM(final_amount) final_amount,'
            .'SUM(goods_amount) goods_amount,SUM(shipping_fee) shipping_fee ';
        $where = " add_time>=$startTime AND add_time<=$endTime AND $status";
        $res = M('order_info')->field($field)->where($where)->group('platform,order_type')
            ->select();
        if (count($res) == 1) { $res = $res[0]; }
        return $res;
    }
    //平台提成记录
    public function roleCommissionList($where){
       return M('oa_role_commission_list')->where($where)->select();
    }

    /*员工销量*/
    public function SaleMemberSales($startTime,$endTime,$status){
        $field = 'platform,order_type,COUNT(*) order_number,SUM(final_amount) final_amount,'
            .'SUM(goods_amount) goods_amount,SUM(shipping_fee) shipping_fee,admin_id ';
        $where = " add_time>=$startTime AND add_time<=$endTime AND $status";
        $res = M('order_info')->field($field)->where($where)->group('admin_id')
            ->select();
        return $res;
    }

    //工资项目参数
    public function salaryObject($type=0){
        $res = M('oa_salary_object')->where('status=0')->select(); 
        if ($type && $res) {
            foreach ($res as &$v) {
               $a[$v['object_id']] = $v['object_name'];
           }
           return $a;
       }else{ return $res; }
    }
}
?>
