<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-08 09:51:18
         compiled from ".\Application\Home\View\Public\nav.html" */ ?>
<?php /*%%SmartyHeaderCode:2254155248996501bd2-68177725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c831140cfe63fe9d09f0633358647f28d660d33' => 
    array (
      0 => '.\\Application\\Home\\View\\Public\\nav.html',
      1 => 1426839498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2254155248996501bd2-68177725',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'navlist' => 0,
    'nav' => 0,
    'act' => 0,
    'url' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5524899657bcf7_44623513',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524899657bcf7_44623513')) {function content_5524899657bcf7_44623513($_smarty_tpl) {?><nav class="navbar navbar-default" style="margin-bottom:0px;" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
   </div>
   <div>
     <ul class="nav navbar-nav">
       <?php  $_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nav']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nav']->key => $_smarty_tpl->tpl_vars['nav']->value) {
$_smarty_tpl->tpl_vars['nav']->_loop = true;
?>
       <?php if ($_smarty_tpl->tpl_vars['nav']->value['child']) {?>
       <li class="dropdown <?php if ($_smarty_tpl->tpl_vars['nav']->value['action_code']==$_smarty_tpl->tpl_vars['act']->value) {?>active<?php }?>">
       <a href="#" class="dropdown-toggle " data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['nav']->value['label'];?>
<b class="caret"></b></a>
       <ul class="dropdown-menu">
         <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
         <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['child']->value['action_code'];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value['label'];?>
</a></li>
         <?php } ?>
       </ul>
       </li>
       <?php } else { ?>
       <li <?php if ($_smarty_tpl->tpl_vars['nav']->value['action_code']==$_smarty_tpl->tpl_vars['act']->value) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['nav']->value['action_code'];?>
"><?php echo $_smarty_tpl->tpl_vars['nav']->value['label'];?>
</a></li>
       <?php }?>
       <?php } ?>
     </ul>
   </div>
   </nav>
<?php }} ?>
