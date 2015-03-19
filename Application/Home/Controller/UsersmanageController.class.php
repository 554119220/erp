<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
/**
 * Class UsersmanageController
 * @author Nixus
 */
class UsersmanageController extends PublicController {
    private $tagList = array(
        1  => '超过1个月',
        2  => '超过2个月',
        3  => '超过3个月',
        6  => '超过半年',
        12 => '超过1年',
        24 => '超过2年'
    );

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
        $this->assign('current',    $conditions['customer_type']);
        $this->assign('group_list', $this->usersGroup());     // 分类列表
        $this->assign('title',      '顾客列表');
        $this->publicList($conditions);
    }

    /**
     * 顾客列表公共方法
     *
     * @return array 
     */
    private function publicList($conditions, $template = 'usersList') {
        $conditions += $this->conditions;
        $User = D('Usersmanage');
        $User->setter($conditions);
        $count = $User->usersCount();

        $Page = new \Think\Page($count, 20);
        // 查询条件
        foreach ($map as $key=>$val) {
            $Page->parameter .= "$key=".urldecode($val).'&';
        }

        $User->first_row = $Page->firstRow;
        $User->list_rows = $Page->listRows;

        $list = $User->usersList();

        $this->assign('group_list',      $this->usersGroup());     // 分类列表
        $this->assign('user_list',       $list);                   // 顾客列表
        $this->assign('page',            $Page->show());           // 数据分页
        $this->assign('list_url',        U('','',''));             // 顾客列表页URL
        $this->assign('detail_url',      U('userdetail', '', '')); // 顾客详情页URL
        $this->assign('full_page',       1); // ajax
        $this->assign('search',          0); // 查询
        $this->assign('addUserURL',      U('Usersassign/addusers', '', ''));
        $result['main'] = $this->fetch($template);
        $this->ajaxReturn($result, 'JSON');
        return;
    }

    /**
     * 功效分类列表
     *
     * @return array 
     */
    public function usersListGroup() {
        $conditions = array(
            'eff_id'   => I('request.type', 4, 'intval'),
        );
        $this->assign('group_list',   $this->effectsList());
        $this->assign('current',      $conditions['eff_id']);
        $this->assign('title',        '功效分类列表');
        $this->publicList($conditions);
    }

    /**
     * 功效列表
     *
     * @return array 
     */
    private function effectsList() {
        return M('effects')->where(' available=1 ')->order('sort')->getField('eff_id,eff_name');
    }
    
    /**
     * 自定义列表
     *
     * @return array 
     */
    public function userCatList() {
        $catList = $this->customCatList();
        $current = array_keys($catList);
        $conditions = array(
            'user_cat' => I('request.type', $current[0], 'intval'),
        );
        $this->assign('group_list', $catList);
        $this->assign('current',    $conditions['user_cat']);
        $this->assign('title',      '自定义列表');
        $this->publicList($conditions);
    }

    /**
     * 自定义分类列表
     *
     * @return array 
     */
    private function customCatList() {
        $data = array (
            'available' => 1,
        );
        return M('user_cat')->where($data)->order('sort')->getField('cat_id,cat_name');
    }
    
    /**
     * 会员列表
     *
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
        $pageSize       = I('get.page_size',20);
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
            if (stristr($keyword,'%')){
                $keyword = urldecode($keyword);
            }
            $where .= 1 == $item ? " AND m.card_number=$keyword" : " AND u.user_name LIKE '%$keyword%'";
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

        $limit = ' LIMIT '.($page-1)*$pageSize.",$pageSize";
        $where .= " ORDER BY $orderBy $sort $limit ";
        $userList = $mVip->vipList($where,$condition);
        if ($userList) {
            foreach ($userList as &$val) {
                if ('1970-01-01' == $val['birthday'] || empty($val['birthday'])) {
                    $val['birthday'] = '-';
                }
            }
        }

        $this->assign('url',U('home/usersmanage/vipList','',''));
        $this->assign('count',$count);
        $this->assign('page',$Page->show());
        $this->assign('sort_type', $sort);
        $this->assign('rank_id',   $rankId);
        $this->assign('condition', $condition);
        $this->assign('user_list', $userList);
        $this->assign('rank_list', $rankList);

        if(I('get.from_sel')){
            $res['response_action'] = 'search_service';
            $res['main']            = $this->fetch('vipSearch');
        }else{
            $this->assign('role_list',D('RoleManage')->roleList());
            $this->assign('rankList',$rankList);
            $this->assign('vipSearch',$this->fetch('vipSearch'));
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
        $conditions = array (
            'parent_id' => array('gt', 0),
        );
        $this->assign('title', '转介绍列表');
        $this->publicList($conditions);
    }

    /**
     * 顾客流失列表
     *
     * @return array 
     */
    public function outFlowList() {
        $this->assign('title', '顾客流失列表');
        $this->outFlow('order_time');
    }

    /**
     * 服务缺失列表
     *
     * @return array 
     */
    public function outFlowListService() {
        $this->assign('title',  '服务缺失列表');
        $this->outFlow('service_time', 'outFlowListService', 'outFlowServiceData');
    }
    
    /**
     * 超过一定时间没有购买记录 或 服务记录 的顾客
     * @return array 
     */
    private function outFlow($field, $tpl = 'outFlowList', $dataTpl = 'outFlowData') {
        $tag = I('get.tag', 1, 'intval');
        $conditions['customer_type'] = array('in', '2,3,4,5,11');

        $tmp       = array_keys($this->tagList);
        $start     = $this->calcTime($tag);
        $startTime = strtotime($start['year'].'-'.$start['month'].'-01 00:00:00');
        $conditions['add_time'] = array('lt', $startTime);

        $key   = array_search($tag, $tmp);
        $limit = $this->calcTime($tmp[$key+1]);
        $conditions['order_time'] = array('lt', strtotime($limit['year'].'-'.$limit['month'].'-01 00:00:00'));

        $User = D('Usersmanage');
        $conditions += $this->conditions;
        $User->setter($conditions);
        $count = $User->usersCount();
        $Page = new \Think\Page($count, 20);
        // 查询条件
        foreach ($map as $key=>$val) {
            $Page->parameter .= "$key=".urlencode($val).'&';
        }
        $User->first_row = $Page->firstRow;
        $User->list_rows = $Page->listRows;
        $usersList = $User->outFlow($field);

        $this->assign('tagList', $this->tagList);
        $this->assign('current', $tag);
        $this->assign('page',    $Page->show());           // 数据分页
        $this->assign('tagURL',  U('','',''));
        $this->assign('outflow_list', $usersList);

        $this->assign('data', $this->fetch($dataTpl));
        $result['main'] = $this->fetch($tpl);
        /*$result['main'] = $this->fetch($dataTpl);
        if (!I('get.isAjax')) {
            $this->assign('data', $result['main']);
            $result['main'] = $this->fetch($template);
        } else {
            $result['a'] = 'page_link';
        }*/
        $this->ajaxReturn($result, 'JSON');
        return;
    }

    private function calcTime ($tag) {
        $curr_month = date('m'); // 当前月份
        $curr_year  = date('Y'); // 当前年份
        $month = $curr_month - $tag;
        if ($month < 0) {
            $year_offset = floor($month/12);
            $year  = $curr_year + $year_offset;
            $month = $month +12*abs($year_offset);
        } elseif ($month == 0) {
            if ($curr_month == 1 && $tag == 1) {
                $year = $curr_year -1;
                $month = 12;
            } else {
                $year  = $curr_year;
                $month = $tag;
            }
        } else {
            $year = date('Y');
        }
        $month = strlen($month) < 2 ? '0'.$month : $month;
        return array('month' => $month, 'year' => $year);
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
        $result['main'] = $this->fetch();
        $this->ajaxReturn($result, 'JSON');
        return;
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
    public function blacklist() {
        $mUser      = D('Usersmanage');
        $status     = I('request.status','0');
        $user_name  = trim(I('request.user_name'));
        $phone      = trim(I('request.phone',''));
        $operatorIn = I('request.operator_in');
        $net        = I('request.net');
        $f          = I('request.f');
        $p          = I('request.p',1);
        $pageSize   = I('request.pageSize',$pageSize);
        $where      = " b.status=$status ";
        $parameter = array(
            'f'=>$f,
            'net'=>$net,
        );

        if(!empty($user_name)) {
            $where .= " AND b.user_name LIKE '%$user_name%'";
            $parameter['user_name'] = $userName;
        }

        if(!empty($phone)) {
            $where .= " AND u.mobile_phone LIKE '%$phone%' ";
            $parameter['phone'] = $phone;
        }

        if($operatorIn != 0) {
            $where .= " AND b.operator_in=$operator_in ";
            $parameter['operator_in'] = $operatorIn;
        }

        $fields = 'b.user_id,b.user_name,b.admin_name,b.operator_in,b.operator_out,b.in_time,'
            .'b.status,b.from_table,b.reason';
        $blacklist       = $mUser->blacklist($where,$fields,$page);
        $roleList        = D('RoleManage')->roleList('','role_id,role_name');
        $accountTypeList = D('Account')->accountType();
        $typeList        = D('Usersmanage')->blacklistType();

        $Page = new Page($pageSize,$count);
        foreach ($parameter as $key=>$val) {
            $Page->parameter[$key] = urlencode($val);
        }

        $this->assign('role_list',$roleList);
        $this->assign('blacklist',$blacklist);
        $this->assign('type',$type);
        $this->assign('status',$status);
        $this->assign('type_list',$typeList);
        $this->assign('page',$Page->show());

        $this->assign('url',U('Home/Usersmanage/blacklist'));
        if($f){
            $smarty->assign('condition',"&status={$_REQUEST['status']}");
            $res['response_action'] = 'search_service';   
            $res['main'] = $this->fetch('schBlacklist');
        }else{
            $this->assign('schBlacklist',$this->fetch('schBlacklist'));
            $res['main'] = $this->fetch('userBlacklist');
        }

        $this->ajaxReturn($res,'JSON');
    }

    /**
     * 顾客档案
     *
     * @return array 
     */
    public function dataUsers() {
    }

    /**
     * 顾客详细信息
     *
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
        $user_info = $User->userDetail($user_id);
        $friends               = array(
            'friends_list' => D('Relationship')->friendsList($user_id),
            'total'        => count(D('Relationship')->friendsList($user_id)),
        );
        $this->assign('user',              $user_info['base_info']);
        $this->assign('contact_list',      $user_info['contact_info']);
        $this->assign('order_list',        $user_info['purchase_history']);
        $this->assign('payment',           $user_info['payment']);
        $this->assign('order_type',        $user_info['order_type']);
        $this->assign('admin_list',        $user_info['saler_list']);
        $this->assign('platform_list',     $user_info['platform_list']);
        $this->assign('service_class',     $mService->serviceClass());
        $this->assign('service_manner',    $mService->serviceManner());
        $this->assign('service',         $mService->userDetailserviceList("user_id=$user_id"));
        $this->assign('province_list',     regionList());
        $this->assign('shipping_url',      U('shippingList', '', ''));
        $this->assign('checkOrderSnURL',   U('Check/checkOrderSn', '', ''));
        $this->assign('addNewOrderURL',    U('Check/addNewOrder', '', ''));
        $this->assign('calcPointsURL',     U('Check/calcPointsDiscount', '', ''));
        $this->assign('friends',           $friends);
        $this->assign('user_id',           $user_id);
        $this->assign('user_health',       $mHealth->userHealth($user_id));
        $this->assign('health_file',       $this->fetch('healthFile'));
        $result = array (
            'id'              => $user_id,
            'info'            => $this->fetch('usersDetail'),
            'response_action' => 'detail'
        );
        $this->ajaxReturn($result, 'JSON');
        return;
    }

    /**
     * 顾客分类
     *
     * @return array 
     */
    private function usersGroup() {
        $UsersGroup = D('Usersmanage');
        return $UsersGroup->queryUsersGroup();
    }

    /**
     * 配送方式
     *
     * @return array 
     */
    public function shippingList() {
        $data['pay_id'] = I('get.pay_id', '', 'intval');
        $isCod = M('payment')->where($data)->getField('is_cod');
        unset($data);
        if (1 == $isCod) {
            $data['pay_after_shipping'] = 2;
        } else {
            $data['pay_after_shipping'] = 0;
        }
        $shippingList = M('shipping')->where($data)->getField('shipping_id,shipping_name');
        $this->ajaxReturn($shippingList, 'JSON');
        return false;
    }

    //将已存在顾客拉入黑名单
    //status 0 未审核 1 已审核 2 取消/移出朋友圈
    public function addBlacklistUser(){
        $userId        = I('post.user_id',0);
        $blacklistType = I('post.blacklist_type',0);
        $reason        = trim(I('post.reason',''));
        $res = array(
            'req_msg' => true,
            'code'    => 0,
            'timeout' => '2000',
        );

        if($userId) {
            $result = D('Usersmanage')->existInBlacklist($userId);
            $result = $result[$userId];
            if($result['total']>0 && ($result['status'] == 0 || $result['status'] == 1)) {
                $res['message'] = '该顾客已经被列入黑名单，无需重复操作';
            } else {
                if($result['total'] <= 0) {
                    $code = D('Usersmanage')->insertBlacklist($userId,$blacklistType,$reason);
                } elseif(2 == $result['status']) {
                    $data = array(
                        'status'      => 0,
                        'reason'      => $reason,
                        'type_id'     => $blacklistType,
                        'operator_in' => $_SESSION['admin_name'],
                    );
                    D('Usersmanage')->updateUserBlacklist($userId);
                }
                $res['code'] = D('Usersmanage')->updateUsersInfo($userId);
                $res['message'] = $res['code']?'未能加入黑名单':'已经加入黑名单';
            }
        }elseif($accountType && $accountValue){
            //添加一条黑名单账号记录
            $where = " account_type=$accountType AND account_value=$accountValue";
            $existAccountBlacklist = D('Usersmanage')->existAccountBlaklict($where);
            if($existAccountBlacklist) {
                $res['message'] = '已经存在，不需要重复添加';
            } else {
                $data = array(
                    'account_type'    => $accountType,
                    'blacklist_value' => 4,
                    'account_value'   => $accountValue,
                    'add_admin'       => $_SESSION['admin_id'],
                    'in_time'         => $_SERVER['REQUEST_TIME'],
                );
                $code = updateAccountBlacklist($userId,$data);
                $res['message'] = $code ? '成功加入黑名单' : '未能加入黑名单';
            }
        }
        return $this->ajaxReturn($res);
    }
}
