<?php
namespace Home\Model;
use Think\Model;
class RoleManageModel extends Model {
    //平台列表
    function roleList($where='',$field,$part=false){
        $mRole = M('role');
        if (!$part) {
            $roleList = $mRole->where($where)->field($field)->select();
        }else{
            $action = $mRole->where($where)->getField('action');
            if ($action) {
                $roleList = $mRole->field($field)->where(array('action'=>$action))->select();
            }
        }
        return $roleList;
    }

    /*小组*/
    function groupList($where='',$field='*'){
        $groupList = M('group')->where($where)->getField($field); 
        return $groupList;
    }

    public function platformList($where='',$field='role_id,role_name'){
        if (empty($where)) {
            $where = 'role_id IN ('.C('ONLINE_STORE').')'; 
        }
        return M('role')->where($where)->field($field)->select(); 
    }
}
