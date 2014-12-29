<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
/**
 * Class UsersmanageController
 * @author Nixus
 */
class UsersmanageController extends PublicController {
    /**
     * 顾客列表
     * @return array 
     */
    public function usersList() {
        // 查询参数
        // 考虑是否把查询参数放入  构造函数  中
        $conditions = array(
          'customer_type' => I('request.type', '2', 'intval'),  
        );

        $User = D('Usersmanage');
        $User->setter($conditions);
        $count = $User->usersCount();

        $Page = new \Think\Page($count, 2);
        // 查询条件
        foreach ($map as $key=>$val) {
            $Page->parameter .= "$key=".urlencode($val).'&';
        }

        $User->first_row = $Page->firstRow;
        $User->list_rows = $Page->listRows;
        $list = $User->usersList();

        $this->assign('group_list',      $this->usersGroup());     // 分类列表
        $this->assign('user_list',       $list);                   // 顾客列表
        $this->assign('page',            $Page->show());           // 数据分页
        $this->assign('list_url',        U('','',''));             // 顾客列表页URL
        $this->assign('detail_url',      U('userDetail', '', '')); // 顾客详情页URL
        $this->assign('current_group',   $conditions['customer_type']);
        $this->assign('full_page',       1); // ajax
        $this->assign('search',          0); // 查询

        $result['main'] = $this->fetch('users_list');
        $this->ajaxReturn($result, 'JSON');
        return;
    }

    /**
     * 功能分类列表
     *
     * @return array 
     */
    public function usersListGroup() {
    }

    /**
     * 自定义列表
     *
     * @return array 
     */
    public function userCatList() {
    }
    
    /**
     * 会员列表
     * @return array 
     */
    public function vipList() {
        $mVip   = D('Vip');
        $rankId = I('get.rank_id',0);
        $orderBy        = I('get.orderby','u.rank_points');
        $sort           = I('get.sort','DESC');
        $source         = I('get.source','users');
        $rankList       = $mVip->rankList('rank_id,rank_name');
        $page           = I('get.p','1');
        $pageSize       = I('get.page_size',5);
        $rankId         = I('get.rank_id',0);
        $item           = I('get.item');
        $keyword        = I('get.keyword');
        $roleId         = I('get.role_id');
        $groupId        = I('get.group_id');
        $minPoints      = I('get.min_points');
        $maxPoints      = I('get.max_points');
        $mUser          = M('users');
        $mMemshipNumber = M('memship_number');
        $condition      = array(
            'rank_id'   => $rankId,
            'page'      => $page,
            'page_size' => $pageSize,
        );
        $where  = " u.user_rank=$rankId AND u.is_black<>1 AND customer_type IN('2, 3, 4, 5, 11')";

        if (admin_priv('all','',false)){
            
        } elseif(admin_priv('role_admin','',false)) {
            $where = "u.role_id={$_SESSION['role_id']}";
            $roleList = D('RoleManage')->roleList('','role_id',true);
            if ($roleList) {
                $roleList = implode(',',$roleList[0]);
                $where    = " AND u.role_id IN($roleList)";
            }else return false;
        }elseif(admin_priv('group_admin')){
            $where = "u.role_id={$_SESSION['role_id']}";
            $groupList = D('RoleManage')->groupList($where,'group_id');
            if ($groupList) {
                $where = " AND u.group_id IN({$groupList})";
            }else return false;
        }

        if($item && !empty($keyword)){
            $where .= 1 == $item ? " AND m.card_number=$keyword" : " AND u.user_name LIKE '$keyword'";
            $condition['item']    = $item;
            $condition['keywork'] = $keyword;
        }

        if($roleId){
            $where .= " AND u.role_id=$roleId ";
            $condition['role_id'] = $roleId;
        }

        if($groupId){
            $where .= " AND u.group_id=$groupId";
            $condition['group_id'] = $groupId;
        }

        if($minPoints || $maxPoints){
            $where .= " AND u.rank_points BETWEEN $min_points AND $max_points";
            $condition['min_points'] = $minPoints;
            $condition['max_points'] = $maxPoints;
        }

        $count = $mVip->countVips($where);
        $Page = new Page($count,$pageSize);
        foreach ($condition as $key=>$val) {
            $Page->parameter[$key] = urlencode($val);
        }

        $mVip->first_row = $Page->firstRow;
        $mVip->list_rows = $Page->listRows;
        $limit = ' LIMIT '.($page-1)*$pageSize.",$pageSize";
        $where .= " ORDER BY $orderBy $sort $limit ";
        $userList = $mVip->vipList($where,$condition);

        $this->assign('url',U('vipList'));
        $this->assign('count',$count);
        $this->assign('page',$Page->show());
        $this->assign('sort_type', $sort);
        $this->assign('rank_id',   $rankId);
        $this->assign('condition', $condition);
        $this->assign('user_list', $userList);
        $this->assign('rank_list', $rankList);

        if(I('get.from_sel')){
            $res['response_action'] = 'search_service';
            $res['main']            = $this->fetch('vipPart');
        }else{
            $this->assign('role_list',D('RoleManage')->roleList());
            $this->assign('rankList',$rankList);
            $res['main'] = $this->fetch('vipList');
        }

        $this->ajaxReturn($res,'JSON');
    }

    /**
     * 转介绍列表
     *
     * @return array 
     */
    public function referralsList() {
    }

    /**
     * 顾客流失列表
     *
     * @return array 
     */
    public function outFlowList() {
    }

    /**
     * 逾期服务缺失
     *
     * @return array 
     */
    public function outFlowListService() {
    }

    /**
     * 查看自定义列表
     *
     * @return array 
     */
    public function viewAdminCate() {
    }

    /**
     * 批量管理顾客
     *
     * @return array 
     */
    public function batch() {
    }

    /**
     * 转移部分顾客
     *
     * @return array 
     */
    public function partTransfer() {
    }

    /**
     * 添加新顾客
     *
     * @return boolean
     */
    public function addUsers() {
    }

    /**
     * 淘顾客
     *
     * @return boolean
     */
    public function askCustomerList() {
    }

    /**
     * 黑名单顾客
     *
     * @return array 
     */
    public function userBlacklist() {
    }

    /**
     * 顾客档案
     *
     * @return array 
     */
    public function dataUsers() {
    }

    /**
     * 购买力顾客列表
     *
     * @return array 
     */
    public function userBuyList() {
    }

    /**
     * 按商品查询顾客
     *
     * @return array 
     */
    public function searchByGoods() {
    }

    /**
     * 自定义分类管理
     *
     * @return array 
     */
    public function addUserCat() {
    }

    /**
     * 顾客详细信息
     * @return void
     */
    public function userDetail() {
        $user_id = I('request.id', '', 'intval');
        if (!$user_id) {
            return false;
        }

        $User     = D('Usersmanage');
        $mService = D('Service');
        $mHealth  = D('health');

        $User->data['user_id'] = $user_id;
        $user_info             = $User->userDetail($user_id);
        $friends               = array(
            'friends_list' => D('Relationship')->friendsList($user_id),
            'total'        => count(D('Relationship')->friendsList($user_id)),
        );

        $this->assign('user',            $user_info['base_info']);
        $this->assign('contact_list',    $user_info['contact_info']);
        $this->assign('order_list',      $user_info['purchase_history']);
        $this->assign('payment',         $user_info['payment']);
        $this->assign('order_type',      $user_info['order_type']);
        $this->assign('admin_list',      $user_info['saler_list']);
        $this->assign('platform_list',   $user_info['platform_list']);
        $this->assign('service_class',   $mService->serviceClass());
        $this->assign('service_manner',  $mService->serviceManner());
        $this->assign('service',         $mService->serviceList("user_id=$user_id"));
        $this->assign('province_list',   regionList());
        $this->assign('service_manner',  $mService->serviceManner());
        $this->assign('friends',         $friends);
        $this->assign('user_id',         $user_id);
        $this->assign('user_health',     $mHealth->userHealth($user_id));
        $this->assign('health_file',     $this->fetch('health_file'));

        $result = array (
            'id'              => $user_id,
            'info'            => $this->fetch('users_detail'),
            'response_action' => 'detail'
        );
        $this->ajaxReturn($result, 'JSON');
        return;
    }

    /**
     * 顾客分类
     * @return array 
     */
    private function usersGroup() {
        $UsersGroup = D('Usersmanage');
        return $UsersGroup->queryUsersGroup();
    }

    /**
     * 配送方式
     * @return array 
     */
    public function shippingURL() {
        $payId = I('id', '', 'intval');
        $Shipping = D('Shipping');
    }
}
