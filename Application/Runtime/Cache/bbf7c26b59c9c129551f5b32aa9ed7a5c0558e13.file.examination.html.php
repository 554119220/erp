<?php /* Smarty version Smarty-3.1.6, created on 2014-12-27 10:56:54
         compiled from "./Application/Home/View\Usersmanage\examination.html" */ ?>
<?php /*%%SmartyHeaderCode:24518549ad44940d995-60780675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbf7c26b59c9c129551f5b32aa9ed7a5c0558e13' => 
    array (
      0 => './Application/Home/View\\Usersmanage\\examination.html',
      1 => 1419647160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24518549ad44940d995-60780675',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_549ad449487ab',
  'variables' => 
  array (
    'weight' => 0,
    'val' => 0,
    'blood' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549ad449487ab')) {function content_549ad449487ab($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['weight']->value){?>
<table class="examination" id="table_weight" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <th width="10%">身高</th>
    <th width="10%">体重</th>
    <th width="20%">BMI</th>
    <th width="10%">腰围</th>
    <th width="1%">臀围</th>
    <th width="20%">WHR</th>
    <th width="20%">WHR</th>
    <th width="20%">体检时间</th>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['weight']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['height'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['weight'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['BMI'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['waistline'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['hipline'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['WHR'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
  </tr>
  <?php } ?>
</table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['blood']->value){?>
<div></div>
<table style="width:50%" class="examination" id="table_blood" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <th width="15%">血糖 mmol/L</th>
    <th width="20%">血脂 mmol/L</th>
    <th width="15%">血压 mmHg</th>
    <th width="20%">体检时间</th>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blood']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
  <tr>
    <td width="15%"><?php echo $_smarty_tpl->tpl_vars['val']->value['blood_sugar'];?>
</td>
    <td width="20%"><?php echo $_smarty_tpl->tpl_vars['val']->value['blood_fat'];?>
</td>
    <td width="15%"><?php echo $_smarty_tpl->tpl_vars['val']->value['blood_pressure'];?>
</td>
    <td width="15%"><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
  </tr>
  <?php } ?>
</table>
<?php }?>
<?php }} ?>