<?php /* Smarty version Smarty-3.1.6, created on 2015-01-16 14:18:26
         compiled from "./Application/Home/View\Salary\commission.html" */ ?>
<?php /*%%SmartyHeaderCode:2988354b86675000005-58193985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e267a9739e8a2e1601248ee6588e08bae6395b6' => 
    array (
      0 => './Application/Home/View\\Salary\\commission.html',
      1 => 1421389097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2988354b86675000005-58193985',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_54b866751312d',
  'variables' => 
  array (
    'role_list' => 0,
    'val' => 0,
    'staff_list' => 0,
    'platform_list' => 0,
    'payment' => 0,
    'key' => 0,
    'shipping' => 0,
    'position_level_list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b866751312d')) {function content_54b866751312d($_smarty_tpl) {?><div class="wd750">
  <br />
  <h3>提成系数设置</h3>
  <div>
    <span>第一步</span><b>------&gt;</b><span>第二步</span><b>------&gt;</b><span>完成</span>
  </div>
  <div id="commission_site">
    <div id="step1">
      <form name="commissionSiteForm1" action="javascript:void(0)" method="POST">
      <table cellpadding="0" cellspacing="6px" border="0" width="100%">
          <tr>
            <th>部门</th>
            <td>
              <select name="role_id" >
                <option value="0">请选择部门</option>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
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
            <th>小组</th>
            <td>
              <select name="role_id" onchange="department(this.value,1,'group_id')" >
                <option value="0">请选择部门</option>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</option>
                <?php } ?>
              </select> 
            </td>
            <td>
              <select name="group_id" id="group_id">
                <option value="0">请选择小组</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>员工</th>
            <td><input type="text" name="sch_admin" value="搜索员工" onblur="getStaffListForSel(this.value)"/></td>
            <td>
              <select name="staff_id">
                <option value="0">请选择员工</option>
                <?php  $_smarty_tpl->tpl_vars[$_smarty_tpl->tpl_vars['val']->value] = new Smarty_Variable; $_smarty_tpl->tpl_vars[$_smarty_tpl->tpl_vars['val']->value]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['staff_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars[$_smarty_tpl->tpl_vars['val']->value]->key => $_smarty_tpl->tpl_vars[$_smarty_tpl->tpl_vars['val']->value]->value){
$_smarty_tpl->tpl_vars[$_smarty_tpl->tpl_vars['val']->value]->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['staff_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['staff_name'];?>
</option>
                <?php } ?>
              </select>
            </td>
          </tr>  
          <tr>
            <th>购买平台</th>
            <td>
              <select name="platform_id">
                <option value="0">不限</option> 
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['platform_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</option>
                <?php } ?>
              </select>
            </td>
            <th>支付方式</th>
            <td>
              <select name="pay_id" onchange="getShipping(this)" href="/thinkphp/index.php/usersmanage/shippinglist">
                <option value="0">不限</option>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['payment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                <?php } ?>
              </select>
            </td>
            <th>快递方式</th>
            <td>
              <select name="shipping_id" id="shipping_id">
                <option value="0">不限</option>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['shipping']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="6">
              <input type="submit" class="b_submit" value="保存并下一步" style="padding:3px;"/>
          </td>
        </tr>
        </table>
      </form>
    </div>
    <div id="step2">
      <form name="commissionSiteForm2" action="javascript:void(0)" method="POST">
        <table cellpadding="0" cellspacing="0" border="1px" width="100%">
          <tr>
            <th>职位级别</th>
            <th>保底销量</th>
            <th>最大销量</th>
            <th>提成系数</th>
          </tr>
          <tr>
            <td>
              <select name="position_level">
                <option value="0">职位级别</option> 
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['position_level_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['level_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['level_name'];?>
</option>
                <?php } ?>
              </select>
            </td>
            <td><input type="number" min="1000" name="min_sales" value=""/></td>
            <td><input type="number" min="1000" name="min_sales" value=""/></td>
            <td><input type="number" max="10" name="commission" value=""/></td>
          </tr>
          <tr>
            <td colspan="4"><input type="submit" value="保存" class="b_submit"/></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div id="resource"></div>
</div>
<?php }} ?>