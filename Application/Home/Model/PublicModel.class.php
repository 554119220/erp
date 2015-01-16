<?php
namespace Home\Model;
use Think\Model;
class PublicModel extends Model {
    /**
     * @param mixed 
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 地区列表
     *
     * @return array 
     */
    public function regionList($region_type = 1, $parent = 0) {
        $Region = M('region');
        $data['region_type'] = $region_type;
        $data['parent_id'] = $parent;
        return $Region->where($data)->getField('region_id,region_name');
        //return $Region->where($data)->field('region_id,region_name')->select();
    }
    
    //获取表列名
    public function getTableColumn($table){
        $m = new Model();
        $sql = "SELECT COLUMN_NAME FROM 'information_schema'\.'COLUMNS' where 'TABLE_SCHEMA'='krjs_crm2' and 'TABLE_NAME'='$table' order by COLUMN_NAME";
        return $m->query($sql);
    }
}
