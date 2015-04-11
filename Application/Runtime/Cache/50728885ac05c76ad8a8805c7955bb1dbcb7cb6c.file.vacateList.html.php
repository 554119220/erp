<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-11 09:54:08
         compiled from ".\Application\Home\View\Checkingin\vacateList.html" */ ?>
<?php /*%%SmartyHeaderCode:292235524dcd094c5f6-57192012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50728885ac05c76ad8a8805c7955bb1dbcb7cb6c' => 
    array (
      0 => '.\\Application\\Home\\View\\Checkingin\\vacateList.html',
      1 => 1428717044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292235524dcd094c5f6-57192012',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5524dcd0a7d8c5_75811757',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'title' => 0,
    'dataUrl' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524dcd0a7d8c5_75811757')) {function content_5524dcd0a7d8c5_75811757($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<!--标签切换-->
<div id="resource" class="wd750 pd12px">
  <div class="bootstrap-table-title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 </div>
  <table data-toggle="table" data-url="<?php echo $_smarty_tpl->tpl_vars['dataUrl']->value;?>
" data-search="true" data-height="699" data-show-refresh="true" data-show-toggle="true" data-pagination="true">
    <thead>
      <tr>
        <th data-field="staff_name">申请人</th>
        <th data-field="type_name">类型</th>
        <th data-field="from_to">起止时间</th>
        <th data-field="date">时长</th>
        <th data-field="reason">原因</th>
        <th data-field="checker">审批人</th>
        <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">
          操作</th>
      </tr>
    </thead>
  </table>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php echo '<script'; ?>
>
  function operateFormatter(value, row, index) {
    return [
    '<a class="edit ml10" href="/thinkphp/index.php/home/checkingin/editVacate/check_id/'
      +row.check_id+'" title="修改">',
      '<i class="glyphicon glyphicon-edit"></i>',
      '</a>',
    '&nbsp;&nbsp;<a class="remove ml10" href="javascript:void(0)" title="删除">',
                '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }
<?php echo '</script'; ?>
>
<?php }} ?>
