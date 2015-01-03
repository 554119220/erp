<?php
namespace Home\Model;
use Think\Model;
/**
 * Class UsersmanageModel
 * @author Nixus
 */
class UsersmanageModel extends PublicModel {
    public $first_row;
    public $list_rows;
    public $data = array();

    private $User = null;
    private $map  = array(); // 查询条件

    /**
     * @param mixed 
     */
    public function __construct() {
        $this->User = M('users');
    }

    /**
     * 设置查询条件
     */
    public function setter($condition) {
        if (empty($condition)) {
            return;
        }
        foreach ($condition as $key=>$val) {
            if ($key && $val) {
                $this->map[$key] = $val;
            }
        }
    }

    /**
     * 设置查询时间段
     *
     * @return void
     */
    public function setAddTime($value) {
        if ($value[0] && $value[1]) {
            sort($value);
            $this->map['add_time'] = array('between', "$value[0],$value[1]");
        }
    }

    /**
     * 顾客列表
     *
     * @return array 
     */
    public function usersList() {
        $usersList = $this->User->where($this->map)->order('add_time')->limit($this->first_row.','.$this->list_rows)->select();
        return $usersList;
    }

    /**
     * 顾客数量
     *
     * @return int
     */
    public function usersCount() {
        return $this->User->where($this->map)->count();
    }

    /**
     * 查询顾客分类
     *
     * @return array 
     */
    public function queryUsersGroup() {
        $UsersGroup = M('customer_type');
        return $UsersGroup->where('available=1')->order('sort')->getField('type_id,type_name');
    }

    /**
     * 查询顾客详细资料
     *
     * @return array 
     */
    public function userDetail() {
        $base_info = $this->baseInfo();
        $user_addr = $this->userAddress();
        return array (
            'base_info'        => end($base_info)+end($user_addr),
            'contact_info'     => $this->contactInfo(),
            'purchase_history' => $this->purchaseHistory(),
            'friends_circle'   => $this->friendsCircle(),
            'health_archive'   => $this->healthArchive(true),
            'funds_manage'     => $this->fundsManage(),
            'shipping_list'    => $this->shipping(),
            'payment'          => $this->payment(),
            'platform_list'    => $this->platform(),
            'order_type'       => $this->orderType(),
            'saler_list'       => $this->salerList(),
            'service_class'    => D('Service')->serviceClass(),
            'service_manner'   => D('Service')->serviceManner(),
        );
    }

    /**
     * 顾客流失列表
     *
     * @return array 
     */
    public function outFlow($field) {
        $User = M('users');
        $result = $User->where($this->map)->group('user_id')->order("$field DESC")->limit($this->first_row.','.$this->list_rows)->getField("user_id,user_name,add_time,admin_name,CONCAT(home_phone,' ',mobile_phone)mobile_phone,$field");
        // 格式化时间
        foreach ($result as &$val){
            $val[$field] = $val[$query_field] ? date('Y-m-d', $val[$query_field]) : '-';
            $val['add_time']   = date('Y-m-d', $val['add_time']);
        }
        return $result;
    }

    /**
     * 顾客基本资料
     *
     * @return array 
     */
    private function baseInfo() {
        return $this->User->where($this->data)->getField('user_id,user_name,sex,mobile_phone,home_phone,aliww,qq,email,wechat,rank_points,id_card,income,from_where,parent_id');
    }

    /**
     * 联系信息
     * @return array 
     */
    private function contactInfo() {
        $contact = M('user_contact')->where($this->data)->select();
        $result = array();
        foreach ($contact as $val) {
            $result[$val['contact_name']][] = $val;
        }
        return $result;
    }

    /**
     * 健康档案
     * 如果$return 真 返回 bool类型，假 返回 数组
     */
    private function healthArchive($return,$userId) {
        $mArchive = M('archive');
        $mHealth  = D('Health');
        if($return){
            $archive = $mArchive->where("user_id=$userId")->count();
        }else{
            $archive = $mHealthy->healthArchive($userId);
        }
        return $archive; 
    }

    /**
     * 资金管理
     *
     * @return array 
     */
    private function fundsManage() {
    }

    /**
     * 家庭健康
     *
     * @return array 
     */
    private function familyHealth() {
    }

    /**
     * 朋友圈
     *
     * @return array 
     */
    private function friendsCircle() {
    }

    /**
     * 购买记录
     *
     * @return array 
     */
    private function purchaseHistory() {
        return M('order_info')->where($this->data)->select();
    }

    /**
     * 购买平台
     *
     * @return array 
     */
    private function platform() {
        return M('role')->where()->getField('role_id,role_name');
    }

    /**
     * 支付方式
     *
     * @return array 
     */
    private function payment() {
        return M('payment')->where()->getField('pay_id,pay_name');
    }

    /**
     * 配送方式
     *
     * @return array 
     */
    private function shipping() {
        return M('shipping')->where()->getField();
    }

    /**
     * 订单归属
     *
     * @return array 
     */
    private function salerList() {
        $data = array(
            'status' => 1,
            'stats'  => 1,
        );
        return M('admin_user')->where($data)->getField('user_id,user_name');
    }

    /**
     * 订单类型
     *
     * @return array 
     */
    private function orderType() {
        return M('order_type')->where()->getField('type_id,type_name');
    }

    /**
     * 顾客地址
     *
     * @return array 
     */
    private function userAddress() {
        $UserAddr = new Model();
        $sql_select = 'SELECT p.region_name province,c.region_name city,d.region_name district,u.address FROM'.
            ' `crm_user_address` u LEFT JOIN `crm_region` p ON p.region_id=u.province LEFT JOIN `crm_region` c'.
            " ON c.region_id=u.city LEFT JOIN `crm_region` d ON d.region_id=u.district WHERE u.user_id={$this->data['user_id']}";
        return $UserAddr->query($sql_select);
    }
    /**
     * 获取订单平台类型 移动端 OR PC端
     *
     * @return array 
     */
    private function orderSource() {
        return M('order_source')->where()->order('sort')->getField('source_id,source_name');
    }

    //顾客黑名单
    //author wyh
    function blacklist($where,$fields,$page='1,20'){
        $mUserblack = M('user_blacklist');
        $userBlacklist = $mUserblack->alias('b')
            ->join(array('LEFT JOIN __ADMIN_USER__ a ON a.user_id=b.admin_id'))
            ->join(array('LEFT JOIN __ROLE__ r ON b.role_id=r.role_id'))
            ->join(array('LEFT JOIN __BLACKLIST_TYPE__ bt ON b.type_id=bt.type_id'))
            ->field($fields)->where($where)->page($page)->select();
        if ($userBlacklist) {
            foreach($blacklist AS &$val) {
                $val['in_time'] = date('Y-m-d',$val['in_time']);
            }
        }

        return $userBlacklist;
    }

    //统计黑名单
    public function countBlacklist($where){
        $mUserblack = M('user_blacklist');
        $count = $mUserblack->alias('b')
            ->join(array('LEFT JOIN __ADMIN_USER__ a ON a.user_id=b.admin_id'))
            ->join(array('LEFT JOIN __ROLE__ r ON b.role_id=r.role_id'))
            ->join(array('LEFT JOIN __BLACKLIST_TYPE__ bt ON b.type_id=bt.type_id'))
            ->where($where)->page($page)->count();
        return $count;
    }

    //黑名单类型
    public function blacklistType(){
        return M('blacklsit_type')->select();
    }

    //是否已经存在黑名单中
    public function existInBlacklist($userId){
        return M('user_blacklist')->where("user_id=$userId")
            ->getField('user_id,COUNT(*) AS total,status');
    }

    //加入黑名单列表
    public function insertBlacklist($userId,$blacklistType,$reason){
        $m = new Model();
        $sql = " SELECT user_id,user_name,admin_name,'"
            .$_SESSION['admin_name']."',".$_SERVER['REQUEST_TIME'].
            ",$blacklistType,'$reason' FROM ".__USERS__.
            " WHERE user_id=$userId";

        $sqlInsert = 'INSERT INTO '.__USER_BLACKLIST__.
            '(user_id,user_name,admin_name,operator_in,in_time,type_id,reason)'
            .$sql;
        $code = $m->query($sqlInsert);
        return $code;
    }

    //帐号黑名单（QQ,Email,旺旺,微信）
    public function existAccountBlaklict($where){
        return M('account_blacklist')->where($where)->count();
    }

    /*修改顾客黑名单existAccountBlaklict表*/
    public function updateUserBlacklist($data,$userId){
        return M('user_blacklist')->where("user_id=$userId")->save($data);
    }

    /*更新顾客的黑名单字段*/
    public  function updateUsersInfo($userId,$blackData){
        $data['is_black'] = 1;
        $code =  M('users')->where("user_id=$userId")->save($data);
        if ($data && $code) {
            $code = M('account_blacklist')->add($blackData);
        }
        return $code;
    }
}
