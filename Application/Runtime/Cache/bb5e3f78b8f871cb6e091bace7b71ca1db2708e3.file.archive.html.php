<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-08 09:28:59
         compiled from ".\Application\Home\View\Hrm\archive.html" */ ?>
<?php /*%%SmartyHeaderCode:211565524845b7a1209-22238625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb5e3f78b8f871cb6e091bace7b71ca1db2708e3' => 
    array (
      0 => '.\\Application\\Home\\View\\Hrm\\archive.html',
      1 => 1428454193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211565524845b7a1209-22238625',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'publicUrl' => 0,
    'edit' => 0,
    'archive' => 0,
    'val' => 0,
    'b' => 0,
    'today' => 0,
    'admin_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5524845b895440_50096100',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524845b895440_50096100')) {function content_5524845b895440_50096100($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
    <title>康健人生入职申请表</title>
    <meta charset="utf-8" />
    <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/styles/staff.css" rel="stylesheet" />
    <?php if ($_smarty_tpl->tpl_vars['edit']->value) {?>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/register.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/region.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/validator.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/common.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/transport.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/utils.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/My97DatePicker/WdatePicker.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php } else { ?>
    <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/styles/printstaff.css" rel="stylesheet" />
    <?php }?>
  </head>
  <body>
    <form action="privilege.php?act=submit_records" name="staff" id="staff" method="post" enctype="multipart/form-data" onsubmit="return formValidation()">
      <table border="1" cellspacing="0" cellpadding="0">
        <caption style="height:100px;">
          <h1>康健人生入职申请表</h1>
          <h4 style="float:right;margin-top:25px;">编号：<?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['number'];?>
&nbsp;</h4>
        </caption>
        <br />
        <tbody>
          <!-- 公司信息 -->
          <tr>
            <th>部门</th>
            <td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['role_name'];?>
</td>
            <th>应聘职位</th>
            <td ><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['job_title'];?>
</td>
            <th>入职时间</th>
            <td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['joined_date'];?>
</td>
            <td rowspan="6" id="tdPhoto">
              <img class="avator" src="<?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['avator_url'];?>
" alt="相片"/>
            </td>
          </tr>
          <!-- 个人信息 -->
          <tr>
            <th>姓名</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['staff_name'];?>
</td>
            <th>性别</th>
            <td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['sex'];?>
 </td>
            <th>出生日期</th>
            <td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['birthday'];?>
</td>
          </tr>
          <tr>
            <th>民族</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['nation'];?>
</td>
            <th>身高</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['stature'];?>
cm</td>
            <th>婚姻状况</th>
            <td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['marital_status'];?>
</td>
          </tr>
          <tr>
            <th>学历</th>
            <td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['education'];?>
</td>
            <th>籍贯</th>
            <td colspan="3"><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['native_place_txt'];?>
</td>
          </tr>
          <tr>
            <th>联系电话</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['staff_phone'];?>
</td>
            <th>身份证号</th><td colspan="3"><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['identity_card'];?>
</td>
          </tr>
          <tr>
            <th>家庭地址</th>
            <td colspan="5"><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['home_address_txt'];?>
</td>
          </tr>
          <tr>
            <th>兴趣爱好</th>
            <td colspan="6"><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['habbit'];?>
</td>
          </tr>
          <!-- 联系方式 --> <tr>
            <th>QQ</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['QQ'];?>
</td>
            <th>微信</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['wechat'];?>
</td>
            <th>E-mail</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['email'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['domitory'];?>
</td>
          </tr>
          <tr> <td colspan="8"> </td> </tr>

          <!-- 教育经历 -->
          <tr>
            <th rowspan="<?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['edu_count'];?>
">教育经历</th>
            <th>开始日期</th>
            <th>结束日期</th>
            <th colspan="2">学校名称</th>
            <th>专业</th>
            <th>学历</th>
          </tr>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['archive']->value['edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['edu_start'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['edu_end'];?>
</td>
            <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['val']->value['school'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['major'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['graduater_name'];?>
</td>
          </tr>
          <?php } ?>
          <tr> <td colspan="7"> </td> </tr>
          <!-- 工作经历 -->
          <tr>
            <th rowspan="<?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['work_count'];?>
">工作经历</th>
            <th>开始日期</th>
            <th>结束日期</th>
            <th colspan="2">工作单位</th>
            <th colspan="2">职位及职责</th>
          </tr>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['archive']->value['work']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['work_start'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['work_end'];?>
</td>
            <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['val']->value['company'];?>
</td>
            <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['val']->value['position'];?>
</td>
          </tr>
          <?php } ?>
          <tr> <td colspan="7"> </td> </tr>
          <!-- 紧急联系人 -->
          <tr>
            <th rowspan="2">紧急联系人</th>
            <th>姓名</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['emergency1']['contacter'];?>
</td>
            <th>关系</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['emergency1']['relation'];?>
</td>
            <th>联系电话</th><td colspan="2"><?php echo $_smarty_tpl->tpl_vars['archive']->value['emergency1']['phone'];?>
</td>
          </tr>
          <tr>
            <th>姓名</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['emergency2']['contacter'];?>
</td>
            <th>关系</th><td><?php echo $_smarty_tpl->tpl_vars['archive']->value['emergency2']['relation'];?>
</td>
            <th>联系电话</th><td colspan="2"><?php echo $_smarty_tpl->tpl_vars['archive']->value['emergency2']['phone'];?>
</td>
          </tr>
          <?php if ($_smarty_tpl->tpl_vars['b']->value!='print') {?>
          <tr><td colspan="7"></td></tr>
          <tr>
            <th>证书</th>
            <td colspan="6" style="padding-left:10px">
              <?php if ($_smarty_tpl->tpl_vars['archive']->value['picList']) {?>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['archive']->value['picList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <a style="<?php if ($_smarty_tpl->tpl_vars['b']->value=='print') {?>color:#ccc;padding-right:5px;<?php }?>" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['val']->value['pic_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['rec_id'];?>
</a>
              <?php } ?>
              <?php }?>
            </td>
          </tr>
          <?php }?>
          <tr><td colspan="7"></td></tr>
          <tr>
            <th style="height:65px">自我评价</th>
            <td colspan="6" style="padding-top:3px;"><?php echo $_smarty_tpl->tpl_vars['archive']->value['base']['self_appraisal'];?>
</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="7" class="inscribe">
              <p class="text" >经本人核实，以上所写情况属实</p>
              <p>签名:______________</p>
              <p>日期:____年__月__日</p>
            </td>
          </tr>
        </tfoot>
      </table>
      <p class="foot" >
      <span style="float:left;"><b>制表日期</b> ：<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
</span>
      <span><b>制表</b>&nbsp;<?php echo $_smarty_tpl->tpl_vars['admin_name']->value;?>
</span>
      </p>
    </form>
  </body>
</html>
<?php }} ?>
