<?php
namespace Home\Model;
use Think\Model;
/**
 * Class UsersmanageModel
 * @author Nixus
 */
class UsersmanageModel extends Model {
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
       return $this->User->where($this->map)->order('add_time')->limit($this->first_row.','.$this->list_rows)->select();
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

        $user_detail = array (
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
            'service_class'    => $this->serviceClass(),
            'service_manner'   => $this->serviceManner(),
    );

        return $user_detail;
    }

    /**
     * 顾客基本资料
     *
     * @return array 
     */
    private function baseInfo() {
        return $this->User->where($this->data)->getField('user_name,sex,mobile_phone,home_phone,aliww,qq,email,wechat,rank_points,id_card,income,from_where,parent_id,family_id');
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
        //$data['role_id'] = $_SESSION['role_id'];
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
     * 服务方式
     */
    public function serviceClass(){
        $mSeviceClass = M('service_class');
        return $mSeviceClass->select();
    }

    /**
     * 服务类别
     */
    public function serviceManner(){
        $mSeviceManner = M('service_manner');
        return $mSeviceManner->select();
    }
}
