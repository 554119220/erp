<?php 
/*=============================================================================
#     FileName: MessageModel.php
#         Desc: report index 
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-11-29 16:45:28
#      History:
=============================================================================*/
namespace Home\Model;
use Think\Model\RelationModel;
use Think\Model;

class AdminModel extends Model{
    public function _cunstruct(){
    }

    /*查询管理员
     * @where 查询条件
     * $role  查询同一部门的管理员 
     * */
    public function adminList($where,$role){
        $append = " AND status>0 AND stats>0 AND user_id<>74";
        if($role){
            $mRole = M('role');
            $action   = $mRole->where("role_id={$_SESSION['role_id']}")->getField('action');
            $roleList = $mRole->where("action='$action'")->getField('role_id',true);
            if($roleList){
                $roleList = implode(',',$roleList);
                $where .= "role_id IN($roleList) $append";
                $adminList = M('admin_user')->field('user_id,user_name')->where($where)->select();
                return $adminList;
            }
        }

        $where .= $append;
        $adminList = M('admin_user')->field('user_id,user_name')->where($where)->select();
        return $adminList;
    }
}
