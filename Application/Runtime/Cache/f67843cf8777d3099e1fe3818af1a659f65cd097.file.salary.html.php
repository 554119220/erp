<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-18 14:08:01
         compiled from ".\Application\Home\View\Salary\salary.html" */ ?>
<?php /*%%SmartyHeaderCode:1356355091641989688-33818179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f67843cf8777d3099e1fe3818af1a659f65cd097' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\salary.html',
      1 => 1423442779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1356355091641989688-33818179',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'searchUrl' => 0,
    'role_list' => 0,
    'val' => 0,
    'salary' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55091641ca2dd3_92181926',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55091641ca2dd3_92181926')) {function content_55091641ca2dd3_92181926($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\thinkphp\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div id="salary">
  <br />
  <div style="text-align:center;font-size:24px;font-weight:bold">
    康健人生薪资记录
  </div>
  <div class="list_panel">
    <form action="<?php echo $_smarty_tpl->tpl_vars['searchUrl']->value;?>
" name="monthForm">
      月份: <input name="month" type="text" placeholder="<?php echo smarty_modifier_date_format(time(),"%Y%m");?>
"/>
      部门: <select name="role">
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
      员工: <input type="text" name="staff_name" value=""/>
      <input type="submit" value="搜索" class="b_submit"/>
    </form>
  </div>
  <table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
      <th rowspan="2">序号</th> 
      <th rowspan="2">姓名</th> 
      <th rowspan="2">基本工资</th> 
      <th rowspan="2">岗位补贴</th> 
      <th rowspan="2">职位级别</th> 
      <th rowspan="2">出勤</th> 
      <th rowspan="2">扣除请假</th> 
      <th rowspan="2">全勤奖</th> 
      <th rowspan="2">提成</th> 
      <th colspan="3">补助</th> 
      <th rowspan="2">销量</th> 
      <th rowspan="2">扣运费</th> 
      <th rowspan="2">实发工资</th> 
      <th rowspan="2">实发提成</th> 
      <th rowspan="2">合计</th> 
    </tr>
    <tr>
      <th>加班费</th>
      <th>社保</th>
      <th>舍长</th>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['salary']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['salary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
    <tr>
      <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['staff_name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['base_salary'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['station_allowance'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['position_rank'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['work_everyday'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['decut_vacat'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['attendance'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['commission'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['dormitory'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['social_security'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['ot_salary'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['sales'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['carriage'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['actual_salary'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['actual_commission'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['summation'];?>
</td>
    </tr>
    <?php } ?>
    <?php } else { ?>
    <tr>
      <td colspan="17">没有记录</td>
    </tr>
    <?php }?>
  </table>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
