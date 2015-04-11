<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-11 11:34:31
         compiled from ".\Application\Home\View\Checkingin\applyVacate.html" */ ?>
<?php /*%%SmartyHeaderCode:114765524dcd26ea052-52651369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7711dc9b51b8bc02f8a8c92ee31402d1f8d2be26' => 
    array (
      0 => '.\\Application\\Home\\View\\Checkingin\\applyVacate.html',
      1 => 1428722225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114765524dcd26ea052-52651369',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5524dcd27de298_13913067',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'edit' => 0,
    'staff_list' => 0,
    'k' => 0,
    'v' => 0,
    'role_list' => 0,
    'val' => 0,
    'date_type' => 0,
    'vacate' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524dcd27de298_13913067')) {function content_5524dcd27de298_13913067($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="wd750 pd12px">
  <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" method="POST" class="table-form bigform">
    <table>
      <caption class="title"><?php if (!$_smarty_tpl->tpl_vars['edit']->value) {?>请假申请<?php } else { ?>修改请假记录
        <a class="btn-link" href="/thinkphp/index.php/home/checkingin/vacatelist">返回</a>
        <?php }?></caption>
      <tr>
        <th>员工姓名</th>
        <td>
          <select name="staff_id">
            <option value="0">姓名</option>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['staff_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['edit']->value['staff_id']==$_smarty_tpl->tpl_vars['k']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
            <?php } ?>
          </select>
        </td>
        <th>部门</th>
        <td style="width:120px;">
          <select name="role_id">
            <option value="0">请选择</option>
            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['role_id'];?>
" 
            <?php if ($_smarty_tpl->tpl_vars['edit']->value['role_id']==$_smarty_tpl->tpl_vars['val']->value['role_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</option>
            <?php } ?>
          </select>
        </td>
        <th>职务</th>
        <td><input type="text" name="job_title" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['job_title'];?>
"/></td>
        <th>请假时间</th>
        <td> <input type="text" name="date"
          value="<?php if ($_smarty_tpl->tpl_vars['edit']->value['date']) {
echo $_smarty_tpl->tpl_vars['edit']->value['date'];
} else { ?>1<?php }?>" min="0" reqiured/> </td>
        <td class="item">
          <select name="date_type">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['date_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['edit']->value['date_type']==$_smarty_tpl->tpl_vars['k']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <th>请假时间</th>
        <td colspan="4">
          <input type="text" name="start_time" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['start_time'];?>
"
          placeholder="起始日期" required onfocus="WdatePicker({dateFmt:'yyyy-M-d HH:mm'})"/>
        </td>
        <td colspan="4">
          <input type="text" name="end_time" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['end_time'];?>
"
          required placeholder="结束时间" onfocus="WdatePicker({dateFmt:'yyyy-M-d HH:mm'})"/>
        </td>
      </tr>
      <tr>
        <th>请假类型</th>
        <td colspan="8" style="text-align:left;padding-left:12px;">
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vacate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']++;
?>
          <label>
            <input type="radio" name="type_id" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['type_id'];?>
"
            <?php if ($_smarty_tpl->tpl_vars['edit']->value['type_id']==$_smarty_tpl->tpl_vars['val']->value['type_id']||$_smarty_tpl->getVariable('smarty')->value['foreach']['i']['index']==0) {?>
            checked<?php }?>/><?php echo $_smarty_tpl->tpl_vars['val']->value['type_name'];?>

          </label>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <th>请假原因</th>
        <td colspan="8">
          <textarea name="reason" class="unresize" placeholder="详细说明请假原因"
            required><?php echo $_smarty_tpl->tpl_vars['edit']->value['reason'];?>
</textarea>
        </td>
      </tr>
      <tr>
        <th rowspan="4">审批人</th>
        <td>组长</td>
        <td colspan="3">
          <input type="text" name="g_manager" value=""/>
        </td>
        <td>部门主管</td>
        <td colspan="3">
          <input type="text" name="r_manager" value=""/>
        </td>
      </tr>
      <tr>
        <td>日期</td>
        <td colspan="3">
          <input type="text" name="g_check_time" value="" onfocus="WdatePicker({dateFmt:'yyyy年M月d日 H'})"/>
        </td>
        <td>日期</td>
        <td colspan="3">
          <input type="text" name="r_check_time" value="" onfocus="WdatePicker({dateFmt:'yyyy年M月d日'})"/>
        </td>
      </tr>
      <tr>
        <td>行政人事</td>
        <td colspan="3">
          <input type="text" name="h_manager" value=""/>
        </td>
        <td>总经理</td>
        <td colspan="3">
          <input type="text" name="p_manager" value=""/>
        </td>
      </tr>
      <tr>
        <td>日期</td>
        <td colspan="3">
          <input type="text" name="h_check_time" value="" onfocus="WdatePicker({dateFmt:'yyyy年M月d日'})"/>
        </td>
        <td>日期</td>
        <td colspan="3">
          <input type="text" name="p_check_time" value="" onfocus="WdatePicker({dateFmt:'yyyy年M月d日'})"/>
        </td>
      </tr>
    </table>
    <div style="width:750px;text-align:right;padding-top:12px;">
      <button type="submit" class="btn btn-primary">提交</button>
    </div>
  </form>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
