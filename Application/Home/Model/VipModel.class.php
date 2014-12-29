<?php
/*=============================================================================
#     FileName: vipModel.class.php
#         Desc:  会员管理
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-12-23 09:27:18
#      History:
=============================================================================*/
namespace Home\Model;
use Think\Model\RelationModel;
use Think\Model;

class VipModel extends Model{
    public function __construct(){
        $mRank    = M('user_rank');
        $mUser    = M('users');
        $mRankLog = M('rank_log');
        $mMemship = M('memship_number');
    }

    //等级列表
    public function rankList($fields){
        $mRank = M('user_rank'); 
        if (empty($fields)) {
            $rankList = $mRank->order('level asc')->select();
        }else{
            $rankList = $mRank->field($fields)->order('level asc')->select();
        }

        return $rankList;
    }

    //无参数
    public function vipList($where,$condition,$page='1',$pageSize=20){
        $m   = new Model();
        $sql = 'SELECT u.user_id,user_name,u.rank_points,u.user_rank,m.card_number,u.birthday FROM '.
            __USERS__.' u LEFT JOIN '.__MEMSHIP_NUMBER__
            ." m ON u.user_id=m.user_id AND m.user_id<>0 WHERE $where ";
        $userList = $m->query($sql);

        if($userList){
            foreach($userList as $val){
                if($val['user_id']){
                    $userIdList[] = $val['user_id'];
                }
            }

            $userIdList = implode("','",$userIdList);
            $sql = 'SELECT user_id,min(add_time) AS earliest_pur,COUNT(*) AS total,sum(final_amount) AS final_amount FROM '.__ORDER_INFO__.
                " WHERE user_id IN('$userIdList') GROUP BY user_id $Sort";
            $orderList = $m->query($sql); 

            foreach ($userList as $key=>$user) {
                foreach ($orderList as &$order) {
                    if($user['user_id'] == $order['user_id']){
                        $order['earliest_pur'] = date('Y-m-d',$order['earliest_pur']);
                        $userList[$key] = array_merge($user,$order);
                    }
                }
            }
            return $userList;
        }else return false;
    }

    //统计会员数量
    function countVips($where){
        $m = new Model();
        $count = M('users')->alias('u')
            ->join(array('LEFT JOIN __MEMSHIP_NUMBER__ m ON u.user_id=m.user_id AND m.user_id<>0'))
            ->where($where)->count();
        return $count;
    }

    //会员卡号
    function memshipNumber($where,$fields=''){
        $whre   .= $where == '' ? 'user_id<>0' : $where;
        $fields .= $fields == '' ? 'card_number' : $fields;
        $memshipNumber = $mMemship->where($where)->select($fields);
        return $memshipNumber;
    }

    //生日提醒
    function vipBirthday(){

    }
}
?>
