<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-09 14:47:18
         compiled from ".\Application\Home\View\Checkingin\late.html" */ ?>
<?php /*%%SmartyHeaderCode:72825524eee553ec68-05187812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6e90259f971bda579182bc4c7ec22686f60ff79' => 
    array (
      0 => '.\\Application\\Home\\View\\Checkingin\\late.html',
      1 => 1428561994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72825524eee553ec68-05187812',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5524eee5632ea8_13169796',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'title' => 0,
    'formUrl' => 0,
    'dataUrl' => 0,
    'url' => 0,
    'staff_list' => 0,
    'k' => 0,
    'v' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524eee5632ea8_13169796')) {function content_5524eee5632ea8_13169796($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<!--标签切换-->
<div id="resource" class="wd750 pd12px">
  <div class="bootstrap-table-title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 
    <input type="hidden" name="url" value="<?php echo $_smarty_tpl->tpl_vars['formUrl']->value;?>
"/>
    <button class="btn btn-link" data-toggle="modal" data-target="#myModal"> 登记迟到 </button>
  </div>
  <table data-toggle="table" data-url="<?php echo $_smarty_tpl->tpl_vars['dataUrl']->value;?>
" data-search="true" data-height="699" data-show-refresh="true" data-show-toggle="true" data-pagination="true">
    <thead>
      <tr>
        <th data-field="staff_name">申请人</th>
        <th data-field="type_name">类型</th>
        <th data-field="from_to">起止时间</th>
        <th data-field="date">时长</th>
        <th data-field="reason">原因</th>
        <th data-field="checker">审批人</th>
        <th data-field="action">操作</th>
      </tr>
    </thead>
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
        <h4 class="modal-title" id="myModalLabel">迟到登记</h4>
      </div>
      <div class="modal-body">
        <form id="form" name="form" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/lateRecord" method="POST">
          <table class="form single" style="width:100%">
            <tr>
              <th>员工姓名</th>
              <td>
                <select name="staff_id" style="width:123px;">
                  <option value="0">姓名</option>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['staff_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
                  <?php } ?>
                </select> <b class="red">*</b>
              </td>
              <th>日期</th>
              <td>
                <input type="text" name="start_time" required
                onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})"/>
              </td>
            </tr>
            <tr>
              <th>迟到时长</th>
              <td style="width: 7%;">
                <input type="number" name="date" required />
              </td>
              <td style="padding-left:12px;">
                <label><input type="radio" name="date_type" value="2" checked/> 分</label>
                <label><input type="radio" name="date_type" value="1"/> 时</label>
              </td>
              <td></td>
            </tr>
            <tr>
              <th>原因</th>
              <td colspan="3">
                <textarea name="reason" style="width:449px;" required></textarea>
              </td>
            </tr>
          </table>
          <input type="hidden" name="behave" value="add"/>
          <input type="hidden" name="check_id" value="0"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <input type="submit" class="btn btn-primary" form='form' value="提交"/>
      </div>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php echo '<script'; ?>
 language="javascript" type="text/javascript">
  $(function () { $('#myModal').on('hide.bs.modal', function () {
        document.forms['form'].reset();
        document.forms['form'].elements['staff_id'].options[0].selected = true;
        $("#myModalLabel").html('迟到登记');
        })
      }); 
<?php echo '</script'; ?>
>

<?php }} ?>
