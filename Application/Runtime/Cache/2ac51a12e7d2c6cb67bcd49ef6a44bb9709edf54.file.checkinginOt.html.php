<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-09 09:08:42
         compiled from ".\Application\Home\View\Checkingin\checkinginOt.html" */ ?>
<?php /*%%SmartyHeaderCode:220565524dcbaa7d8c5-85584704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ac51a12e7d2c6cb67bcd49ef6a44bb9709edf54' => 
    array (
      0 => '.\\Application\\Home\\View\\Checkingin\\checkinginOt.html',
      1 => 1428540301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220565524dcbaa7d8c5-85584704',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5524dcbacdfe62_19807397',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'role_list' => 0,
    'v' => 0,
    'staff_list' => 0,
    'k' => 0,
    'type_list' => 0,
    'status' => 0,
    'otList' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524dcbacdfe62_19807397')) {function content_5524dcbacdfe62_19807397($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="pd12px wd750">
  <input type="hidden" id="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
  <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/addOtRecord" method="POST" class="table-form bigform">
    <table>
      <caption class="title">加班登记</caption>
      <tr>
        <td>
          <select name="role_id" onchange="getAdminList(this)">
            <option value="0">选择部门</option>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['role_name'];?>
</option>
            <?php } ?>
          </select>
        </td>
        <td>
          <select name="staff_id" id="staff_id">
            <option value="0">员工名</option>
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
        </td>
        <td>
          <select name="type_id">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
        <td>
          <input type="text" name="start_time" value=""
          onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" required
          placeholder="开始时间"/>
        </td>
        <td>
          <input type="text" name="end_time" value=""
          onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" required
          placeholder="结束时间"/>
        </td>
      </tr>
      <tr>
        <td colspan="7">
          <textarea name="reason" placeholder="加班原因" required></textarea>
        </td>
      </tr>
    </table>
    <div class="ar wd750" style="padding-top:3px;">
      <button type="submit" class="btn btn-primary">提 交</button>
    </div>
  </form>
  <div>
    <div class="line-title">加班记录列表</div>
    <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/checkinginOt" method="POST"> 
      <table width="100%" class="tool-bar">
        <td>
          <select name="role_id">
            <option value="0">选择部门</option>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['role_name'];?>
</option>
            <?php } ?>
          </select>
        </td>
        <td><input type="text" name="staff_name" placeholder="员工姓名"/> </td>
        <td> <input type="text" name="start_time" value="" placeholder="起始"
          onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"/> </td>
        <td> <input type="text" name="end_time" value="" placeholder="结束"
          onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"/> </td>
        <td>
          <select name="status">
            <option value="0">进度选择</option>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
        <td>
          <input type="submit" value="搜索"/>
        </td>
      </table>
    </form>
    <table class="gridtable" style="margin-top:4px;">
      <tr>
        <th width="6%">序号</th>
        <th width="8%">部门</th>
        <th width="6%">员工</th>
        <th width="8%">类型</th>
        <th width="31%">起止时间</th>
        <th width="7%">时长</th>
        <th width="10%">原因</th>
        <th width="5%">进度</th>
        <th width="11%">操作</th>
      </tr>
      <?php if ($_smarty_tpl->tpl_vars['otList']->value) {?>
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['otList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
      <tr>
        <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['role_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['staff_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['type_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['start_time'];?>
到<?php echo $_smarty_tpl->tpl_vars['v']->value['end_time'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['date'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['reason'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
</td>
        <td>
          <input type="button" class="btn-link" value="修改" data-toggle="modal" 
          data-target="#myModal" onclick="editOt(<?php echo $_smarty_tpl->tpl_vars['v']->value['check_id'];?>
)"/>
          <input type="button" class="btn-link" value="删除"/>
        </td>
      </tr>
      <?php } ?>
      <?php } else { ?>
      <tr> <td colspan="9">没有加班记录</td> </tr>
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
        <h4 class="modal-title" id="myModalLabel"> 修改加班登记 </h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/editOt/behave/save" method="POST" id="editForm">
          <input type="hidden" name="check_id" value="0"/>
          <table class="form single" style="width:100%">
            <tr>
              <th>部门</th>
              <td>
                <select name="role_id">
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['role_id'];?>
">
                  <?php echo $_smarty_tpl->tpl_vars['v']->value['role_name'];?>
</option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <th>员工</th>
              <td>
                <select name="staff_id">
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['staff_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <th>加班类型</th>
              <td>
                <select name="type_id">
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
            </tr>
            <tr>
              <th>开始时间</th>
              <td>
                <input type="text" name="start_time" value=""
                onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})"/>
              </td>
            </tr>
            <tr>
              <th>结束时间</th>
              <td>
                <input type="text" name="end_time" value=""
                onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})"/>
              </td>
            </tr>
            <tr>
              <th>原因</th>
              <td>
                <textarea name="reason" style="width:452px;"></textarea>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" 
          data-dismiss="modal">关闭
        </button>
        <button type="sumbit" class="btn btn-primary" form="editForm"> 提交更改 </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal -->
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
