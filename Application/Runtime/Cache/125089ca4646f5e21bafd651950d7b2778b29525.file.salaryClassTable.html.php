<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-17 16:13:08
         compiled from ".\Application\Home\View\Salary\salaryClassTable.html" */ ?>
<?php /*%%SmartyHeaderCode:2205054f7aa340e79a1-89109665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '125089ca4646f5e21bafd651950d7b2778b29525' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\salaryClassTable.html',
      1 => 1426494248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2205054f7aa340e79a1-89109665',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f7aa341dbbe9_73377373',
  'variables' => 
  array (
    'url' => 0,
    'item_list' => 0,
    'val' => 0,
    'participant' => 0,
    'v' => 0,
    'i' => 0,
    'summary' => 0,
    'tdNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f7aa341dbbe9_73377373')) {function content_54f7aa341dbbe9_73377373($_smarty_tpl) {?><form action="<?php echo $_smarty_tpl->tpl_vars['url']->value/'saveSalary';?>
"  method="POST">
<table class="table gridtable table-form" width="100%">
  <tr>
    <th width="5%">员工</th>
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
    <th width="5%"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</th>
    <?php } ?>
    <!--<th>应发提成</th>-->
    <th with="5%">实发提成</th>
    <!--<th with="10%">应发工资</th>-->
    <th with="5%">应扣工资</th>
    <th with="5%">实发工资</th>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['participant']->value) {?>
  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['participant']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['staff_name'];?>
</td>
    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
    <td>
      <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" disabled="true"/>
    </td>
    <?php } ?>
    <!--<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['should_salary'];?>
" disabled="true"></td>-->
    <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['should_dedcut'];?>
" disabled="true"></td>
    <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['actual_salary'];?>
" disabled="true"></td>
  </tr>
  <?php } ?>
  <tr>
    <td>合计</td>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['summary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
    <td><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</td>
    <?php } ?>
    <!--<td><input type="text" value="0.00" disabled="true"></td>-->
  </tr>
  <?php } else { ?>
  <tr>
    <td colspan="<?php echo $_smarty_tpl->tpl_vars['tdNum']->value+4;?>
">没有记录</td>
  </tr>
  <?php }?>
</table>
<table class="table" style="margin-top:-20px;">
  <tr>
    <td style="text-align:right;border-top:0px;">
      <input type="submit" value="保存" class="btn btn-primary"/>
    </td>
  </tr>
</table>
</form>
<?php }} ?>
