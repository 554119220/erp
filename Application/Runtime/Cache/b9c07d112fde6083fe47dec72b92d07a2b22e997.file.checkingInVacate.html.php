<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-11 09:20:22
         compiled from ".\Application\Home\View\Checkingin\checkingInVacate.html" */ ?>
<?php /*%%SmartyHeaderCode:11022552876d6e4e1c5-88547462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9c07d112fde6083fe47dec72b92d07a2b22e997' => 
    array (
      0 => '.\\Application\\Home\\View\\Checkingin\\checkingInVacate.html',
      1 => 1428714795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11022552876d6e4e1c5-88547462',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'dataUrl' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_552876d7000002_71037596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552876d7000002_71037596')) {function content_552876d7000002_71037596($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<!--标签切换-->
<div>
</div>
<div id="resource" class="wd750 pd12px">
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
      </tr>
    </thead>
  </table>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
