<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-23 08:57:06
         compiled from ".\Application\Home\View\Salary\commonCommission.html" */ ?>
<?php /*%%SmartyHeaderCode:25714550bd480aa7d95-72204167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46e898a25d0c223be1c163b1aa3fa188cbd75d4f' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\commonCommission.html',
      1 => 1426842127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25714550bd480aa7d95-72204167',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_550bd480aa7d92_61637732',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'title' => 0,
    'role_list' => 0,
    'v' => 0,
    'thlist' => 0,
    'l' => 0,
    'staff_list' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550bd480aa7d92_61637732')) {function content_550bd480aa7d92_61637732($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="pd12px">
  <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" method="POST" >
    <table class="tool-table" style="width:70%">
      <tr>
        <td class="caption"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</td>
        <td>
          <select name="role_id">
            <option value="0">全部</option>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['role_name'];?>
</option>
            <?php } ?>
          </select>
        </td>
        <td> 员工 </td>
        <td> <input type="text" name="staff_name" value=""/> </td>
        <td> 员工类型</td>
        <td>
          <select name="staff_type">
            <option value="2"></option>
            <option value="2"></option>
            <option value="2"></option>
          </select>
        </td>
        <td>
          <input type="submit" value="搜索" class="b_submit"/>
        </td>
      </tr>
    </table>
  </form>
</div>
<div id="resource">
  <table class='table gridtable' style="width:60%">
    <tr>
      <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['thlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['l']->key;
?>
      <th ><?php echo $_smarty_tpl->tpl_vars['l']->value;?>
</th>
      <?php } ?>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['staff_list']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['staff_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
    <tr>
      <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iterantion'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['staff_name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['role_name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['common_commission'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['start_time'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['admin_id'];?>
</td>
    </tr>
    <?php } ?>
    <?php } else { ?>
    <td colspan="6">没有记录</td>
    <?php }?>
  </table>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
