<?php
namespace Home\Model;
use Think\Model;

class CheckinginModel extends PublicModel{
    /*添加请假申请*/
    public function applyVacate($data){
        return M('oa_checkingin')->filter('strip_tags')->add($data);
    }

    /*考勤类型列表*/
    public function typeList($where='',$list=false,$field='*'){
        if ($list) {
            $where = $where ? $where.' AND c.parent_id<>0':'c.parent_id<>0';
            $field = 'c.type_id,c.type_name,b.type_name AS parent_id,c.salary_rule';
            $res =  M('oa_checkingin_type')->alias('c')
                ->join('LEFT JOIN __OA_CHECKINGIN_TYPE__ b ON c.parent_id=b.type_id')
                ->field($field)->where($where)->select();
            $operation = array('扣','加','乘','除');
            $ruleItem = array('固定值','每天工资的百分之','天数*每天工资的百分之');
            if ($res) {
                foreach ($res as &$v) {
                    if ($v['salary_rule']) {
                        $rule = explode(' ',$v['salary_rule']);
                        $v['salary_rule'] = "大于{$rule['0']}次，每次{$operation[$rule[1]]}"
                            .$ruleItem[$rule[2]].$rule[3];
                    }
                }
            }
        }else{
            $res = M('oa_checkingin_type')->field($field)->where($where)->select();
        }
        return $res;
    }

    /*添加考勤类型*/
    public function addCheckinginType($data){
        return M('oa_checkingin_type')->filter('strip_tags')->add($data); 
    }

    //考勤汇总
    public function checkinginList($where='',$field='c.*,t.type_name'){
        $res = M('oa_checkingin')->alias('c')
            ->join(' LEFT JOIN __OA_CHECKINGIN_TYPE__ t ON c.type_id=t.type_id')
            ->field($field)->where($where)->order('c.add_time DESC')->select();
        if ($res) {
            foreach ($res as &$val) {
                $val['add_time']   = date('Y-m-d H:i',$val['add_time']);
                $val['start_time'] = date('Y-m-d H:i',$val['start_time']);
                $val['end_time']   = $val['end_time'] ? date('Y-m-d H:i',$val['end_time']):'-';
                $val['from_to']    = "{$val['start_time']} 到 {$val['end_time']}";

                switch ($val['dateType']) {
                    case 0 : $val['date'] .= '天';break;
                    case 1 : $val['date'] .= '小时';break;
                    case 2 : $val['date'] .= '分钟';break;
                }
            }
            return $res;
        }else{
            return false;
        }
    }

    /*考勤报表 用于工资计算*/
    public function reportCheckingin($reportTime,$where=''){
        $data = M('oa_checkingin_report')->where("report_time=$reportTime $where")->select();
        if (!$data) {
            $beginTime = strtotime(date('Y-m-01',$reportTime));
            $endTime   = strtotime(date('Y-m-t',$reportTime));
            $where     = "start_time BETWEEN $beginTime AND $endTime";
            $fields    = 'sum(dedcut_salary) as dedcut,count(type_id) as times,type_id,staff_id'
                .',staff_name,sum(date) as date,role_id';
            $res = M('oa_checkingin')->field($fields)->where($where)->group('staff_id,type_id')->select();
            $checkingInType = $this->typeList('',false,'type_id,parent_id'); 
            foreach ($checkingInType as $t) {
                if ($t['parent_id'] != 0) {
                    $typeList[$t['parent_id']][] = $t['type_id'];
                }else continue;
            }
            $list = array();
            $data = array();
            //统计并通过公式计算考勤加、扣薪
            foreach ($res as $v) {
                if ($v['type_id'] == 8) {
                    $list[$v['staff_id']]['late_times']  = $v['times']; //迟到次数
                    $list[$v['staff_id']]['dedcut_late'] = $v['dedcut'];//迟到扣款
                }elseif(in_array($v['type_id'],$typeList[1])){
                    //请假
                    $list[$v['staff_id']]['outworking_days'] += $v['date']; //缺勤天数
                    $list[$v['staff_id']]['dedcut_outwork'] = $v['dedcut'];
                }elseif(in_array($v['type_id'],$typeList[2])){
                    //加班
                }
                $list[$v['staff_id']]['staff_name'] = $v['staff_name'];
                $list[$v['staff_id']]['role_id'] = $v['role_id'];
            }

            foreach ($list as $k=>&$v) {
                $v['working_days'] = date('t',$reportTime) - $v['outworking_days']; //出勤天数
                $v['staff_id']     = $k;
                $v['report_time']  = $reportTime;
                $v['add_time']     = $_SERVER['REQUEST_TIME'];
                $data[] = $v;
            }
        }
        return $data;
    }

    //获得已经保存的考勤报表
    public function getCheckinginReport($where){
        $data = M('oa_checkingin_report')->where($where)->select();
        return $data;
    }
}
?>
