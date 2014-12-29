<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Class UsersassignController
 * @author nixus
 */
class UsersassignController extends PublicController {
    /**
     * 添加新顾客
     *
     * @return array 
     */
    public function addUsers() {
        $this->assign('role_list',     $this->userPlatformOwn());
        $this->assign('province_list', $this->regionList());
        $this->assign('from_where',    $this->userSource());
        $this->assign('customer_type', $this->userBuyPower());
        $this->assign('effects',       $this->effectsList());
        $this->assign('character',     $this->userCharacter());
        $this->assign('income_list',   $this->userIncome());
        $this->assign('disease',       $this->userDisease());
        $this->assign('action_url',    U('saveUserInfo', '', ''));
        $result['main'] = $this->fetch('addUsers');
        $this->ajaxReturn($result, 'JSON');
        return;
    }

    /**
     * 保存顾客信息
     *
     * @return boolean
     */
    public function saveUserInfo() {
        $msg = array ('req_msg' => true, 'timeout' => 2000);
        $data       = json_decode($_REQUEST['data'], true);
        $characters = json_decode($_REQUEST['character'], true);
        $disease    = json_decode($_REQUEST['disease'], true);
        $social     = json_decode($_REQUEST['social'], true);
        $data['characters'] = implode(',', $characters);
        $data['disease']    = implode(',', $disease);
        // 保存顾客资料
        $User = M('users');
        $User->create($data);
        $User->add_time   = time();
        $userId = $User->add();
        if (!$userId) {
            $msg['message'] = '顾客添加失败！';
            $this->ajaxReturn($msg, 'JSON');
            return false;
        }
        // 保存地址信息
        $Address = M('user_address');
        $Address->create($data);
        $Address->user_id = $userId;
        $addressId = $Address->add();
        if (!$addressId) {
            $msg['message'] = '顾客地址信息添加失败！';
            $this->ajaxReturn($msg, 'JSON');
            return false;
        }
        // 保存社会关系
        $Relation = M('user_relation');
        foreach ($social as $key=>$val){
            if (!is_numeric($key)) {
                continue;
            }
            $Relation->create($val);
            $Relation->add_age_year = date('Y');
            $Relation->rela_user_id = $userId;
            $relaId = $Relation->add();
            if (!$relaId) {
                $msg['message'] = '顾客社会关系信息添加失败！';
                $this->ajaxReturn($msg, 'JSON');
                return false;
            }
        }
        $msg['message'] = '顾客添加成功！';
        $msg['redirectURL'] = U('addUsers', '', '');
        $this->ajaxReturn($msg, 'JSON');
        return;
    }

    /**
     * 顾客平台归属
     *
     * @return array 
     */
    private function userPlatformOwn() {
        $User = D('Usersassign');
        return $User->userPlatformOwn();
    }

    /**
     * 顾客来源
     *
     * @return array 
     */
    private function userSource() {
        return M('from_where')->where('available>0')->order('sort')->getField('from_id,`from`');
    }

    /**
     * 顾客购买力
     *
     * @return array 
     */
    private function userBuyPower() {
        return M('customer_type')->where('available=1')->order('sort')->getField('type_id,type_name');
    }

    /**
     * 功效列表
     *
     * @return array 
     */
    private function effectsList() {
        return M('effects')->where('available=1')->order('sort')->getField('eff_id,eff_name');
    }
    /**
     * 顾客性格
     *
     * @return array 
     */
    private function userCharacter() {
        return M('character')->where('available=1')->order('sort')->getField('character_id,characters');
    }
    /**
     * 经济来源
     *
     * @return array 
     */
    private function userIncome() {
        return M('income')->where('available=1')->order('sort')->getField('income_id,income');
    }
    
    /**
     * 疾病列表
     *
     * @return array 
     */
    private function userDisease() {
        return M('disease')->where('available=1')->order('common_rate DESC')->getField('disease_id,disease,common_rate');
    }
}
