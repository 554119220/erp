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

class ServiceModel extends Model{
    /*获取服务数量*/
    public function get_service_num($where,$returnArray=false){
        $mService = M('service');
        $serviceNum = $mService->where($where)->order('num DESC')->group('admin_id')->getField('COUNT(service_id) num',$returnArray);
        $serviceNum = $serviceNum ? $serviceNum : 0;
        return $serviceNum;
    }

    //服务类别
    public function serviceClass(){
        $mServiceClass = M('service_class');
        $serviceClass = $mServiceClass->getField('class_id,class',true);
        return $serviceClass;
    }

    //服务方式
    public function serviceManner(){
        $mServiceManner = M('service_manner');
        $serviceManner = $mServiceManner->getField('manner_id,manner',true);
        return $serviceManner;
    }

    /*顾客详情中的服务记录显示*/
    public function userDetailServiceList($where){
        $mService = M('service');
        $serviceList = $mService->where($where)->getField('service_time,logbook,admin_name');
        if ($serviceList) {
            foreach ($serviceList as &$val) {
                $val['service_time'] = date('Y-m-d H:i',$val['service_time']);
            }
        }

        return $serviceList;
    }

    //服务
    public function serviceList($where,$page){
        $mService = M('service');
        $fields = 's.user_name,s.admin_name,s.service_id,s.logbook,'
            .'s.service_time,s.show_sev';
        $serviceList = $mService->alias('s')
            ->join(array('LEFT JOIN __SERVICE__ s ON s.user_id=u.user_id'))
            ->join(array('LEFT JOIN __ADMIN_USER__ a ON s.admin_id=a.user_id'))
            ->field($fields)->where($where)
            ->order('s.service_time DESC')->page($page)->select();
        if ($serviceList) {
            foreach ($serviceList as &$val) {
                $val['service_time'] = date('Y-m-d H:i',$val['service_time']);
            }
        }

        return $serviceList;
    }

    //服务数量
    function serviceCount($where){
        $count = M('service')->alias('s')->where($where)->count();
        return $count;
    }
}
