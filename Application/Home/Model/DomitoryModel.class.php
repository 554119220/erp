<?php
/*=============================================================================
#     FileName: HrmModel.class.php
#         Desc:  宿舍管理
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2015-01-06 11:15:43
#      History:
=============================================================================*/
namespace Home\Model;
use Think\Model;
class DomitoryModel extends PublicModel{
    public function domitoryList(){
        return M('dormitory')->field($fields)->where('available=1')->select();
    }
}
?>
