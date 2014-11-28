<?php
namespace Home\Model;
use Think\Model;
class MenuManageModel extends Model {
    /**
     * 一级功能列表
     * @return array 
     */
    public function listMenu1st() {
        $dba = M('admin_action');
        return $dba->where('action_level=0')->order('`order`')->select();
    }

    /**
     * 二级功能列表
     * @return array 
     */
    public function listMenu2nd() {
        $dba = M('admin_action');
        $menu = $dba->where('action_level=1')->order('`order`')->select();
        return $this->regroupArray($menu);
    }

    /**
     * 三级功能列表
     * @return array 
     */
    public function listMenu3rd() {
        $dba = M('admin_action');
        $menu = $dba->where('action_level=2')->order('`order`')->select();
        return $this->regroupArray($menu);
    }
    
    /**
     * 保存已选权限
     * @return boolean
     */
    public function savePrivilege($privilege_list) {
        $privilege_list = explode(',', $privilege_list);
        $privilege_list = implode('","', $privilege_list);
        $dba = M('admin_action');
        return $dba->where('action_code NOT IN ("'.$privilege_list.'")')->setField('order', -1);
    }

    /**
     * 功能列表
     * @return array 
     */
    public function listMenu() {
        $menu_1st = $this->listMenu1st();
        $menu_2nd = $this->listMenu2nd();
        $menu_3rd = $this->listMenu3rd();
        return array('menu_1st'=>$menu_1st,'menu_2nd'=>$menu_2nd, 'menu_3rd'=>$menu_3rd);
    }

    /**
     * 重组功能列表
     * @return array 
     */
    private function regroupArray($arr) {
        $result = array();
        foreach ($arr as $val){
            $result[$val['parent_id']][] = $val;
        }
        return $result;
    }
}
