<?php
namespace Home\Model;
use Think\Model;
/**
 * Class OperatorManageModel
 * @author nixus
 */
class OperatorManageModel extends Model {
    public $role;
    public $status;
    public $stats;
    private $Operator = null;
    public function __construct() {
        $this->Operator = M('admin_user');
    }

    /**
     * 客服列表
     *
     * @return array 
     */
    public function salerList() {
        $conditions = '';
        foreach (self as $key=>$val) {
            if ($val && getType(self::$key) != 'object') {
                $conditions[$key] = intval($val);
            }
        }

        if ($this->role_id) {
            $conditions['role_id']=$this->role_id;
        }
        return $this->Operator->where($conditions)->getField('user_id,user_name');
    }
}

