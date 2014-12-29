<?php
namespace Home\Model;
use Think\Model;
/**
 * Class CheckModel
 * @author nixus
 */
class CheckModel extends Model {
    public $user_id;
    public $order_id;
    private $Check = null;
    public function __construct() {
        $this->Check = M('order_info');
    }

    /**
     * 订单类型
     *
     * @return array 
     */
    public function orderType() {
        return M('order_type')->where(' available=1 ')->order('sort')->getField('type_id,type_name');
    }

    /**
     * 订单归属
     *
     * @return array 
     */
    public function orderOwer() {
    }
    
}
