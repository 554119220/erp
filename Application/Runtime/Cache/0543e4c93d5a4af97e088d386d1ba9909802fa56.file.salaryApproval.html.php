<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-09 17:27:28
         compiled from ".\Application\Home\View\Salary\salaryapproval.html" */ ?>
<?php /*%%SmartyHeaderCode:116655524eb50cdfe69-65827088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0543e4c93d5a4af97e088d386d1ba9909802fa56' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\salaryapproval.html',
      1 => 1428571596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116655524eb50cdfe69-65827088',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5524eb50e11132_36832457',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'role_list' => 0,
    'admin_list' => 0,
    'v' => 0,
    'approval_list' => 0,
    'val' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524eb50e11132_36832457')) {function content_5524eb50e11132_36832457($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\thinkphp\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="wd750 pd12px">
  <div>
    <form name="addForm" id="addForm" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/addSalaryApproval" method="POST">
      <input type="hidden" id="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
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
            <select name="admin_id" id="dept" class="dept_select"> 
              <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admin_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</option>
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
    <table class="table-bordered gridtable erp-table">
      <caption>工资审批设置 </caption>
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
/delSalaryApproval/approval_id/<?php echo $_smarty_tpl->tpl_vars['val']->value['approval_id'];?>
" onclick="delSalaryApproval(this)">
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
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel"> 修改工资审批设置</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/editSalaryApproval" method="POST" id="editForm">
          <table class="form single" style="width:100%;margin-top:0px;">
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
                <select name="admin_id" id="dept" class="dept_select"> 
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admin_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</option>
                  <?php } ?>
                </select>
              </td>
              <td style="text-align:left;"></td>
            </tr>
          </table>
          <input type="hidden" name="approval_id" value=""/>
          <input type="hidden" name="behave" value="save"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" 
          data-dismiss="modal">关闭
        </button>
        <input type="submit" class="btn btn-primary" form="editForm"  value="提交更改">
      </div>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal -->
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
