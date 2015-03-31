<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-31 09:39:25
         compiled from ".\Application\Home\View\Checkingin\lieu.html" */ ?>
<?php /*%%SmartyHeaderCode:5222551915c78583b2-42706097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '844acc10c864fa85b3aeeeca946464128f90a8e2' => 
    array (
      0 => '.\\Application\\Home\\View\\Checkingin\\lieu.html',
      1 => 1427765963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5222551915c78583b2-42706097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551915c790f560_56072510',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'staff_list' => 0,
    'k' => 0,
    'v' => 0,
    'type_list' => 0,
    'role_list' => 0,
    'status' => 0,
    'lieu_list' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551915c790f560_56072510')) {function content_551915c790f560_56072510($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="wd750 pd12px">
  <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" method="POST">
    <table class="form single" style="margin-bottom:12px;">
      <caption>添加调休</caption>
      <tr>
        <th>调休人</th>
        <td>
        <select name="staf_id">
          <option value="0">员工</option>
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
      </tr>
      <tr>
        <th>类型</th>
        <td>
          <select name="type">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['type_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['type_name'];?>
</option>
            <?php } ?>
          </select>
        </td>
      </tr>
    </table>
  </form> 
  <div class="line-title">调休记录</div>
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
  <div id="resource">
    <table class="gridtable" style="margin-top:4px;">
      <tr>
        <th>调休人</th>
        <th>填写人</th>
        <th>状态</th>
        <th>调休类型</th>
        <th>调休时间</th>
        <th>创建时间</th>
        <th>操作</th>
      </tr>
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lieu_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['staff_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['add_admin'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['start_time'];?>
至<?php echo $_smarty_tpl->tpl_vars['v']->value['end_time'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['add_time'];?>
</td>
        <td>
          <button class="btn-link">编辑</button>
          <button class="btn-link">删除</button>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
