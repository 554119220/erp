<?php
namespace Home\Model;
use Think\Model;
class SessionModel extends PublicModel {
    /**
     * @return void
     */
    public function getSessionInfo() {
        $map['expiry'] = $_SERVER['REQUEST_TIME'];
        M('sessions')->where("sesskey='".substr($_COOKIE['ECSCP_ID'],0,32)."'")->save($map);
        $dba = new Model;
        $sql_select = 'SELECT u.user_id,u.role_id,u.group_id,u.action_list,u.user_name FROM'.
            ' `crm_sessions` s,`crm_admin_user` u WHERE s.adminid=u.user_id AND s.sesskey="'.
            substr($_COOKIE['ECSCP_ID'],0,32).'"';
        $result = $dba->query($sql_select);
        $result = $result[0];
        return array(
            'admin_id'    => $result['user_id'],
            'admin_name'  => $result['user_name'],
            'role_id'     => $result['role_id'],
            'group_id'    => $result['group_id'],
            'action_list' => $result['action_list'],
        );
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
