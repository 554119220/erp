<?php
/*=============================================================================
#     FileName: NavController.class.php
#         Desc: Bootstrap 导航 
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2015-01-27 14:59:26
#      History:
=============================================================================*/
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class NavController extends PublicController{
   public function nav($act){
       if ($act) {
           $parentId = M('admin_action')->where("action_code='$act'")->getField('action_id');
           if ($parentId) {
               $tmp = M('admin_action')->field('label,action_level')->where("parent_id=$parentId");
           }
       }
       return $list;
   } 
}
?>
