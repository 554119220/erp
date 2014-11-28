<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $func = I('request.func', 0, 'trim');
        if ($func) {
            $this->$func();
        } else {
            $this->action();
        }
    }

    /**
     * 菜单列表
     *
     * @return void
     */
    private function menu() {
        $menuCode = I('request.action_code', '', 'trim');

        $Menu = D('Menu');
        $menuList = $Menu->menuList();

        $this->assign('nav_2nd', $menuList['nav_2nd'][$menuCode]);
        $this->assign('nav_3rd', $menuList['nav_3rd']);
        $this->assign('file_name', 'index');

        $this->display('left');
    }

    /**
     * 处理子菜单请求
     *
     * @return void
     */
    private function action() {
        $act = I('request.act', '', 'trim');
        $act = array_map('ucfirst', explode('_', $act));

        $operator = D(implode('', $act));
        echo json_encode(array());
    }
}
