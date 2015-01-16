<?php
/*=============================================================================
#     FileName: HrmModel.class.php
#         Desc:  人事资源管理
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2015-01-06 11:15:43
#      History:
=============================================================================*/
namespace Home\Model;
use Think\Model;
class HrmModel extends PublicModel{
    function archive($staffId){
        $mStaff          = M('oa_staff_records');
        $mWork           = M('oa_work_exp');
        $mEdu            = M('oa_edu_exp');
        $mEme            = M('oa_emergency_contact');
        $baseFields      = 's.*,r.role_name';
        $workFields      = 'work_start,work_end,company,position';
        $eduFields       = 'edu_start,edu_end,school,major,graduater';
        $emergencyFields = 'contacter,relation,phone';

        $where = "staff_id=$staffId";
        $baseInfo = $mStaff->alias('s')
            ->join(array('LEFT JOIN __ADMIN_USER__ u ON u.user_id=s.user_id',
                'LEFT JOIN __ROLE__ r On s.branch_id=r.role_id',
            ))->where($where)->field($baseFields)->select();
        $baseInfo = $baseInfo[0];

        if ($baseInfo) {
            $baseInfo['sex'] = 1==$baseInfo['sex'] ?男:女; 
            $baseInfo['marital_status'] = $baseInfo['marital_status']?已婚:未婚; 
            switch($baseInfo['education']){
            case 0 :$baseInfo['education'] = '初中';break;
            case 1 :$baseInfo['education'] = '高中/中专';break;
            case 2 :$baseInfo['education'] = '大专';break;
            case 3 :$baseInfo['education'] = '本科';break;
            case 4 :$baseInfo['education'] = '硕士';break;
            }
            $baseInfo['native_province_txt']  = $this->getRegion($baseInfo['native_province']);
            $baseInfo['native_city_txt']      = $this->getRegion($baseInfo['native_city']);
            $baseInfo['native_place_txt'] = "{$baseInfo['native_province_txt']} {$baseInfo['native_city_txt']}";
            $baseInfo['city_txt']         = $this->getRegion($baseInfo['city']);
            $baseInfo['district_txt']     = $this->getRegion($baseInfo['district']);
            $baseInfo['home_address_txt'] = "{$baseInfo['city_txt']} {$baseInfo['district_txt']} {$baseInfo['home_address']}";
            $baseInfo['joined_date'] = date('Y-m-d',$baseInfo['joined_date']);
            $baseInfo['domitory'] =  empty($baseInfo['domitory'])?'不住宿':$baseInfo['domitory'];
            $baseInfo['number'] = "{$baseInfo['greater']}{$baseInfo['date_mark']}{$baseInfo['staff_id']}";
            if ($baseInfo['avator_url']) {
                $baseInfo['avator_url'] = __ROOT__.'/'.$baseInfo['avator_url'];
            }
        }

        $work                   = $mWork->field($workFields)->where($where)->select();
        $edu                    = $mEdu->field($eduFields)->where($where)->select();
        $baseInfo['work_count'] = count($work)+1;
        $baseInfo['edu_count']  = count($edu)+1;
        $emergencyContact = $mEme->field($emergencyFields)->where($where)->select();
        if ($edu) {
            foreach ($edu as &$val) {
                switch($val['graduater']){
                case 1 :$val['graduater_name'] = '初中';break;
                case 2 :$val['graduater_name'] = '高中/中专';break;
                case 3 :$val['graduater_name'] = '大专/本科';break;
                case 4 :$val['graduater_name'] = '硕士';break;
                }
            }
        }
        //相关证书
        $picList = M('oa_staff_pic')->where($where)->select();
        if ($picList) {
            foreach ($picList as &$val) {
                $val['pic_url'] = __ROOT__.'/'.$val['pic_url'];
            }
        }
        $archive = array(
            'base'       => $baseInfo,
            'work'       => $work,
            'edu'        => $edu,
            'emergency1' => $emergencyContact[0],
            'emergency2' => $emergencyContact[1],
            'picList'    => $picList,
        );
        return $archive;
    }    

    /*填写档案*/
    public function register(){

    }

    //生成员工编号
    public function generateStaffId () {
        $staffId = M('oa_staff_records')->order('staff_id DESC')->order('staff_id DESC');;
        $staffId = $staffId ? ++$staffId : 1;
        $len = strlen($staffId);
        for (;$len < 4; $len++) {
            $staffId = '0'.$staffId;
        }
        $staffId = 'GZ'.date('ymd').$staffId;
        return $staffId;
    }

    /**
     * 添加新的工作账号
     */
    function insertAdminInfo($info) {
        // 查询该客服是否已经存在
        $userId = M('admin_user')->where("status>0 AND mobile={$info['staff_phone']}")
            ->getField('user_id');
        if ($userId) {
            return $userId;
        }

        $passwdStr = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $passwd    = '';
        $ecSalt    = '';
        for ($len = 0; $len < 5;) {
            $passwd .= $passwdStr[mt_rand(0, strlen($passwdStr))];
            $len = strlen($passwd);
            $ecSalt .= $passwdStr[mt_rand(0, strlen($passwdStr))];
        }
        $password = md5(md5($passwd).$ecSalt);
        $actionList = M('role')->where("role_id={$info['branch_id']}")->getField('action_list');
        $data = array(
            'user_name'   => $info['staff_name'],
            'password'    => $password,
            'ec_salt'     => $ec_salt,
            'mobile'      => $info['staff_phone'],
            'stats'       => 1,
            'status'      => 1,
            'add_time'    => $_SERVER['REQUEST_TIME'],
            'action_list' => $actionList,
            'role_id'     => $info['branch_id'],
            'assign'      => 0
        );
        $code = M('admin_user')->add($data);
        if ($code) {
            //include_once('../includes/cls_sms.php');
            //$sms = new sms;
            //$sms->send($info['staff_phone'], "欢迎加入康健人生大家庭，登录账号是{$info['staff_name']}，密码是$passwd");
        }
        return $code;
    }
    /**
     * 处理员工的工作经历、学习经历、紧急联系人
     */
    function dealSatelliteInfo($staffId, $info, $table) {
        $fields = array();
        $values = array();
        foreach ($info as &$val){
            if ((isset($val['school']) && empty($val['school'])) || (isset($val['company']) && empty($val['company']))) {
                continue;
            }
            $val['staff_id'] = $staffId;
            if (!empty($val)) {
                $m = M($table);
                $result = $m->add($val);
                if(!$result) return false;
            }
        }
        return true;
    }

    //员工列表
    public function staffList($where,$page){
        $fields = 's.staff_id,concat(s.greater,s.date_mark,s.staff_id) number,s.staff_name,s.sex,s.status,s.type,s.job_title,joined_date,r.role_name';
        $staffList = M('oa_staff_records')->alias('s')
            ->join(array(' LEFT JOIN __ADMIN_USER__ a ON a.user_id=s.user_id',
            ' LEFT JOIN __ROLE__ r ON r.role_id=s.branch_id'))
            ->field($fields)
            ->where($where)->page($page)->order('joined_date DESC')
            ->select();
        if ($staffList) {
            foreach ($staffList as &$val) {
                $val['joined_date'] = date('Y-m-d',$val['joined_date']);
                $val['sex'] = 1 == $val['sex'] ? '男' : '女';
                if (empty($val['type'])) {
                    $val['type'] = '未设置';
                }else{
                    switch($val['type']){
                    case 1 : $val['type'] = '试用';break;
                    case 2 : $val['type'] = '实习';break;
                    case 3 : $val['type'] = '转正';break;
                    }    
                }
                if (empty($val['status'])) {
                    $val['status'] = '未设置';
                }else{
                    switch($val['type']){
                    case 0 : $val['status'] = '在职';break;
                    case 1 : $val['status'] = '离职';break;
                    case 2 : $val['status'] = '交接中';break;
                    }    
                }

            }
        }
        return $staffList;
    }

    //统计员工数量
    public function countStaffList($where){
        return M('oa_staff_records')->alias('s')
            ->join(array(' LEFT JOIN __ADMIN_USER__ a ON a.user_id=s.user_id',
                ' LEFT JOIN __ROLE__ r ON r.role_id=a.role_id'))
                ->where($where)->count();
    }

    public function salary($where='',$page='1,20'){
        return M('oa_salary')->where($where)->page($page)->select();
    }

    /**
     * 员工信息建档
     */
    function insertStaffInfo ($staffInfo) {
        return M('oa_staff_records')->data($staffInfo)->add();
    }

    //获取地址
    public function getRegion($regionId){
        return M('region')->where("region_id=$regionId")->getField('region_name');
    }

    //提成系数列表
    public function commissionList(){
        return M('oa_commission')->select();
    }

    //修改人事档案
    public function updateArchive($staffId,$data){
        return M('oa_staff_records')->where("staff_id=$staffId")->save($data);
    }

    public function truncateData($staffId,$table){
        if (M($table)->where("staff_id=$staffId")->count()) {
            return M($table)->where("staff_id=$staffId")->delete();
        }else{
            return true;
        }
    }
}
?>
