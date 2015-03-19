<?php
/*=============================================================================
#     FileName: hrmController.class.php
#         Desc: 人事资源管理
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2015-01-05 11:13:53
#      History:
=============================================================================*/
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Think\Model;

class HrmController extends PublicController{
    //人事档案
    public function archive(){
        $mHrm = D('Hrm');
        $staffId = I('request.staff_id',0);
        $this->assign('publicUrl', __ROOT__.'/Public');
        if ($staffId) {
            $b = isset($_REQUEST['b'])?trim(I('get.b')):'view';
            $this->assign('b',$b);  //打印或者查看
            $archive = D('Hrm')->archive($staffId);
            $this->assign('admin_name',$_SESSION['admin_name']);
            $this->assign('today',date('Y-m-d H:i:s'));
            $this->assign('archive',$archive);
            $this->assign('header',$this->fetch('Public:header'));
            $this->assign('footer',$this->fetch('Public:footer'));
            $this->display('archive');
        }
    }

    /*录入从事档案模板*/
    public function register(){
        $roleList = D('RoleManage')->roleList('','role_id,role_name');
        $provinceList = regionList(); 
        $this->assign('formUrl', U('Home/hrm/insertArchives','',''));
        $this->assign('number', D('hrm')->generateStaffId());
        $this->assign('province_list',$provinceList);
        $this->assign('role_list', $roleList);
        $this->assign('publicUrl', __ROOT__.'/Public');
        $this->display('register');
    }

    //人事档案录入
    public function insertArchives(){
        $res = array(
            'timeout' => 2000,
            'message' => '',
            'code'    => false,
        );
        if (IS_POST) {
            $mHrm = D('hrm');
            $request = $_REQUEST;
            unset($request['submit_records'], $request['act'], $request['pic']);
            //是否已经存在相同档案
            $exist = M('oa_staff_records')->where("staff_phone={$request['staff_phone']}")
                ->count();
            if($exist){
               $this->error('已经存在相同的人事档案，无需重复添加。'); 
               exit;
            }
            // 按表进行数据分类
            foreach ($request as $key=>$val){
                if (!is_array($val)) {
                    $staffInfo[$key] = trim($val);
                } else {
                    $$key = trim($val);
                }
            }
            $staffInfo['habbit'] = trim($_REQUEST['habbit']);
            // 处理入职时间
            // 入职时间
            $staffInfo['joined_date'] = strtotime($staffInfo['joined_date']); 
            // 员工编号：日期标识
            $staffInfo['date_mark'] = date('ymd', $staffInfo['joined_date']);
            // 设置员工所属地区
            $staffInfo['greater'] = 'GZ';
            // 绑定客服ID
            // 是否添加工作账号
            if($staffInfo['join_admin_user']){
                if (!$staffInfo['user_id'] = $mHrm->insertAdminInfo($staffInfo)) {
                    $res['timeout'] = 2000;
                    $res['req_msg'] = true;
                    $res['message'] = '对不起，系统出错，请联系技术人员或稍后再试！';
                }
            }
            // 将员工档案提交至 crm_staff_records
            $staffId = $mHrm->insertStaffInfo($staffInfo);
            // 处理员工的学习经历
            $edu = array();
            foreach ($edu_start as $key=>$val) {
                $edu[$key]['edu_start'] = $val;
                $edu[$key]['edu_end']   = $edu_end[$key];
                $edu[$key]['school']    = $school[$key];
                $edu[$key]['major']     = $major[$key];
                $edu[$key]['graduater'] = $graduater[$key];
            }
            // 提交学习经历到数据库
            $mHrm->dealSatelliteInfo($staffId, $edu, 'oa_edu_exp');
            // 处理员工的工作经历
            $work = array();
            foreach ($work_start as $key=>$val) {
                $work[$key]['work_start']   = $val;
                $work[$key]['work_end']     = $work_end[$key];
                $work[$key]['company']      = $company[$key];
                $work[$key]['position']     = $position[$key];
            }
            // 提交工作经历到数据库
            $mHrm->dealSatelliteInfo($staffId, $work, 'oa_work_exp');
            // 处理员工的紧急联系人
            $contact = array ();
            foreach ($contact_name as $key=>$val){
                $contact[$key]['contacter'] = $val;
                $contact[$key]['relation']  = $relation[$key];
                $contact[$key]['phone']     = $contact_phone[$key];
            }
            // 提交紧急联系人到数据库
            $mHrm->dealSatelliteInfo($staffId, $contact, 'oa_emergency_contact');
            // 处理员工照片及各类证书
            $avator = $_FILES['avator'];
            $pic = $_FILES['pic'];
            $staffInfo['date_mark'] = date('ymd', $staffInfo['joined_date']); // 员工编号：日期标识
            $staffInfo['greater'] = 'GZ';
            $fill = '';
            for ($i = strlen($staff_id); $i < 4; $i++) {
                $fill .= '0';
            }
            $dir = '..'.__ROOT__."/uploads/staff/$staffId";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            if (!empty($avator)) {
                $avatorUrl = "$dir/avator".substr($avator['name'], strpos($avator['name'], '.'));
                if (move_uploaded_file($avator['tmp_name'], $avatorUrl)) {
                    M('oa_staff_records')->
                        where("staff_id=$staffId")->save(array('avator_url'=>$avatorUrl));
                }
            }

            $staffPic = array();
            foreach ($pic['name'] as $key=>$val){
                if ($val) {
                    $tmpUrl = "$dir/".(microtime(true)*10000).$key.substr($val, strpos($val, '.'));
                    if (move_uploaded_file($pic['tmp_name'][$key], $tmpUrl)) {
                        $staffPic[] = $staffId.',"'.$tmpUrl.'"';
                    }
                }
            }
            if (!empty($staffPic)) {
                $staffPicUrl = implode('),(', $staffPic).')';
                $m = new Model();
                $sql = 'INSERT INTO '.__OA_STAFF_PIC__.'(staff_id,pic_url)VALUES('.$staffPicUrl;
                $m->query($sql);
            }
            $this->success('欢迎加入康健人生大家庭',U('Home/hrm/staffList/tp/true/',''),'');
        }else{
            $this->error('录入失败，别着急，请重试!');
        }
        exit;
    }

    //编辑人事档案
    public function editArchives(){
        $mHrm    = D('Hrm');
        $Msg     = A('msg');
        $b       = isset($_REQUEST['b'])?$_REQUEST['b']:'view';
        $staffId = intval($_REQUEST['staff_id']);
        if ($staffId) {
            if ('view' == $b) {
                $roleList = D('RoleManage')->roleList('','role_id,role_name');
                $archive  = D('Hrm')->archive($staffId);
                if ($archive['base']) {
                    $staffBase = $archive['base'];
                    if (is_int($archive['base']['number'])||$archive['base']['number']) {
                        $number = 'GZ'.date('ymd').$archive['base']['staff_id'];
                    }else{
                        $number = $archive['base']['number'];
                    }

                    $provinceList = regionList();
                    $this->assign('native_city',D('Public')->regionList(2, $archive['base']['native_province']));
                    $this->assign('city',D('Public')->regionList(2, $archive['base']['province']));
                    $this->assign('district',D('Public')->regionList(3,$archive['base']['city']));
                    $this->assign('number',$number);
                    $this->assign('base',$archive['base']);
                    $this->assign('edu',$archive['edu']);
                    $this->assign('work',$archive['work']);
                    $this->assign('edu_count',count($archive['edu'])+1);
                    $this->assign('work_count',count($archive['work'])+1);
                    $this->assign('emergency1',$archive['emergency1']);
                    $this->assign('emergency2',$archive['emergency2']);
                    $this->assign('pic_list',$archive['pic_list']);
                    $this->assign('edit',true);
                    $this->assign('province_list',$provinceList);
                    $this->assign('role_list',$roleList);
                    $this->assign('publicUrl', __ROOT__.'/Public');
                    $this->assign('formUrl', U('home/hrm/editArchives/b/edit/','',''));
                    $this->display('editRegister');
                }else{

                }
            }elseif('edit' == $b){
                $request = $_REQUEST;
                $staffId = intval($_REQUEST['staff_id']);
                unset($request['submit_records'], $request['act'], $request['pic'],$request['b']);
                foreach ($request as $key=>$val){
                    if (!is_array($val) && $key != 'staff_id') {
                        $staffInfo[$key] = $val;
                    } else {
                        $$key = $val;
                    }
                }
                $staffInfo['habbit'] = trim($_REQUEST['habbit']);
                $staffInfo['joined_date'] = strtotime($staffInfo['joined_date']); 
                $staffInfo['date_mark'] = date('ymd', $staffInfo['joined_date']);
                $staffInfo['greater'] = 'GZ';
                if ($staffId) {
                    $mHrm->updateArchive($staffId,$staffInfo);
                    if ($mHrm->truncateData($staffId,'oa_edu_exp')) {
                        $edu = array();
                        foreach ($edu_start as $key=>$val) {
                            $edu[$key]['edu_start'] = $val;
                            $edu[$key]['edu_end']   = $edu_end[$key];
                            $edu[$key]['school']    = $school[$key];
                            $edu[$key]['major']     = $major[$key];
                            $edu[$key]['graduater'] = $graduater[$key];
                        }
                        $mHrm->dealSatelliteInfo($staffId, $edu, 'oa_edu_exp');
                    }
                    if ($mHrm->truncateData($staffId,'oa_work_exp')) {
                        $work = array();
                        foreach ($work_start as $key=>$val) {
                            $work[$key]['work_start']   = $val;
                            $work[$key]['work_end']     = $work_end[$key];
                            $work[$key]['company']      = $company[$key];
                            $work[$key]['position']     = $position[$key];
                        }
                        $mHrm->dealSatelliteInfo($staffId, $work, 'oa_work_exp');
                    }
                    if ($mHrm->truncateData($staffId,'oa_emergency_contact')) {
                        $contact = array ();
                        foreach ($contact_name as $key=>$val){
                            $contact[$key]['contacter'] = $val;
                            $contact[$key]['relation']  = $relation[$key];
                            $contact[$key]['phone']     = $contact_phone[$key];
                        }
                        $mHrm->dealSatelliteInfo($staffId, $contact, 'oa_emergency_contact');
                    }
                }
                $avator = $_FILES['avator'];
                $pic = $_FILES['pic'];
                $staffInfo['date_mark'] = date('ymd', $staffInfo['joined_date']);
                $staffInfo['greater'] = 'GZ';
                $fill = '';
                for ($i = strlen($staff_id); $i < 4; $i++) {
                    $fill .= '0';
                }
                $dir = '..'.__ROOT__."/uploads/staff/$staffId";
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                if (!empty($avator)) {
                    $avatorUrl = "$dir/avator".substr($avator['name'], strpos($avator['name'], '.'));
                    if (move_uploaded_file($avator['tmp_name'], $avatorUrl)) {
                        M('oa_staff_records')->
                            where("staff_id=$staffId")->save(array('avator_url'=>$avatorUrl));
                    }
                }

                $staffPic = array();
                foreach ($pic['name'] as $key=>$val){
                    if ($val) {
                        $tmpUrl = "$dir/".(microtime(true)*10000).$key.substr($val, strpos($val, '.'));
                        if (move_uploaded_file($pic['tmp_name'][$key], $tmpUrl)) {
                            $staffPic[] = $staffId.',"'.$tmpUrl.'"';
                        }
                    }
                }
                if (!empty($staffPic)) {
                    $staffPicUrl = implode('),(', $staffPic).')';
                    $m = new Model();
                    $sql = 'INSERT INTO '.__OA_STAFF_PIC__.'(staff_id,pic_url)VALUES('.$staffPicUrl;
                    $m->query($sql);
                }
                $url = U('home/hrm/archive/',array('staff_id'=>$staffId,'b'=>'view'),'');
                $this->success('修改成功',$url);
            }
        }else{
            $this->error('没有找到你想要的档案');
        }
    }

    //人事列表
    public function staffList(){
        $map       = array();
        $mHrm      = D('hrm');
        $where     = ' 1';
        $info      = extract($_REQUEST);
        $f         = I('request.f');
        $p         = I('request.p',1);
        $pageSize  = I('request.page_size',10);
        $status    = empty($_REQUEST['status'])?2:intval($_REQUEST['status']);
        $staffName = trim(I('request.staff_name',''));
        $sex       = empty($_REQUEST['sex'])?1:intval($_REQUEST['sex']);
        $roleId    = I('request.role_id',0);
        $map       = array('f'=>$f);

        $where .= " AND s.status=$status"; 
        $map['status'] = $status;
        if(!empty($staffName)){
            $staffName = urldecode($staffName);
            $where .= " AND s.staff_name LIKE '%$staffName%'"; 
            $map['staff_name'] = $staffName;
        }
        if($roleId){
            $where .= " AND s.branch_id=$roleId"; 
            $map['role_id'] = $roleId;
        }

        $editUrl  = U('Home/hrm/editArchives','','');
        $archivesUrl = U('Home/hrm/archive/b/view','','');
        $archivesPrint = U('Home/hrm/archive/b/print','','');

        $count = $mHrm->countStaffList($where);
        $Page  = new Page($count,$pageSize);

        foreach ($condition as $key=>$val) {
            $Page->parameter[$key] = urlencode($val);
        }

        $page = "$p,$pageSize";
        $staffList = $mHrm->staffList($where,$page);

        $this->assign('staff_list',$staffList);
        $this->assign('total',$count);
        $this->assign('editUrl',$editUrl);
        $this->assign('archivesUrl',$archivesUrl);
        $this->assign('archivesPrint',$archivesPrint);
        $this->assign('page',$Page->show());
        $this->assign('role_list',D('RoleManage')->roleList('','role_id,role_name'));
        if ($f) {
            $res['main'] = $this->fetch('staffSearch');
            $res['response_action'] = 'search_service';
            return $this->ajaxReturn($res,'JSON');
        }else{
            $this->assign('publicUrl', __ROOT__.'/Public');
            $this->assign('registerUrl',U('Home/hrm/register','',''));
            $this->assign('search_staff',$this->fetch('staffSearch'));
            if(I('request.tp')){
                $this->assign('staffListUrl',U('Home/hrm/staffList/tp/true','',''));
                $this->assign('header',$this->fetch('Public:header'));
                $this->assign('footer',$this->fetch('Public:footer'));
                $this->display('staffList');
            }else{
                $res['main'] = $this->fetch('staffList');
                return $this->ajaxReturn($res);
            }
        }
    }

    //考勤
    function checkingIn(){

    }

    //职位评级
    function appraisal(){

    }

    //搜索按员工名搜索，填充SELECT
    function schStaff(){
        $keyword = trim(I('get.keyword',''));
        if (!empty($keyword)){
            $where = "staff_name LIKE '%$keyword%'";
            $res['list']   = D('Hrm')->simpleStaffInfo($where,true);
            $res['target'] = 'staff_id';
            $res['length'] = count($res['list']);
        }
        return $this->ajaxReturn($res);
    }

    /*员工职位级别*/
    public function positionLevel(){
        $act = I('b','view');
        switch($act){
        case 'view':
            $this->assign('role',D('RoleManage')->roleList('','role_id,role_name'));
            $this->assign('position_level',D('Hrm')->positionLevel());
            $res['main'] = $this->fetch('positionLevel');
            break;
        }

        return $this->ajaxReturn($res);
    }

    /*员工列表（搜索）*/
    public function staffListForSelect(){
        if ($_REQUEST['staff_name']) {
            $staffName = mysql_real_escape_string($_REQUEST['staff_name']);
            $where = " staff_name LIKE '%$staffName%'";
        }
        return $this->ajaxReturn(D('Hrm')->staffListSelect(false,true,$where),'JSON');
    }
}
?>
