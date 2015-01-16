<?php /* Smarty version Smarty-3.1.6, created on 2015-01-14 17:48:18
         compiled from "./Application/Home/View\Hrm\staffList.html" */ ?>
<?php /*%%SmartyHeaderCode:1010754b63b12977f98-48712911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9991830cb6ce680058fdff9fa95cf1593b8d722' => 
    array (
      0 => './Application/Home/View\\Hrm\\staffList.html',
      1 => 1421228843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1010754b63b12977f98-48712911',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_54b63b129b502',
  'variables' => 
  array (
    'header' => 0,
    'staffListUrl' => 0,
    'total' => 0,
    'registerUrl' => 0,
    'role_list' => 0,
    'val' => 0,
    'search_staff' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b63b129b502')) {function content_54b63b129b502($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<div <?php if ($_smarty_tpl->tpl_vars['staffListUrl']->value){?>style="padding-left:15%"<?php }?>>
  <div class="wd750">
    <br />
    <div class="finder-title">员工列表
      <font id="record_count">(共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
条)</font>
      <label class="fright"><a class="btn" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['registerUrl']->value;?>
">录入新员工入职档案</a></label>
    </div>
    <div class="list_panel">
      <form <?php if (!$_smarty_tpl->tpl_vars['staffListUrl']->value){?>action="javascript:void(0)" onsubmit="searchStaff(this)"<?php }else{ ?>action="<?php echo $_smarty_tpl->tpl_vars['staffListUrl']->value;?>
"<?php }?> method="POST" >
        姓名<input type="text" name="staff_name" value=""/>
        部门<select name="role_id">
          <option value="0">请选择</option>
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
        分类<select name="category">
          <option value="0">性别</option>
          <option value="0">学校</option>
        </select>
        <select name="item" id="item">
          <option value="0">请选择</option>
        </select>
        <input type="submit" class="b_submit" value="搜索">
      </form>
    </div>
    <div id="resource"><?php echo $_smarty_tpl->tpl_vars['search_staff']->value;?>
</div>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>