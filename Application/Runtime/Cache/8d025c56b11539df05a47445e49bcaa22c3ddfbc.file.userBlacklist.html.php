<?php /* Smarty version Smarty-3.1.6, created on 2015-01-03 11:59:22
         compiled from "./Application/Home/View\Usersmanage\userBlacklist.html" */ ?>
<?php /*%%SmartyHeaderCode:3025454a64691baeb92-35064356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d025c56b11539df05a47445e49bcaa22c3ddfbc' => 
    array (
      0 => './Application/Home/View\\Usersmanage\\userBlacklist.html',
      1 => 1420257554,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3025454a64691baeb92-35064356',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_54a64691d1cef',
  'variables' => 
  array (
    'net' => 0,
    'url' => 0,
    'account_type' => 0,
    'val' => 0,
    'blacklist_type_list' => 0,
    'status' => 0,
    'schBlacklist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a64691d1cef')) {function content_54a64691d1cef($_smarty_tpl) {?><br />
<h3>黑名单顾客</h3>
<div class="wd750">
  <div class="box_nav">
    <div class="detail_tab" style="margin:0">
      <ul>
        <li <?php if (!$_smarty_tpl->tpl_vars['net']->value){?>class="o_select"<?php }?>>
        <span><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">黑名单顾客</a></span>
        </li>
        <li <?php if ($_smarty_tpl->tpl_vars['net']->value){?>class="o_select"<?php }?>>
        <span><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&net=<?php echo $_smarty_tpl->tpl_vars['net']->value;?>
">网络黑名单</a></span>
        </li>
      </ul>
    </div>
  </div>
  <div class="tools_div">
    <div id="div_general_blacklist">
      <form action="javascript:void(0)" name="sch_blacklist" onsubmit="schBlacklist()">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <td>
              <input type="text" name="user_name" placeholder="顾客姓名" />
            </td>
            <td>
              <select name="item_type">
                <option value="0">选择联系方式</option>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['account_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['type_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['type_name'];?>
</option>
                <?php } ?>
              </select>        
              <input type="text" name="number" />
            </td>
            <td>
              <input type="text" name="admin_name" value="" placeholder="谁拉进的(回车搜索)" oninput="getBySendAdmin(this.form)">
            </td>
            <td>
              <select id="admin_id" name="admin_id">
                <option value="0">请选择员工</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <select name="type_id">
                <option value="0">请选择欺骗类型</option>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blacklist_type_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['type_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['type_name'];?>
</option>
                <?php } ?>
              </select>
            </td>
            <td>
              <select name="status" onchage="getBlacklistStatUser(this.value)">
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1){?>selected<?php }?>>未审核</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2){?>selected<?php }?>>已审核</option>
              </select>
              <input type="submit" class="b_submit" name="user_name" value="搜索"/>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div id="resource">
    <?php echo $_smarty_tpl->tpl_vars['schBlacklist']->value;?>

  </div>
</div>
<?php }} ?>