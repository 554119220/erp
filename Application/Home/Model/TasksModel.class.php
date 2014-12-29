<?php
/*=============================================================================
#     FileName: TasksModel.class.php
#         Desc: 任务模型  
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-12-11 16:00:49
#      History:
=============================================================================*/
namespace Home\Model;
use Think\Model\RelationModel;
use Think\Model;

public function _initialize(){
    $mTask = M('admin_task');
}

/*任务列表*/
public function get_tasks_list($where,$field){
    $tasksList = $mTask-field($field)->where($where)->select();
    if ($tasksList) {
        foreach ($tasksList as &$val) {
            $val['add_time'] = date('Y-m-d H:i',$val['add_time']);
            $val['end_time'] = date('Y-m-d H:i',$val['end_time']);
        }
    }
    return $tasksList;
}

/*任务的数量*/
public function unfinish_tasks_num($where){
    $tasksNum = $mTask->where($where)->field('COUNT(*) num');
    $tasksNum = $tasksNum ? $tasksNum : 0;
    return $tasksNum;
}

?>
