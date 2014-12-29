<?php
/*=============================================================================
#     FileName: HealthyModel.class.php
#         Desc: 健康档案 
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-12-16 11:22:57
#      History:
=============================================================================*/
namespace Home\Model;
use Think\Model\RelationModel;
use Think\Model;

class HealthModel extends Model{
    //健康档案
    public function userHealth($userId){
        $where  = " user_id=$userId";
        $mArchive = M('user_archive');
        $archive = array(
            'base_info'   => $this->healthyInfo($userId,'base_info'),
            'lifestyle'   => $this->healthyInfo($userId,'lifestyle'),
            'smoke'       => $this->healthyInfo($userId,'smoke'),
            'sport'       => $this->healthyInfo($userId,'sport'),
            'drink'       => $this->healthyInfo($userId,'drink'),
            'work'        => $this->healthyInfo($userId,'work'),
            'before_case' => $this->healthyInfo($userId,'before_case'),
            'family_case' => $this->healthyInfo($userId,'family_case'),
            'psychology'  => $this->healthyInfo($userId,'psychology'),
            'other'       => $this->healthyInfo($userId,'other'),
            'weight'      => $this->examinationLog($userId,'weight',5),
            'blood'       => $this->examinationLog($userId,'blood',5),
        );

        return $archive;
    }

    //基本信息
    public function baseInfo($userId,$refresh){
        if ($userId && $field) {
            $mArchive = M('user_archive');
            $baseInfo = $mArchive->where("user_id=$userId")->getField('base_info');
        } 

        if ($baseInfo && $refresh) {
            $healthInfo = ''; 
        }

        return $healthInfo;
    }

    //体检
    public function updateExamination($userId,$data,$fields){
        $mExamination = M('examination');
        if ($userId) {
            $msg['code'] = $mExamination->where("user_id=$userId")->data($data)->add();
            if ($msg['code']) {
                $msg['info']    = $this->examinationLog($userId,$fields,5);
                $msg['message'] = '成功保存';
            }else{
                $msg['message'] = '没有修改任何内容';
            }
            return $msg;
        }else{
            return false;
        }
    }

    //顾客体检结果
    public function userExamination($userId,$where){
        $where = "user_id=$userId";
        if ($where) {
            $where .= "examination_name IN($where)";
        }

        $mExamination = M('other_examination_test');
        $inputTime    = $mExamination->where($where)->group('input_time')
            ->order('input_time desc'); //近期体检时间

        $examinationItem = $this->examinationItem();
        $fields          = 'e.examination_name,e.examination_value,e.input_time,a.user_name';

        $examinationRes = $mExamination->alias('e')
            ->join(array('left join __USERS__ u ON u.user_id=e.admin_id'))
            ->where($where)
            ->getField($fields);

        if($examinationRes){
            foreach ($examinationRes as &$res) {
                $res['input_time'] = date('Y-m-d',$res['input_time']);
                foreach ($examinationItem as &$item) {
                    if ($res['examination_name'] == $item['examination_name']) {
                        $res['examination_name'] = $item['descript'];
                    }
                }
            }
        }

        return $examinationRes;
    }

    //生活习惯
    public function lifestyle($fields,$where){
        $Lifestyle = M('lifestyle');
        return $Lifestyle->field($fields)->where($where)->select();
    }

    //体验记录
    public function examinationLog($userId,$fields,$limit=0){
        $fields = empty($fields) ? '*' : $fields;
        $m = M('examination')->where("user_id=$userId AND $fields<>''")->order('add_time desc');
        if($limit){
            $examination = $m->limit("0,$limit")->getField($fields,true);
        }else{
            $examination = $m->getField($fields,true);
        }

        if ($examination) {
            foreach($examination as &$val) {
                $val = unserialize($val);
                $val['add_time'] = date('Y-m-d',$val['add_time']);
            }
        }
        return $examination;
    }

    //疾病
    public function getCase($where) {
        $mSick = M('sickness');
        if ($where) {
            $fields = 's.sickness_id,s.disease,c.class_id,c.class_name';
            $caseList = $mSick->alias('s')
                ->join(array('left join __SICK_CLASS__ c on c.class_id=s.class_id'))
                ->where($where);
        }else{
            $mSickClass = M('sick_class');
            $caseList = $mSickClass->select();
        }
        return $result;
    }

    //病历
    public function historyCase(){
    
    }

    /*健康档案信息*/
    public function healthyInfo($userId,$field,$refresh=false){
        $mArchive = M('user_archive');
        $info = $mArchive->alias('a')
            ->join(array('left join __USERS__ u ON a.user_id=u.user_id'))
            ->field("u.user_name,a.$field")
            ->where("a.user_id=$userId")->select();

        if ($info) {
            $info[$field]              = unserialize($info[0][$field]);
            $info[$field]['user_name'] = $info[0]['user_name'];
            $info                      = $info[$field];
            if ($refresh) {
                $info = $this->refreshHealthInfo($info,'base_info');
            }
        }

        return $info;
    }

    //用语言描述顾客信息
    private function refreshHealthInfo($info,$field){
        switch($field){
            case 'base_info':
                $info['named'] = $info['sex'] == '男' ? '先生' : '女士'; 
                $info = "{$info['user_name']}  {$info['named']}，{$info['base_address']}人".
                    "，{$info['marry']}<br/>是否有定期体检：{$info['regular_check']}<br/>".
                    "多长时间体检一次：{$info['cycle_check']}";
                break;
            case 'work':
                break;
            case 'lifestyle':
                break;
            case 'smoke':
                break;
            case 'drink':
                break;
            case 'sport':
                break;
            case 'psychology':
                break;
            case 'allergy':
                break;
            case 'family_case':
                break;
            case 'before_case':
                break;
            case 'other':
                break;
        }
        return $info;
    }
}
