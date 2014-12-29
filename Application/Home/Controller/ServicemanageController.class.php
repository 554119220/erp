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
use Thinkphp\Controller;

class ServiceManageController extends PulicController{
    private $mService = D('Service');
    //服务操作
    public function addServie(){
       $data = array(
           'user_id'        => I('get.user_id');
           'logbook'        => I('get.logbook'),
           'show_sev'       => I('get.show_sev'),
           'vaild'          => I('get.vaild'),
           'service_class'  => I('get.service_class',1);
           'service_manner' => I('get.service_manner',1);
           'group'          => $_SESSION['group_id'],
           'platform'       => $_SESSION['platform'],
           'admin_id'       => $_SESSION['admin_id'],
           'service_time'   => strtotime(I('get.servcie_time')),
       )

       $res = $mService->data($data)->add();
       $this->ajaxReturn($res);
    }

    //服务列表
    public function serviceList(){
        $condition = '';
        $serviceList = $mService->serviceList($where);
    }

    /*会员积分管理*/

    public function rankLog(){

    }

    public function siteRank(){
        
    }

}
?>
