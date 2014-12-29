<?php
namespace Home\Model;
use Think\Model;
class UsersassignModel extends PublicModel {
    /**
     * 顾客平台归属
     *
     * @return array 
     */
    public function userPlatformOwn() {
        $Own = M('role');
        return $Own->where(' role_type>0 ')->getField('role_id,role_name');
    }
    
}
