<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-13 11:49:37
         compiled from ".\Application\Home\View\Index\left.html" */ ?>
<?php /*%%SmartyHeaderCode:847955025e51d5f577-09318452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83e5f5ea72ef9dd19cfe85d9626954fdd40594e7' => 
    array (
      0 => '.\\Application\\Home\\View\\Index\\left.html',
      1 => 1420797070,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '847955025e51d5f577-09318452',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nav_2nd' => 0,
    'a' => 0,
    'nav_3rd' => 0,
    'e' => 0,
    'l' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55025e520055f4_34816031',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55025e520055f4_34816031')) {function content_55025e520055f4_34816031($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\xampp\\htdocs\\thinkphp\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.replace.php';
?><?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav_2nd']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['a']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
 $_smarty_tpl->tpl_vars['a']->index++;
 $_smarty_tpl->tpl_vars['a']->first = $_smarty_tpl->tpl_vars['a']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['first'] = $_smarty_tpl->tpl_vars['a']->first;
?>
<details class='left-menu'<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['i']['first']) {?> open<?php }?>><!--循环时　加if $smarty.foreach.xx.first 就输出 border-top:0-->
    <summary onclick="showSubMenu(this)"><?php echo $_smarty_tpl->tpl_vars['a']->value['label'];?>
</summary>
    <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nav_3rd']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
 $_smarty_tpl->tpl_vars['e']->value = $_smarty_tpl->tpl_vars['l']->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['a']->value['action']==$_smarty_tpl->tpl_vars['e']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['l']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['index']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['index']['iteration']++;
?>
    <li><a href="http://localhost/thinkphp/index.php/Home/<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['a']->value['action'],'_','');?>
/<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['t']->value['action'],'_','');?>
" title="<?php echo $_smarty_tpl->tpl_vars['t']->value['label'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['label'];?>
</a></li>
    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['index']['iteration']%3==0) {?>
    <?php }?>
    <?php } ?>
    <?php }?>
    <?php } ?>
</details>
<?php } ?>
<?php }} ?>
