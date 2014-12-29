<?php
/*=============================================================================
#     FileName: TasksController.class.php
#         Desc: 任务管理
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-12-11 15:48:53
#      History:
=============================================================================*/
namespace Home\Controller;
use Think\Controller;
class TasksController extends Controller {
    public function _initialize(){
    }

    public function index(){
        
    }

    /*任务列表*/
    public function tasks_list(){
        
    }

    /*
     * 检查未完成的任务
     * @status = 0 未完成、1 完成、2 过期、3 取消
     * */
    public function tasks_sitiation(){
        $mTasts = D('Tasks');
        $where = 'status IN(0,2)';
        if (admin_priv('all','',false)) {

        }else{

        }

        $tasksList = $mTasts->get_tasks_list();
        return $tasksList;
    }
?>
