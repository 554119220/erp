<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-09 11:47:24
         compiled from ".\Application\Home\View\Salary\salaryApproval.html" */ ?>
<?php /*%%SmartyHeaderCode:2997854fd17ccf05378-16003537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0543e4c93d5a4af97e088d386d1ba9909802fa56' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\salaryApproval.html',
      1 => 1423626934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2997854fd17ccf05378-16003537',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'role_list' => 0,
    'admin_list' => 0,
    'val' => 0,
    'v' => 0,
    'approval_list' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fd17cd501bd2_52531383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fd17cd501bd2_52531383')) {function content_54fd17cd501bd2_52531383($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\thinkphp\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="wd750 pd12px">
  <div>
    <form name="addForm" id="addForm" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/addSalaryApproval" method="POST">
      <table class="form single" style="width:100%">
        <caption>工资审批设置 </caption>

        <tr>
          <th>部门</th>
          <td>
            <?php echo smarty_function_html_options(array('name'=>'role_id','options'=>$_smarty_tpl->tpl_vars['role_list']->value,'selected'=>1),$_smarty_tpl);?>

          </td>
          <td>
            <span class="remind">该部门下的所有员工工资都由审批人审批</span>
          </td>
        </tr>
        <tr>
          <th width="10%">审批人</th>
          <td width="5%">
            <select name="admin_id" style="width:250px;" id="dept" class="dept_select"> 
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admin_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <optgroup label="<?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
">
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['val']->value['admin_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</option>
                <?php } ?>
              </optgroup>
              <?php } ?>
            </select>
          </td>
          <td style="text-align:left;"></td>
        </tr>
        <tr>
          <th></th>
          <td colspan="2">
            <input type="submit" class="btn btn-primary btn-small" value="添加" />
          </td>
        </tr>
      </table>
    </form>
    <form id="editForm" action="editSalaryApproval()"></form>
    <table class="table-bordered gridtable erp-table">
      <caption>工资审批设置</caption>
      <tr>
        <th width="10%">部门</th>
        <th width="10%">审批人</th>
        <th width="10%">添加时间</th>
        <th width="10%">操作</th>
      </tr>
      <?php if ($_smarty_tpl->tpl_vars['approval_list']->value) {?>
      <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['approval_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['admin_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
        <td>
          <button class="btn btn-link" onclick="editSalaryApprovalForm(<?php echo $_smarty_tpl->tpl_vars['val']->value['approval_id'];?>
)"
            data-toggle="modal" 
            data-target="#myModal"
            >修改</button>
          <button class="btn btn-link" 
            href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/delSalaryApproval/item_id/<?php echo $_smarty_tpl->tpl_vars['val']->value['approval_id'];?>
" onclick="delSalaryApproval()">
            删除</button>
        </td>
      </tr>
      <?php } ?>
      <?php } else { ?>
      <tr>
        <td colspan="5">还没设置工资审批人~</td>
      </tr>
      <?php }?>
    </table>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php echo '<script'; ?>
 language="javascript" type="text/javascript">
  $(function(){
      $('.dept_select').chosen();
      });
<?php echo '</script'; ?>
>
<?php }} ?>
