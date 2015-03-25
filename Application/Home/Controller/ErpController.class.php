<?php
/*=============================================================================
#     FileName: ErpController.class.php
#         Desc: ERP中人事资源管理 
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2015-01-26 16:57:26
#      History:
=============================================================================*/

namespace Home\Controller;
use Think\Controller;

class ErpController extends PublicController{
    public function index(){
        $this->assign('public', __ROOT__.'/Public/');
        $this->assign('url',__ROOT__.'/index.php/Home');
        $res['name'] = 'hrm';
        $res['main'] = $this->fetch('index'); 
        $this->ajaxReturn($res);
    }

    public function erp(){
        $this->index();
    }
}
?>
