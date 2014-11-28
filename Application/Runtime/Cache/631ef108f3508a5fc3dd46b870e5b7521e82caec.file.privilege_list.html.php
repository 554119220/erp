<?php /* Smarty version Smarty-3.1.6, created on 2014-11-28 14:48:43
         compiled from "./Application/Home/View\Basicconfig\privilege_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1860554781acb49d873-22546075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '631ef108f3508a5fc3dd46b870e5b7521e82caec' => 
    array (
      0 => './Application/Home/View\\Basicconfig\\privilege_list.html',
      1 => 1417058894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1860554781acb49d873-22546075',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_54781acb6ef50',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54781acb6ef50')) {function content_54781acb6ef50($_smarty_tpl) {?><br />
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