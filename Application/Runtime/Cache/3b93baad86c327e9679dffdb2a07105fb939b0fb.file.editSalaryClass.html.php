<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 15:41:22
         compiled from ".\Application\Home\View\Salary\editSalaryClass.html" */ ?>
<?php /*%%SmartyHeaderCode:21385551cf759dd40a3-24134934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b93baad86c327e9679dffdb2a07105fb939b0fb' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\editSalaryClass.html',
      1 => 1428046738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21385551cf759dd40a3-24134934',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551cf759e11134_29911584',
  'variables' => 
  array (
    'url' => 0,
    'info' => 0,
    'item_list' => 0,
    'val' => 0,
    'role_list' => 0,
    'staff_list' => 0,
    'k' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551cf759e11134_29911584')) {function content_551cf759e11134_29911584($_smarty_tpl) {?><form name="itemForm" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/editSalaryClass" method="POST" onsubmit="return addSalaryClass(this)">
  <table class="form single" style="width:100%">
    <caption>修改工资套账设置 <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/salaryClass">返回套账列表</a></caption>
    <tr>
      <th width="10%">套账名称</th>
      <td>
        <input type="text" name="class_name" required onkeyup="$(this).val($.trim($(this).val()));" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['class_name'];?>
"/>
      </td>
    </tr>
    <tr>
      <th>基本工资</th>
      <td>
        <input type="number" name="base_salary" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['base_salary'];?>
" required />
      </td>
    </tr>
    <tr>
      <th>工资项</th>
      <td>
        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
        <label>
          <input type="checkbox" name="item_list[]"
          value="<?php echo $_smarty_tpl->tpl_vars['val']->value['item_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value['editable']==0) {?>checked onclick="return false"<?php }?>
          <?php if (in_array($_smarty_tpl->tpl_vars['val']->value['item_id'],$_smarty_tpl->tpl_vars['info']->value['item_list'])) {?>checked<?php }?>
          /> <?php echo $_smarty_tpl->tpl_vars['val']->value['item_name'];?>

        </label>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <th>人员选择</th>
      <td>
        <label><input type="radio" name="type" value="0" <?php if ($_smarty_tpl->tpl_vars['info']->value['type']==0) {?>checked<?php }?>
          onclick="switchTr(this)" /> 部门所有用户调用</label>
        <label><input type="radio" name="type" value="1"
          <?php if ($_smarty_tpl->tpl_vars['info']->value['type']==1) {?>checked<?php }?> onclick="switchTr(this)"
          /> 选择调用用户</label>
      </td>
    </tr>
    <tr>
      <th></th>
      <td >
        <table style="width:100%">
          <tr id="roleSelect" style="<?php if ($_smarty_tpl->tpl_vars['info']->value['type']==1) {?>display:none<?php }?>">
            <td>
              <select name="role_id" id="role_id" onchange="getStaffForSalaryClass(this)">
                <option value="0">未分配部门</option>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['role_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value['role_id']==$_smarty_tpl->tpl_vars['info']->value['role_id']) {?>selected<?php }?>>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</option>
                <?php } ?>
              </select>
              <span class="remind"> 如果添加了员工，部门的选择将无效。</span>
            </td>
          </tr>
          <tr style="<?php if ($_smarty_tpl->tpl_vars['info']->value['type']==0) {?>display:none<?php }?>" id="staffSelect">
            <td>
              <select name="participantSel" style="width:168px;" onchange="addChecked(this)">
                <option value="0">选择员工</option>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['staff_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
                <?php } ?>
              </select>
              <div class="item-div" id="participantField"></div>
            </td>
          </tr> 
        </table>
      </td>
    </tr>
    <tr>
      <th></th>
      <td>
        <input type="hidden" name="behave" value="save"/>
        <input type="hidden" name="class_id" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['class_id'];?>
"/>
        <div id="staff_list" style="display:none"></div>
        <input type="submit" class="btn btn-primary btn-small" value="修改" />
      </td>
    </tr>
  </table>
</form>
<?php }} ?>
