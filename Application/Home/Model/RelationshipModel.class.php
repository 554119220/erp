<?php
/*=============================================================================
#     FileName: RelationshipModel.class.php
#         Desc: 顾客关系模型
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-12-13 16:01:07
#      History:
=============================================================================*/
namespace Home\Model;
use Think\Model\RelationModel;
use Think\Model;

class RelationshipModel extends Model{
    public function _initialize(){
        
    }

    //家庭
    function familyList ($familyId){
        $mFaminly = M('family');
        $familyList = $mFaminly->where("family_id=$familyId")->select();
        return $familyList;
    }

    //家庭成员
    public function familyMember($familyId){
        $mFaminlyMember   = M('family_member');
        $familyMemberList = $mFaminlyMember->where("family_id=$familyId")->select();
        $m = new Model();

        $sql_select = 'SELECT u.user_id,u.user_name,u.mobile_phone,u.home_phone,g.grade_name,g.grade_id,f.family_name,m.input_time,m.real_parent FROM '.__USER_FAMILY_MEMBER__
            .' AS m LEFT JOIN '.__USERS__
            .' AS u ON u.user_id=m.user_id LEFT JOIN '.__USER_FAMILY_GRADE__
            .' AS g ON m.grade_id=g.grade_id LEFT JOIN '
            .__USER_FAMILY__.' AS f ON u.family_id=f.family_id '
            ."WHERE m.family_id=$familyId AND m.status=0 AND g.type=0";

        $family_users = $m->query($sql_select);

        $family = array('family_name'=>$family_users[0]['family_name'],'family_total'=>count($family_users));

        for($i = 0; $i < count($family_users); $i++) {
            $sql_select = 'SELECT COUNT(*) FROM '.__OTHER_EXAMINATION_TEST__.
                " WHERE user_id={$family_users[$i]['user_id']}";
            $family_users[$i]['healthy_file'] = $m->query($sql_select);
            $family_users[$i]['input_time'] = date('Y-m-d',$family_users[$i]['input_time']); 
        }

        $familyMemberList = array('family_users'=>$family_users);
        return $familyMemberList;
    }

    //朋友
    function friendsList($userId){
        $mRelationship = M('user_family_member');
        $mUser         = M('users');
        $familyId      = $mUser->where("user_id=$userId")->getField('family_id');
        if ($familyId) {
            $field   = 'u.user_id,u.family_id,r.input_time,u.user_name,u.mobile_phone';
            $friends = $mRelationship
                ->alias('r')
                ->field($field)
                ->join(array('left join __USERS__ u ON u.user_id=r.user_id'))
                ->where("r.grade_id=101 AND r.family_id=$familyId")->select();
            if ($friends) {
                foreach ($friends as &$val) {
                    $val['add_time'] = date('Y-m-d H:i',$val['input_time']);
                }
            }
        }
        return $friends;
    }
}

?>
