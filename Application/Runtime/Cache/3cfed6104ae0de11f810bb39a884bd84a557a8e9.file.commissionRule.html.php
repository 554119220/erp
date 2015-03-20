<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-20 08:37:38
         compiled from ".\Application\Home\View\Salary\commissionRule.html" */ ?>
<?php /*%%SmartyHeaderCode:2162854f6c8ba5f5e11-11487839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cfed6104ae0de11f810bb39a884bd84a557a8e9' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\commissionRule.html',
      1 => 1426758964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2162854f6c8ba5f5e11-11487839',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f6c8ba764173_91677561',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'role_list' => 0,
    'val' => 0,
    'group_list' => 0,
    'k' => 0,
    'staff_list' => 0,
    'assignParameter' => 0,
    'ke' => 0,
    'v' => 0,
    'commission_rule' => 0,
    'p' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6c8ba764173_91677561')) {function content_54f6c8ba764173_91677561($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="pd12px">
  <div>
    <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/commissionRule/" name="ruleForm" >
      <table style="width:100%;" class="tool-table">
        <tr>
          <td style="font-size:16px;">提成规则列表</td>
          <td width="8px;"></td>
          <td>
            <select name="role_id">
              <option value="0">部门</option>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</option>
              <?php } ?>
            </select>
          </td>
          <td>
            <select name="group_id">
              <option value="0">小组</option>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
              <?php } ?>
            </select>
          </td>
          <td>
            <select name="staff_id">
              <option value="0">员工</option>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['staff_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['staff_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['staff_name'];?>
</option>
              <?php } ?>
            </select>
          </td>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['ke'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['assignParameter']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['ke']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
          <td>
            <select name="<?php echo $_smarty_tpl->tpl_vars['ke']->value;?>
">
              <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['val']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
              <?php } ?>
            </select>
          </td>
          <?php } ?>
          <td>
            <button type="submit">搜索</button>
          </td>
        </table>
      </tr>
    </form>
  </div>
  <div id="source">
    <table class="table gridtable" >
      <tr>
        <th width="12%">参与者</th>
        <th width="10%">备注</th>
        <th width="5%">保底</th>
        <th width="10%">购买平台</th>
        <th width="9%">配送方式</th>
        <th width="8%">基数</th>
        <th width="6%">类型</th>
        <th width="8%">下限</th>
        <th width="8%">上限</th>
        <th width="6%">比例</th>
        <th width="8%">添加人</th>
        <th width="10%">添加时间</th>
        <th width="10%">操作</th>
      </tr>
      <?php if ($_smarty_tpl->tpl_vars['commission_rule']->value) {?>
      <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commission_rule']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
      <tr>
        <td>
          <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['val']->value['participant_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?> <?php echo $_smarty_tpl->tpl_vars['p']->value;?>
 <?php } ?>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['rule_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['base_sales'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['platform'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['shipping_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['cardinality'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['proportion_type'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['min_sales'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['max_sales'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['commission'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['add_admin'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
        <td>
          <input type="button" class="btn-link" value="修改"
          onclick="editCommissionRule(<?php echo $_smarty_tpl->tpl_vars['val']->value['rule_id'];?>
)"/>
        </td>
      </tr>
      <?php } ?>
      <?php } else { ?>
      <tr>
        <td colspan="13">没有设置提成规则</td>
      </tr>
      <?php }?>
    </table>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
