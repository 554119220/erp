<?php
/**
 * 地区：省市区
 */
function regionList($region_type = 1, $parent = '') {
    $Region = M('region');
    $data['region_type'] = $region_type;
    if ($parent) {
        $data['parent_id'] = $parent;
    }
    return $Region->where($data)->getField('region_id,region_name');
}

/*
 * 将管理员的user_id提取到一个数组中
 * return array
 * */
function get_admin_id_list($adminList){
    $adminIdList = array();
    if ($adminList) {
        foreach ($adminList as &$val) {
            $adminIdList[] = $val['user_id']; 
        }
        return $adminIdList;
    }else{
        return null;
    }
}

/*计算时间差*/
function time_diff($diff){
    $date             = floor($diff/86400);
    $hour             = floor($diff%86400/3600);
    $minute           = floor($diff%86400/60);
    $second           = floor($diff%86400%60);

    return array('day'=>$date,'hour'=>$hour,'minute'=>$minute,'second'=>$second);
}

/*
 * 返回日期
 *@desc 年月周日
 *@data 日期
 *@format 0(linux) 1(yyyy-mm-dd h:i:s) 
 */
function get_date($desc,$date,$format=1){
    if ($desc) {
        switch($desc){
        case 'yesterday'://昨天
            $start_time = strtotime(date('Y-m-d 00:00:00',$_SERVER['REQUEST_TIME']))-24*3600;
        $end_time   = strtotime(date('Y-m-d 23:59:59',$_SERVER['REQUEST_TIME']))-24*3600;
            break;
        case 'today'://今天
            $start_time = strtotime(date('Y-m-d 00:00:00',$_SERVER['REQUEST_TIME']));
            $end_time   = strtotime(date('Y-m-d 23:59:59',$_SERVER['REQUEST_TIME']));
            break;
        case 'week':
            break;
        case 'month'://本月
            $start_time = strtotime(date('Y-m-01 00:00:00', $_SERVER['REQUEST_TIME']));
            $end_time   = strtotime(date('Y-m-t 23:59:59', $_SERVER['REQUEST_TIME']));
            break;
        case 'year':
            break;
        }
        return array('start_time'=>$start_time,'end_time'=>$end_time);
    }elseif($date){
        $time = !$format ? strtotime($date) : date('Y-m-d h:i:s',$date);
        return $time;
    }
    return null;
}

/*权限判断*/
function admin_priv($priv_str, $msg_type='' , $msg_output=true) {
    if ($_SESSION['action_list'] == 'all') {
        return true;
    }

    if (strpos(',' . $_SESSION['action_list'] . ',', ',' . $priv_str . ',') === false) {
        return false;
    } else {
        return true;
    }
}
