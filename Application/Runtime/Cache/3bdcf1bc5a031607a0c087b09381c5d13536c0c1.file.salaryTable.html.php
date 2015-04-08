<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-08 10:49:07
         compiled from ".\Application\Home\View\Salary\salaryTable.html" */ ?>
<?php /*%%SmartyHeaderCode:3237755249723d97013-33848072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bdcf1bc5a031607a0c087b09381c5d13536c0c1' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\salaryTable.html',
      1 => 1426758964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3237755249723d97013-33848072',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'salaryClass' => 0,
    'val' => 0,
    'date' => 0,
    'classTable' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55249723d97014_88382929',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55249723d97014_88382929')) {function content_55249723d97014_88382929($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="pd12px">
  <div>
    <form name="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" method="POST">
      <table class="tool-table" style="width:50%">
        <tr>
          <td>
            <select name="salaryClass" onchange="switchSalaryClass(this)" url=<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
>
              <option value="0">请选择工资套账</option>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['salaryClass']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['class_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['class_name'];?>
</option>
              <?php } ?>
            </select>
          </td>
          <td class="caption">编辑 <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
 月工资表</td>
        </tr> 
      </table>
    </form>
  </div>
  <div id="resource">
    <?php echo $_smarty_tpl->tpl_vars['classTable']->value;?>

  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
