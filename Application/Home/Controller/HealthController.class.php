<?php
/*=============================================================================
#     FileName: HealthfileController.class.php
#         Desc:  健康档案操作
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-12-20 10:58:33
#      History:
=============================================================================*/
namespace Home\Controller;
use Think\Controller;

class HealthController extends PublicController{

    /*编辑基本信息*/
    public function editBaseInfo(){
        $userId          = I('get.user_id');
        $mArchive        = M('user_archive');
        $baseInfo = array(
            'base_address'  => I('get.born_address',''),
            'marry'         => I('get.marry',''),
            'sex'           => I('get.sex',''),
            'regular_check' => I('get.recheck',''),
            'cycle_check'   => I('get.cycle_check',''),
        );

        $data['base_info'] = serialize($baseInfo);
        $msg = $this->updateHealthy($userId,$data);
        $msg['div_name'] = 'base_info';
        $this->ajaxReturn($msg);
    }

    //体重
    public function editWeight(){
        $mHealth = D('Health');
        $userId  = I('get.user_id');
        $weight = array(
            'weight'    => I('get.weight',''),
            'height'    => I('get.height',''),
            'BMI'       => I('get.BMI',''),
            'waistline' => I('get.waistline',''),
            'hipline'   => I('get.hipline',''),
            'WHR'       => I('get.WHR',''),
            'add_time'  => $_SERVER['REQUEST_TIME'],
        );
        $data = array(
            'weight'   => serialize($weight),
            'add_time' => $_SERVER['REQUEST_TIME'],
            'user_id' => $userId,
        );
        $msg              = $mHealth->updateExamination($userId,$data,'weight');
        $weight           = $mHealth->examinationLog($userId,'weight',5);

        $this->assign('weight',$weight);
        $msg['div_name'] = 'weight';
        $msg['info']     = $this->fetch('Usersmanage/examination');
        $this->ajaxReturn($msg);
    }

    //验血
    public function editBlood(){
        $mHealth = D('Health');
        $userId  = I('get.user_id');
        $blood = array(
            'blood_sugar'    => I('get.blood_sugar',''),
            'blood_fat'      => I('get.blood_fat',''),
            'blood_pressure' => I('get.blood_pressure',''),
            'blood_type'     => I('get.blood_type',''),
            'add_time'       => $_SERVER['REQUEST_TIME'],
        );
        $data = array(
            'blood'    => serialize($blood),
            'add_time' => $_SERVER['REQUEST_TIME'],
            'user_id'  => $userId,
        );
        $msg              = $mHealth->updateExamination($userId,$data,'blood');
        $blood            = $msg['info'];
        $this->assign('blood',$blood);
        $msg['div_name'] = 'blood';
        $msg['info']     = $this->fetch('Usersmanage/examination');
        $this->ajaxReturn($msg);
    }

    //工作情况
    public function editWork(){
        $mArchive = M('user_archive');
    }

    //生活习惯
    public function editLifestyle(){
    }

    //运动
    public function editSport(){
    }

    //吸烟情况
    public function editSmoke(){
    }

    //饮酒情况
    public function editdrink(){
    }

    //过敏史
    public function editAllergy(){
    }

    //家庭病历
    public function editfamilyCase(){
    }

    //既往病历
    public function editBeforCase(){
    }

    //心理
    public function editPsychology(){
    }

    //其它信息
    public function editOther(){
    }

    /*更新健康档案表*/
    public function updateHealthy($userId,$data){
        $mArchive = M('user_archive');
        $msg = array();
        if ($mArchive->where("user_id=$userId")->count()) {
            $msg['code'] = $mArchive->where("user_id=$userId")->save($data);
        }else{
            $data['user_id'] = I('get.user_id',0);
            if ($data['user_id']) {
                $msg['code'] = $mArchive->data($data)->add();
            }
        }

        if ($msg['code']) {
            $mHealthy       = D('Health');
            $msg['info']    = $mHealthy->healthyInfo($userId,'base_info',true);
            $msg['message'] = '成功保存';
        }else{
            $msg['message'] = '没有修改任何内容';
        }

        return $msg;
    }
}

?>
