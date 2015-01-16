<?php
/*=============================================================================
#     FileName: CommonModel.class.php
#         Desc: 公共的数据查询
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2015-01-16 11:28:17
#      History:
=============================================================================*/
namespace Home\Model;
use Think\Model;

class CommonModel extends PublicModel{
 /**
     * 支付方式
     *
     * @return array 
     */
    public function payment() {
        return M('payment')->where()->getField('pay_id,pay_name');
    }

    /**
     * 配送方式
     *
     * @return array 
     */
    public function shipping() {
        return M('shipping')->where()->getField();
    }   
}

?>
