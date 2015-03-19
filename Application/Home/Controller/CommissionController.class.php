<?php
/*=============================================================================
#     FileName: commissionController.class.php
#         Desc:  commission 提成管理
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2015-01-25 11:23:10
#      History:
=============================================================================*/
namespace Home\Controller;
use Think\Controller;

class commissionController extends PublicController{
    //已发提成列表
    public function index(){

    }
    //已发提成汇总
    public function summarizing (){
        
    }

    //核算待发提成 
    public function check(){

    }

    /*待发提成列表*/
    public function wait(){

    }

    //提成计算数据源
    //销量
    //退货
    //运费
    public function dataSource(){
        
    }

    //提成列表
    public function commissionLog(){
        $this->assign();
        $res['main'] = $this->fetch('commissionLog');
        return $this->ajaxReturn($res); 
    }

    //提成基数
    public function commissionBase(){
        $mHrm = D('hrm');
        $_REQUEST = stripslashes($_REQUEST['JSON']);
        $_REQUEST = json_decode($_REQUEST,true);
        $b = isset($_REQUEST['b'])?$_REQUEST['b']:'view';
        $mRole   = D('RoleManage');
        $this->assign('platform_list',$mRole->platformList());
        $this->assign('role_list',$mRole->roleList('','role_id,role_name'));
        $this->assign('group_list',$mRole->groupList('','group_id,group_name'));
        if ('view' == $b) {
            $mCommon = D('Common');
            $this->assign('step',1);
            $this->assign('title','添加提成模块');
            $this->assign('payment',$mCommon->payment());
            $this->assign('shipping',$mCommon->shipping());
        }elseif('add' == $b){
            $request = $_REQUEST;
            $step = intval($request['step']);
            $data = array();
            $res = array(
                'req_msg' => true,
                'code'    => false,
                'timeout' => 2000,
                'message' => '',
            );
            if ( 1 == $step) {
                $data['platform']     = intval($_REQUEST['platform']);
                $data['payment']      = intval($_REQUEST['payment']);
                $data['shipping']     = intval($_REQUEST['shipping']);
                $data['base_sales']   = floatval($_REQUEST['base_sales']);
                $data['add_time']     = $_SERVER['REQUEST_TIME'];
                foreach ($_REQUEST['maxSales'] as $key=>$val) {
                    if ($val) {
                        $list['position_level'] = $_REQUEST['positionLevel'][$key];
                        $list['min_sales']      = $_REQUEST['minSales'][$key];
                        $list['max_sales']      = $_REQUEST['maxSales'][$key];
                        $list['commission']     = $_REQUEST['commission'][$key];
                        $dataList[] = array_merge($data,$list);
                    }else continue;
                }
                if(!$mHrm->commissionControl($dataList,'add')){
                    $res['req_msg'] = true;
                    $res['message'] = '添加失败';
                }else{
                    $res['code'] = true;
                    $this->assign('commission_key',$data['add_time']);
                    $this->assign('step',2);
                    $this->assign('title','绑定提成模块');
                }
            } elseif ( 2 == $step) {
                $commissionKey = I('request.commission_key','');
                if ($commissionKey) {
                    if ('staff' == $_REQUEST['subject']) {
                        $staff = $_REQUEST['staff'];
                        foreach ( $staff as $key=>&$val) {
                            $data[] = array(
                                'subject'        => 'staff',
                                'value'          => $val['staff_id'],
                                'name'           => $val['staff_name'],
                                'bind_time'      => $_SERVER['REQUEST_TIME'],
                                'commission_key' => $commissionKey,
                            );
                        }
                        $code = $mHrm->bindCommission($data,'addAll');
                    }else{
                        $data = array(
                            'subject'        => $_REQUEST['subject'],
                            'value'          => $_REQUEST['value'],
                            'name'           => $_REQUEST['name'],
                            'bind_time'      => $_SERVER['REQUEST_TIME'],
                            'commission_key' => $_REQUEST['commission_key'],
                        );
                            $code = $mHrm->bindCommission($data,'add');
                    }
                    if ($code) {
                        $res['code'] = true;
                        $commissionList = $mHrm->commissionList();
                        $this->assign('commission',$commissionList);
                    }else{
                        $res['message'] = '绑定失败';
                    }
                    $this->assign('resource',$this->fetch('commissionList'));
                }
            }

        }elseif('edit' == $b){

        }
        $res['main'] = $this->fetch('commissionSite');
        return $this->ajaxReturn($res,'JSON');
    }

    //查看提成设置
    public function viewCommissionSite(){
        $commissionId = intval($_REQUEST['commission_id']);
        $commissionSite = D('Hrm')->commissionSite($commissionId);

        $this->assign('commisstion_site',$commissionSite);
        $res['main']->$this->fetch('commisstionSite');
        return $this->ajaxReturn($res);
    }

    /*提成管理导航*/
    public function navigation(){
        $hrm = D('hrm');
        $act = I('get.act','add');
        $res['act'] = $act;
        switch ($act) {
        case 'model' :
            $this->assign('commission',$hrm->commissionTemplet('',$category));
            $res['main'] = $this->fetch('commissionTemplet');
            break;
        case 'list' :
            $category = I('get.category','complate');
            $this->assign('commission',$hrm->commissionList());
            $this->assign('category',$category);
            $res['main'] = $this->fetch('commissionList');
            break;
        }
        return $this->ajaxReturn($res);
    }
}
?>
