<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-08 16:46:58
         compiled from ".\Application\Home\View\Salary\salaryClass.html" */ ?>
<?php /*%%SmartyHeaderCode:152885524eb02895442-08960416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16b188fd0969908c7d6dbe36a7bf0d7f1d630a9b' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\salaryClass.html',
      1 => 1428047475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152885524eb02895442-08960416',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'item_list' => 0,
    'val' => 0,
    'role_list' => 0,
    'staff_list' => 0,
    'k' => 0,
    'v' => 0,
    'salary_class' => 0,
    'i' => 0,
    'p' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5524eb029c6715_09059719',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524eb029c6715_09059719')) {function content_5524eb029c6715_09059719($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="pd12px">
  <div id="resource">
    <input type="hidden" id="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
    <form name="itemForm" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/addSalaryClass" method="POST" onsubmit="return addSalaryClass(this)">
      <table class="form single" style="width:100%">
        <caption>工资套账设置</caption>
        <tr>
          <th width="10%">套账名称</th>
          <td>
            <input type="text" name="class_name" required onkeyup="$(this).val($.trim($(this).val()));"/>
          </td>
        </tr>
        <tr>
          <th>基本工资</th>
          <td><input type="number" name="base_salary" value="0" required /></td>
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
              /> <?php echo $_smarty_tpl->tpl_vars['val']->value['item_name'];?>

            </label>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <th>人员选择</th>
          <td>
            <label><input type="radio" name="type" value="0" checked
              onclick="switchTr(this)" /> 部门所有用户调用</label>
            <label><input type="radio" name="type" value="1" onclick="switchTr(this)"
              /> 选择调用用户</label>
          </td>
        </tr>
        <tr>
          <th></th>
          <td >
            <table style="width:100%">
              <tr id="roleSelect">
                <td>
                  <select name="role_id" id="role_id" onchange="getStaffForSalaryClass(this)">
                    <option value="0">未分配部门</option>
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
                  <span class="remind"> 如果添加了员工，部门的选择将无效。</span>
                </td>
              </tr>
              <tr style="display:none" id="staffSelect">
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
            <div id="staff_list" style="display:none"></div>
            <input type="submit" class="btn btn-primary btn-small" value="保存" />
          </td>
        </tr>
      </table>
    </form>
    <table class="table-bordered gridtable erp-table">
      <caption>工资套账列表</caption>
      <tr>
        <th width="3%"></th>
        <th width="10%">账套名称</th>
        <th width="37%">工资项</th>
        <th width="25%">人员选择</th>
        <th width="8%">添加时间</th>
        <th width="4%">操作</th>
      </tr>
      <?php if ($_smarty_tpl->tpl_vars['salary_class']->value) {?>
      <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['salary_class']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
      <tr>
        <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['class_name'];?>
</td>
        <td>
          <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['val']->value['item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
?> <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 <?php } ?>
        </td>
        <td>
          <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['val']->value['participant']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
echo $_smarty_tpl->tpl_vars['p']->value['staff_name'];?>
 <?php } ?>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
        <td>
          <button class="btn btn-link" behave="edit" 
            onclick="editSalaryItem(this,<?php echo $_smarty_tpl->tpl_vars['val']->value['class_id'];?>
)"> 修改</button>
          <!--<a class="btn btn-link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/delSalaryTz/tz_id/<?php echo $_smarty_tpl->tpl_vars['val']->value['tz_id'];?>
">删除</a>-->
        </td>
      </tr>
      <?php } ?>
      <?php } else { ?>
      <tr>
        <td colspan="6">还没有添加工资套账~</td>
      </tr>
      <?php }?>
    </table>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
