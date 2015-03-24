<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-20 16:29:56
         compiled from ".\Application\Home\View\Salary\payoff.html" */ ?>
<?php /*%%SmartyHeaderCode:2561554f94e5ca037a2-64163463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16d38204bc0c3b84b6c6e2b1b7ae9e97c0569ded' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\payoff.html',
      1 => 1426840188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2561554f94e5ca037a2-64163463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f94e5caba958_63386510',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'title' => 0,
    'role_list' => 0,
    'val' => 0,
    'item_list' => 0,
    'salary_list' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f94e5caba958_63386510')) {function content_54f94e5caba958_63386510($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="pd12px">
  <div id="schedule">
  </div>
  <div>
    <form name="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" method="POST">
      <table class="tool-table" style="width:80%">
        <tr>
          <td class="caption"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</td>
          <td>
            <input type="text" name="yearMonth"
             onfocus="WdatePicker({dateFmt:'yyyy-M'})" placeholder="年月"/>
          </td>
          <td>
            <select name="role_id" style="height:28px;">
              <option value="0">选择部门</option>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</option>
              <?php } ?>
            </select>
          </td>
          <td>
           <select name="group_id">
             <option value="0">请选择小组</option>
           </select> 
          </td>
          <td>
            <input type="text" name="staff_name" placeholder="员工姓名"/>
          </td>
          <td>
           <input type="submit" value="搜索"/> 
          </td>
        </tr> 
      </table>
    </form>
  </div>
  <div id="resource">
    <table class="table gridtable">
      <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
      <th><?php echo $_smarty_tpl->tpl_vars['val']->value['item_name'];?>
</th>
      <?php } ?>
      <th>应发提成</th>
      <th>实发提成</th>
      <th>应发工资</th>
      <th>应扣工发</th>
      <th>实发工资</th>
      <?php if ($_smarty_tpl->tpl_vars['salary_list']->value) {?>
      <?php } else { ?>
      <?php }?>
    </table>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
