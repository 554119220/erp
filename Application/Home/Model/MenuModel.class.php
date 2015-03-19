<?php
namespace Home\Model;
use Think\Model;
class MenuModel extends Model {
    public function menuList ($menuId) {
        // 获取用户session中的action_list
        $action_list = SessionModel::getActionList();

        $db = M('admin_action');
        if ($action_list != 'all') {
            $action_list = explode(',', $action_list);
            $where = ' action_code IN (\''.implode("','", array_filter($action_list)).'\')';
        }

        $res = $db->where($where)->order('`order`')->select();

        $list = array ();
        foreach ($res as $val) {
            @$list[$val['action_id']] = $val;
        }

        $nav_1st = array ();
        foreach ($list as $val) {
            if ($val['action_level'] == 0) {
                @$nav_1st[$val['action_id']]['label']  = $val['label'];
                @$nav_1st[$val['action_id']]['action'] = $val['action_code'];
            }
        }

        $nav_2nd = array ();
        foreach ($list as $key=>$val) {
            if ($val['action_level'] == 1) {
                @$nav_2nd[$list[$val['parent_id']]['action_code']][$key]['label']  = $val['label'];
                @$nav_2nd[$list[$val['parent_id']]['action_code']][$key]['action'] = $val['action_code'];
            }
        }

        $nav_3rd = array ();
        foreach ($list as $key=>$val) {
            if ($val['action_level'] == 2) {
                @$nav_3rd[$list[$val['parent_id']]['action_code']][$key]['label']  = $val['label'];
                @$nav_3rd[$list[$val['parent_id']]['action_code']][$key]['action'] = $val['action_code'];
            }
        }

        return array ('nav_1st'=>$nav_1st, 'nav_2nd'=>$nav_2nd, 'nav_3rd'=>$nav_3rd);
    }

    /*导航*/
    public function nav($act){
        if ($act) {
            $parentId = M('admin_action')->alias('a')->where("a.action_code='$act'")->getField('a.action_id');  
            if ($parentId) {
                $list = M('admin_action')->alias('a')->where("a.parent_id=$parentId")->field('a.action_id,a.action_code,a.label,a.action_level')->order('a.order ASC')->select();

                if ($list) {
                    $nav3rd = M('admin_action')->alias('a')->field('a.parent_id,a.action_code,a.label')->order('a.order ASC')->where('a.action_level=3')->select();
                    foreach ($list as &$val) {
                        foreach ($nav3rd as $rd) {
                            if ($rd['parent_id']==$val['action_id']) {
                                $val['child'][] = $rd;
                            }
                        }
                    }
                }
            }
            return $list;
        }
    }
}
