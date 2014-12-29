<?php 
/*=============================================================================
#     FileName: MessageModel.php
#         Desc: report index 
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-11-29 16:45:28
#      History:
=============================================================================*/
namespace Home\Model;
use Think\Model\RelationModel;
use Think\Model;

class ReportModel extends Model{
    public function _cunstruct(){
    }
    //月目标销量
    public function get_saler_target ($start = 0, $end = 0) {
        /*设置SESSION*/
        $monthStart = $start ? $start : strtotime(date('Y-m-01 00:00:00'));
        $monthEnd   = $end   ? $end   : strtotime(date('Y-m-t 23:59:59'));

        $m = M('sales_target'); 
        $field = 'sales_target,admin_id,group_id,role_id';
        $map = array(
            'month_target' => array('between'=>"$monthEnd,$monthEnd"),
        );

        $targetList = $m->where($map)->field($field)->select();

        $target = array ();
        foreach ($targetList as $val){
            $target[$val['admin_id']] = $val;
        }

        return $target;
    }

    function stats_personal_sales ($start, $end, $condition) {
        $mOrder = M('order_info');
        $condition .= " AND order_status IN(1,5) AND shipping_status<>3 AND add_time BETWEEN $start AND $end";
        $field = "sum(final_amount) final_amount,COUNT(*) num,admin_id,admin_name";
        $sales = $mOrder->field($field)->where($condition)->select();

        return $sales;
    }

    //统计订单信息，并显示在首页
    public function get_order_report($where,$time,$group){
        $where .= ' AND order_type IN (4,5,6) AND shipping_status<3';    //不包含静默
        if ($time) {
            extract($time);
            $where .= " AND add_time BETWEEN $start_time AND $end_time";
        }
        $mOrder = M('order_info');
        $orderReport = $mOrder->field('admin_id,SUM(final_amount) amount,COUNT(order_id) num ')->where($where)->group($group)->order('amount DESC')->select();

        if ($orderReport) {
            foreach ($orderReport as &$order) {
                foreach ($order as &$val) {
                    $val = round($val);
                }
            }
        }

        return $orderReport;
    }

    /*销量指标完成进度*/
    public function get_complete_schedule($person,$where){
        $mSale       = M('sales_target');
        $monthTarget = $mSale->where($where)->getField('sales_target');

        if ($monthTarget) {
            $remainDays = date('t')-date('d');
            if ($person['monthOrder']) {
                //当月完成进度
                $monthSchedule = round($person['monthOrder'][0]['amount']/$monthTarget*100,2);
                $todayTarget   = round(($monthTarget-$person['monthOrder'][0]['amount'])/$remainDays,2);
                //当天完成进度
                $todaySchedule = round(intval($person['todayOrder'][0]['amount'])/$todayTarget,2)*100;
                $schedule = array(
                    'todaySchedule' => $todaySchedule,
                    'todayPersent'  => "$todaySchedule%",
                    'todayWidth'    => $todaySchedule > 100 ? '100%' : "$todaySchedule%",
                    'todayData'     => "$todayTarget ",
                    'monthSchedule' => $monthSchedule,
                    'monthPersent'  => "$monthSchedule%",
                    'monthWidth'    => $monthSchedule > 100 ? '100%' : "$monthSchedule%",
                    'monthData'     => "$monthTarget ",
                );
            }else{
                $schedule = array(
                    'todaySchedule' => 0,
                    'todayPersent'  => '0/100',
                    'todayData'     => "0/0",
                    'monthSchedule' => 0,
                    'monthPersent'  => '0/100',
                    'monthData'     => "0/0",
                );
            }
        }else{
            return null;
        }
        return $schedule;
    }
}
