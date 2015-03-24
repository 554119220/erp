<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-23 11:04:23
         compiled from ".\Application\Home\View\Checkingin\checkinginType.html" */ ?>
<?php /*%%SmartyHeaderCode:762754fcfe415f5e12-12119247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a20c8e8ca6ae5a0e2aa0895dee3ffcd1e225f19d' => 
    array (
      0 => '.\\Application\\Home\\View\\Checkingin\\checkinginType.html',
      1 => 1426758964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '762754fcfe415f5e12-12119247',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fcfe416ea053_81790183',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'type' => 0,
    'val' => 0,
    'operation' => 0,
    'k' => 0,
    'v' => 0,
    'typeList' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fcfe416ea053_81790183')) {function content_54fcfe416ea053_81790183($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="wd750 pd12px">
  <input type="hidden" id="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
  <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/addCheckinginType" method="POST" onsubmit="return validatValue(this)">
    <table class="form single">
      <caption>添加考勤类型</caption>
      <tr>
        <th>所属分类</th>
        <td>
          <select name="type" required title="所属分类">
            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['type_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['type_name'];?>
</option>
            <?php } ?>
          </select>
          <font class="red">*</font>
        </td>
      </tr>
      <tr>
        <th>名称</th>
        <td>
          <input name="name" value="" onkeyup="checkZhValue(this)" datatype="Limit" min="1" max="50" msg="1~50字符" type="text" id="title" required>
        </td>
      </tr>
      <tr>
        <th>计薪规则</th>
        <td>
         大于或等于<input type="number" name="times" value="1" class="number" min="1"> 次
          <select name="operation">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['operation']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
            <?php } ?>
          </select> | 
          <select name="rule_item">
            <option value="0">固定值</option>
            <option value="1">每日工资的百分之</option>
            <option value="2">天数 * 每日工资的百分之</option>
          </select>
          <input type="number" name="salary_rule" value="0" class="number" min="0"/>
        </td>
      </tr>
      <tr>
        <th></th>
        <td>
          <button type="submit" class="btn btn-small btn-primary" data-toggle="popover" 
            data-content=""> 保存 </button>
        </td>
      </tr>
    </table>
  </form>
  <table class="gridtable">
    <caption class='title'>考勤类型列表</caption> 
    <tr>
      <th width="2%">序号</th>
      <th width="10%">分类</th>
      <th width="10%">名称</th>
      <th width="20">计薪规则</th>
      <th width="15%">操作</th>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['typeList']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['typeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
    <tr>
      <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['parent_id'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['type_name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['val']->value['salary_rule'];?>
</td>
      <td>
        <button class="btn-link" data-toggle="modal" data-target="#myModal"
          onclick="controlVacate(<?php echo $_smarty_tpl->tpl_vars['val']->value['type_id'];?>
,'edit')">修改</button>
        <button class="btn-link" onclick="controlVacate(<?php echo $_smarty_tpl->tpl_vars['val']->value['type_id'];?>
,'del')">不启用</button>
      </td>
    </tr>
    <?php } ?>
    <?php } else { ?>
    <tr>
      <td colspan="4">人事部忙碌中，暂时忘了添加记录</td>
    </tr>
    <?php }?>
  </table>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel"> 修改考勤类型</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/controlCheckinginType" method="POST" 
          onsubmit="return validatValue(this)" id="editForm">
          <table class="form single" style="width:100%;margin-top:0px;">
            <tr style="border-top:1px solid #ccc;">
              <th>所属分类</th>
              <td>
                <select name="type" required title="所属分类">
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['type_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['type_name'];?>
</option>
                  <?php } ?>
                </select>
                <font class="red">*</font>
              </td>
            </tr>
            <tr>
              <th>名称</th>
              <td>
                <input name="name" value="" onkeyup="checkZhValue(this)" datatype="Limit" min="1" max="50" msg="1~50字符" type="text" id="title" required>
              </td>
            </tr>
            <tr>
              <th>计薪规则</th>
              <td>
                大于或等于<input type="number" name="times" value="1" class="number" min="1"> 次
                <select name="operation">
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['operation']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
                  <?php } ?>
                </select> | 
                <select name="rule_item">
                  <option value="0">固定值</option>
                  <option value="1">每日工资的百分之</option>
                  <option value="2">天数 * 每日工资的百分之</option>
                </select>
                <input type="number" name="salary_rule" value="0" class="number" min="0"/>
                <input type="hidden" name="todo" value="true"/>
                <input type="hidden" name="act" value="edit"/>
                <input type="hidden" name="type_id" value="0"/>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" 
          data-dismiss="modal">关闭
        </button>
        <input type="submit" class="btn btn-primary" form="editForm"  value="提交更改">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal -->
  <?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
