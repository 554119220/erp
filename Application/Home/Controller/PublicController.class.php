<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Class PublicController
 * @author nixus
 */
class PublicController extends Controller {
    protected $adminId;
    private $roleId;
    private $groupId;
    private $actionList;
    private $authorise = array ('all-', 'section-', 'group-', 'personage-');

    protected $conditions = array();

    /**
     * @param mixed 
     */
    public function __construct() {
        parent::__construct();
        $Session = D('Session');
        $sessInfo = $Session->getSessionInfo();
        $_SESSION = $sessInfo;
        $this->adminId = $sessInfo['admin_id'];
        $this->roleId  = $sessInfo['role_id'];
        $this->groupId = $sessInfo['group_id'];
        // action容错
        $actionList = explode(',', $sessInfo['action_list']);
        $actionList = array_filter($actionList);
        $this->actionList = preg_replace('/_/', '', implode(',', $actionList));
        $this->checkAuthorise();
        $this->initConstant();
    }

    // 全部             all
    // 订单列表
    //      部门            section
    //          分部            branch
    //              小组            group
    //                  个人            personage

    /**
     * 权限验证
     *
     * @return boolean
     */
    private function checkAuthorise() {
        if ('all' != $this->actionList) {
            if (empty($_SERVER['PATH_INFO'])) {
                return;
            }
            foreach ($this->authorise as $key=>$val) {
                //echo "$val$1",$_SERVER['PATH_INFO'].',';exit;
                if (strpos(',,'.$this->actionList.',',','.preg_replace('/^\w+\/(\w+).*/',"$val$1",$_SERVER['PATH_INFO']).',')) {
                    $code = $val;
                    break;
                }
            }
            switch ($code) {
            case 'all-':
                $this->conditions = null;
                break;
            case 'section-' :
                $this->conditions['role_id'] = array('in', $this->branchList());
                break;
            case 'branch-' :
                $this->conditions['role_id'] = $this->roleId;
                break;
            case 'group-' :
                $this->conditions['group_id'] = $this->groupId;
                break;
            case 'personage-' :
                $this->conditions['admin_id'] = $this->adminId;
                break;
            default :
                $this->showMsg('对不起，您没有权限访问该页面');
                return false;
            }
        }
    }

    /**
     * 菜单处理
     *
     * @return boolean
     */
    protected function checkAuthMenu($menuList) {
        if ('all' == $this->actionList) {
            return $menuList;
        }
        foreach ($menuList as $key=>$val){
            foreach ($val as $k=>$v){
                if (strpos($this->actionList, ','.preg_replace('/_/', '', $v['action']).',')) {
                    unset($menuList[$key][$k]);
                }
            }
        }
        return $menuList;
    }

    /**
     * 获取部门下分部列表
     *
     * @return implode string 
     */
    private function branchList() {
        $Role = M('role');
        $data['role_id'] = $this->roleId;
        $roleDescribe = $Role->where($data)->limit(1)->getField('role_describe');
        unset($data);
        $data['role_describe'] = $roleDescribe;
        $roleList = $Role->where($data)->getField('role_id',true);
        return implode(',', $roleList);
    }

    /**
     * 地区信息
     *
     * @return array 
     */
    public function regionList() {
        $regionType = I('get.type', 1, 'intval');
        $parent     = I('get.parent', '', 'intval');
        $Region = D('Public');
        return $Region->regionList($regionType, $parent);
    }

    /**
     * ajax获取地址
     *
     * @return json
     */
    public function regionListByAjax() {
        $result = array (
            'target'  => I('get.target', '', 'trim'),
            'regions' => $this->regionList(),
        );
        echo $this->ajaxReturn($result, 'JSON');
        return;
    }

    /**
     * 权限验证
     *
     * @return void
     */
    public function checkAuth() {
    }
    
    /**
     * 提示信息
     * @param $message 提示信息
     * @param $redirectURL 跳转URL
     * @param $timeout 信息显示时间
     *
     * @return void
     */
    protected function showMsg($message, $redirectURL = '', $timeout = 2000) {
        $msg = array (
            'req_msg'     => true,
            'timeout'     => $timeout,
            'message'     => $message,
            'redirectURL' => $redirectURL,
        );
        $this->ajaxReturn($msg, 'JSON');
        return;
    }

    function initConstant(){
        define('SALE', '1,9,13,27,28,29');
        define('OFFLINE_SALE', '1,9,27,28,29');
        define('ONLINE_SALE', 13);
        define('ONLINE_STORE', '2,6,7,10,12,14,15,16,17,18,21,22,24,25,26');
        define('MEMBER_SALE', '9,27,28');
        define('ZHONGLAONIAN_SALE', '1,29');
        define('TAOBAO_STORE', '21,22,26');
        define('FINANCE', 8);
    }
}
