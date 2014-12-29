<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initialize(){
        //$this->set_session();
    }

    public function index(){
        $func = I('request.func', 0, 'trim');
        if ($func) {
            $this->$func();
        } else {
            $this->action();
        }
    }

    /**
     * 菜单列表
     *
     * @return void
     */
    private function menu() {
        $menuCode = I('request.action_code', '', 'trim');

        $Menu = D('Menu');
        $menuList = $Menu->menuList();

        $this->assign('nav_2nd', $menuList['nav_2nd'][$menuCode]);
        $this->assign('nav_3rd', $menuList['nav_3rd']);
        $this->assign('file_name', 'index');

        $this->display('left');
    }

    /**
     * 处理子菜单请求
     *
     * @return void
     */
    private function action() {
        $act = I('request.act', '', 'trim');
        $act = array_map('ucfirst', explode('_', $act));

        $operator = D(implode('', $act));
        echo json_encode(array());
    }

    //获取首页信息
    public function get_index_info(){
        $today     = get_date('today');
        $month     = get_date('month');
        $mReport   = D('Report');
        $condition = '';

        /*权限判断*/
        if (admin_priv('all','',false)) {

        }elseif(admin_priv('role_admin','',false)){

        }elseif(admin_priv('group_admin','',false)){

        }else{
            $whereGroup     = " group_id={$_SESSION['group_id']}";
            $groupAdminList = D('Admin')->get_admin_list($whereGroup,'');   //小组成员 
            $adminIdList    = get_admin_id_list($groupAdminList);
            $groupAdminList = implode(',',$adminIdList);
            $where          = " admin_id IN($groupAdminList)";
            $groupTodayOrderNum  = $mReport->get_order_report($where,$today,'admin_id');   //统计小组成员今天订单
            $groupMonthOrderNum  = $mReport->get_order_report($where,$month,'admin_id');   //统计小组成员当月订单
            $groupRanking   = $this->get_ranking($groupTodayOrderNum,$groupMonthOrderNum);
            $roleAdminList  = D('Admin')->get_admin_list('','role');
            $adminIdList    = get_admin_id_list($roleAdminList);
            $roleAdminList  = implode(',',$adminIdList);
            $where          = " admin_id IN($roleAdminList)";

            $roleTodayOrderNum  = $mReport->get_order_report($where,$today,'admin_id');   //统计部门成员今天订单
            $roleMonthOrderNum  = $mReport->get_order_report($where,$month,'admin_id');   //统计部门成员当月订单
            $roleRanking  = $this->get_ranking($roleTodayOrderNum,$roleMonthOrderNum);

            //各指标完成进度
            $mService = D('service');
            $where    = " admin_id={$_SESSION['admin_id']}";
            $personIndexInfo = array(  //个人订单情况
                'todayOrder' => $mReport->get_order_report($where,$today,'admin_id'),
                'monthOrder' => $mReport->get_order_report($where,$month,'admin_id'),
            );

            if (!$personIndexInfo['todayOrder']) {
                $personIndexInfo['todayOrder'][] = array('num'=>0,'amount'=>0);
            }

            if (!$personIndexInfo['monthOrder']) {
                $personIndexInfo['monthOrder'][] = array('num'=>0,'amount'=>0);
            }

            //销量指标完成进度
            $where = " admin_id={$_SESSION['admin_id']} AND month_target BETWEEN {$month['start_time']} AND {$month['end_time']}";
            $schedule = $mReport->get_complete_schedule($personIndexInfo,$where);

            //服务量完成进度
            $where = " admin_id={$_SESSION['admin_id']} AND service_time BETWEEN {$today['start_time']} AND {$today['end_time']}";
            $serviceNum = $mService->get_service_num($where);
            $schedule['serviceSchedule'] = round($serviceNum/35,2)*100;
            $schedule['servicePersent']  = (round($serviceNum/35,2)*100).'%';
            $schedule['serviceWidth']    = intval($schedule['serviceSchedule']) > 100 ? '100%' : $schedule['serviceSchedule'].'%';
            $schedule['serviceData']     = "35 ";

            foreach ($schedule as $key=>&$val) {   //进度样式
                if (is_numeric($val)) {
                    if(0 <= $val && $val <=5){
                        $schedule[$key] = "progress-one";
                    }elseif(0 <= $val && $val <= 10){
                        $schedule[$key] = "progress-five";
                    }elseif (10 < $val && $val <= 25) {
                        $schedule[$key] = "progress-twentyfive";
                    }elseif(25 < $val && $val <= 50){
                        $schedule[$key] = "progress-fifty";
                    }elseif(50 < $val && $val <= 75){
                        $schedule[$key] = "progress-seventyfive";
                    }elseif(75 < $val && $val <= 99){
                        $schedule[$key] = "progress-nintynight";
                    }else{
                        $schedule[$key] = "progress-onehundred";
                    }
                }
            }

            /*个人完成订单具体情况*/
            foreach ($personIndexInfo as $key=>&$val) {
                $personIndexInfo[$key] = $personIndexInfo[$key] ? $personIndexInfo[$key][0] : 0; 
            }
        }

        $this->assign('roleRanking',$roleRanking);
        $this->assign('groupRanking',$groupRanking);
        $this->assign('personIndexInfo',$personIndexInfo);
        $this->assign('s',$schedule);
        $res['main'] = $this->fetch('statistics');
        $this->ajaxReturn($res);
    }

    //设置SESSION
    private function set_session(){
        $mSessionData = M('sessions_data');
        $mSessionInfo = M('sessions');
        $sesskey = substr($_COOKIE['ECSCP_ID'],0,32);
        $where = "sesskey='$sesskey'";
        $sessionData = $mSessionData->where($where)->getField('data');
        $sessionInfo = $mSessionInfo->field('adminid')->where($where)->find();
        if ($sessionData && $sessionInfo) {
            $sessionData = unserialize($sessionData);
            $session = array_merge($sessionData,$sessionInfo);
            $_SESSION = array(
                'admin_id'       => $session['adminid'],
                'admin_name'  => $session['admin_name'],
                'role_id'     => $session['role_id'],
                'group_id'    => $session['group_id'],
                'action_list' => $session['action_list'],
            );
        }
    }

    //获取管理员首页各指标排行
    public function get_ranking($todayData,$monthData){
        if (!$monthData) {   //统计当月订单情况
            $ranking = array(
                'today_order_num_ranking'    => 1,
                'today_order_amount_ranking' => 1,
                'month_order_num_ranking'    => 1,
                'month_order_amount_ranking' => 1,
            );
        }else{
            $monthOrderNum    = $this->desc_sort($monthData,'num');
            $monthOrderAmount = $this->desc_sort($monthData,'amount');
            $item = 'admin_id';
            $ranking['month_order_num_ranking'] = $this->get_ranking_exc($monthOrderNum,$item);
            $ranking['month_order_amount_ranking'] = $this->get_ranking_exc($monthOrderAmount,$item);
        }

        if ($todayData) {   //统计当天订单情况
            $todayOrderNum    = $this->desc_sort($todayData,'num');       //订单数量
            $todayOrderAmount = $this->desc_sort($monthData,'amount');    //订单金额
            $ranking['today_order_num_ranking']     = $this->get_ranking_exc($todayOrderNum);
            $ranking['today_order_amount_ranking']  = $this->get_ranking_exc($todayOrderAmount);
        }else{
            $ranking['today_order_num_ranking']    = 1;
            $ranking['today_order_amount_ranking'] = 1;
        }

        return $ranking;
    }

    public function get_ranking_exc($arr){
        $length = count($arr);
        for ($i = 0; $i < $length; $i++) {
            if ($_SESSION['admin_id'] == $arr[$i]['admin_id']) {
                return $i+1;
            }else{
                continue;
            }
        }

        if($i >= $length){
            return count($arr)+1;
        }
        return false;
    }

    //降序排行
    public function desc_sort($arr,$value){
        if ($arr) {
            foreach($arr as $key=>&$row){
                $by[$key] = $row[$value];
            }
            array_multisort($by, SORT_DESC,$arr);   
            return $arr;
        }else{
            return false;
        }
    } 
}
