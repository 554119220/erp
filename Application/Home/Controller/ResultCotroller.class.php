<?php 
/*=============================================================================
#     FileName: MessageContorller.class.php
#         Desc: return res 
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-11-28 16:23:32
#      History:
=============================================================================*/
namespace Home\Controller;
use Think\Controller;

class Result extends Controller{
    public function _initialize(){
        public $message     = '';
        public $timeout     = '';
        public $req_msg     = true;
        public $code        = false;
        public $btn_content = false;
    }
}
