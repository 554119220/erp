<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-09 15:48:38
         compiled from ".\Application\Home\View\Salary\salaryItem.html" */ ?>
<?php /*%%SmartyHeaderCode:77075524eaae90f566-27192768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe6edbf4d6136e33a1e2c8d66e9a2b9b691b80c4' => 
    array (
      0 => '.\\Application\\Home\\View\\Salary\\salaryItem.html',
      1 => 1428565693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77075524eaae90f566-27192768',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5524eaaeaf79e9_07527555',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'operation_type' => 0,
    'k' => 0,
    'v' => 0,
    'expression_item' => 0,
    'operation' => 0,
    'item_list' => 0,
    'val' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524eaaeaf79e9_07527555')) {function content_5524eaaeaf79e9_07527555($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div class="wd750 pd12px">
  <div>
    <input type="hidden" id="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
    <form name="itemForm" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/addSalaryItem" method="POST">
      <table class="form single" style="width:100%">
        <caption>添加工资项目</caption>
        <tr>
          <th width="10%">工资项目</th>
          <td>
            <input type="text" name="item_name" required/><font class="red">*</font>
            <span class="remind">工资项目一经使用，将不能再修改，请仔细添加！</span>
          </td>
        </tr>
        <tr>
          <th>类型</th>
          <td>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['operation_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <label><input type="radio" name="operation_type" <?php if ($_smarty_tpl->tpl_vars['k']->value==0) {?>checked<?php }?> 
              value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"/> <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
 </label>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <th>可否修改</th>
          <td>
            <label><input type="radio" value="1" name="editable" checked>可修改</label>
            <label><input type="radio" value="0" name="editable">不可修改</label>
          </td>
        </tr>
        <tr>
          <th>默认值</th>
          <td>
            <input type="number" name="default_value" value="0" required />
          </td>
        </tr>
        <tr>
          <th>计算公式</th> 
          <td>
            <select name="expression">
              <option value="0">项目</option>
              <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['expression_item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['object_name'];?>
</option>
              <?php } ?>
            </select>
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
            </select>
            <input type="text" name="expression_item" value="0" style="width:50px;"/>
          </td>
        </tr>
        <tr>
          <th>重要指数</th>
          <td> <input type="number" name="level" value="1" /> </td>
        </tr>
        <tr>
          <th></th>
          <td> <input type="submit" class="btn btn-primary btn-small" value="添加" /> </td>
        </tr>
      </table>
    </form>
    <table class="table-bordered gridtable erp-table">
      <caption>工资项目设置</caption>
      <tr>
        <th width="10%">工资项目</th>
        <th width="10%">类型</th>
        <th width="10%">默认值</th>
        <th width="20%">计算公式</th>
        <th width="10%">重要指数</th>
        <th width="10%">操作</th>
      </tr>
      <?php if ($_smarty_tpl->tpl_vars['item_list']->value) {?>
      <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['item_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['operation_type'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['default_value'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['expression'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['level'];?>
</td>
        <td>
          <button class="link-btn" data-toggle="modal" data-target="#myModal"
            onclick="editSalaryItem('edit',<?php echo $_smarty_tpl->tpl_vars['val']->value['item_id'];?>
)">修改</button>
          <?php if ($_smarty_tpl->tpl_vars['val']->value['editable']!=0) {?>
          <a class="link-btn" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/delSalaryItem/item_id/<?php echo $_smarty_tpl->tpl_vars['val']->value['item_id'];?>
">禁用</a>
          <?php }?>
        </td>
      </tr>
      <?php } ?>
      <?php } else { ?>
      <tr>
        <td colspan="4">扯dan啊,还没有添加工资项目~</td>
      </tr>
      <?php }?>
    </table>
  </div>
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
        <h4 class="modal-title" id="myModalLabel"> 修改工资项目</h4>
      </div>
      <div class="modal-body">
        <form id="editForm" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/editSalaryItem" method="POST">
          <table class="form single" style="width:100%">
            <tr>
              <th width="10%">工资项目</th>
              <td>
                <input type="text" name="item_name" required/><font class="red">*</font>
                <span class="remind">工资项目一经使用，将不能再修改.</span>
              </td>
            </tr>
            <tr>
              <th>类型</th>
              <td>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['operation_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <label><input type="radio" name="operation_type" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"/> <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
 </label>
                <?php } ?>
              </td>
            </tr>
            <tr>
              <th>可否修改</th>
              <td>
                <label><input type="radio" value="1" name="editable" checked>可修改</label>
                <label><input type="radio" value="0" name="editable">不可修改</label>
              </td>
            </tr>
            <tr>
              <th>默认值</th>
              <td>
                <input type="number" name="default_value" value="0" required />
              </td>
            </tr>
            <tr>
              <th>计算公式</th> 
              <td>
                <select name="expression">
                  <option value="0">项目</option>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['expression_item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['object_name'];?>
</option>
                  <?php } ?>
                </select>
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
                </select>
                <input type="text" name="expression_item" value="0" style="width:50px;"/>
              </td>
            </tr>
            <tr>
              <th>重要指数</th>
              <td> <input type="number" name="level" value="1" /> </td>
            </tr>
          </table>
          <input type="hidden" name="todo" value="true"/>
          <input type="hidden" name="item_id" value="0"/>
          <input type="hidden" name="act" value="edit"/>
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
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
