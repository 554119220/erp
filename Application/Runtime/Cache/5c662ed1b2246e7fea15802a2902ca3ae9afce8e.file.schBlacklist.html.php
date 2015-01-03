<?php /* Smarty version Smarty-3.1.6, created on 2015-01-03 17:39:28
         compiled from "./Application/Home/View\Usersmanage\schBlacklist.html" */ ?>
<?php /*%%SmartyHeaderCode:16954a646388583b5-62382497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c662ed1b2246e7fea15802a2902ca3ae9afce8e' => 
    array (
      0 => './Application/Home/View\\Usersmanage\\schBlacklist.html',
      1 => 1420277327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16954a646388583b5-62382497',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_54a64638cdfe6',
  'variables' => 
  array (
    'blacklist' => 0,
    'val' => 0,
    'blackstatus' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a64638cdfe6')) {function content_54a64638cdfe6($_smarty_tpl) {?><table cellspacing="0" cellpadding="0" width="100%" class="wu_table_list rb_border wu_rb_border tr_hover" id="blacklist_table">
  <tr>
    <th width="10%">姓名</th>
    <th width="10%">所属客服</th>
    <th width="15%">理由</th>
    <th width="10%">谁拉进的</th>
    <th width="20%">具体原因</th>
    <th width="15%">拉黑时间</th>
    <th width="10%">操作</th>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['blacklist']->value!=''){?>
  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blacklist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['admin_name'];?>
</td>
    <td><?php if ($_smarty_tpl->tpl_vars['val']->value['type_name']!=''){?><?php echo $_smarty_tpl->tpl_vars['val']->value['type_name'];?>
<?php }else{ ?>没理由<?php }?></td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['operator_in'];?>
</td>
    <td style="text-align:left;padding-left:6px;"><?php if ($_smarty_tpl->tpl_vars['val']->value['reason']){?><?php echo $_smarty_tpl->tpl_vars['val']->value['reason'];?>
<?php }else{ ?>无<?php }?></td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['in_time'];?>
</td>
    <td>
      <?php if ($_smarty_tpl->tpl_vars['blackstatus']->value==2){?>
      <button class="btn_new" onclick="moveOutBlack(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
',this)">移出黑名单</button>
      <?php }elseif($_smarty_tpl->tpl_vars['blackstatus']->value==0){?>
      <button class="btn_new" onclick="checkBlack(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
',this,2)">审核</button>&nbsp;|&nbsp;
      <button class="btn_new" onclick="checkBlack(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
',this,1)">撤消</button>
      <?php }?>
    </td>
  </tr>
  <?php } ?>
  <?php }else{ ?>
  <tr><td colspan="8" align="center">没有黑名单记录</td></tr>
  <?php }?>
</table>
<div class="bottom_tip" id="bottom_tip"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
<?php }} ?>