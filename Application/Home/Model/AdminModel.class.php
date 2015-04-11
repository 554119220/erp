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
    /*查询管理员
     * @where 查询条件
     * @role  查询同一部门的管理员 
     * */
    public function adminList($where=' 1',$role=0){
        if($role){
            $mRole = M('role');
            $action   = $mRole->where("role_id={$_SESSION['role_id']}")->getField('action');
            $roleList = $mRole->where("action='$action'")->getField('role_id',true);
            if($roleList){
                $roleList = implode(',',$roleList);
                $where .= "role_id IN($roleList) $append";
                $adminList = M('admin_user')->field('user_id,user_name')
                    ->where($where)->select();
                return $adminList;
            }
        }
        $where .= ' AND status>0 AND stats>0 AND user_id<>74 AND freeze=0 ';
        $adminList = M('admin_user')->field('user_id,user_name')
            ->order('convert(user_name using gbk) ASC')
            ->where($where)->select();
        return $adminList;
    }

    /*分组的管理员列表*/
    public function groupAdminList(){
        $where = 'status>0 AND stats>0 AND user_id<>74 AND freeze=0 ';
        $adminList = M('admin_user')->where($where)->field('user_id,role_id,user_name')->select();
        $roleList = M('role')->field('role_id,role_name')->select();
        $roleList[] = array('role_id'=>0,'role_name'=>'未分配部门');
        foreach($roleList as $key=>&$role){
            foreach($adminList as &$admin){
                if ($role['role_id'] == $admin['role_id']) {
                    $roleList[$key]['admin_list'][] = $admin;
                }
            }
        }
        return $roleList;
    }
}
