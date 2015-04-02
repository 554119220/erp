<?php
/*=============================================================================
#     FileName: SalaryController.class.php
#         Desc: 薪资管理 salary manage
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2015-01-16 09:12:59
#      History:
=============================================================================*/
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class SalaryController extends PublicController {
    private static $controllerUrl = __CONTROLLER__;
    public function nav(){
        $title = I('get.title',L('SALARY_MANAGE'));
        $act = $_REQUEST['act'] ? $_REQUEST['act'] : 'payoff';
        $Menu = D('Menu');
        $navlist = $Menu->nav('salary');
        $url = substr(U(),0,strrpos(U(),'/'));
        $this->assign('url',$url);
        $this->assign('act',$_REQUEST['act']);
        $this->assign('navlist',$navlist);
        $this->assign('title',$title);
        $this->controllerUrl = $this->fullpage();
    }

    //调薪
    public function adjustSalary(){
        $_REQUEST['act'] = 'adjustSalary';
        $p               = intval($_REQUEST['p'])? 1 : intval($_REQUEST['p']);

        $this->assign('staff_list',D('Hrm')->staffListSelect(0));
        $this->assign('role_list',D('RoleManage')->roleList('','role_id,role_name'));
        $this->assign('url',__CONTROLLER__);
        $count = D('Salary')->countAdjustSalaryLog();
        $page  = new Page($count,15);
        $this->assign('adjustSalary',D('Salary')->adjustSalaryLog('',$p));
        $this->assign('page',$page->show());
        $this->nav();
        $this->display('adjustSalary');
    }
    //修改调薪记录
    public function editAdjustSalary(){
        if ($_REQUEST['log_id']) {
            if ('edit' == $_GET['behave']) {
                $res = M('oa_adjustsalarylog')->where('log_id='.intval($_GET['log_id']))
                    ->find();
                if ($res) {
                    $res['start_time'] = date('Y-m-d',$res['start_time']);
                    $this->ajaxReturn($res,'JSON');
                }
            }elseif('save' == $_POST['behave']){
                $_POST['add_time']  = $_SERVER['REQUEST_TIME'];
                $_POST['add_admin'] = $_SESSION['admin_id'];
                $do = M('oa_adjustsalarylog');
                $do->create();
                $res = $do->save();
                if ($res) {
                    $this->success(L('UPD_SUCCESS'),__CONTROLLER__.'/adjustSalary');
                }else{
                    $this->error(L('UPD_ERROR'));
                }
            }    
        }
    }

    //查询原工资
    public function originalSalary(){
        $staffId = intval($_REQUEST['staff_id']);
        if ($staffId) {
            $where = " staff_id=$staffId";
            $originalSalary = D('Salary')->selectSalary($where);
        }
        $this->ajaxReturn($originalSalary);
    }

    /*添加调薪记录*/
    public function addAdjustSalary(){
        $staffId = intval($_REQUEST['staff_id']);
        $salary  = floatval($_REQUEST['salary']);
        $originalSalary = D('Salary')->selectSalary("staff_id=$staffId");
        $data = array(
            'staff_id'        => $staffId,
            'salary'          => $salary,
            'original_salary' => $originalSalary,
            'add_time'        => $_SERVER['REQUEST_TIME'],
            'add_admin'       => $_SESSION['admin_id'],
            'start_time'      => strtotime($_REQUEST['start_time']),
        );
        $res = D('Salary')->addAdjustSalary($data);
        if ($res) {
            $this->success(L('ADD_SUCCESS'),self::$controllerUrl.'/adjustSalary');
        }else{
            $this->error(L('ADD_ERROR')); 
        }
    }

    //工资项目
    public function salaryItem(){
        if (I('edit','')) {

        }else{
            $_REQUEST['act'] = 'salarySet';
            $this->nav();
            $this->assign('url',self::$controllerUrl);
            //$this->assign('url',U('Home/Salary'));
            D('Salary')->salaryItem();
            $operationType  = array('加项','减项','不操作');
            $operation      = array('加','减','乘','除');
            $this->assign('operation_type',$operationType);
            $this->assign('expression_item',D('Salary')->salaryObject());
            $this->assign('operation',$operation);
            $this->assign('item_list',D('Salary')->salaryItem()); 
            $this->display();    
        }
    }
    //添加工资项目
    public function addSalaryItem(){
        foreach ($_REQUEST as &$val) {
            $val = trim($val);
        }
        $data = array('expression' => '');
        if ($_REQUEST['expression'] && $_REQUEST['expression_item']) {
            $data['expression'] = "{$_REQUEST['expression']} {$_REQUEST['operation']} "
                .floatval($_REQUEST['expression_item']);
        }
        unset($_REQUEST['expression'],$_REQUEST['operation'],$_REQUEST['expression_item']);
        $data = array_merge($data,$_REQUEST);
        $code = D('Salary')->addSalaryItem($data);
        if ($code) {
            $this->success(L('ADD_SUCCESS'),U('Home/salary/salaryItem')); 
        }else{
            $this->error(L('ADD_ERROR')); 
        }
    }
    /*修改工资项目*/
    public function editSalaryItem(){
        $itemId = intval($_REQUEST['item_id']);
        $act    = $_REQUEST['act'];
        if ('edit' == $act && $itemId) {
            if ($_REQUEST['todo']) {
                $data = array('expression' => '');
                if ($_REQUEST['expression'] && $_REQUEST['expression_item']) {
                    $data['expression'] = "{$_REQUEST['expression']} {$_REQUEST['operation']} "
                        .floatval($_REQUEST['expression_item']);
                }
                unset($_REQUEST['expression'],$_REQUEST['operation']
                    ,$_REQUEST['expression_item'],$_REQUEST['act'],$_REQUEST['todo']
                    ,$_REQUEST['item_id']);
                $data = array_merge($data,$_REQUEST);
                $res = M('oa_salary_item')->where("item_id=$itemId")->save($data);
                if ($res) {
                    $this->success(L('UPD_SUCCESS'));
                }else{
                    $this->error(L('UPD_ERROR'));
                }
            }else{
                $res = M('oa_salary_item')->where("item_id=$itemId")->select(); 
                if ($res) {
                    $res = $res[0];
                    if ($res['expression']) {
                        $res['expression'] = explode(' ',$res['expression']);
                    }
                    $this->ajaxReturn($res,JSON);
                }
            }
        }else{
            $this->error(L('NO_FIND_SALARY_ITEM'));
        }
    }
    /*删除工资项目*/
    public function delSalaryItem(){
        $itemId = intval($_REQUEST['item_id']);
        if ($itemId) {
            $code = M('oa_salary_item')->where("item_id=$itemId")->delete();
            if ($code) {
                $this->success(L('DEL_SUCCESS'),U('Home/Salary/salaryItem'));
            }else{
                $this->error(L('DEL_ERROR'));
            }
        }
    }

    /*工资套账*/
    public function salaryClass(){
        $_REQUEST['act'] = 'salarySet';
        $this->nav();
        $this->assign('staff_list',D('hrm')->staffListSelect(0,1));
        $this->assign('role_list',D('RoleManage')->roleList('','role_id,role_name'));
        $this->assign('item_list',D('Salary')->salaryItem());
        $this->assign('salary_class',D('Salary')->salaryClass());
        $this->display();
    }

    /*添加工资套账*/
    public function addSalaryClass(){
        $data               = $_REQUEST;
        $data = array(
            'class_name' => $_REQUEST['class_name'],
            'add_time'   => $_SERVER['REQUEST_TIME'],
            'admin_name' => $_SESSION['admin_name'],
            'admin_id'   => $_SESSION['admin_id'],
            'item_list'  => $_REQUEST['item_list'],
            'type'       => $_REQUEST['type'],
            'role_id'    => $_REQUEST['role_id'],
            'staff_id'   => $_REQUEST['participant'],
            'base_salary' => $_REQUEST['base_salary'],
        );
        if (empty($data['item_list'])){
            $this->error(L('NOT_SALARY_ITEM'));
            exit;
        }
        $data['item_list'] = serialize($data['item_list']);
        if (1 == $data['type']) { //调用员工
            if($data['staff_id']){
                $staff = join(',',$data['staff_id']);
                $res = M('oa_staff_records')->field('staff_name,salary_class')
                    ->where("staff_id IN($staff)")->select();
                foreach ($res as $val) {
                    if ($val['salary_class']) { $error[] = $val['staff_name']; }
                }
                if ($error) {
                    $msg = join(',',$error).L('NO_ALLOCATION_MORE_SALARY_CLASS');
                    $this->error($msg);
                }else{
                    $data['staff_id']   = serialize($data['staff_id']);
                    $data['staff_list'] = $data['staff_id'];
                    unset($data['staff_select'],$data['staff_id']);
                    $code = D('Salary')->addSalaryClass($data);
                }
            }else{
                $this->error(L('NO_SELECT_STAFF'));
            }
        }else{
            if ($data['role_id']) {//部门所有员工
                $exist = M('oa_salary_class')->where("role_id={$data['role_id']}")->find();
                if ($exist) {
                    $this->error(L('ONLY_SALARY_CLASS'));
                }else{
                    unset($data['staff_id']); 
                    $code = D('Salary')->addSalaryClass($data);
                }
            }else{
                $this->error(L('NO_SELECT_ROLE'));
            }
        }

        if($code === false){
            $this->error(L('ADD_ERROR'));
        }else {
            $this->success(L('ADD_SUCCESS'));
        }
    }

    //提成设置
    public function commissionSet(){
        $_REQUEST['act'] = 'commission';
        $this->nav();
        $switchTag = array('部门','小组','员工');
        $sort1 = array(
            '1'=>'按照销售额计算提成',
            '2'=>'按照销售平台',
            '3'=>'按照配送方式',
            '4'=>'按照毛利计算提成',
            '5'=>'按照产品实际销售提成'
        );
        $sort2 = array(
            'identical'=>'同一比例','cumulative'=>'累加比例','product'=>'产品比例');
        $data = D('RoleManage')->roleListSelect('','role_id,role_name');
        $this->assign('data',$data);
        //$this->assign('url',U('Home/Salary'));
        $this->assign('url',self::$controllerUrl);
        $this->assign('sort1',$sort1);
        $this->assign('sort2',$sort2);
        $this->assign('position_level',D('Hrm')->positionLevel());
        $this->assign('cumulativeNum',range(0,5));
        $this->assign('switch_tag',$switchTag);
        $this->display();
    }

    //提成基数类型（提成设置）
    public function getCardinalityType(){
        $type = intval($_REQUEST['type']);
        if (1 == $type) {
            //按平台
            $res = M('role')->field('role_id AS value,role_name AS name')
                ->where('role_id IN('.C('ONLINE_STORE').')')->select();
        }elseif(2 == $type){
            //按配送方式
            $res = M('shipping')->field('shipping_id AS value,shipping_name AS name')
                ->where('enabled<>0')->select();
        }
        return $this->ajaxReturn($res,'JSON');
    }

    /*切换平台，员工，小组*/
    public function switchParticipant(){
        $tag = intval($_POST['tag']);
        switch($tag){
        case 0:
            $data = D('RoleManage')->roleListSelect('','role_id,role_name');
            $name = '部门';break;
        case 1:
            $data = D('RoleManage')->groupList('','group_id,group_name');
            $name = '小组';break;
        case 2:
            $data = D('hrm')->staffListSelect(false,true);
            $name = '员工';break;
        }

        $optionList = "<option value=\"0\">$name</option>";
        foreach ($data as $key=>&$val) {
            $optionList.="<option value=\"$key\">{$val}</option>";
        }
        $returnData = array('name'=>$name,'html'=>$optionList);
        return $this->ajaxReturn($returnData,'JSON'); 
    }

    //提成规则
    public function commissionRule(){
        $_REQUEST['act'] = 'commission'; 
        $this->nav();
        $where = '1';
        if($_REQUEST['cardinality']){
            $where .= " AND c.cardinality={$_REQUEST['cardinality']}";
        }

        if ($_REQUEST['proportion_type']) {
            $where .= " AND c.proportion_type={$_REQUEST['proportion_type']}";
        }

        if ($_REQUEST['role_id']) {
            $where .= ' AND c.participant_type=0';
            $participantType = 0;
            $type = intval($_REQUEST['role_id']);
        }elseif($_REQUEST['group_id']){
            $where .= ' AND c.participant_type=1';
            $participantType = 1;
            $type = intval($_REQUEST['group_id']);
        }elseif($_REQUEST['staff_id']){
            $where .= ' AND c.participant_type=2';
            $participantType = 2;
            $type = intval($_REQUEST['staff_id']);
        }

        if ($type) {
            $where .= " AND participant_type=$participantType";
            $commissionRule = D('Salary')->commissionRule($where);
            $commissionRule = $this->filterCommissionRule($commissionRule,$type);
        }else{
            $commissionRule = D('Salary')->commissionRule($where);
        }


        $this->assign('commission_rule',$commissionRule);
        $this->assign('role_list',D('RoleManage')->roleList('','role_id,role_name'));
        $this->assign('group_list',D('RoleManage')->groupList('','group_id,group_name'));
        $this->assign('staff_list',D('Hrm')->staffListSelect(0));
        $assignParameter = array(
            'cardinality'     => array('基数','销售额','毛利','实际销售价'),
            'proportion_type' => array('类型','同一比例','累加比例','产品比例')
        );
        $this->assign('assignParameter',$assignParameter);
        $this->display();
    }

    /*添加提成规则*/
    public function addCommissionRule(){
        if ($_POST) {
            $data = array(
                'rule_name'        => trim($_REQUEST['rule_name']),
                'participant_type' => $_REQUEST['nav_switch'],  //参与者类型
                'participant'      => serialize($_REQUEST['participant']),   //参与者列表
                'participant_name' => serialize($_REQUEST['participant_name']),//参与都名称
                'cardinality'      => $_REQUEST['sort1'],    //提成基数
                'position_level'   => $_REQUEST['position_level'],//职位等级
                'payment'          => intval($_REQUEST['payment']),//支付方式
                'base_sales'       => intval($_REQUEST['base_sales']),//保底销量
                'add_time'         => $_SERVER['REQUEST_TIME'],
                'add_admin'        => $_SESSION['admin_id'],
                'work_age'         => intval($_SESSION['work_age']),//工龄
            );

            if (1 == $_REQUEST['cardinalityType']) {
                $data['platform'] = intval($_REQUEST['cardinalityType']);
            }else{
                $data['shipping'] = intval($_REQUEST['cardinalityType']);
            }

            /*提成比例类型*/
            switch ($_REQUEST['sort2']) {
            case 'identity'   : $data['proportion_type'] = 0; break; //同一比例
            case 'cumulative' : $data['proportion_type'] = 1; break; //累加比例
            case 'product'    : $data['proportion_type'] = 2; break; //产品比例
            }

            if (1 != $data['proportion_type']) {
                $data['commission'] = $_REQUEST[$_REQUEST['sort2'].'_commission'];
                $res = D('Salary')->addCommissionRule($data);
            }else{
                //累加比例
                $count = count($_REQUEST['commission']);
                for ($i = 0; $i < $count; $i++) {
                    if (intval($_REQUEST['commission'][$i])) {
                        $data['min_sales']  = intval($_REQUEST['min_sale'][$i]);
                        $data['max_sales']  = intval($_REQUEST['max_sale'][$i]);
                        $data['commission'] = intval($_REQUEST['commission'][$i]);
                        if (!D('Salary')->addCommissionRule($data)) {
                            break;
                        }
                        $res = true;
                    }
                }
                if ($i > $count) {$res = false; }
            }
            if ($res) {
                //修改参与者的提成类型
                $participant = implode(',',$data['participant']);
                switch ($_REQUEST['nav_switch']) {
                    case 0 : $tableModel = M('role');
                    $where = "role_id IN($participant)"; break;
                    case 1 : $tableModel = M('group');
                    $where = "group_id IN($participant)"; break;
                    case 2 : $tableModel = M('oa_staff_records');
                    $where = "staff_id IN($participant)"; break;
                }
                $res = $tableModel->where($where)->save($data);
                $this->success(L('ADD_SUCCESS'),U('Home/Salary/commissionRule'));
            }else{
                $this->error(L('ADD_ERROR'));
            }
        }else{
            $this->error(L('ACCESS_METHOD_ERROR'));
        }
    }
    //公共提成
    public function commonCommission(){
        $this->nav();
        $thlist = array('序号','姓名', '部门','提成系数','生效时间','修改人');
        $this->assign('thlist',$thlist);
        $this->assign('title',L('COMMON_COMMISSION'));
        $this->assign('role_list',D('RoleManage')->roleList('','role_id,role_name'));
        $this->display();
    }

    //待发提成
    public function commissionWait(){
        $_REQUEST['type'] = 'wait';
        $this->commissionList();
    }

    /*提成列表*/
    public function commissionList(){
        $type            = trim($_REQUEST['type']);
        $phase           = strtotime(date('Y-m-1',strtotime('-1 month')));
        $where           = " phase=$phase ";
        $_REQUEST['act'] = 'commission';
        $memberSaler = C('SALE');
        $memberSaler = explode(',',$memberSaler);

        $this->nav();
        $roleId = $_REQUEST['role_id']?intval($_REQUEST['role_id']):1;
        if ('wait' == $type) { //待发提成数据
            //$datetime = strtotime('-1 month'); //上个月
            $datetime = $_SERVER['REQUEST_TIME'];
            $where    .= " AND add_time=$datetime";
            //$commissionList = $staffList;
            $this->assign('title',L('commission_wait'));
            $this->assign('datetime',date("Y-m",$datetime));
        }else{
            $this->assign('title',L('commission_send'));
            $where .= ' AND type=1';
        }
        if (in_array($roleId,$memberSaler)) {
            $staffList = M('admin_user')->where("role_id=$roleId")
                ->field('user_id as staff_id,user_name as staff_name')->select();
        }else{
            //员工列表
            $staffList  = D('Hrm')->staffListSelect(false,false,"role_id=$roleId");
        }
        if ($staffList) {
            foreach ($staffList as $val) {
                $staffIdListView[] = $val['staff_id'];
            }
            $staffIdList = implode(',',$staffIdListView);
            $where .= " AND staff_id IN($staffIdList)";
            $commissionList = D('Salary')->commissionList($where);
        }

        //dump($commissionList);exit;
        //数据库中是否已经保存记录
        $roleCommission = M('oa_role_commission_list')
            ->where("role_id=$roleId AND phase=$phase")->select();
        if (!$roleCommission) {
            //数据库没有平台上个月待发提成记录,就统计并保存
            $roleCommission = $this->computeCommission($staffList,$roleId); 
            if($roleCommission &&in_array($roleId,$memberSaler)){
                $roleCommission = $roleCommission['role_commission'];
                $memberSalerCommission = $roleCommission['staff_list'];
            }
        }elseif(in_array($roleId,$memberSaler)){
            $memberSalerCommission = $this->salerCommisstion($staffList);
        }
        //else{
        //    $roleCommission = D('Salary')->roleCommissionList("role_id=$roleId");
        //}
        //没有保存上个月的待发提成记录执行下面代码
        if (!$commissionList) {
        //针对员工提成规则
            //推广平台和销售部门
            if (!in_array($roleId,$memberSaler)) {
                $commissionRule = D('Salary')->commissionRule('participant_type=2','c.*'); 
                $summumation = 0.00;    //已有提成合计
                if ($commissionRule) {
                    foreach ($commissionRule as $c) {
                        foreach ($staffList as $k=>$v) {
                            if (in_array($v['staff_id'],$c['participant'])) {
                                $commission =
                                    $roleCommission[0]['commission']*($c['commission']/100);
                                unset($staffList[$k]);
                                $summumation += $commission;
                                $data[] = array_merge(
                                    array(
                                        'commission' => $commission,
                                        'phase'      => $phase,
                                        'add_time'   => $_SERVER['REQUEST_TIME'],
                                        'commission_proportion' => $c['commission'],
                                        'final_amount' => $roleCommission[0]['commission'],
                                    ),$v); 
                            }
                        }
                    }
                }
                if ($staffList) {
                    $count = count($staffList);
                    $commissionProportion = sprintf("%0.2f",(1/$count*100));
                    $commission = sprintf("%0.2f",
                        ($roleCommission[0]['commission'] - $summumation)*($commissionProportion/100));
                    foreach ($staffList as $v) {
                        $data[] = array_merge(
                            array(
                                'commission' => $commission,
                                'phase'      => $phase,
                                'add_time'   => $_SERVER['REQUEST_TIME'],
                                'commission_proportion' => $commissionProportion,
                                'final_amount' => $roleCommission[0]['commission'] - $summumation,
                            ),$v);
                    }
                }
            }else{
                //销售团队
              if ($memberSalerCommission) {
                  $roleCommissionRule = D('Salary')->commissionRule('participant_type=0');
                  if ($roleCommissionRule) {
                      foreach ($roleCommissionRule as $v) {
                          $participant = unserialize($v['participant']);
                          if (in_array($roleId,$participant)) {
                              $commission = $v['commission'];
                          }
                      }
                  }
                  foreach ($staffList as $v) {
                      $data[] = array_merge(
                          array(
                              'commission' => sprintf("%0.2f",$v['final_amount']*$commission),
                              'phase'      => $phase,
                              'add_time'   => $_SERVER['REQUEST_TIME'],
                              'commission_proportion' => $commission,
                          ),$v);
                  }
              }else{
                  //没有销量
              }
            }
            $this->assign('type','wait');
            $this->assign('saveUrl',
                __CONTROLLER__."/saveCommissionList/role_id/$roleId/phase/$phase");
            if ($data) {
                S($roleId.'_mem_commission_list',$data,600);
                foreach ($data as &$d) { $d['add_time'] = date('Y-m-d',$d['add_time']); }
                $commissionList = $data;
            }
        }else{//已经保存上个月提成

        }
        $this->assign('commission_list',$commissionList);
        $this->assign('role_commission',$roleCommission);
        $this->assign('role_id',$roleId);
        $this->assign('role_list',D('RoleManage')->roleList('','role_id,role_name'));
        if('search' == $_REQUEST['from']){
            $res['main'] = $this->fetch('commissionListRes');
            $this->ajaxReturn($res,'JSON');
        }else{
            $this->assign('commissionListRes',$this->fetch('commissionListRes'));
            $this->display('commissionList');
        }
    }

    //保存提成记录
    public function saveCommissionList(){
        $roleId = $_REQUEST['role_id'];
        $phase  = mysql_real_escape_string($_REQUEST['phase']);
        if (!S($roleId.'_mem_commission_list')) {
        }else{
            $data = S($roleId.'_mem_commission_list');
        }
        if ($data) {
            $list = D('Salary')->commissionList("phase=$phase",0);
            if ($list) {
                foreach ($list as $l) {
                    $comm[] = $l['staff_id'];
                }
                foreach ($data as $v) {
                    if (!in_array($v['staff_id'],$comm)) {
                        M('oa_commission_list')->filter('strip_tags')->add($v);
                    }
                }  
            }else{
                foreach ($data as $v) {
                    M('oa_commission_list')->filter('strip_tags')->add($v);
                }
            }
            $this->success(L('ADD_SUCCESS'),U('Home/Salary/commissionList/type/wait'));
        }else{
            $this->error(L('ADD_ERROR'));
        }
    }

    //编辑工资表
    public function salaryTable(){
        $_REQUEST['act'] = 'salaryTable';
        $this->nav();
        $salaryClass = D('Salary')->salaryClass('class_id,class_name');
        $itemList    = D('Salary')->salaryItem('',0);
        $this->assign('date',date('Y年').(date('m')-1));
        $this->assign('url',__CONTROLLER__.'/switchSalaryClass');
        $this->assign('item_list',$itemList);
        $this->assign('tdNum',count($itemList));
        $this->assign('salaryClass',$salaryClass);
        $this->assign('classTable',$this->fetch('salaryClassTable'));
        $this->display();
    }

    /*切换套用工资套账*/
    public function switchSalaryClass(){
        $classId = I('get.class_id',0);
        if (!$classId) {
            $itemList = D('Salary')->salaryItem('',0);
        }else{
            $salaryClass = S($classId.'_salary_class');
            if ($salaryClass) {
                $itemList     = S($classId.'_item_list');
            }else{
                $where        = "class_id=$classId";
                $salaryClass  = D('Salary')->salaryClass('*',$where);
                $salaryClass  = $salaryClass[0];
                $itemList     = $salaryClass['item_list'];
                $salaryClass  = $this->salaryListInfo($salaryClass);
                if ($salaryClass) {
                    S($classId.'_salary_class',$salaryClass,600);
                    S($classId.'_item_list',$itemList,6000);
                }    
            }
            $this->assign('participant',$salaryClass['participant']);
            $this->assign('summary',$salaryClass['summary']);
            $this->assign('td_num',range(0,count($itemList)));
            $this->assign('salary_list',D('Salary')->salaryListItem($itemList));
        }
        $this->assign('item_list',$itemList);
        $this->assign('tdNum',count($itemList)+4);
        $data = $this->fetch('salaryClassTable');
        return $this->ajaxReturn($data,'JSON');
    }
    /*工资数据源*/
    public function salaryListInfo($salaryClass){
        $participant    = $salaryClass['participant'];
        $itemListDesk   = $salaryClass['item_list_desk'];
        $reportTime     = strtotime(date('Y-m',strtotime('-1 month')));
        $commissionList = D('Salary')->commissionList("phase=$reportTime");
        $sale           = explode(',',C('SALE'));
        if ($commissionList) {
            foreach ($commissionList as $k=>$v) {
                $commissionList[$v['staff_id']] = $v;
                unset($commissionList[$k]);
            }
        }
        $checkingin   = D('Checkingin')
            ->getCheckinginReport("report_time=$reportTime
            AND role_id={$salaryClass['role_id']}");  //考勤报表
        if ($checkingin) {
            foreach ($checkingin as $k=>$v) {
                $checkinginStaff[] = $v['staff_id'];
                $checkingin[$v['staff_id']] = $v;
                unset($checkingin[$k]);
            }
        }

        if (!$salaryClass['type']) {
            $staffList = D('Hrm')
                ->staffListSelect(false,false,"role_id={$salaryClass['role_id']}",'position_level,'); 
            $participant = $staffList;
        }
        if ($participant) {
            foreach ($participant as $v) {
                $l[] = $v['staff_id'];
            }
            $where = 'staff_id IN('.implode(',',$l).')';
            if (in_array($salaryClass['role_id'],$sale)) {
                $isSaler = true;
                $positionLevel = M('oa_position_level')->getField('level_id,level_name');
            }
            $baseSalaryList = D('Salary')->salaryListTable('staff_id,salary',$where);
            if ($baseSalaryList) {
                foreach ($participant as &$s) {
                    foreach ($baseSalaryList as $k=>$v) {
                        if ($v['staff_id'] == $s['staff_id']) {
                            $s['items']['salary'] = sprintf("%0.2f",$v['salary']); //基本工资
                        } 
                    }
                    //岗位补贴
                    $s['items']['position_allowance'] = $itemListDesk[1]['default_value'] ?
                        $itemListDesk[1]['default_value'] : '-';
                    if (in_array($s['staff_id'],$checkinginStaff)) {
                        $s['items']['working_days'] = 
                            $checkingin[$s['staff_id']]['working_days'];    //出勤天数
                        $s['items']['checkingin_dedcut'] = 
                            $checkingin[$s['staff_id']]['dedcut_late']+
                            $checkingin[$s['staff_id']]['dedcut_outwork'];  //考勤扣款
                        $s['items']['full_workingdays'] = '0.00';           //全勤
                    }else{
                        $s['items']['working_days'] = date('t',$reportTime);
                        $s['items']['checkingin_dedcut'] = '0.00'; 
                        $s['items']['full_workingdays'] = $itemListDesk[4]['default_value'];
                    }
                    //提成
                    $s['items']['commission'] = $commissionList[$s['staff_id']]['commission']; 
                    if (empty($s['items']['commission'])){
                        $s['items']['commission'] = '0.00'; 
                    }
                    $s['items']['checkingOt']       = '0.00';   //加班费
                    $s['items']['social_insurance'] = '0.00';   //社会保险
                    $s['items']['president']        = '0.00';   //舍长
                    $s['items']['dedcut_shipping']  = '0.00';   //扣运费
                    if ($isSaler) {
                        //中老年，售前，售后
                        if ($s['position_level']) {
                            $s['items']['position_level'] =
                                $positionLevel[$s['position_level']]; 
                        }else{
                            $s['items']['position_level'] = '普通';
                        }
                    }
                    $s['items']['actual_commission'] = sprintf("%0.2f",$s['items']['commission']
                        + $s['items']['social_insurance']+$s['items']['president']);  //实发提成
                    $s['should_dedcut'] = sprintf("%0.2f",
                        $s['items']['checkingin_dedcut']+$s['items']['dedcut_shipping']);
                    $s['actual_salary'] = sprintf("%0.2f",
                        $s['items']['salary']
                        + $s['items']['actual_commission']+ $s['items']['full_workingdays']
                        -$s['should_dedcut']);
                    //合计
                    foreach ($s['items'] as $k=>$i) {
                        if ('position_level' != $k) {
                            $summary[$k] += $i;
                        }else{
                            $summary[$k] = '-';
                        }
                    }
                    $summary['should_dedcut'] += $s['should_dedcut'];
                    $summary['actual_salary'] += $s['actual_salary'];
                }
            }
            if ($summary) {
                foreach ($summary as $k=>&$v) {
                    if ('position_level' == $k || 'working_days' == $k ) {
                        $v = '-';
                    }else{
                        $v = sprintf("%0.2f",$v);
                    }
                }
            }
        }
        return array('participant' => $participant,'summary' => $summary);
    }

    /*发工资*/
    public function payoff(){
        $_REQUEST['act'] = 'payoff';
        $this->nav();
        $this->assign('title',L('SALARY_WAIT_CHECKED'));
        $this->assign('item_list',D('Salary')->salaryItem());
        $this->assign('role_list',D('RoleManage')->roleList('','role_id,role_name'));
        $this->display();
    }

    /*薪资报表*/
    public function salaryList(){
        $_REQUEST['act'] = 'salaryList';
        $this->nav();
        $this->assign('item_list',D('Salary')->salaryItem());
        $this->assign('role_list',D('RoleManage')->roleList('','role_id,role_name'));
        $this->assign('dataUrl',__CONTROLLER__.'/salaryListReturn');
        $this->assign('title',L('SALARY_REPORT'));
        $this->display('payoff');
    }
    //AJAX薪资报表
    public function salaryListReturn(){
        return ajaxReturn($mHrm->salaryList());
    }
    /*工资审批设置*/
    public function salaryApproval(){
        $_REQUEST['act'] = 'salarySet';
        $this->assign('admin_list',D('Admin')->groupAdminList());
        $this->assign('role_list',M('role')->getField('role_id,role_name'));
        $this->assign('approval_list',D('Salary')->salaryApproval());
        $this->nav();
        $this->display();
    }
    /*添加工资审批人*/
    public function addSalaryApproval(){
        $data = $_REQUEST;
        $where = "admin_id={$data['admin_id']} AND role_id={$data['role_id']}";
        $exist = D('Salary')->salaryApproval($where);
        if ($exist) {
            $this->error(L('DUPLICATE_APPROVAL'));
        }else{
            $data['add_time'] = $_SERVER['REQUEST_TIME'];
            $code = D('Salary')->addSalaryApproval($data);
            if ($code) {
                $this->success(L('set_success'),U('Home/Salary/salaryApproval'));
            }else{
                $this->error(L('set_error'));
            }
        }
    }
    /*过滤提成规则*/
    private function filterCommissionRule($commissionRule,$type){
        foreach($commissionRule as &$val){
            $val['participant'] = unserialize($val['participant']);
            if (in_array($type,$val['participant'])) {
                $res[] = $val;
            }
        }
        return $res;
    }
    //计算提成并写入数据库
    private function computeCommission($staffList=array(),$roleId){
        $phase = strtotime(date('Y-m-1',strtotime('-1 month')));
        $onlineStore = C('ONLINE_STORE');
        $sale        = C('SALE');
        $onlineStore = explode(',',$onlineStore);
        $saleMember = explode(',',$sale);
        $status = ' order_status IN (1,5) AND shipping_status<>3 AND order_type<100'.
            " AND platform=$roleId";
        //$startTime = strtotime(date('Y-m-01 00:00:00',strtotime('-1 month')));
        //$endTime   = strtotime(date('Y-m-t 00:00:00',strtotime('-1 month'))); 

        $startTime = strtotime(date('Y-m-01 00:00:00'));
        $endTime   = strtotime(date('Y-m-t 23:59:59'));
        if (in_array($roleId,$onlineStore)) {    //平台销量提成 
            $sales = D('Salary')->sales($startTime,$endTime,$status);  // 上月销量
            //平台提成基数
            $commissionRule = D('Salary')->commissionRule('participant_type=0','c.*');
            if (!$commissionRule) {
                $this->error(L('NO_SITE_COMMISSION_RULE'));
                return false;exit;
            }
            if($accumulation){
                krsort($accumulation);
                foreach($accumulation as $val){
                    if ($sales['final_amount'] < $val['base_sales']) {
                        $commission = $sales['final_amount']*($val['commission']/100); 
                        $commissionProportion = $val['commission'];
                        break; 
                    } 
                }
            }
            $roleCommission[] = array(
                'role_id'               => $roleId,
                'final_amount'          => $sales['final_amount'],
                'commission'            => $commission,
                'commission_proportion' => $commissionProportion,
                'add_time'              => $_SERVER['REQUEST_TIME'],
                'phase'                 => $phase,
            );
            $roleCommissionId = M('oa_role_commission_list')->data($roleCommission[0])
                ->filter('strip_tags')->add(); 
            return $roleCommission;
        }elseif(in_array($roleId,$saleMember)){ //会员，售前，中老年
            $roleSales   = D('Salary')->sales($startTime,$endTime,$status);  // 部门上月销量
            if ($roleSales) {
                foreach ($roleSales as &$v) {
                    $res['final_amount'] += $v['final_amount'];
                }
                $staffList = $this->salerCommisstion($staffList);
                //保存部门提成记录
                $data = array(
                    'role_id'      => $roleId,
                    'final_amount' => $res['final_amount'],
                    'add_time'     => $_SERVER['REQUEST_TIME'],
                    'phase'        => $phase,
                );
                $roleCommissionId = M('oa_role_commission_list')->data($data)
                    ->filter('strip_tags')->add(); 
                return array('role_commission'=>$data,'staff_list'=>$staffList);
            }
        }else return false;
    }

    //销售员工提成
    public function salerCommisstion($staffList){
        //员工销量
        $memberSales = D('Salary')->SaleMemberSales($startTime,$endTime,$status);
        //是否有独立的提成规则
        $commissionRule = D('Salary')
            ->commissionRule('c.participant_type=2','c.*'); 
        if ($commissionRule) {
            foreach ($commissionRule as &$v) {
                foreach ($memberSales as $k=>&$m) {
                    foreach ($staffList as $t=>&$s) {
                        if ($m['admin_id'] == $s['staff_id']) {
                            $m['commission'] = $m['final_amount']*$v['commission'];
                            $s = $m;
                            unset($memberSales['key']);
                        }
                    }
                }
            }
        }
        return $staffList;
    }
}
?>
