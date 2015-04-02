<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-02 09:39:27
         compiled from ".\Application\Home\View\Salary\adjustSalary.html" */ ?>
<?php /*%%SmartyHeaderCode:2893354f6c8bc0f4246-61352286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0687673e72b37e834ca339f7b8871899ef5fba4' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\adjustSalary.html',
      1 => 1427938717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2893354f6c8bc0f4246-61352286',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f6c8bc2625a2_13738225',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'role_list' => 0,
    'val' => 0,
    'staff_list' => 0,
    'adjustSalary' => 0,
    'page' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6c8bc2625a2_13738225')) {function content_54f6c8bc2625a2_13738225($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="wd750 pd12px">
  <div>
    <input type="hidden" id="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
    <form name="itemForm" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/addAdjustSalary" method="POST">
      <input type="hidden" name="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
      <table class="form single" style="width:100%">
        <caption>调薪设置</caption>
        <tr>
        	<th>部门  </th>
          <td>
            <select id="role_id" name="role_id" onchange="getAdminList(this)">
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
            </select> 当没有选择员工，系统会默认把整个部门员工的工资调整
          </td>
        </tr>
        <tr>
          <th width="10%">员工</th>
          <td>
            <select name="staff_id" id="staff_id" style="width:119px;">
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
            </select> 默认部门全体员工
          </td>
        </tr>
        <tr>
          <th>原工资</th>
          <td><span id="original_salary">0</span></td>
        </tr>
        <tr>
          <th>现工资</td>
          <td><input type="number" name="salary" value="" required/></td>
        </tr>
        <tr>
          <th>生效日期</th>
          <td><input type="text" name="start_time" 
            onfocus="WdatePicker({dateFmt:'yyyy-M-dd'})"/></td>
        </tr>
        <tr>
          <th></th>
          <td>
            <input type="submit" class="btn btn-primary btn-small" value="添加" />
          </td>
        </tr>
      </table>
    </form>
    <table class="table-bordered gridtable erp-table">
      <caption>调薪列表</caption>
      <tr>
        <th width="10%">员工</th>
        <th width="10%">原薪水</th>
        <th width="10%">现薪水</th>
        <th width="12%">生效时间</th>
        <th width="10%">添加人</th>
        <th width="12%">添加时间</th>
        <th width="10%">进度</th>
        <th width="20%">操作</th>
      </tr>
      <?php if ($_smarty_tpl->tpl_vars['adjustSalary']->value) {?>
      <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['adjustSalary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['staff_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['original_salary'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['salary'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['start_time'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['status'];?>
</td>
        <td>
          <?php if ($_smarty_tpl->tpl_vars['val']->value['status']==0) {?>
          <!--审核期间可以修改-->
          <button class="btn btn-link" data-toggle="modal" data-target="#myModal"
            onclick="editAdjustSalary(<?php echo $_smarty_tpl->tpl_vars['val']->value['log_id'];?>
)">修改</button>
          <?php }?>
          <a class="btn btn-link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/delSalaryItem/item_id/<?php echo $_smarty_tpl->tpl_vars['val']->value['item_id'];?>
">删除</a>
        </td>
      </tr>
      <?php } ?>
      <?php } else { ?>
      <tr><td colspan="8">没有调薪记录</td></tr>
      <?php }?>
    </table>
  </div>
</div>
<div class="bottom_tip page" id="pageDiv"> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
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
        <h4 class="modal-title" id="myModalLabel"> 修改调薪记录</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/editAdjustSalary" method="POST" id="editForm">
          <table class="form single" style="width:100%;margin-top:0px;">
            <tr>
              <th>部门  </th>
              <td>
                <select id="role_id" name="role_id" >
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
            </tr>
            <tr>
              <th width="10%">员工</th>
              <td>
                <select name="staff_id">
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
            </tr>
            <tr>
              <th>原工资</th>
              <td><span id="original_salary">0</span></td>
            </tr>
            <tr>
              <th>现工资</td>
              <td><input type="number" name="salary" value="" required/></td>
            </tr>
            <tr>
              <th>生效日期</th>
              <td><input type="text" name="start_time" 
                onfocus="WdatePicker({dateFmt:'yyyy-M-dd'})"/></td>
            </tr>
          </table>
          <input type="hidden" name="log_id" value=""/>
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
