<?php
namespace Home\Controller;
use Think\Controller;
class MenuManageController extends Controller {
    /**
     * undocumented function
     *
     * @return void
     */
    public function index() {
        $Menu = D('MenuManage');
        $menu_list = $Menu->listMenu();

        $this->assign('menu_1st', $menu_list['menu_1st']);
        $this->assign('menu_2nd', $menu_list['menu_2nd']);
        $this->assign('menu_3rd', $menu_list['menu_3rd']);

        $this->assign('post_url', U('savePrivilege', '', false));

        $result['main'] = $this->fetch('privilege_list');
        $this->ajaxReturn($result, 'JSON');
        return;
    }

    /**
     * 保存
     * @return boolean
     */
    public function savePrivilege() {
        // 此处须增加权限验证
        $msg = array(
            'req_msg' => true,
            'timeout' => 2000,
        );
        $privilege_list = I('post.privilege_list', false);
        if (empty($privilege_list)) {
            $msg['message'] = '请选择要保留的功能！';
            $this->ajaxReturn($msg, 'JSON');
            return;
        }
        $privilege = array();
        foreach (explode(',', $privilege_list) as $value) {
            list($key, $val) = explode(':', $value);
            $privilege[$key] = $val;
        }
        // 修改数据库权限
        $Menu = D('MenuManage');
        if ($Menu->savePrivilege(array_keys($privilege))) {
            $msg['message'] = '开放功能保存成功；<br>';
        } else {
            $msg['message'] = '开放功能保存失败；<br>';
        }
        // 打包相关功能文件
        $File = D('Files');
        if ($File->packFiles($privilege)) {
            $msg['message'] .= '文件已经打包；<br>';
        } else {
            $msg['message'] .= '文件打包失败；<br>';
        }
        // 返回处理结果
        $this->ajaxReturn($msg, 'JSON');
        return;
    }

    /**
     * 一级菜单列表
     *
     * @return 
     */
    public function menuList1st() {
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function listMenu() {
        echo THINK_PATH;
    }
}
