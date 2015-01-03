<?php
/*=============================================================================
#     FileName: accountModel.class.php
#         Desc:  
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-12-31 17:51:30
#      History:
=============================================================================*/
namespace Home\Model;
use Think\Model;
class accountModel extends Model{
   public function accountType(){
       return M('account_type')->select();
   }

   //账号列表
   public function accountList($where,$fields='',$page='1,20'){
       $fields = empty($fields)?'account_namem,account_id,type_id,user_id,input_time':$fields; 
       $mAccount = M('account');
       $accountList = $mAccount->field($fields)->where($where)->page($page)->select();
       if ($accountList) {
           foreach ($accountList as &$val) {
               $val['input_time'] = date('Y-m-d',$val['input_time']);
           }
       }
       return $accountList;
   }
}
?>
