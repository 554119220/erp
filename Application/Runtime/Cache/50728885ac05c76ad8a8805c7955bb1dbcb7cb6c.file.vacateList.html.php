<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-13 17:13:48
         compiled from ".\Application\Home\View\Checkingin\vacateList.html" */ ?>
<?php /*%%SmartyHeaderCode:2273354fcfe3df05378-26622274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50728885ac05c76ad8a8805c7955bb1dbcb7cb6c' => 
    array (
      0 => '.\\Application\\Home\\View\\Checkingin\\vacateList.html',
      1 => 1426237565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2273354fcfe3df05378-26622274',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fcfe3e07a122_56813216',
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'title' => 0,
    'late' => 0,
    'formUrl' => 0,
    'report' => 0,
    'url' => 0,
    'report_checkingin' => 0,
    'report_time' => 0,
    'report_list' => 0,
    'v' => 0,
    'saveUrl' => 0,
    'dataUrl' => 0,
    'staff_list' => 0,
    'k' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fcfe3e07a122_56813216')) {function content_54fcfe3e07a122_56813216($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<!--标签切换-->
<div id="resource" class="wd750 pd12px">
  <div class="bootstrap-table-title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 
    <?php if ($_smarty_tpl->tpl_vars['late']->value) {?>
    <input type="hidden" name="url" value="<?php echo $_smarty_tpl->tpl_vars['formUrl']->value;?>
"/>
    <button class="btn btn-link" data-toggle="modal" 
      data-target="#myModal">
      登记迟到
    </button>
    <?php } elseif ($_smarty_tpl->tpl_vars['report']->value) {?>
    <a class="btn btn-link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">统计考勤报表于结算工资</a>
    <?php }?>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['report_checkingin']->value) {?>
  <div style="padding-top:12px;float:right;">
    <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/checkinginReport/act/search" method="post" >
      <input type="text" name="report_time" onfocus="WdatePicker({dateFmt:'yyyy-MM'})" placeholder="月份" value="<?php echo $_smarty_tpl->tpl_vars['report_time']->value;?>
"/>
      <input type="submit" value="搜索"/>
      &nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">返回考勤汇总</a>
    </form>
  </div>
  <table class="table gridtable erp-table">
    <tr>
      <th width="10%">序号</th>
      <th width="10%">姓名</th>
      <th width="10%">出勤天数</th>
      <th width="10%">缺勤天数</th>
      <th width="10%">迟到次数</th>
      <th width="10%">迟到扣款</th>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['report_list']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['report_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
    <tr>
      <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['staff_name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['working_days'];?>
</td>
      <td><?php if ($_smarty_tpl->tpl_vars['v']->value['outworking_days']) {
echo $_smarty_tpl->tpl_vars['v']->value['outworking_days'];
} else { ?>0<?php }?></td>
      <td><?php if ($_smarty_tpl->tpl_vars['v']->value['late_times']) {
echo $_smarty_tpl->tpl_vars['v']->value['late_times'];
} else { ?>0<?php }?></td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['dedcut_late'];?>
</td>
    </tr>
    <?php } ?>
    <?php } else { ?>
    <tr><td colspan="6">没有记录</td></tr>
    <?php }?>
    <tr>
      <td colspan="6" style="text-align:right;border:0px;">
        <a href="<?php echo $_smarty_tpl->tpl_vars['saveUrl']->value;?>
" class="btn btn-primary">保存</a>
      </td>
    </tr>
  </table>
  <?php } else { ?>
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
      </tr>
    </thead>
  </table>
  <?php }?>
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
        <form id="form" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/lateRecord" onsubmit="return lateRecord()">
          <table class="form single" style="width:100%">
            <tr>
              <th>员工姓名</th>
              <td>
                <select name="staff_id">
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
                <label><input type="radio" name="dateType" value="2" checked/> 分</label>
                <label><input type="radio" name="dateType" value="1"/> 时</label>
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

<?php }} ?>