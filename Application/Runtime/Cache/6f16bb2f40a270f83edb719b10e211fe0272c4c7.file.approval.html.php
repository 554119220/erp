<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-11 16:47:52
         compiled from ".\Application\Home\View\Checkingin\approval.html" */ ?>
<?php /*%%SmartyHeaderCode:1476054fcfe4629f631-04942548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f16bb2f40a270f83edb719b10e211fe0272c4c7' => 
    array (
      0 => '.\\Application\\Home\\View\\Checkingin\\approval.html',
      1 => 1426063647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1476054fcfe4629f631-04942548',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fcfe46393878_81693112',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'title' => 0,
    'typeList' => 0,
    'val' => 0,
    'leaveExamine' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fcfe46393878_81693112')) {function content_54fcfe46393878_81693112($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="wd750 pd12px">
  <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" method="POST" onsubmit="return validatValue(this)">
    <table class="form single">
      <caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
      <tr>
        <th>类型</th>
        <td>
          <select name="type" required title="类型">
            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['typeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['type_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['type_name'];?>
</option>
            <?php } ?>
          </select>
          <font class="red">*</font>
        </td>
      </tr>
      <tr>
        <th>审批人</th>
        <td>
          <input name="name" value="" onkeyup="checkZhValue(this)" datatype="Limit" min="1" max="50" msg="1~50字符" type="text" id="title" required>
        </td>
      </tr>
      <tr>
        <th></th>
        <td>
          <!--<input type="submit" name="submit" value="保存"/>-->
          <button type="submit" class="btn btn-primary popover-show" 
            data-toggle="popover" 
            data-content="">
            保存
          </button>
        </td>
      </tr>
    </table>
  </form>
  <table class="gridtable">
    <caption class='title'>请假审批人列表</caption> 
    <tr>
      <th width="2%">序号</th>
      <th width="10%">分类</th>
      <th width="10%">审批人</th>
      <th width="15%">操作</th>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['leaveExamine']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['typeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
    <tr>
      <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['type_name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['admin_name'];?>
</td>
      <td>
        <input type="button" value="修改" onclick="controlVacate(<?php echo $_smarty_tpl->tpl_vars['val']->value['approve_id'];?>
,'edit')"/>
        <input type="button" value="删除" onclick="controlVacate(<?php echo $_smarty_tpl->tpl_vars['val']->value['approve_id'];?>
,'del')"/>
      </td>
    </tr>
    <?php } ?>
    <?php } else { ?>
    <tr>
      <td colspan="4">人事部忙碌中，暂时忘了添加记录</td>
    </tr>
    <?php }?>
  </table>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
