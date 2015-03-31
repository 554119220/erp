<?php
/*=============================================================================
#     FileName: CheckinginController.class.php
#         Desc: 考勤管理 
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2015-02-02 09:45:10
#      History:
=============================================================================*/
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class CheckinginController extends PublicController {
    //@class_id  1请假 2迟到
    public function nav(){
        $title = I('get.title',L('CHECKINGIN_MANAGE'));
        $act = $_REQUEST['act'] ? $_REQUEST['act'] : 'payoff';
        $Menu = D('Menu');
        $navlist = $Menu->nav('CheckingIn');
        $url = substr(U(),0,strrpos(U(),'/'));
        $this->assign('url',$url);
        $this->assign('act',$_REQUEST['act']);
        $this->assign('navlist',$navlist);
        $this->assign('title',$title);
        $this->fullpage();
    }

    public function index(){
        $this->nav();
        $this->checkinginAll();
    }

    public function checkingin(){
        $this->index();
    }

    //考勤类型
    public function checkinginType(){
        $this->nav();
        $operation  = array('reduce'=>'减','add'=>'加');
        $unity      = array('d'=>'天','h'=>'时','m'=>'分','s'=>'次');
        $relationOperator = array(
            'lt'=>'小于','gt'=>'大于','eq'=>'等于','le'=>'小于等于','ge'=>'大于等于');
        $ruleitem = array('固定值', '每日工资 x','每时工资 x','时长 x');

        $this->assign('operation',$operation);
        $this->assign('unity',$unity);
        $this->assign('rule_item',$ruleitem);
        $this->assign('relation_operator',$relationOperator);
        $this->assign('url',__CONTROLLER__);
        $this->assign('typeList',D('checkingin')->typeList('',true));
        $this->assign('type',D('Checkingin')->typeList('parent_id=0'));
        $this->display(); 
    }

    /*修改考勤类型*/
    public function controlCheckinginType(){
        $typeId = intval($_REQUEST['type_id']);
        $act = $_REQUEST['act'];
        if ('edit' == $act) {
            if ($_REQUEST['todo']) {
                $data = array(
                    'parent_id' => I('post.type',0),
                    'type_name' => trim(I('post.name','')),
                );
                if ($_REQUEST['salary_rule'][0]) {
                    $data['salary_rule'] = $this->checkinginTypeRule();
                }else{
                    $data['salary_rule'] = '';
                }
                $res = M('oa_checkingin_type')->where("type_id=$typeId")->save($data);
                if ($res) { $this->success(L('UPD_SUCCESS'));
                }else{ $this->error(L('UPD_ERROR')); }
            }else{
                $res = M('oa_checkingin_type')->where("type_id=$typeId")->find();
                if ($res) {
                    if ($res['salary_rule']) {
                        $ruleList = explode(' ',$res['salary_rule']);
                        foreach ($ruleList as &$v) {
                            $v = unserialize($v);
                        }
                        $res['salary_rule'] = $ruleList;
                    }
                    $this->ajaxReturn($res,'JSON');
                }else{
                    $this->error(L('NO_FIND_CHECKINGIN_TYPE'));
                }
            }
        }else{
            $this->error(L('NO_COMPLETE'));
        }
    }
    //添加考勤类型
    public function addCheckinginType(){
        $data = array(
            'parent_id' => I('post.type',0),
            'type_name' => trim(I('post.name','')),
        );
        if ($_REQUEST['salary_rule'][0]){
            $data['salary_rule'] = $this->checkinginTypeRule();
        }else{
            $data['salary_rule'] = '';
        }

        $where = "parent={$data['parent']} AND type_name='{$data['type_name']}'";
        $exist = D('Checkingin')->typeList($where);
        if ($exist) {
            $this->error(L('EXIST_TYPE'));
            exit;
        }else{
            $code = D('Checkingin')->addCheckinginType($data); 
            if ($code) {
                $this->success(L('ADD_SUCCESS'), 'checkinginType');
            }else{
                $this->error(L('ADD_ERROR'));
            }
        }
    }

    /*申请请假*/
    public function applyVacate(){
        $this->nav();
        if (I('get.act','') == 'add') {
            if (empty($_REQUEST['staff_id'])) {
                $this->error(L('NO_SELECT_STAFF'));
                exit;
            }
            $data = array(
                'add_time'   => I('add_time',$_SERVER['REQUEST_TIME']),
                'staff_id'   => intval($_REQUEST['staff_id']),
                'reason'     => I('post.reason',''),
                'date'       => I('post.date',''),
                'date_type'   => I('post.date_type',0),
                'class_id'      => 1,
                'type_id'    => I('post.type_id',0),
                'start_time' => strtotime(I('post.start_time','')),
                'end_time'   => strtotime(I('post.end_time','')),
                'job_title'  => I('post.job_title'),
                'role_id'    => I('post.role_id'),
            );
            $data['staff_name'] = M('oa_staff_records')
                ->where("staff_id={$data['staff_id']}")->getField('staff_name');
            if ($data['staff_name'] && $data['reason']) {
                $data['dedcut_salary'] = $this->dedcutSalary($where,$data);
                $code = D('Checkingin')->applyVacate($data); 
                if ($code) {
                    $this->success(L('APPLY_SUCCESS'),__CONTROLLER__.'/vacateList');
                }else{
                    $this->error(L('APPLY_ERROR'));
                }
            }
        }else{
            $this->assign('url',__CONTROLLER__.'/applyVacate/act/add');
            $this->assign('vacate',D('Checkingin')->typeList('parent_id=1'));
            $staffList = D('hrm')->staffListSelect(false,true);
            $this->assign('staff_list',$staffList);
            $this->assign('role_list',D('roleManage')->roleList('','role_id,role_name'));
            $this->display();
        }
    }

    /*迟到列表*/
    public function late(){
        $this->assign('late','late');
        $this->assign('formUrl',__CONTROLLER__.'/lateRecord');
        $this->assign('staff_list',D('hrm')->staffListSelect(false,true)); 
        $hour = date('H') > 12 ? '08:00' : '14:00';
        $this->assign('hour',$hour);
        $this->listData('2',L('LATE_LIST')); 
    }

    //迟到登记
    public function lateRecord(){
        if (empty($_REQUEST['staff_id'])) {
            $this->error(L('NO_SELECT_STAFF'));
            exit;
        }
        $data = $_REQUEST;
        foreach ($data as &$val) {
            $val = trim($val);
        }
        $info =  M('oa_staff_records')->where("staff_id={$data['staff_id']}")
            ->field('role_id,staff_name')->select();
        $data['staff_name'] = $info[0]['staff_name'];
        $data['role_id']    = $info[0]['role_id'];
        $data['start_time'] = strtotime($_REQUEST['start_time']);
        $data['class_id']   = 2;
        $data['type_id']    = 8;
        $data['add_time']   = $_SERVER['REQUEST_TIME'];

        $data['dedcut_salary'] = $this->dedcutSalary($where,$data);
        $code = D('Checkingin')->applyVacate($data);
        if (!$code) {
            $this->error(L('RECORD_ERROR'));
        }else{
            $this->success(L('RECORD_SUCCESS'),__CONTROLLER__.'/late');
        }
    }

    /*明列数据*/
    public function listData($classId='',$title=''){
        if (!$classId) {
            $classId = I('get.class_id','1');
        }
        $this->nav();
        $this->assign('dataUrl',__CONTROLLER__."/checkinginList/class_id/$classId");
        $this->assign('title',$title);
        $this->display('vacateList');
    }

    //请假列表
    public function vacateList(){
        $this->nav();
        $this->assign('title',L('VACATE_LIST'));
        $this->assign('dataUrl',__CONTROLLER__.'/checkinginList/class_id/1');
        $this->display();
    }

    //考勤检索
    public function checkinginList(){
        $classId = I('get.class_id','');
        if ($classId) {
            $where = "c.class_id=$classId";
            $res = D('checkingin')->checkinginList($where);
        }else{
            //考勤汇总
            $res = D('checkingin')->checkinginList();
        }
        return $this->ajaxReturn($res,'JSON');    
    }

    //考勤汇总
    public function checkinginAll(){
        $this->nav();
        $this->assign('title',L('CHECKINGIN_ALL'));
        //考勤汇总数据源返回
        $this->assign('report',true);
        $this->assign('report_time',date('Y-m'));
        $this->assign('dataUrl',__CONTROLLER__.'/checkinginList/');
        $this->assign('url',__CONTROLLER__.'/checkinginReport');
        $this->display('vacateList');
    }

    /*考勤报表（结算工资使用）*/
    public function checkinginReport(){
        $this->nav();
        $act = $_REQUEST['act'];
        $reportTime = $_REQUEST['report_time']? $_REQUEST['report_time'] : date('Y-m');
        $reportTime = strtotime($reportTime);
        if (!$act || 'search' == $act) {
            $this->assign('title',L('CHECKINGIN_REPORT'));
            $this->assign('report_checkingin',true);
            $reportList = S($reportTime.'_checkingin');
            if (!$reportList) {
                $reportList = D('Checkingin')->reportCheckingin($reportTime);
                if ($reportList) {
                    S($reportTime.'_checkingin',$reportList,600);
                }
            }
            $this->assign('saveUrl', __CONTROLLER__."/checkinginReport/act/save/report_time/"
                .date('Y-m',$reportTime));
            $this->assign('report_time',date('Y-m',$reportTime));
            $this->assign('report_list',$reportList);
            $this->display('vacateList');   
        }elseif('save' == $act){
            $reportList = S($reportTime.'_checkingin');
            if (M('oa_checkingin_report')->where("report_time=$reportTime")->count()) {
                $this->error(L('ALREAD_ADD'),__CONTROLLER__.'/checkinginReport');
                exit;
            }
            $reportList = $reportList ? $reportList : D('Checkingin')->reportCheckingin($reportTime); 
            if ($reportList) {
                foreach ($reportList as $v) {
                   $res = M('oa_checkingin_report')->filter('strip_tags')->add($v);
                }
                if ($res) {
                    $this->success(L('ADD_SUCCESS'));
                }else{
                    $this->error(L('ADD_ERROR'),__CONTROLLER__.'/checkinginReport');
                }
            }else $this->error(L('ADD_ERROR'),__CONTROLLER__.'/checkinginReport');
        }
    }

    /*考勤审批*/
    public function leaveApproval(){
        $this->nav();
        $this->assign('title',L('CHECKINGIN_APPROVAL'));
        $this->assign('typeList',D('checkingin')->typeList('parent_id<>0'));
        $this->assign('staff_list',D('Hrm')->staffListSelect(false,true));
        $this->assign('role_list',D('roleManage')->roleList('','role_id,role_name'));
        $this->assign('approval_list',D('Checkingin')->approvalList());
        $this->display('approval');
    }

    /*添加考勤审批人*/
    public function addApproval(){
        $res = D('Checkingin')->addApproval();
        if ($res) {
            $this->success(L('ADD_SUCCESS'),__CONTROLLER__.'/leaveApproval');
        }else{
            $this->error(L('ADD_ERROR'));
        }
    }
    //修改审批
    public function editApproval(){
      if ('edit' == $_REQUEST['behave']) {
          $approvalId = intval($_GET['approval_id']);
          $res = M('oa_checkingin_approval')->where("approval_id=$approvalId")->find(); 
          $this->ajaxReturn($res,'JSON');
      }elseif('save' == $_GET['behave']){
          if ($_REQUEST['approval_id'] ) {
              $_REQUEST['add_time'] = $_SERVER['add_time'];
              $do = M('oa_checkingin_approval');
              $do->create();
              $res = $do->save();
              if ($res) {
                  $this->success(L('UPD_SUCCESS'),__CONTROLLER__.'/leaveApproval');
              }else{
                  $this->error(L('UPD_ERROR')); 
              }
          }
      }  
    }

    /*加班记录*/
    public function checkinginOt(){
        $this->nav();
        $this->assign('title',L('RECORD_OT'));
        $this->assign('staff_list',D('Hrm')->staffListSelect(false,true));
        $this->assign('role_list',D('roleManage')->roleList('','role_id,role_name'));
        $this->assign('status',array('待审核','通过审核'));
        $where = "c.type_id=9";
        if ($_POST['role_id']) {
            $where .= sprintf(" AND c.role_id=%d",$_POST['role_id']);
        }
        if ($_POST['staff_name']) {
            $where .= sprintf(" AND c.staff_name LIKE '%%%s%%'",$_POST['staff_name']);
        }
        if ($_POST['status']) {
            $where .= sprintf(" AND c.status=%d",$_POST['status']);
        }
        if (empty($_POST['start_time'])&&empty($_POST['end_time'])) {
            $_POST['start_time'] = strtotime(date('Y-m-1 00:00:00'));
            $_POST['end_time']   = strtotime(date('Y-m-t 23:59:59'));
        }else{
            $_POST['start_time'] = strtotime($_POST['start_time']);
            $_POST['end_time']   = strtotime($_POST['end_time']);
        }
        $where .= sprintf(" AND c.start_time BETWEEN %s AND %s",
            $_POST['start_time'],$_POST['end_time']);

        $this->assign('otList',D('Checkingin')->checkinginList($where));
        $this->assign('url',__CONTROLLER__);
        $this->display();
    }

    //添加加班记录
    public function addOtRecord(){
        $do                 = M('oa_checkingin');
        $_POST['add_time']  = $_SERVER['REQUEST_TIME'];
        $_POST['date_type'] = 1;
        $_POST['staff_name'] = M('oa_staff_records')->where("staff_id={$_POST['staff_id']}")
          ->getField('staff_name');
        $_POST['start_time'] = strtotime($_POST['start_time']);
        $_POST['end_time']   = strtotime($_POST['end_time']);
        $_POST['date']       = floor(($_POST['end_time']-$_POST['start_time'])/3600);//加班时长
        $_POST['type_id']    = 9;
        $_POST['class_id']   = 3;

        $res = D('Checkingin')->addOtRecord();
        if ($res) {
            $this->success(L('ADD_SUCCESS'),__CONTROLLER__.'/checkinginOt');
        }else{
            $this->error(L('ADD_ERROR'));
        }
    }

    /*加班登记修改*/
    public function editOt(){
        if ('edit' == $_GET['behave']) {
            $checkId = intval($_GET['check_id']);
            $res = M('oa_checkingin')->where("check_id=$checkId")->find();
            if ($res) {
                $res['start_time'] = date('Y-m-d H:i',$res['start_time']);
                $res['end_time'] = date('Y-m-d H:i',$res['end_time']);
            }
            $this->ajaxReturn($res,'JSON');
        }elseif('save' == $_GET['behave']){
            $_POST['date_type'] = 1;
            $_POST['start_time'] = strtotime($_POST['start_time']);
            $_POST['end_time'] = strtotime($_POST['end_time']);
            $_POST['staff_name'] = M('oa_staff_records')->WHERE("staff_id={$_POST['staff_id']}")
                ->getField('staff_name');
            $do = M('oa_checkingin');
            $do->create();
            $res = $do->save();
            if ($res) {
                $this->success(L('UPD_SUCCESS'),__CONTROLLER__.'/checkinginOt');
            }else{
                $this->error(L('UPD_ERROR'));
            }
        }
    }

    //外勤
    public function checkinginOut(){
        $this->error(L('OTING')); 
    }

    //考勤扣、加款
    public function dedcutSalary($where,$data){
        $typeId = $data['type_id'];
        $start  = strtotime(date('Y-m-1'));
        $end    = strtotime(date('Y-m-t'));
        $where = "staff_id={$data['staff_id']} AND type_id=$typeId AND start_time BETWEEN $start AND $end";
        $dedcutSalary = 0;
        $times = M('oa_checkingin')
            ->where($where)->count();
        $salaryRule = M('oa_checkingin_type')->where("type_id=$typeId")->getfield('salary_rule');
        if ($salaryRule) {
            $salaryRule = explode(' ',$salaryRule);
            $times++;
            if ($salaryRule[0] <= $times) {
                $times = $times - $salaryRule[0];
                $times = $times ? $times : 1;
                switch($salaryRule[2]){
                case 0: $dedcutSalary = $salaryRule[3]; break;
                case 1: 
                    $s = M('oa_staff_records')
                        ->where("staff_id={$data['staff_id']}")->getfield('salary');
                    $s = $s/date('t');
                    $dedcutSalary = $s*($salaryRule[3]/100);
                    break;
                case 2:
                    $s = M('oa_staff_records')
                        ->where("staff_id={$data['staff_id']}")->getfield('salary');
                    $s = $s/date('t');
                    $dedcutSalary = $data['date']*$s*($salaryRule[3]/100);
                    break;
                }
            }
        }
        $dedcutSalary = sprintf("%0.2f",$dedcutSalary);
        return $dedcutSalary;
    }

    //返回考勤薪资规则
    function checkinginTypeRule(){
        $num = count($_REQUEST['salary_rule']);
        for ($i = 0; $i < $num; $i++) {
            $salaryRule[]  = array(
                'relation_operator' => ($_REQUEST['relation_operator'][$i]),
                'times'             => floatval($_REQUEST['times'][$i]),
                'unity'             => $_REQUEST['unity'][$i],
                'operation'         => $_REQUEST['operation'][$i],
                'rule_item'         => intval($_REQUEST['rule_item'][$i]),
                'salary_rule'       => intval($_REQUEST['salary_rule'][$i]),
            );
            $salaryRule[$i] = serialize($salaryRule[$i]);
        }
        $rule = implode(' ',$salaryRule);
        return $rule;
    }

    //排班
    public function arrangeGrade(){
        return false;
    }

    //调休
    public function lieu(){
        $this->nav();
        $staffList = D('hrm')->staffListSelect(false,true);
        $this->assign('staff_list',$staffList);
        $this->assign('type_list',M('oa_checkingin_type')->where("parent_id=13")
            ->getField('type_id,type_name'));
        $this->assign('role_list',D('roleManage')->roleList('','role_id,role_name'));
        $this->assign('status',array('审核中','已通过','未审核'));
        $this->assign('url',__CONTROLLER__);
        $this->display();
    }

    //修改调休记录
    public function editLieu(){
        $behave = $_REQUEST['behave'] ? $_REQUEST['behave'] : 'edit';
        if ('eidt' == $behave) {
            $checkId = intval($_REQUEST['checkId']); 
            if ($checkId) {
                $res = D('Checkingin')->findCheckingin($checkId);
                if ($res) {
                    $this->ajaxReturn($res,'JSON');
                }
            }
        }elseif ('save' == $behave){

        }
    }

    //添加调休记录
    public function addLieu(){
        $_POST['add_time']   = $_SERVER['REQUEST_TIME'];
        $_POST['class_id']   = 13;
        $_POST['staff_name'] = D('Hrm')->getStaffName(intval($_POST['staff_id']));
        $_POST['start_time'] = strtotime($_POST['start_time']);
        $_POST['end_time']   = strtotime($_POST['end_time']);
        $do                  = M('oa_checkingin');
        $do->creat();
        $res = $do->filter('tag_filter')->add();
        if ($res) {
            $this->success(L('ADD_SUCCESS'));
        }else{
            $this->error(L('ADD_ERROR'));
        }
    }
}
?>
