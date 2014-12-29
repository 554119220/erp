<?php /* Smarty version Smarty-3.1.6, created on 2014-12-24 22:54:00
         compiled from "./Application/Home/View\UsersManage\examination.html" */ ?>
<?php /*%%SmartyHeaderCode:12705549ad388f05371-20987100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1edec78bb67717d9afe85ab84a0dc7545c3248c3' => 
    array (
      0 => './Application/Home/View\\UsersManage\\examination.html',
      1 => 1419432478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12705549ad388f05371-20987100',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'weight' => 0,
    'blood' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_549ad38903d09',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549ad38903d09')) {function content_549ad38903d09($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['weight']->value){?>
<table class="examination" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <th width="15%">身高</th>
    <th width="15%">体重</th>
    <th width="20%">BMI</th>
    <th width="15%">腰围</th>
    <th width="15%">臀围</th>
    <th width="20%">WHR</th>
  </tr>
</table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['blood']->value){?>
<div></div>
<table class="examination" cellpadding="0" cellspacing="0" border="0">
  <t>
    <th width="15%">体重</th>
    <th width="20%">BMI</th>
    <th width="15%">腰围</th>
    <th width="15%">臀围</th>
    <th width="20%">WHR</th>
  </tr>
</table>
<?php }?>

<?php }} ?>