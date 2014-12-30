<?php /* Smarty version Smarty-3.1.6, created on 2014-12-29 15:48:02
         compiled from "./Application/Home/View\Usersmanage\vipList.html" */ ?>
<?php /*%%SmartyHeaderCode:18369549e0558ca2dd3-42413971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a6a8e8d68287a34f62e1d2fe05104f816742c9a' => 
    array (
      0 => './Application/Home/View\\Usersmanage\\vipList.html',
      1 => 1419834245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18369549e0558ca2dd3-42413971',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_549e05590b71b',
  'variables' => 
  array (
    'count' => 0,
    'rank_list' => 0,
    'rank_id' => 0,
    'val' => 0,
    'url' => 0,
    'role_list' => 0,
    'vipSearch' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549e05590b71b')) {function content_549e05590b71b($_smarty_tpl) {?><br/>
<div class="finder-title">会员列表
  <font id=record_count>(共<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
条)</font>
</div>
<div class="wd750">
  <div>
    <div class="box_nav">
      <div class="detail_tab" style="margin:0">
        <ul>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rank_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <li type="<?php echo $_smarty_tpl->tpl_vars['rank_id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['rank_id']->value==$_smarty_tpl->tpl_vars['val']->value['rank_id']){?>class="o_select"<?php }?>>
          <span><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&rank_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['rank_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['rank_name'];?>
</a></span>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="list_panel" style="margin-bottom:0px;">
    <form name="vips_form" action="javascript:void(0);" onsubmit="schRankVips(this)">
      <select name="item">
        <option value="2">姓名</option>
        <option value="1">卡号</option>
      </select>
      <input type="text" ="" name="keyword" />
      <select name="platform" id="role_list"  onchange="getGroupList(this)">
        <option value="0">请选择平台</option>
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
      <select name="group_id" id="group_id" style="width:98px;">
        <option value="0">请选择团队</option> 
      </select>
      积分<input type="number" class="wd64" name="min_points" min="0" step="50"/>-
      <input type="number" class="wd64" name="max_points" min="0" step="50"/>
      <input type="submit" value="搜 索" class="b_submit" />
    </form>
  </div>
  <div class="user_list_info" id="resource">
    <?php echo $_smarty_tpl->tpl_vars['vipSearch']->value;?>

  </div>
</div>
<?php }} ?>