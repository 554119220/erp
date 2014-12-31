<?php
/*=============================================================================
#     FileName: ServicemanageController.class.php
#         Desc:  营销
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-12-24 09:28:15
#      History:
=============================================================================*/
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class ServiceManageController extends PublicController{
    //服务操作
    public function addServie(){
       $data = array(
           'user_id'        => I('get.user_id'),
           'logbook'        => I('get.logbook'),
           'show_sev'       => I('get.show_sev'),
           'vaild'          => I('get.vaild'),
           'service_class'  => I('get.service_class',1),
           'service_manner' => I('get.service_manner',1),
           'group'          => $_SESSION['group_id'],
           'platform'       => $_SESSION['platform'],
           'admin_id'       => $_SESSION['admin_id'],
           'service_time'   => strtotime(I('get.servcie_time')),
       );

       $res = $mService->data($data)->add();
       $this->ajaxReturn($res);
    }

    //服务列表
    public function serviceList(){
        if(admin_priv('all','',false)) {
            $where     = 'role_id IN('.MEMBER_SALE.')';
            $roleList  = D('RoleManage')->roleList($where,'role_id,role_name');
            $adminList = D('admin')->adminList('','');
            $manage = true;
        } elseif(admin_priv('service_role_view','',false)) {
            $adminList = adminList('',$_SESSION['role_id']);
            $groupList = D('RoleManage')->groupList("role_id={$_SESSION['role_id']}");
            $manage = true;
            $where = "s.platform={$_SESSION['role_id']}";
        } elseif(admin_priv('service_group_view','',false)) {
            $where = "s.platform={$_SESSION['role_id']}";
            if ($_SESSION['group_id']) {
                $where .= "AND s.group_id={$_SESSION['group_id']}";
            }
        }

        $mService = D('service');
        $start    = I('request.start','');
        $end      = I('request.end','');
        $p        = I('request.p',1);
        $pageSize = I('request.page_size',30);
        $adminId  = I('request.admin_id',0);
        $roleId   = I('request.role',0);
        $groupId  = I('request.group',0);
        $userName = I('request.user_name','');
        $f        = I('request.f');
        $parameter['f'] = $f;
        $where    = ' s.valid=1 AND s.show_sev=1 AND s.service_class=1 AND s.service_manner=1';
        if ($adminId) {
            $where .= " AND s.admin_id=$adminId";
            $parameter['admin_id'] = $adminId;
        }
        if($roleId){
            $where .= " AND s.platform=$roleId";
            $parameter['role'] = $roleId;
        }
        if($groupId){
           $where .= " AND s.group_id=$groupId"; 
           $parameter['group'] = $group_id;
        }
        if ($start && $end) {
            $where .= " AND s.service_time BETWEEN $start AND $end";
            $parameter['start'] = $start;
            $parameter['end'] = $end;
        }
        if ($userName) {
            $userName = urldecode($userName);
            $where .= " AND s.user_name LIKE '$userName'";
            $parameter['user_name'] = $userName;
        }
        $limit       = "$p,$pageSize";
        $count       = $mService->serviceCount($where);
        $Page        = new Page($count,$pageSize);
        foreach($parameter as $key=>&$val) {   
            $Page->parameter[$key] = urldecode($val);   
        }
        $serviceList = $mService->serviceList($where,$limit);
        $this->assign('page',$Page->show());
        $this->assign('role_list',$roleList);
        $this->assign('admin_list',$adminList);
        $this->assign('service_list',$serviceList);
        $this->assign('url',U('Home/Servicemanage/serviceList'));

        if ($f) {
            $this->assign('f','sch');
            $res['response_action'] = 'search_service';
            $res['main'] = $this->fetch('serviceSearch');
        }else{
            $this->assign('serviceDiv',$this->fetch('serviceSearch'));
            $res['main'] = $this->fetch('service');
        }
        $this->ajaxReturn($res);
    }
}
?>
