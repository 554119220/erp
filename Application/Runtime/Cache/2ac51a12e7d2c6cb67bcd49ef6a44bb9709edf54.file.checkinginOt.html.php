<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-24 08:59:43
         compiled from ".\Application\Home\View\Checkingin\checkinginOt.html" */ ?>
<?php /*%%SmartyHeaderCode:9907550f71d87de295-46755956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ac51a12e7d2c6cb67bcd49ef6a44bb9709edf54' => 
    array (
      0 => '.\\Application\\Home\\View\\Checkingin\\checkinginOt.html',
      1 => 1427158780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9907550f71d87de295-46755956',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_550f71d8895441_24000129',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'role_list' => 0,
    'v' => 0,
    'staff_list' => 0,
    'k' => 0,
    'otList' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550f71d8895441_24000129')) {function content_550f71d8895441_24000129($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="pd12px wd750">
  <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/addOtRecord" method="POST" class="table-form bigform">
    <table>
      <caption class="title">加班登记</caption>
      <tr>
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
        <td>
          <select name="staff_id">
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
        <th>开始时间</th>
        <td>
          <input type="text" name="start_time" value=""
           onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" required/>
        </td>
        <th> 加班时长（小时）</th>
        <td>
          <input type="text" name="date" value="" required class="ac"/>
        </td>
      </tr>
      <tr>
        <td colspan="6">
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
          </select>
        </td>
        <td>
          <input type="submit" value="搜索"/>
        </td>
      </table>
    </form>
    <table class="gridtable" style="margin-top:4px;">
      <tr>
        <th>序号</th>
        <th>部门</th>
        <th>员工</th>
        <th>开始时间</th>
        <th>加班工时</th>
        <th>原因</th>
        <th>审核进度</th>
        <th>操作</th>
      </tr>
      <?php if ($_smarty_tpl->tpl_vars['otList']->value) {?>
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['otList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
      <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['role_name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['staff_name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['start_time'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['date'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['reason'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
</td>
      <td>
        <input type="button" class="btn-link" value="修改"/>
        <input type="button" class="btn-link" value="删除"/>
      </td>
      <?php } ?>
      <?php } else { ?>
      <tr> <td colspan="8">没有加班记录</td> </tr>
      <?php }?>
    </table>
  </div>

</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
