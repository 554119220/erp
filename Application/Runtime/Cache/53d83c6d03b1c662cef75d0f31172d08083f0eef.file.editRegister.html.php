<?php /* Smarty version Smarty-3.1.6, created on 2015-01-15 17:41:54
         compiled from "./Application/Home/View\Hrm\editRegister.html" */ ?>
<?php /*%%SmartyHeaderCode:775854b633fe382182-21507543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53d83c6d03b1c662cef75d0f31172d08083f0eef' => 
    array (
      0 => './Application/Home/View\\Hrm\\editRegister.html',
      1 => 1421314909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '775854b633fe382182-21507543',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_54b633fe6217b',
  'variables' => 
  array (
    'publicUrl' => 0,
    'formUrl' => 0,
    'number' => 0,
    'base' => 0,
    'role_list' => 0,
    'val' => 0,
    'province_list' => 0,
    'key' => 0,
    'native_city' => 0,
    'city' => 0,
    'district' => 0,
    'edu' => 0,
    'edu_count' => 0,
    'work' => 0,
    'work_count' => 0,
    'emergency1' => 0,
    'emergency2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b633fe6217b')) {function content_54b633fe6217b($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
    <title>康健人生入职申请表</title>
    <meta charset="utf-8" />
    <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/styles/staff.css" rel="stylesheet" />
    <script src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/tp-register.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/tp-region.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/tp-hrm.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/tp-transport.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['publicUrl']->value;?>
/js/My97DatePicker/WdatePicker.js" type="text/javascript"></script>
  </head>
  <body>
    <form action="<?php echo $_smarty_tpl->tpl_vars['formUrl']->value;?>
" name="staff" id="staff" method="post" enctype="multipart/form-data" onsubmit="return formValidation()">
      <table border="1" cellspacing="0" cellpadding="0">
        <thead>
          <td colspan="9">
            康健人生入职申请表
            <h6>编号：<?php echo $_smarty_tpl->tpl_vars['number']->value;?>
&nbsp;</h6>
            <input type="hidden" name="staff_id" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['staff_id'];?>
"/>
          </td>
        </thead>
        <tbody>
          <!-- 公司信息 -->
          <tr>
            <th>部门</th>
            <td>
              <select name="branch_id" id="branch_id">
                <option value="0">请选择</option>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['role_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['role_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['base']->value['branch_id']==$_smarty_tpl->tpl_vars['val']->value['role_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</option>
                <?php } ?>
              </select>
            </td>
            <th>应聘职位</th>
            <td>
              <input type="text" name="job_title" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['job_title'];?>
" id="job_title" placeholder="应聘或当前职位"/></td>
            <td>
              <input class="datePicker" type="text" name="joined_date" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['joined_date'];?>
" onClick="WdatePicker()" placeholder="入职日期">
            </td>
            <th>公司宿舍</th>
            <td>
              <select name="dormitory">
                <option value="0" <?php if ($_smarty_tpl->tpl_vars['base']->value['dormitory']==0){?>selected<?php }?>>不入住</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['base']->value['dormitory']==1){?>selected<?php }?>>入住</option>
              </select>
            </td>
          </tr>
          <!-- 个人信息 -->
          <tr>
            <th>姓名</th><td>
              <input type="text" name="staff_name" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['staff_name'];?>
"/></td>
            <th>性别</th>
            <td>
              &nbsp;<label><input type="radio" name="sex" value="1" <?php if ($_smarty_tpl->tpl_vars['base']->value['sex']=='男'){?>checked<?php }?>/> 男</label>
              &nbsp;<label><input type="radio" name="sex" value="2" <?php if ($_smarty_tpl->tpl_vars['base']->value['sex']=='女'){?>checked<?php }?>//> 女</label>
            </td>
            <th>出生日期</th>
            <td>
              <input class="datePicker" type="text" name="birthday" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['birthday'];?>
" placeholder="农历" onClick="WdatePicker()">
            </td>
            <td rowspan="6" id="tdPhoto">
              <label for="avator" <?php if ($_smarty_tpl->tpl_vars['base']->value['avator_url']){?>style="padding-top:0px;"<?php }?>>
                <?php if ($_smarty_tpl->tpl_vars['base']->value['avator_url']){?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['base']->value['avator_url'];?>
" style="display: block; width: 140px; height: 155px;"></img>
                <?php }else{ ?>点击上传照片<?php }?>
              </label>
            </td>
            <input type="file" name="avator" id="avator" onchange="showPhoto(this)"/>
          </tr>
          <tr>
            <th>民族</th><td> <input type="text" name="nation" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['nation'];?>
" maxlength="18"/></td>
            <th>身高</th><td><input type="text" name="stature" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['stature'];?>
" maxlength="3"/></td>
            <th>婚姻状况</th>
            <td>
              &nbsp;<label><input type="radio" name="marital_status" value="0" <?php if (!$_smarty_tpl->tpl_vars['base']->value['marital_status']){?>checked<?php }?>/>未婚</label>
              <label><input type="radio" name="marital_status" value="1" <?php if ($_smarty_tpl->tpl_vars['base']->value['marital_status']){?>checked<?php }?>//>已婚</label>
            </td>
          </tr>
          <tr>
            <th>学历</th>
            <td>
              <select name="education">
                <option value="0" <?php if ($_smarty_tpl->tpl_vars['base']->value['education']==0){?>selected<?php }?>>初中</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['base']->value['education']==1){?>selected<?php }?>>高中/中专</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['base']->value['education']==2){?>selected<?php }?>>大专</option>
                <option value="3" <?php if ($_smarty_tpl->tpl_vars['base']->value['education']==3){?>selected<?php }?>>本科</option>
                <option value="4" <?php if ($_smarty_tpl->tpl_vars['base']->value['education']==4){?>selected<?php }?>>硕士</option>
              </select>
            </td>
            <th>籍贯</th>
            <td>
              <select name="native_province" onchange="region.changed(this, 2, 'native_city')">
                <option value="0">选择省份</option>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['base']->value['native_province']==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                <?php } ?>
              </select>
            </td>
            <td colspan="2">
              <select name="native_city" id="native_city">
                <option value="0">选择市区</option>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['native_city']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['base']->value['native_city']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>联系电话</th><td><input type="text" name="staff_phone" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['staff_phone'];?>
" maxlength="11"/></td>
            <th>身份证号</th><td colspan="3"><input type="text" name="identity_card" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['identity_card'];?>
" maxlength="18" style="text-align:left;"/></td>
          </tr>
          <tr>
            <th>家庭地址</th>
            <td colspan="5">
              <div class="address">
                <select name="province" id="selProvinces" onchange="region.changed(this, 2, 'selCities')">
                  <option value="0">选择省份</option>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['base']->value['province']==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                  <?php } ?>
                </select>
              </div>
              <div class="address">
                <select name="city" id="selCities" onchange="region.changed(this, 3, 'selDistricts')">
                  <option value="0">选择市区</option>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['base']->value['city']==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                  <?php } ?>
                </select>
              </div>
              <div class="address">
                <select name="district" id="selDistricts">
                  <option value="0">选择城镇</option>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['district']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['base']->value['district']==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                  <?php } ?>
                </select>
              </div>
              <div class="address">
                <input type="text" name="home_address" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['home_address'];?>
" placeholder="精确到街道门牌号或村"/>
              </div>
            </td>
          </tr>
          <tr>
            <th>兴趣爱好</th>
            <td colspan="6"><input type="text" name="habbit" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['habbit'];?>
" style="text-align:left;"/></td>
          </tr>
          <!-- 联系方式 --> <tr>
            <th>QQ</th><td><input type="text" name="QQ" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['QQ'];?>
"/> </td>
            <th>微信</th><td> <input type="text" name="wechat" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['wechat'];?>
"/> </td>
            <th>E-mail</th><td colspan="2"> <input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['base']->value['email'];?>
" placeholder="务必填写常用邮箱"/></td>
          </tr>
          <tr> <td colspan="8"> </td> </tr>

          <!-- 教育经历 -->
          <tr>
            <th rowspan="<?php if ($_smarty_tpl->tpl_vars['edu']->value){?><?php echo $_smarty_tpl->tpl_vars['edu_count']->value;?>
<?php }else{ ?>4<?php }?>">教育经历</th>
            <th>开始日期</th>
            <th>结束日期</th>
            <th colspan="2">学校名称</th>
            <th>专业</th>
            <th>学历</th>
          </tr>
          <?php if ($_smarty_tpl->tpl_vars['edu']->value){?>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['edu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <tr>
            <td>
              <input class="datePicker" type="text" name="edu_start[]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['edu_start'];?>
" onClick="WdatePicker()">
            </td>
            <td>
              <input class="datePicker" type="text" name="edu_end[]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['edu_end'];?>
" onClick="WdatePicker()">
            </td>
            <td colspan="2"><input type="text" name="school[]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['school'];?>
"/></td>
            <td><input type="text" name="major[]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['major'];?>
"/></td>
            <td>
              <select name="graduater[]">
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['val']->value['graduater']==1){?>selected<?php }?>>初中</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['val']->value['graduater']==2){?>selected<?php }?>>高中/中专</option>
                <option value="3" <?php if ($_smarty_tpl->tpl_vars['val']->value['graduater']==3){?>selected<?php }?>>大专/本科</option>
              </select>
            </td>
          </tr>
          <?php } ?>
          <?php }else{ ?>
<tr>
            <td>
              <input class="datePicker" type="text" name="edu_start[]" value="" onClick="WdatePicker()">
            </td>
            <td>
              <input class="datePicker" type="text" name="edu_end[]" value="" onClick="WdatePicker()">
            </td>
            <td colspan="2"><input type="text" name="school[]" value=""/></td>
            <td><input type="text" name="major[]" value=""/></td>
            <td>
              <select name="graduater[]">
                <option value="1" selected>初中</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <input class="datePicker" type="text" name="edu_start[]" value="" onClick="WdatePicker()">
            </td>
            <td>
              <input class="datePicker" type="text" name="edu_end[]" value="" onClick="WdatePicker()">
            </td>
            <td colspan="2"><input type="text" name="school[]" value=""/></td>
            <td><input type="text" name="major[]" value=""/></td>
            <td>
              <select name="graduater[]">
                <option value="2">高中/中专</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <input class="datePicker" type="text" name="edu_start[]" value="" onClick="WdatePicker()">
            </td>
            <td>
              <input class="datePicker" type="text" name="edu_end[]" value="" onClick="WdatePicker()">
            </td>
            <td colspan="2"><input type="text" name="school[]" value=""/></td>
            <td><input type="text" name="major[]" value=""/></td>
            <td>
              <select name="graduater[]">
                <option value="3">大专/本科</option>
              </select>
            </td>
          </tr>
         <?php }?> 
          <tr> <td colspan="7"> </td> </tr>
          <!-- 工作经历 -->
          <tr>
            <th rowspan="<?php if ($_smarty_tpl->tpl_vars['work']->value){?><?php echo $_smarty_tpl->tpl_vars['work_count']->value;?>
<?php }else{ ?>4<?php }?>">工作经历</th>
            <th>开始日期</th>
            <th>结束日期</th>
            <th colspan="2">工作单位</th>
            <th colspan="2">职位及职责</th>
          </tr>
          <?php if ($_smarty_tpl->tpl_vars['work']->value){?>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['work']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <tr>
            <td>
              <input class="datePicker" type="text" name="work_start[]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['work_start'];?>
" onClick="WdatePicker()">
            </td>
            <td>
              <input class="datePicker" type="text" name="work_end[]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['work_end'];?>
" onClick="WdatePicker()">
            </td>
            <td colspan="2"><input type="text" name="company[]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['company'];?>
" placeholder="请填写公司全名"/> </td>
            <td colspan="2"> 
              <textarea name="position[]"><?php echo $_smarty_tpl->tpl_vars['val']->value['position'];?>
</textarea>
          </tr>
          <?php } ?>
          <?php }else{ ?>
          <tr>
            <td>
              <input class="datePicker" type="text" name="work_start[]" value="" onClick="WdatePicker()">
            </td>
            <td>
              <input class="datePicker" type="text" name="work_end[]" value="" onClick="WdatePicker()">
            </td>
            <td colspan="2"><input type="text" name="company[]" value="" placeholder="请填写公司全名"/> </td>
            <td colspan="2"> 
              <textarea name="position[]"></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <input class="datePicker" type="text" name="work_start[]" value="" onClick="WdatePicker()">
            </td>
            <td>
              <input class="datePicker" type="text" name="work_end[]" value="" onClick="WdatePicker()">
            </td>
            <td colspan="2"><input type="text" name="company[]" value="" placeholder="请填写公司全名"/></td>
            <td colspan="2"> 
              <textarea name="position[]"></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <input class="datePicker" type="text" name="work_start[]" value="" onClick="WdatePicker()">
            </td>
            <td>
              <input class="datePicker" type="text" name="work_end[]" value="" onClick="WdatePicker()">
            </td>
            <td colspan="2"><input type="text" name="company[]" value="" placeholder="请填写公司全名"/> </td>
            <td colspan="2"> 
              <textarea name="position[]"></textarea>
            </td>
          </tr>
          <?php }?>
          <tr> <td colspan="7"> </td> </tr>

          <!-- 紧急联系人 -->
          <tr>
            <th rowspan="2">紧急联系人</th>
            <th>姓名</th><td><input type="text" name="contact_name[]" value="<?php echo $_smarty_tpl->tpl_vars['emergency1']->value['contacter'];?>
"/></td>
            <th>关系</th><td> <input type="text" name="relation[]" value="<?php echo $_smarty_tpl->tpl_vars['emergency1']->value['relation'];?>
"/></td>
            <th>联系电话</th><td colspan="2"> <input type="text" name="contact_phone[]" value="<?php echo $_smarty_tpl->tpl_vars['emergency1']->value['phone'];?>
" maxlength="11"/></td>
          </tr>
          <tr>
            <th>姓名</th><td><input type="text" name="contact_name[]" value="<?php echo $_smarty_tpl->tpl_vars['emergency2']->value['contacter'];?>
"/></td>
            <th>关系</th><td> <input type="text" name="relation[]" value="<?php echo $_smarty_tpl->tpl_vars['emergency2']->value['relation'];?>
"/></td>
            <th>联系电话</th><td colspan="2"> <input type="text" name="contact_phone[]" value="<?php if ($_smarty_tpl->tpl_vars['emergency2']->value['phone']){?><?php echo $_smarty_tpl->tpl_vars['emergency2']->value['phone'];?>
<?php }?>" maxlength="11"/></td>
          </tr>
          <tr><td colspan="7"></td></tr>
          <tr>
            <th style="height:65px">自我评价</th>
            <td colspan="6" style="padding-top:3px;">
              <textarea name="self_appraisal" style="resize:none;padding-left:3px;width:99%;"><?php echo $_smarty_tpl->tpl_vars['base']->value['self_appraisal'];?>
</textarea>
            </td>
          </tr>
          <tr><td colspan="7"></td></tr>
          <tr>
            <th rowspan="3">上传证书</th>
            <td colspan="2">
              <input type="file" name="pic[]" id="pic" value="" multiple onchange="showFiles(this)"/>
            </td>
            <td colspan="4">&nbsp;
              <font color="#999">提示：若未删除原来的图片，新图片是不会覆盖原先的图片</font></td>
          </tr>
          <tr>
            <td colspan="6" id="listPic"></td>
          </tr>
          <tr><td colspan="6"><strong> ↑↑↑ 毕业证、学位证及其它资格证 可一次上传多个文件 </strong></td></tr>
        </tbody>
        <tfoot>
          <td colspan="7">
            <span style="color:#665B5B;font-size:12px;">
              ※注：本档案所有内容，请务必准确详实填写。如因信息错误，造成的后果由本人承担！
            </span>
            <input type="submit" name="submit_records" value="修改" id="submit_records"/>
          </td>
        </tfoot>
      </table>
    </form>
    <div id="msg" class="hide">
      <h3></h3>
      <p></p>
      <input type="button" value="" id="msgBtn" class="hide">
    </div>
  </body>
</html>
<?php }} ?>