<?php
namespace Home\Model;
use Think\Model;

class CheckinginModel extends PublicModel{
    /*添加请假申请*/
    public function applyVacate($data){
        return M('oa_checkingin')->filter('strip_tags')->add($data);
    }
    //添加考勤审批
    public function addApproval(){
        if ($_POST['admin_id'] && $_POST['role_id']) {
            $do = M('oa_checkingin_approval');
            $_POST['class_id'] = M('oa_checkingin_type')->where("type_id={$_POST['type_id']}")
                ->getField('type_id');
            $_POST['add_time'] = $_SERVER['REQUEST_TIME'];
            $do->create();
            return $do->add();
        }
    }
    //考勤审批设置
    public function approvalList($where){
        $res = M('oa_checkingin_approval')->alias('c')
            ->join(array(' LEFT JOIN __OA_CHECKINGIN_TYPE__ t ON t.type_id=c.type_id',
                ' LEFT JOIN __ROLE__ r ON r.role_id=c.role_id ',
                ' LEFT JOIN __ADMIN_USER__ u ON u.user_id=c.admin_id'
            ))
            ->field('c.approval_id,c.add_time,c.type_id,r.role_name,t.type_name,u.user_name as admin_name')
            ->where($where)->select();
        if ($res) {
            foreach ($res as &$v) {
                $v['add_time'] = date('Y-m-d',$v['add_time']);
                if (!$v['type_id']) {
                    $v['type_name'] = '所有';
                }
            }
        }
        return $res;  
    }
    /*添加加班记录*/
    public function addOtRecord(){
        if ($_POST['staff_id']) {
            $do = M('oa_checkingin');
            //加班补贴
            $do->create();
            $res = $do->add();
            return $res;
        }else return false;
    }
    /*考勤类型列表*/
    public function typeList($where='',$list=false,$field='*'){
        if ($list) {
            $where  = $where ? $where.' AND c.parent_id<>0':'c.parent_id<>0';
            $field  = 'c.type_id,c.type_name,b.type_name AS parent_id,c.salary_rule';
            $res    =  M('oa_checkingin_type')->alias('c')
                ->join('LEFT JOIN __OA_CHECKINGIN_TYPE__ b ON c.parent_id=b.type_id')
                ->field($field)->where($where)->order('c.parent_id ASC')->select();
            $operation = array('reduce'=>'减','add'=>'加');
            $unity = array('d'=>'天','h'=>'时','m'=>'分','s'=>'次');
            $relationOperator = array(
                'lt'=>'小于','gt'=>'大于','eq'=>'等于','le'=>'小于等于','ge'=>'大于等于');
            $ruleitem = array('固定值', '每日工资 x','每时工资 x','时长 x');
            if ($res) {
                foreach ($res as &$v) {
                    if ($v['salary_rule']) {
                        $rule = explode(' ',$v['salary_rule']);
                        foreach ($rule as &$r) {
                            $r = unserialize($r);
                            $r['relation_operator_name'] =
                                $relationOperator[$r['relation_operator']]; 
                            $r['unity_name'] = $unity[$r['unity']]; 
                            $r['operation_name'] = $operation[$r['operation']];
                            $r['rule_item_name'] = $ruleitem[$r['rule_item']];
                            $ruleList[] = "{$r['relation_operator_name']}".
                                "{$r['times']}{$r['unity_name']}".
                                " {$r['operation_name']} {$r['rule_item_name']} {$r['salary_rule']}";
                        }
                        $v['salary_rule'] = $ruleList;
                        unset($ruleList);
                    }
                }
            }
        }else{
            $res = M('oa_checkingin_type')->field($field)->where($where)->select();
        }
        return $res;
    }

    /*添加考勤类型*/
    public function addCheckinginType($data){
        return M('oa_checkingin_type')->filter('strip_tags')->add($data); 
    }

    //考勤汇总
    public function checkinginList($where='',$field='c.*,t.type_name,r.role_name'){
        $where = 'c.date>0 '.$where;
        $res = M('oa_checkingin')->alias('c')
            ->join(' LEFT JOIN __OA_CHECKINGIN_TYPE__ t ON c.type_id=t.type_id')
            ->join(' LEFT JOIN __ROLE__ r ON c.role_id=r.role_id')
            ->field($field)->where($where)->order('c.add_time DESC')->select();
        if ($res) {
            foreach ($res as &$val) {
                $val['add_time']   = date('Y-m-d H:i',$val['add_time']);
                $val['start_time'] = date('Y-m-d H:i',$val['start_time']);
                $val['end_time']   = $val['end_time'] ? date('Y-m-d H:i',$val['end_time']):'-';
                $val['from_to']    = "{$val['start_time']} 到 {$val['end_time']}";

                switch ($val['date_type']) {
                case 0 : $val['date'] .= '天';break;
                case 1 : $val['date'] .= '时';break;
                case 2 : $val['date'] .= '分';break;
                }
            }
            return $res;
        }else{
            return false;
        }
    }

    /*考勤报表 用于工资计算*/
    public function reportCheckingin($reportTime,$where=''){
        $data = M('oa_checkingin_report')->where("report_time=$reportTime $where")->select();
        if (!$data) {
            $beginTime = strtotime(date('Y-m-01',$reportTime));
            $endTime   = strtotime(date('Y-m-t',$reportTime));
            $where     .= " AND c.start_time BETWEEN $beginTime AND $endTime";
            if ($_POST['role_id']) {
                $where .= ' AND u.role_id='.intval($_POST['role_id']);
            }
            $fields    = 'sum(c.dedcut_salary) as dedcut,count(c.type_id) as times,'
                .'c.type_id,c.staff_id,c.staff_name,sum(c.date) as date,r.role_id';
            $res = M('oa_checkingin')->alias('c')
                ->join(array('LEFT JOIN __OA_STAFF_RECORDS__ u on c.staff_id=u.staff_id',
                'LEFT JOIN __ROLE__ r on r.role_id=u.role_id'))
                ->field($fields)->where($where)->group('staff_id,type_id')->select();
            $checkingInType = $this->typeList('',false,'type_id,parent_id'); 
            foreach ($checkingInType as $t) {
                if ($t['parent_id'] != 0) {
                    $typeList[$t['parent_id']][] = $t['type_id'];
                }else continue;
            }
            $list = array();
            $data = array();
            //统计并通过公式计算考勤加、扣薪
            foreach ($res as $v) {
                if ($v['type_id'] == 8) {
                    $list[$v['staff_id']]['late_times']  = $v['times']; //迟到次数
                    $list[$v['staff_id']]['dedcut_late'] = $v['dedcut'];//迟到扣款
                }elseif(in_array($v['type_id'],$typeList[1])){
                    //请假
                    $list[$v['staff_id']]['outworking_days'] += $v['date']; //缺勤天数
                    $list[$v['staff_id']]['dedcut_outwork'] = $v['dedcut'];
                }elseif(in_array($v['type_id'],$typeList[3])){
                    //加班
                    if (9 == $v['type_id'] ) {
                        $list[$v['staff_id']]['normal_ot'] += $v['date'];
                    }elseif(14 == $v['type_id']){
                        $list[$v['staff_id']]['night_ot'] += $v['date'];
                    }

                }elseif(in_array($v['type_id'],$typeList[11])){
                    if (12 == $v['type_id']) {
                        $list[$v['staff_id']]['ot_lieu'] += $v['date'];
                    }elseif(13 == $v['type_id']){
                        $list[$v['staff_id']]['year_lieu'] += $v['date'];
                    }
                }
                $list[$v['staff_id']]['staff_name'] = $v['staff_name'];
                $list[$v['staff_id']]['role_id'] = $v['role_id'];
            }

            foreach ($list as $k=>&$v) {
                $v['working_days'] = date('t',$reportTime) - $v['outworking_days']; //出勤天数
                $v['staff_id']     = $k;
                $v['report_time']  = $reportTime;
                $v['add_time']     = $_SERVER['REQUEST_TIME'];
                $data[] = $v;
            }
        }
        return $data;
    }

    //获得已经保存的考勤报表
    public function getCheckinginReport($where){
        $data = M('oa_checkingin_report')->where($where)->select();
        return $data;
    }

    //查找一条考勤记录
    public function findCheckingin($checkId){
       $res = M('oa_checkingin')->where("check_id=$checkId")->find(); 
       if ($res) {
           $res['start_time'] = date('Y-m-d H:i',$res['start_time']);
           $res['end_time']   = date('Y-m-d H:i',$res['end_time']);
           $res['add_time']   = date('Y-m-d H:i',$res['add_time']);
       }
       return $res;
    }

    public function getCheckingin($where){
        $res = M('oa_checkingin')->alias('c')
            ->join(array('LEFT JOIN __OA_CHECKINGIN_TYPE__ t ON c.type_id=t.type_id',
                'LEFT JOIN __ADMIN_USER__ u ON u.user_id=c.add_admin'
            ))
            ->where($where)->field('c.*,t.type_name,u.user_name admin_name')->select();
        if ($res) {
            $status= array('审核中','已通过','未审核');
            foreach ($res as &$v) {
                $v['start_time'] = date('Y-m-d',$v['start_time']);
                $v['end_time']   = date('Y-m-d',$v['end_time']);
                $v['add_time']   = date('Y-m-d',$v['add_time']);
                $v['status']     = $status[$v['status']];
            }
        }
        return $res;
    }
}
?>
