<?php /* Smarty version Smarty-3.1.6, created on 2014-11-27 15:27:51
         compiled from "./Application/Home/View\Menumanage\privilege_list.html" */ ?>
<?php /*%%SmartyHeaderCode:25996546e98b996d2c5-96829915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5eaa38d558fb43a7c1eb3aceb2306ca7e6af1e5' => 
    array (
      0 => './Application/Home/View\\Menumanage\\privilege_list.html',
      1 => 1417058894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25996546e98b996d2c5-96829915',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_546e98b9d60f3',
  'variables' => 
  array (
    'post_url' => 0,
    'menu_1st' => 0,
    'val' => 0,
    'menu_2nd' => 0,
    'val_2nd' => 0,
    'menu_3rd' => 0,
    'val_3rd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546e98b9d60f3')) {function content_546e98b9d60f3($_smarty_tpl) {?><br />
<link rel="stylesheet" href="/thinkphp/Public/style/system.css" type="text/css" charset="utf-8">
<form action="<?php echo $_smarty_tpl->tpl_vars['post_url']->value;?>
" name="privilegeForm" method="POST" onsubmit="return savePrivilege();">
    <label>解决方案：<input type="text" value="" name="privilege_template"/></label>
    <input type="submit" value="保存" class="b_submit"/>
    <table id="privilegeList" border="0" cellpadding="0" cellspacing="0" width="600px">
        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k_1st'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu_1st']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k_1st']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
        <tbody>
        <tr>
            <td width="30%">
                <label><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['action_code'];?>
" level="1" onchange="chkboxSelected(this)"/><?php echo $_smarty_tpl->tpl_vars['val']->value['label'];?>
</label>
            </td>
            <td>
                <table name="subTable" border="0" cellpadding="0" cellspacing="0" width="100%" id="<?php echo $_smarty_tpl->tpl_vars['val']->value['action_code'];?>
">
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['val_2nd'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val_2nd']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_2nd']->value[$_smarty_tpl->tpl_vars['val']->value['action_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val_2nd']->key => $_smarty_tpl->tpl_vars['val_2nd']->value){
$_smarty_tpl->tpl_vars['val_2nd']->_loop = true;
?>
                    <tr>
                        <td width="50%">
                            <label>
                                <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['val_2nd']->value['action_code'];?>
" parentCode="<?php echo $_smarty_tpl->tpl_vars['val']->value['action_code'];?>
" level="2" onchange="chkboxSelected(this)"/>
                                <?php echo $_smarty_tpl->tpl_vars['val_2nd']->value['label'];?>

                            </label>
                        </td>
                        <td width="50%">
                            <ul style="list-style:none; padding:0; margin:5px 5px">
                                <?php  $_smarty_tpl->tpl_vars['val_3rd'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val_3rd']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_3rd']->value[$_smarty_tpl->tpl_vars['val_2nd']->value['action_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val_3rd']->key => $_smarty_tpl->tpl_vars['val_3rd']->value){
$_smarty_tpl->tpl_vars['val_3rd']->_loop = true;
?>
                                <li>
                                <label>
                                    <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['val_3rd']->value['action_code'];?>
" parentCode="<?php echo $_smarty_tpl->tpl_vars['val_2nd']->value['action_code'];?>
" level="3" onchange="chkboxSelected(this)"/>
                                    <?php echo $_smarty_tpl->tpl_vars['val_3rd']->value['label'];?>

                                </label>
                                </li>
                                <?php } ?>
                            </ul>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
        <?php } ?>
    </table>
</form>
<?php }} ?>