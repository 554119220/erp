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

    //考勤类型
    public function checkinginType(){
        $this->nav();
        $operation = array('扣','加','乘','除');
        $overtakeDate = array('分','时','天');
        $this->assign('operation',$operation);
        $this->assign('overtake_date',$overtakeDate);
        $this->assign('url',__CONTROLLER);
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
                if ($_REQUEST['salary_rule']) {
                    $data['salary_rule'] = "{$_REQUEST['times']} {$_REQUEST['operation']} {$_REQUEST['rule_item']} {$_REQUEST['salary_rule']}";
                }
                $res = M('oa_checkingin_type')->where("type_id=$typeId")->save($data);
                if ($res) { $this->success(L('UPD_SUCCESS'));
                }else{ $this->error(L('UPD_ERROR')); }
            }else{
                $res = M('oa_checkingin_type')->where("type_id=$typeId")->select();
                if ($res) {
                    $res = $res['0'];
                    $res['salary_rule'] = explode(' ',$res['salary_rule']); 
                    $this->ajaxReturn($res,JSON);
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
        if ($_REQUEST['salary_rule']) {
            $data['salary_rule'] = "{$_REQUEST['times']} {$_REQUEST['operation']} {$_REQUEST['rule_item']} {$_REQUEST['salary_rule']}";
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
                'dateType'   => I('post.dateType',0),
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
                    $this->success(L('APPLY_SUCCESS'),U('Home/Checkingin/vacateList'));
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
            $this->success(L('RECORD_SUCCESS'),U('Home/Checkingin/late'));
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
                $this->error(L('ALREAD_ADD'),U('Home/Checkingin/checkinginReport'));
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
                    $this->error(L('ADD_ERROR'),U('Home/Checkingin/checkinginReport'));
                }
            }else $this->error(L('ADD_ERROR'),U('Home/Checkingin/checkinginReport'));
        }
    }

    /*请假审批*/
    public function leaveApproval(){
        $this->nav();
        $this->assign('title',L('LEAVE_APPROVAL'));
        $this->assign('typeList',D('checkingin')->typeList('parent_id=1'));
        $this->display('approval');
    }

    /*加班审批*/
    public function otApproval(){
        $this->error(L('OTING')); 
    }

    /*加班记录*/
    public function checkinginOt(){
        $this->error(L('OTING')); 
    }

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
}
?>
