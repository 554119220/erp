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

class SalaryController extends PublicController{
    public function index(){
        $this->salaryList();
    }

    /*薪资相关信息*/
    public function salaryList(){
        $mHrm   = D('Hrm');
        $salary = $mHrm->salary();
        $this->assign('role_list',D('RoleManage')->roleList('','role_id,role_name'));
        $this->assign('salary',$salary);
        $res['main'] = $this->fetch('salary');
        return $this->ajaxReturn($res);
    }

    /*编辑提成系数*/
    public function commissionSite(){
        $mHrm = D('hrm');
        $b = isset($_REQUEST['b'])?$_REQUEST['b']:'view';
        if ('view' == $b) {
            $commissionList = $mHrm->commissionList();
            $this->assign('role_list',D('RoleManage')->roleList('','role_id,role_name'));
            $this->assign('group_list',D('RoleManage')->groupList('','group_id,group_name'));
            $res['main'] = $this->fetch('commission');
            return $this->ajaxReturn($res);
        }elseif('add' == $b){

        }elseif('edit' == $b){
            
        }
    }

}
?>
