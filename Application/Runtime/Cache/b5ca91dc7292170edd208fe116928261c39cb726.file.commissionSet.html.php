<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-20 08:37:36
         compiled from ".\Application\Home\View\Salary\commissionSet.html" */ ?>
<?php /*%%SmartyHeaderCode:2033554f6c8b7e8b255-00263540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5ca91dc7292170edd208fe116928261c39cb726' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\commissionSet.html',
      1 => 1426758964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2033554f6c8b7e8b255-00263540',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f6c8b807a120_05261824',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'switch_tag' => 0,
    'k' => 0,
    'url' => 0,
    'val' => 0,
    'data' => 0,
    'position_level' => 0,
    'sort1' => 0,
    'sort2' => 0,
    'cumulativeNum' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6c8b807a120_05261824')) {function content_54f6c8b807a120_05261824($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="wd750 pd12px">
  <div>提成设置</div>
  <div class="panel-div left">
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['switch_tag']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']++;
?>
    <label><input type="radio" name="nav_switch"
      form="commissionForm" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['i']['index']==0) {?>checked<?php }?>
      value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"/ onclick="switchTag(this)" url="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/switchParticipant"> <?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</label>
    <?php } ?> | 
    <select name="participantSel" style="width:168px;" onchange="addChecked(this)">
      <option value="0">部门</option>
      <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
      <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
      <?php } ?>
    </select>
  </div>
  <div class="main lf">
    <input type="hidden" name="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
    <form name="commissionForm" id="commissionForm" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/addCommissionRule" 
      method="POST" onsubmit="return addCommissionRule($(this))">
      <div class="item-div" id="participantField"></div>
      <table class="form">
        <caption>必填</caption>
        <tr>
          <th>职位级别：</th>
          <td>
            <select name="position_level">
              <option value="0">职位级别</option>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['position_level']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['level_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['level_name'];?>
</option>
              <?php } ?>
            </select>
          </td>
          <th>保底限量：</th>
          <td>
            <input type="number" name="base_sales" value="0" min="0" required class="number"/>
          </td>
          <th>工龄大于</th>
          <td>
            <input type="number" name="work_age" value="0" class="number" min="0"/>
          </td>
          <th>规则名称：</th>
          <td colspan="5"><input type="text" name="rule_name" value=""
            placeholder="规则名称" onkeyup="this.value=this.value.replace(/(^\s+)|\s+$/g,'');"/>
          </td>
        </tr>
      </table>
      <table class="form">
        <caption>提成基数</caption>
        <tr>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sort1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
          <td>
            <label><input type="radio" name="sort1" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"
              <?php if ($_smarty_tpl->tpl_vars['k']->value==1) {?>checked<?php }?> onclick="getCardinalityType(this)"/> <?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</label>
          </td>
          <?php } ?>
        </tr>
      </table>
      <table class="form">
        <caption>提成比例</caption>
        <tr>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sort2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']++;
?>
          <td><label><input type="radio" name="sort2" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"
              <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['i']['index']==0) {?>checked<?php }?> 
              onclick="switchRatio($(this))"/> <?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</label></td>
          <?php } ?>
          <td width="60%">
          </tr>
          <tr id="identical">
            <td>提成比例</td>
            <td colspan="3">
              <input type="text" name="identical_commission" value="" /> %
            </td> 
          </tr>
          <tr id="product">
            <td>提成比例</td>
            <td colspan="3">
              <input type="text" name="product_commission" value=""/> %
            </td> 
          </tr>
          <tr id="cumulative">
            <td colspan="4">
              <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cumulativeNum']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
              <div style="margin-bottom:4px;">
                <input type="number" name="min_sale[]" min="0" placeholder="销量下限"/>
                <input type="number" name="max_sale[]" min="0" placeholder="销量上限"/>
                <input type="number" name="commission[]" value="0"/> %
              </div>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <input type="submit" value="保存" class="btn btn-primary"/>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php echo '<script'; ?>
 language="javascript" type="text/javascript">
  $('#product').css('display','none');
  $('#cumulative').css('display','none');
<?php echo '</script'; ?>
>
<?php }} ?>
