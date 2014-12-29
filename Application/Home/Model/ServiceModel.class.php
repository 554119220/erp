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
    public function _cunstruct(){
    }

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
    public function serviceList($where){
        $mService = M('service');
        $serviceList = $mService->where($where)->getField('service_time,logbook,admin_name');
        if ($serviceList) {
            foreach ($serviceList as &$val) {
                $val['service_time'] = date('Y-m-d H:i',$val['service_time']);
            }
        }

        return $serviceList;
    }
}
