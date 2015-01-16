<?php /* Smarty version Smarty-3.1.6, created on 2015-01-16 09:19:52
         compiled from "./Application/Home/View\Servicemanage\serviceSearch.html" */ ?>
<?php /*%%SmartyHeaderCode:2402454b8673881b323-17136717%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02a4e6b4bb99efc5c2da66b38b460fc40d15a52a' => 
    array (
      0 => './Application/Home/View\\Servicemanage\\serviceSearch.html',
      1 => 1419990406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2402454b8673881b323-17136717',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'manage' => 0,
    'service_list' => 0,
    'val' => 0,
    'url' => 0,
    'role_id' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_54b8673894c5f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b8673894c5f')) {function content_54b8673894c5f($_smarty_tpl) {?><table border="0" cellpadding="0" cellspacing="0" class="wu_table_list rb_border wu_rb_border tr_hover" width="100%">
  <tr>
    <th width="10%">顾客姓名</th>
    <th width="10%">客服</th>
    <th width="50%">过程记录</th>
    <th width="10%">通话录音</th>
    <th width="20%">服务时间</th>
    <?php if ($_smarty_tpl->tpl_vars['manage']->value){?>
    <th>操作</th>
    <?php }?>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['service_list']->value){?>
  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['service_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?> 
  <tr>
    <td ><?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['admin_name'];?>
</td>
    <td style="padding-left:8px;text-align:left;"><?php echo $_smarty_tpl->tpl_vars['val']->value['logbook'];?>
</td>
    <td onclick="showRecList(<?php echo $_smarty_tpl->tpl_vars['val']->value['service_id'];?>
)" style="cursor:pointer">点击查看</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['service_time'];?>
</td>
    <?php if ($_smarty_tpl->tpl_vars['manage']->value){?>
    <td align="center">
      <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&d=del"><img src="images/no.gif" alt="删除" title="删除"></a>
      <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&d=upd"><img src="images/edit.gif" alt="修改" title="修改"></a>
    </td>
    <?php }?>
  </tr>
  <?php } ?>
  <?php }else{ ?>
  <tr>
    <td colspan="<?php if ($_smarty_tpl->tpl_vars['role_id']->value==5){?>6<?php }else{ ?>5<?php }?>">没有服务记录</td>
  </tr>
  <?php }?>
</table>
<div class="bottom_tip page" id="pageDiv">
  <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

</div> 
<?php }} ?>