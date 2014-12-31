<?php /* Smarty version Smarty-3.1.6, created on 2014-12-31 10:44:43
         compiled from "./Application/Home/View\Servicemanage\service.html" */ ?>
<?php /*%%SmartyHeaderCode:3024654a265abe8b255-35020713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '025bad2198f540605fe0181dedb886ac3da35dd2' => 
    array (
      0 => './Application/Home/View\\Servicemanage\\service.html',
      1 => 1419993783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3024654a265abe8b255-35020713',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_54a265ac03d09',
  'variables' => 
  array (
    'role_list' => 0,
    'val' => 0,
    'group_list' => 0,
    'admin_list' => 0,
    'url' => 0,
    'serviceDiv' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a265ac03d09')) {function content_54a265ac03d09($_smarty_tpl) {?>﻿<div>
  <div class="finder-title">服务记录</div>
  <div id="search_div" class="sch_div">
    <form name="schServiceForm" action="javascript:void(0)" onsubmit="fullSearch(this)">
      <span> 顾客 
        <input type="text" name="user_name" maxlength="6"/>
      </span>
      <span><input name="start" type="date" plactholer="开始时间"/></span>
      <span><input name="end" type="date" placeholder="结束时间"/></span>
      <span>
        <select name="role">
          <option value="0">部门</option>
          <?php if ($_smarty_tpl->tpl_vars['role_list']->value){?>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</option>
          <?php } ?>
          <?php }?>
        </select>
      </span>
      <span>
        <select name="group">
          <option value="0">小组</option>
          <?php if ($_smarty_tpl->tpl_vars['group_list']->value){?>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['group_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['group_name'];?>
</option>
          <?php } ?>
          <?php }?>
        </select>
      </span>
      <span>
        <input type="text" name="keyword" value="" placeholder="客服姓名"/>
      </span>
      <span id="admin"> 客服
        <select name="admin_id">
          <option value=0>不限</option>
          <?php if ($_smarty_tpl->tpl_vars['admin_list']->value){?>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admin_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
</option>
          <?php } ?>
          <?php }?>
        </select>
      </span>
      <input type="hidden" name="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
      <input type="submit" class="input_submits" value="搜索" />
    </form>
  </div>
  <div id="resource"><?php echo $_smarty_tpl->tpl_vars['serviceDiv']->value;?>
 </div>
</div>
<?php }} ?>