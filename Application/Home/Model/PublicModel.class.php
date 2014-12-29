<?php
namespace Home\Model;
use Think\Model;
class PublicModel extends Model {
    /**
     * 地区列表
     *
     * @return array 
     */
    public function regionList($region_type = 1, $parent = '') {
        $Region = M('region');
        $data['region_type'] = $region_type;
        if ($parent) {
            $data['parent_id'] = $parent;
        }
        return $Region->where($data)->getField('region_id,region_name');
    }
    
}
