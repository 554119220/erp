<?php

namespace Home\Model;
use Think\Model;
class SessionModel extends Model {
    public $db = null;
    public function __construct() {
        $this->db = M('sessions_data');
    }

    /**
     *
     * @return void
     */
    public function getSessionInfo()
    {
        $db = M('sessions_data');
        return $db->where('sesskey="'.substr($_COOKIE['ECSCP_ID'],0,32).'"')->find();
    }

    /**
     * 获取用户权限
     *
     * @return void
     */
    public function getActionList() {
        $dba = M('sessions_data');
        $result = $dba->where('sesskey="'.substr($_COOKIE['ECSCP_ID'],0,32).'"')->getField('data');
        if (empty($result)) {
            $dba = M('sessions');
            $result = $dba->where('sesskey="'.substr($_COOKIE['ECSCP_ID'],0,32).'"')->getField('data');
        }

        $result = unserialize($result);

        return $result['action_list'];
    }
}
