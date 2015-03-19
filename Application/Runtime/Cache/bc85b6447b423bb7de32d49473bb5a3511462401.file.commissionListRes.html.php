<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-16 16:12:07
         compiled from ".\Application\Home\View\Salary\commissionListRes.html" */ ?>
<?php /*%%SmartyHeaderCode:574754f6c320b34a76-92794523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc85b6447b423bb7de32d49473bb5a3511462401' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\commissionListRes.html',
      1 => 1426492798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '574754f6c320b34a76-92794523',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f6c320baeb98_97437203',
  'variables' => 
  array (
    'role_list' => 0,
    'url' => 0,
    'val' => 0,
    'role_id' => 0,
    'role_commission' => 0,
    'commission_list' => 0,
    'role_commission_statistics' => 0,
    'type' => 0,
    'saveUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6c320baeb98_97437203')) {function content_54f6c320baeb98_97437203($_smarty_tpl) {?><div>
  <ol class="breadcrumb" id="breadcrumb" style="margin-bottom:0px;">
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
    <li>
    <span href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/commissionList/type/wait/role_id/<?php echo $_smarty_tpl->tpl_vars['val']->value['role_id'];?>
/from/search"
      <?php if ($_smarty_tpl->tpl_vars['role_id']->value==$_smarty_tpl->tpl_vars['val']->value['role_id']) {?>style="color:#099921"<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</span>
    </li>
    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration']%6==0) {?><br /><?php }?> 
    <?php } ?>
  </ol>
</div>
<table class="table gridtable">
  <caption class="title">平台提成信息</caption>
  <tr>
    <th width="10%">销量总额</th>
    <th width="10%">提成比例</th>
    <th width="10%">计算公式</th>
    <th width="10%">提成金额</th>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['role_commission']->value) {?>
  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_commission']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['final_amount'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['commission_proportion'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['final_amount'];?>
*(<?php echo $_smarty_tpl->tpl_vars['val']->value['commission_proportion'];?>
/100)</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['commission'];?>
</td>
  </tr>
  <?php } ?>
  <?php } else { ?>
  <tr>
    <td colspan="5">没有记录</td>
  </tr>
  <?php }?>
</table>
<table class="table gridtable">
  <tr>
    <td colspan="9" class="remind">
      * 如果没有设置个人的或者职位级别的提成规则，系统默认将平台的提成平均分配给每个员工
    </td>
  </tr>
  <tr>
    <th width="8%">提成者</th>
    <th width="8%">提成金额</th>
    <th width="8%">系数</th>
    <th width="12%">添加时间</th>
    <th width="10%">月销量总额</th>
    <th width="15%">退货金额</th>
    <th width="8%">订单数</th>
    <th width="8%">审核进展</th>
    <th width="10%">操作</th>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['commission_list']->value) {?>
  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commission_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
  <!--<tr><td colspan="2"><?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</td></tr>-->
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['staff_name'];?>
</td>
    <!--<td><?php echo $_smarty_tpl->tpl_vars['val']->value['participant'];?>
</td>-->
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['commission'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['commission_proportion'];?>
%</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['final_amount'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['status'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['order_amount'];?>
</td>
    <td></td>
    <!--<td><?php echo $_smarty_tpl->tpl_vars['val']->value['final_amount'];?>
*(<?php echo $_smarty_tpl->tpl_vars['val']->value['commission_proportion'];?>
/100)</td>-->
    <td>
      <input type="button" class="link-btn" value="标记已发"/>
    </td>
  </tr>
  <?php } ?>
  <tr>
    <td>统计</td>
    <td colspan="8"><?php echo $_smarty_tpl->tpl_vars['role_commission_statistics']->value;?>
</td>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['type']->value=='wait') {?>
  <tr><td colspan="9" style="text-align:right;">
      <a href="<?php echo $_smarty_tpl->tpl_vars['saveUrl']->value;?>
" class="btn btn-primary">保存</a>
  </td></tr>
  <?php }?>
  <?php } else { ?>
  <tr><td colspan="9">没有提成记录</td></tr>
  <?php }?>
</table>

<?php echo '<script'; ?>
 language="javascript" type="text/javascript">
  var olObj  = document.getElementById('breadcrumb');
  aList     = olObj.getElementsByTagName('span');
  for (var i = 0; i < aList.length; i++) {
    aList[i].onclick = function(){
      var url = this.getAttribute('href');
      $.ajax({
type:'get',
async:'false',
url:url,
success:function(res){
$('#commissionListRes').html(res.main);
return false;
},
dataType:'JSON'
});
}
}
<?php echo '</script'; ?>
>

<?php }} ?>
