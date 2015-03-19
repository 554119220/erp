<?php
namespace Home\Model;
use Think\Model;
class RoleManageModel extends Model {
    //部门列表
    function roleList($where='',$field,$part=false){
        $mRole = M('role');
        if (!$part) {
            $roleList = $mRole->where($where)->field($field)
                ->order('convert(role_name using gbk) ASC')->select();
        }else{
            $action = $mRole->where($where)->getField('action');
            if ($action) {
                $roleList = $mRole->field($field)->where(array('action'=>$action))
                    ->order('convert(role_name using gbk) ASC')->select();
            }
        }
        return $roleList;
    }

    //部门select
    function roleListSelect(){
        return M('role')->order('convert(role_name using gbk) ASC')
            ->getField('role_id,role_name');
    }

    /*小组*/
    function groupList($where='',$field='*'){
        $groupList = M('group')->where($where)->getField($field); 
        return $groupList;
    }

    /*推广平台*/
    public function platformList($where='',$field='role_id,role_name'){
        if (empty($where)) {
            $where = 'role_id IN ('.C('ONLINE_STORE').')'; 
        }
        return M('role')->where($where)->field($field)->select(); 
    }
}
