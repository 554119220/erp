<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-20 10:12:27
         compiled from ".\Application\Home\View\Usersmanage\usersDetail.html" */ ?>
<?php /*%%SmartyHeaderCode:1600454fe4f03ec82e2-82188038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44242431a6fce9674e49ad1ef13174f5bcd92678' => 
    array (
      0 => '.\\Application\\Home\\View\\Usersmanage\\usersDetail.html',
      1 => 1426758964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1600454fe4f03ec82e2-82188038',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fe4f0466ff31_72253166',
  'variables' => 
  array (
    'user' => 0,
    'marketing_checked_list' => 0,
    'role_id' => 0,
    'admin_list' => 0,
    'key' => 0,
    'val' => 0,
    'contact_list' => 0,
    'addr_list' => 0,
    'disease' => 0,
    'characters' => 0,
    'order_list' => 0,
    'order' => 0,
    'g' => 0,
    'o' => 0,
    'integral_log' => 0,
    'shipping_url' => 0,
    'payment' => 0,
    'platform_list' => 0,
    'order_type' => 0,
    'province_list' => 0,
    'prov' => 0,
    'city_list' => 0,
    'city' => 0,
    'district_list' => 0,
    'district' => 0,
    'order_source' => 0,
    'service_class' => 0,
    'k' => 0,
    'service_manner' => 0,
    'service' => 0,
    'record_val' => 0,
    'friends' => 0,
    'family' => 0,
    'family_users' => 0,
    'health_file' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fe4f0466ff31_72253166')) {function content_54fe4f0466ff31_72253166($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\thinkphp\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'D:\\xampp\\htdocs\\thinkphp\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
?><div class="user_detail">
  <!-- 顾客详细信息 -->
  <div class="layout">
    <!--导航样式-->
    <div class="box_nav">
      <div class="detail_tab" style="margin:0">
        <ul>
          <li type="general" class="o_select" onclick="switchSubTab(this)"><span>基本资料</span></li>
          <li type="contact" onclick="switchSubTab(this)"><span>联系信息</span></li>
          <li type="purchase" onclick="switchSubTab(this)"><span>购买记录</span></li>
          <li type="new_order" onclick="switchSubTab(this)"><span>添加订单</span></li>
          <li type="new_service" onclick="switchSubTab(this)"><span>添加服务</span></li>
          <li type="health_archive" onclick="switchSubTab(this)"><span class="prelative">健康档案<span class="new_update_ico">1</span></span></li>
          <li type="user_family" onclick="switchSubTab(this)"><span>家庭</span></li>
          <li type="user_friends" onclick="switchSubTab(this)"><span>朋友圈</span></li>
        </ul>
      </div>
    </div>
  </div>
  <!--导航样式 end-->
  <div class="box_center user_list_info">
    <!-- 顾客基本信息 -->
    <div id="general" class="show">
      <table cellspacing="0" cellpadding="0" border="0">
        <tr>
          <th align="right"><font color="red">*</font>姓名 ：</th>
          <td width="160"><?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
<button value="users.php?act=edit&info=user_name&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="修改姓名" onclick="sendEditInfo(this)"></button></td>
          <th align="right">出生日期：</th>
          <td width="160">
            <?php echo $_smarty_tpl->tpl_vars['user']->value['birthday'];?>
<button value="users.php?act=edit&info=birthday&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="出生日期" onclick="sendEditInfo(this)"></button>
          </td>
          <th align="right">电话：</th>
          <td><?php echo $_smarty_tpl->tpl_vars['user']->value['home_phone'];?>
<button value="users.php?act=edit&info=home_phone&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="修改固话" onclick="sendEditInfo(this)"></button></td>
        </tr>
        <tr>
          <th align="right">身份证：</th>
          <td width="160"><?php echo $_smarty_tpl->tpl_vars['user']->value['id_card'];?>
<button value="users.php?act=edit&info=id_card&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="出生日期" onclick="sendEditInfo(this)"></button></td>
          <th align="right"><font color="red">*</font>性别：</th>
          <td class="w70"><?php if ($_smarty_tpl->tpl_vars['user']->value['sex']==1) {?>男<?php } elseif ($_smarty_tpl->tpl_vars['user']->value['sex']==2) {?>女<?php } elseif ($_smarty_tpl->tpl_vars['user']->value['sex']==0) {?>不详<?php }?><button value="users.php?act=edit&info=sex&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=radio" title="修改性别" onclick="sendEditInfo(this)"></button></td>
          <th align="right">手机：</th>
          <td><?php echo $_smarty_tpl->tpl_vars['user']->value['mobile_phone'];?>
<button value="users.php?act=edit&info=mobile_phone&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="修改手机" onclick="sendEditInfo(this)"></button></td>
        </tr>
        <tr>
          <th>会员等级：</th>
          <td><?php echo $_smarty_tpl->tpl_vars['user']->value['rank_name'];
if ($_smarty_tpl->tpl_vars['user']->value['card_number']) {?>：<?php echo $_smarty_tpl->tpl_vars['user']->value['card_number'];
}?></td>
          <th>已有积分：</th>
          <td><?php echo $_smarty_tpl->tpl_vars['user']->value['rank_points'];?>
</td>
          <th>阿里旺旺：</th>
          <td><?php if ($_smarty_tpl->tpl_vars['user']->value['aliww']) {?><a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $_smarty_tpl->tpl_vars['user']->value['aliww'];?>
&siteid=cntaobao&status=2&charset=utf-8" title="<?php echo $_smarty_tpl->tpl_vars['user']->value['aliww'];?>
"><img border="0" src="http://amos.alicdn.com/realonline.aw?v=2&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['aliww'];?>
&site=cntaobao&s=2&charset=utf-8" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['aliww'];?>
" /></a><?php }
echo $_smarty_tpl->tpl_vars['user']->value['aliww'];?>
<button value="users.php?act=edit&info=aliww&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="修改旺旺" onclick="sendEditInfo(this)"></button></td>
        </tr>
        <tr>
          <th>顾客类型：</th>
          <td><?php echo $_smarty_tpl->tpl_vars['user']->value['customer_type'];?>
<button value="users.php?act=edit&info=customer_type&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=select" title="修改顾客类型" onclick="sendEditInfo(this)"></button></td>
          <th align="right">经济来源：</th>
          <td><?php echo $_smarty_tpl->tpl_vars['user']->value['income'];?>
<button value="users.php?act=edit&info=income&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=select" title="修改经济来源" onclick="sendEditInfo(this)"></button></td>
          <th> QQ： </th>
          <td><?php if ($_smarty_tpl->tpl_vars['user']->value['qq']) {?><a href="tencent://message/?uin=<?php echo $_smarty_tpl->tpl_vars['user']->value['qq'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['user']->value['qq'];?>
" name="msg"><img alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['qq'];?>
" src="http://wpa.qq.com/pa?p=1:<?php echo $_smarty_tpl->tpl_vars['user']->value['qq'];?>
:17"></a><?php }
echo $_smarty_tpl->tpl_vars['user']->value['qq'];?>
<button value="users.php?act=edit&info=qq&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="修改QQ" onclick="sendEditInfo(this)"></button></td>
        </tr>
        <tr>
          <th align="right">需求：</th>
          <td><?php echo $_smarty_tpl->tpl_vars['user']->value['eff_name'];?>
<button value="users.php?act=edit&info=eff_id&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=select" title="修改需求" onclick="sendEditInfo(this)"></button></td>
          <!--th> 销售平台 ：</th>
        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['platform'];?>
<button value="users.php?act=edit&info=role_id&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=select" title="修改平台" onclick="sendEditInfo(this)"></button>
          </td-->
          <th>顾客来源：</th>
          <td><?php echo $_smarty_tpl->tpl_vars['user']->value['from_where'];?>
<button value="users.php?act=edit&info=from_where&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=select" title="修改顾客来源" onclick="sendEditInfo(this)"></button></td>
          <th> E-mail：</th>
          <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
<button value="users.php?act=edit&info=email&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="修改邮箱" onclick="sendEditInfo(this)"></button></td>
        </tr>
        <tr>
          <th>地址：</th>
          <td colspan="3">
            <span><?php echo $_smarty_tpl->tpl_vars['user']->value['province'];
echo $_smarty_tpl->tpl_vars['user']->value['city'];
echo $_smarty_tpl->tpl_vars['user']->value['district'];?>
<button value="users.php?act=edit&info=district&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=select" title="修改地址" onclick="sendEditInfo(this)"></button></span>
            <span><?php echo $_smarty_tpl->tpl_vars['user']->value['address'];?>
<button value="users.php?act=edit&info=address&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="修改地址" onclick="sendEditInfo(this)"></button></span>
          </td>
          <th> 微信：</th>
          <td><?php echo $_smarty_tpl->tpl_vars['user']->value['wechat'];?>
<button value="users.php?act=edit&info=wechat&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="修改微信" onclick="sendEditInfo(this)"></button></td>
        </tr>
        <tr>
          <th>能接受的&nbsp;<br/>沟通方式&nbsp;</th>
          <td colspan="3" id="marketing">
            <?php echo $_smarty_tpl->tpl_vars['marketing_checked_list']->value;?>

            <button value="users.php?act=edit&info=marketing&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=checkbox" title="修改优先联系方式" onclick="sendEditInfo(this)"></button>
          </td>
          <th>介绍人 ：</th>
          <td><a href="javascript:;" target="_blank" onclick="referralsDetail(<?php echo $_smarty_tpl->tpl_vars['user']->value['referrals_id'];?>
);"><?php echo $_smarty_tpl->tpl_vars['user']->value['referrals'];?>
</a></td>
        </tr>
        <!--tr>
        <th>备注：</th>
        <td colspan="5"><?php echo $_smarty_tpl->tpl_vars['user']->value['remarks'];?>
<button value="users.php?act=edit&info=remarks&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
&type=text" title="修改备注" onclick="sendEditInfo(this)"></button></td>

        </tr-->
      </table>
      <div class="user-handover">
        顾客移交：
        <select id="given_to">
          <option value="0">选择客服</option>
          <?php if (in_array($_smarty_tpl->tpl_vars['role_id']->value,array(9,27,28))) {?>
          <option value="74">会员部临时账户</option>
          <?php } else { ?>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['admin_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
          <?php } ?>
          <?php }?>
        </select>
        <input type="submit" value="确定转移" class="b_submit" onclick="userGivenTo(1)">
        <input type="button" value="拉进黑名单" class='b_submit blacklist' onclick="putInBlacklist(<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
')">
      </div>
    </div>

    <div id="contact" class="hide">
      <form name="contactInfo" onsubmit="return saveContactInfo()">
        <table border="0" style="float:left">
          <tbody>
            <th> </th>
            <td>
              <select name="contact_name" onchange="replaceToAddr(this)">
                <option value="mobile">手机</option>
                <option value="tel">电话</option>
                <option value="aliww">阿里旺旺</option>
                <option value="qq">QQ</option>
                <option value="email">E-mail</option>
                <option value="wechat">微信</option>
                <option value="addr">地址</option>
              </select>
            </td>
            <td colspan="4"><input type="text" name="contact_value" size="15" value=""></td>
            <td><input type="submit" class="b_submit" value="添 加"></td>
          </tbody>
          <tbody>
            <tr id="mobileRow">
              <th>手机：</th>
              <?php if ($_smarty_tpl->tpl_vars['contact_list']->value['mobile']) {?>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contact_list']->value['mobile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <td><?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
<span cid="<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_id'];?>
" class=" <?php if ($_smarty_tpl->tpl_vars['val']->value['is_default']==1) {?>hide<?php } else { ?>pointer<?php }?>" onclick="setDefault(this)">[默]</span></td>
              <?php } ?>
              <?php } else { ?>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <?php }?>
            </tr>
            <tr id="telRow">
              <th>电话：</th>
              <?php if ($_smarty_tpl->tpl_vars['contact_list']->value['tel']) {?>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contact_list']->value['tel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <td><?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
<span cid="<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_id'];?>
" class=" <?php if ($_smarty_tpl->tpl_vars['val']->value['is_default']==1) {?>hide<?php } else { ?>pointer<?php }?>" onclick="setDefault(this)">[默]</span></td>
              <?php } ?>
              <?php } else { ?>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <?php }?>
            </tr>
            <tr id="wechatRow">
              <th> 微信：</th>
              <?php if ($_smarty_tpl->tpl_vars['contact_list']->value['wechat']) {?>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contact_list']->value['wechat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <td><?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
<span cid="<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_id'];?>
" class=" <?php if ($_smarty_tpl->tpl_vars['val']->value['is_default']==1) {?>hide<?php } else { ?>pointer<?php }?>" onclick="setDefault(this)">[默]</span></td>
              <?php } ?>
              <?php } else { ?>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <?php }?>
            </tr>
            <tr id="tencentRow">
              <th rowspan="2"> 腾讯QQ： </th>
              <?php if ($_smarty_tpl->tpl_vars['contact_list']->value['qq']) {?>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contact_list']->value['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <td>
                <?php if ($_smarty_tpl->tpl_vars['val']->value['contact_value']) {?>
                <a href="tencent://message/?uin=<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
" name="msg">
                  <img alt="<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
" src="http://wpa.qq.com/pa?p=1:<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
:17">
                </a>
                <?php }?>
              </td>
              <?php } ?>
              <?php } else { ?>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <?php }?>
            </tr>
            <tr id="qqRow">
              <?php if ($_smarty_tpl->tpl_vars['contact_list']->value['qq']) {?>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contact_list']->value['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <td><?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
<span cid="<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_id'];?>
" class=" <?php if ($_smarty_tpl->tpl_vars['val']->value['is_default']==1) {?>hide<?php } else { ?>pointer<?php }?>" onclick="setDefault(this)">[默]</span></td>
              <?php } ?>
              <?php } else { ?>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <?php }?>
            </tr>
            <tr id="aliwwRow">
              <th>阿里旺旺：</th>
              <?php if ($_smarty_tpl->tpl_vars['contact_list']->value['aliww']) {?>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contact_list']->value['aliww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <td><?php if ($_smarty_tpl->tpl_vars['val']->value['contact_value']) {?><a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
&siteid=cntaobao&status=2&charset=utf-8" title="<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
"><img border="0" src="http://amos.alicdn.com/realonline.aw?v=2&uid=<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
&site=cntaobao&s=2&charset=utf-8" alt="<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
" /></a><?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
<span cid="<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_id'];?>
" class=" <?php if ($_smarty_tpl->tpl_vars['val']->value['is_default']==1) {?>hide<?php } else { ?>pointer<?php }?>" onclick="setDefault(this)">[默]</span><?php }?></td>
              <?php } ?>
              <?php } else { ?>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <?php }?>
            </tr>
            <tr id="emailRow">
              <th> E-mail：</th>
              <?php if ($_smarty_tpl->tpl_vars['contact_list']->value['email']) {?>
              <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contact_list']->value['email']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <td><?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
<span cid="<?php echo $_smarty_tpl->tpl_vars['val']->value['contact_id'];?>
" class=" <?php if ($_smarty_tpl->tpl_vars['val']->value['is_default']==1) {?>hide<?php } else { ?>pointer<?php }?>" onclick="setDefault(this)">[默]</span></td>
              <?php } ?>
              <?php } else { ?>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <?php }?>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['addr_list']->value) {?>
            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['addr_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['val']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['val']->index++;
 $_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['addr']['first'] = $_smarty_tpl->tpl_vars['val']->first;
?>
            <tr<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['addr']['first']) {?> id="addrRow"<?php }?>>
              <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['addr']['first']) {?>
              <th>地址：</th>
              <?php } else { ?>
              <th> </th>
              <?php }?>
              <td colspan="4">
                <?php echo $_smarty_tpl->tpl_vars['val']->value['addr'];?>

              </td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr id="addrRow">
              <th>地址：</th>
              <td colspan="4"> </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </form>
    </div>

    <!-- 个性分析 -->
    <div id="remark" class="hide">
      <table >
        <tr>
          <th>健康状况</th>
          <td>
            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['disease']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
            <label><input type="checkbox" name="disease" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['disease_id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['val']->value['disease_id'],$_smarty_tpl->tpl_vars['user']->value['disease'])) {?> checked<?php }?> style="vertical-align:middle" onclick="addOne(this)"/> <?php echo $_smarty_tpl->tpl_vars['val']->value['disease'];?>
</label>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <th>性格</th>
          <td>
            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['characters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
            <label><input type="checkbox" name="characters" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['character_id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['val']->value['character_id'],$_smarty_tpl->tpl_vars['user']->value['characters'])) {?> checked<?php }?> style="vertical-align:middle" onclick="addOne(this)"/><?php echo $_smarty_tpl->tpl_vars['val']->value['characters'];?>
</label>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration']%10==0) {?><br/><?php }?>
            <?php } ?>
          </td>
        </tr>
      </table>
    </div>

    <!-- 购买记录 -->
    <div id="purchase" class="hide">
      <div>
        <table class="purchase" cellpadding="3" cellspacing="1" style="border:1px #ccc solid !important" width="100%">
          <thead>
            <tr height="25px">
              <th width="15%">购买日期</th>
              <th width="10%">金额</th>
              <th>订单</th>
              <th>订单状态</th>
              <th width="10%">下单客服</th>
            </tr>
          </thead>
          <tbody>
            <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
            <tr <?php echo $_smarty_tpl->tpl_vars['order']->value['tr'];?>
>
              <td valign="top"><?php echo $_smarty_tpl->tpl_vars['order']->value['add_time'];?>
</td>
              <td valign="top"><?php if ($_smarty_tpl->tpl_vars['order']->value['final_amount']==9.9) {?>36.00<?php } else {
echo $_smarty_tpl->tpl_vars['order']->value['final_amount'];
}?></td>
              <td align="left" style="text-align:left">
                <details <?php if ($_smarty_tpl->tpl_vars['order']->value['goods_kind']<3) {?>open<?php }?>>
                <summary><a href="http://www.kuaidi100.com/chaxun?com=<?php echo $_smarty_tpl->tpl_vars['order']->value['shipping_code'];?>
&nu=<?php echo $_smarty_tpl->tpl_vars['order']->value['express_number'];?>
" target="_blank" style="margin-right:20px"><?php echo $_smarty_tpl->tpl_vars['order']->value['platform'];?>
：<?php if ($_smarty_tpl->tpl_vars['order']->value['order_sn']) {
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];
} else {
echo $_smarty_tpl->tpl_vars['order']->value['shipping_name'];
}?></a><?php echo $_smarty_tpl->tpl_vars['order']->value['shipping_name'];?>
</summary>
                <?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value[$_smarty_tpl->getVariable('smarty')->value['section']['goods_list']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value) {
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
                <?php if (isset($_smarty_tpl->tpl_vars['g']->value['goods_list'])) {?>
                <details>
                <summary><?php echo $_smarty_tpl->tpl_vars['g']->value['goods_name'];?>
  <?php echo $_smarty_tpl->tpl_vars['g']->value['goods_number'];?>
×￥<?php echo $_smarty_tpl->tpl_vars['g']->value['goods_price'];?>
</summary>
                <?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['g']->value['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
?>
                <p><strong><?php echo $_smarty_tpl->tpl_vars['o']->value['goods_name'];?>
</strong><wbr>（数量：<?php echo $_smarty_tpl->tpl_vars['o']->value['goods_number'];?>
）</p>
                <?php } ?>
                </details>
                <?php } else { ?>
                <p>
                <strong><?php echo $_smarty_tpl->tpl_vars['g']->value['goods_name'];?>
</strong>
                <?php echo $_smarty_tpl->tpl_vars['g']->value['goods_number'];?>
×￥<?php echo $_smarty_tpl->tpl_vars['g']->value['goods_price'];?>

                <!--<lbl name="introduction" onmouseover="getKnowlage(this,'<?php echo $_smarty_tpl->tpl_vars['g']->value['goods_sn'];?>
')" ><img class="png_btn" title="服用说明" src="images/tips_help.gif">&nbsp;&nbsp;</lbl>-->
                <!--<lbl name="goods_knowlage" onclick="getKnowlage(this,'<?php echo $_smarty_tpl->tpl_vars['g']->value['goods_sn'];?>
')" ><img class="png_btn" title="产品知识" src="images/book_open.gif">&nbsp;&nbsp;</lbl>-->
                <!--<lbl name="talk_skill" onclick="getKnowlage(this,'<?php echo $_smarty_tpl->tpl_vars['g']->value['goods_sn'];?>
')" ><img class="png_btn" title="相关话术" src="images/binocular.png">&nbsp;&nbsp;</lbl>-->
                <!--<a href="<?php echo $_smarty_tpl->tpl_vars['g']->value['goods_id'];?>
" ><img class="png_btn" title="购买平台" src="images/shop.png">&nbsp;&nbsp;</a>-->
                </p>
                <?php }?>
                <?php } ?>
                </details>
              </td>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['finaly_order_status'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['operator'];?>
</td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <!-- 积分日志 -->
      <div style="margin:3px 3px;background:#E0E0E0;color:#333;text-align:center;padding:2px;"><b>积分日志</b></div>
      <div id="integral_log">
        <?php if ($_smarty_tpl->tpl_vars['integral_log']->value==0) {?>
        <center color="#666"><h2 color="#888">无记录</h2></center>
        <?php } else { ?>
        <table class="wu_table_list tr_hover" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <th width="20%">项目</th>
            <th width="10%">改变时间</th>
            <th width="20%">当前状态</th>
            <th width="10%">当前总积分</th>
          </tr>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['integral_log']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <tr>
            <td>
              通过<?php if ($_smarty_tpl->tpl_vars['val']->value['exchange_points']>0) {
if ($_smarty_tpl->tpl_vars['val']->value['integral_way']==1) {
echo $_smarty_tpl->tpl_vars['val']->value['integral_title'];
echo $_smarty_tpl->tpl_vars['val']->value['goods_amount'];?>
元<?php } else {
echo $_smarty_tpl->tpl_vars['val']->value['integral_title'];
}?>
              <?php if ($_smarty_tpl->tpl_vars['val']->value['confirm']==0) {?>将获得<?php } else { ?>获得<?php }
echo $_smarty_tpl->tpl_vars['val']->value['exchange_points'];?>
积分
              <?php } else {
echo $_smarty_tpl->tpl_vars['val']->value['integral_title'];?>
消费<?php echo $_smarty_tpl->tpl_vars['val']->value['exchange_points'];?>

              <?php }?>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['receive_time'];?>
</td>
            <td>
              <?php if ($_smarty_tpl->tpl_vars['val']->value['confirm']==0) {?>未确认<?php } else { ?>由<?php echo $_smarty_tpl->tpl_vars['val']->value['admin_name'];?>
于<?php echo $_smarty_tpl->tpl_vars['val']->value['confirm_time'];?>
确认<?php }?>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['cur_integral'];?>
</td>
          </tr>
          <?php } ?>
        </table>
        <?php }?> 
      </div>
    </div>

    <!-- 添加新订单 -->
    <div id="new_order" class="hide">
      <fieldset>
        <legend align="left">收货人</legend>
        <form action="javascript:void(0)" name="order_info">
          <table cellpadding="3" cellspacing="1" border="0" class="mt10">
            <!--table border="1"-->
            <tr>
              <th>收货人：</th>
              <td><input type="text" name="consignee" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
"/></td>
              <td>
                <select name="tel">
                  <option value="">电话号码</option> 
                  <?php if ($_smarty_tpl->tpl_vars['user']->value['home_phone']) {?>
                  <option><?php echo $_smarty_tpl->tpl_vars['user']->value['home_phone'];?>
</option>
                  <?php }?>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contact_list']->value['tel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                  <option><?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
</option>
                  <?php } ?>
                </select>
              </td>
              <td>
                <select name="pay_id" onchange="getShipping(this)" href="<?php echo $_smarty_tpl->tpl_vars['shipping_url']->value;?>
">
                  <option value="0">支付方式</option>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['payment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                  <?php } ?>
                </select>
              </td>
              <td rowspan="2" style="padding-top:5px">
                <textarea name="remarks" style="width:174px;height:65px" placeholder="订单备注"></textarea>
              </td>
            </tr>
            <tr>
              <th>订单编号：</th>
              <td><input type="text" name="platform_order_sn" value="" onblur="checkOrderSn(this)"/></td>
              <td>
                <select name="mobile">
                  <option value="">手机号码</option>
                  <?php if ($_smarty_tpl->tpl_vars['user']->value['mobile_phone']) {?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['user']->value['mobile_phone'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value['mobile_phone'];?>
</option>
                  <?php }?>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contact_list']->value['mobile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                  <option><?php echo $_smarty_tpl->tpl_vars['val']->value['contact_value'];?>
</option>
                  <?php } ?>
                </select>
              </td>
              <td>
                <select name="shipping_id" id="shipping_id">
                  <option value="0">配送方式</option>
                </select>
              </td>
            </tr>
            <tr>
              <th> </th>
              <td>
                <select name="team">
                  <option value="0">购买平台</option>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['platform_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                  <?php } ?>
                  <?php if ($_smarty_tpl->tpl_vars['user']->value['role_id']==23) {?>
                  <option value="23">公司员工</option>
                  <?php }?>
                </select>
              </td>
              <td>
                <select name="order_type">
                  <option value="">订单类型</option>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                  <?php } ?>
                </select>
              </td>
              <td>
                <select name="admin_id">
                  <option value="0">订单归属</option>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['admin_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                  <?php } ?>
                </select>
              </td>
              <td>
                <select id="addrList" onchange="changeAddr(this)" style="width:100%">
                  <option>地址列表</option>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['addr_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['addr_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['addr'];?>
</option>
                  <?php } ?>
                </select>
              </td>
            </tr>

            <tr>
              <th>收货地址：</th>
              <td colspan="5">
                <select name="province" id="selProvinces" onchange="region.changed(this,2,'selCities')">
                  <option value="0">省</option>
                  <?php  $_smarty_tpl->tpl_vars['prov'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['prov']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['province_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['prov']->key => $_smarty_tpl->tpl_vars['prov']->value) {
$_smarty_tpl->tpl_vars['prov']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['prov']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['user']->value['province_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['prov']->value;?>
</option>
                  <?php } ?>
                </select>
                <select name="city" id="selCities" onchange="region.changed(this,3,'selDistricts')">
                  <option value="0">市</option>
                  <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['city']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['user']->value['city_id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value;?>
</option>
                  <?php } ?>
                </select>
                <select name="district" id="selDistricts">
                  <option value="0">区</option>
                  <?php  $_smarty_tpl->tpl_vars['district'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['district']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['district_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['district']->key => $_smarty_tpl->tpl_vars['district']->value) {
$_smarty_tpl->tpl_vars['district']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['district']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['user']->value['district_id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['district']->value;?>
</option>
                  <?php } ?>
                </select>
                <input type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['address'];?>
" size="45" placeholder='详细地址'/>
              </td>
            </tr>
            <tr>
              <th> </th>
              <td colspan="5">
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_source']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                <label style="display:inline"><input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['source_id'];?>
" name="order_source"/><?php echo $_smarty_tpl->tpl_vars['val']->value['source_name'];?>

                  <?php } ?>
                </td>
              </tr>
            </table>
          </form>
        </fieldset>
        <fieldset>
          <legend align="top">商品</legend>
          <div class="o_goods_search">
            <form action="javascript:void(0)" name="theForm" onsubmit="return addNewGoods();">
              <input type="text" name="search" value="" size="20" oninput="searchGoods(this)" onblur="searchGoods(this)"/>
              <select name="goods_id" id="goods_id">
                <option value="0">请先输入要搜索的商品</option>
              </select>
              &nbsp;<b>数量：</b><input type="text" name="number" value="" required pattern="^[1-9]\d{ 0,}" title="商品数量必须是大于0的整数" style="width:40px; height:17px"/>
              &nbsp;<b>单价：</b><input type="text" name="price" value="" required pattern="[0-9.]+" title="必须是有效的金额" style="width:40px;height:17px"/>
              <label style="display:inline"><input type="radio" name="is_gift" value="1" style="vertical-align:middle"/>赠品</label>
              <label style="display:inline"><input type="radio" name="is_gift" value="2" style="vertical-align:middle"/>活动</label>
              <label style="display:inline"><input type="radio" name="is_gift" value="3" style="vertical-align:middle"/>补发</label>
              <input type="submit" name="submit" value="添加" class="b_submit"/>
            </form>

            <form action="javascript:void(0)" name="goodsList" accept-charset="utf-8" style="border:0">
              <table id="goods_list" width="100%">
                <tr>
                  <th>运费</th>
                  <td><input type="text" name="shipping_fee" id="shipping_fee" value="0" onchange="calcOrderAmount()"/></td>
                  <th>商品总额</th>
                  <td><input type="text" name="goods_amount" value="0" id="goods_amount" onchange="calcOrderAmount()"/></td>
                  <th>订单总价</th><td id="order_amount"></td>
                </tr>
                <tr>
                  <th width="10%" align="center">操作</th>
                  <th align="center">商品名称</th>
                  <th width="10%" align="center">单价</th>
                  <th width="10%" align="center">购买量</th>
                  <th width="10%" align="center">说明</th>
                  <th width="15%" align="center">总价</th>
                </tr>
              </table>
            </form>
            <div class="f_r"><input type="submit" name="submit" value="提交订单" class="input_submit" onclick="addNewOrder()"/></div>
          </div>
        </fieldset>
        <fieldset>
          <legend align="top">注意事项：</legend>
          <ul class="warning">
            <li>（1）凡是下单，低于公司定价的，第一次被发现自己垫钱补齐，第二次开始翻倍处罚。违规赠品等按原价自己垫钱。</li>
            <li>（2）内部员工买货，一律请到主管处下单，有违反者，按每次100元进行罚款。</li>
            <li>（3）有违反以上两条规定的员工所在部门，组长按20元/次，主管按50元/次连带罚款。</li>
          </ul>

        </fieldset>
      </div>

      <!-- 添加新服务 -->
      <div id="new_service" class="hide">
        <div>
          <form action="javascript:void(0)" name="for_service" method="POST">
            <table width="100%" height="100%" cellpadding="0" cellspacing="0">
              <tr>
                <th>服务类型：</th>
                <td>
                  <select name="service_class" id="service_class">
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['service_class']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                    <?php } ?>
                  </select>
                </td>
                <th>服务方式：</th>
                <td>
                  <select name="service_manner" id="service_manner">
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['service_manner']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                    <?php } ?>
                  </select>
                </td>
                <th>服务时间：</th>
                <td>
                  <input id="service_time" name="service_time" type="text" value="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M');?>
" onClick="WdatePicker()"/>
                </td>
                <th></th><td></td>
              </tr>
              <tr >
                <th>服务过程：</th>
                <td valign="top" colspan="5">
                  <textarea name="logbook" type="textarea" onblur="cheLogbook(this.value)" rows="3" cols="80" class="textarea-long" style="width:89%" placeholder="服务内容不能为空"></textarea>
                  <span id="logbook" style="color:red;valign:top"></span>
                </td>
              </tr>
              <tr>
                <th></th> 
                <td style="text-align:right;" colspan="5">
                  <select name="show_sev">
                    <option value="1">显示</option>
                    <option value="0">不显示</option>
                  </select>&nbsp;
                  <input name="sub" class="b_submit" type="button" onclick="submitService(this)" value="提交"/>
                  &nbsp;<input type="button" value="预约服务" onclick="addAppointment(this)" class="b_submit"/>
                </td>
              </tr>
            </table>
          </form>
        </div>

        <!-- 服务记录 -->
        <div style="margin:5px 3px;background:#E0E0E0;color:#333;text-align:center;padding:2px;"><b>服务记录</b></div>
        <!--<form name="for_serverSeach" method="POST">-->
          <!--  起始:&nbsp;<input id="startTime" type="text" onClick="WdatePicker()"/> -->
          <!--  终止:&nbsp;<input id="endTime" type="text" onClick="WdatePicker()"/> -->
          <!--  <input type="button" onclick="searchService(1)" class="b_submit" value="搜索">-->
          <!--</form>-->
        <div id="service" style="display:block;height:240px;overflow-y:scroll">
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['service']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <p align="left"> 
          【<?php echo $_smarty_tpl->tpl_vars['val']->value['service_time'];?>
】
          <?php if ($_smarty_tpl->tpl_vars['val']->value['record']) {?>
          【 <?php  $_smarty_tpl->tpl_vars['record_val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['record_val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['val']->value['record']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['record_val']->key => $_smarty_tpl->tpl_vars['record_val']->value) {
$_smarty_tpl->tpl_vars['record_val']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['iteration']++;
?>
          <rec onclick="showRecPlayer(this);" style="cursor:pointer"><audio src="<?php echo $_smarty_tpl->tpl_vars['record_val']->value;?>
" style="width:20px; height:10px; background-color:skyblue"></audio>通话录音<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['iteration'];?>
</rec>
          <?php } ?> 】
          <?php }?>
          <font style="color:rgb(141, 141, 93)"><?php echo $_smarty_tpl->tpl_vars['val']->value['admin_name'];?>
</font>通过<font  style="color:rgb(141, 141, 93)"><?php echo $_smarty_tpl->tpl_vars['val']->value['manner'];?>
</font>进行了<font style="color:rgb(141, 141, 93)"><?php echo $_smarty_tpl->tpl_vars['val']->value['class'];?>
</font>：<?php echo $_smarty_tpl->tpl_vars['val']->value['logbook'];?>

          </p>
          <?php } ?>
        </div>
      </div>

      <!--朋友圈-->
      <div id="user_friends" class="hide">
        <div style="margin-bottom:3px">
          <?php if ($_smarty_tpl->tpl_vars['friends']->value['total']!=0) {?>
          以下是他的<font color="#FF9224"><?php echo $_smarty_tpl->tpl_vars['friends']->value['total'];?>
</font>个朋友：
          <?php }?>
        </div>
        <table cellspacing="0" class="wu_table_list tr_hover" cellpadding="0" width="100%" id="friends_table">
          <tr>
            <th width="10%">姓名</th>
            <th width="20%">联系方式</th>
            <th width="10%">进圈时间</th>
            <th width="30%">操作</th>
          </tr>
          <?php if ($_smarty_tpl->tpl_vars['friends']->value['friends_list']!=null) {?>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['friends']->value['friends_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <tr>
            <td>
              <?php if ($_smarty_tpl->tpl_vars['val']->value['first']==1) {?> <img src="images/yes.gif" /><?php }
echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>

            </td>
            <!--<td>-->
              <!--<?php if ($_smarty_tpl->tpl_vars['val']->value['healthy_file']==0) {?>-->
              <!--&nbsp;&nbsp;<label style="display:inline;cursor:pointer;" onclick="sendHealthy(<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
',<?php echo $_smarty_tpl->tpl_vars['user']->value['sex'];?>
)">健康档案</label>-->
              <!--<?php } else { ?>-->
              <!--&nbsp;&nbsp;<label style="display:inline;cursor:pointer;" onclick="cheHealthy(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
)">健康档案</label>-->
              <!--<?php }?>-->
            <!--</td>-->
            <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['mobile_phone'],10,'****',false);?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
            <td>
              <?php if ($_smarty_tpl->tpl_vars['val']->value['first']==1) {?>
              <label style="display:inline;cursor:pointer;color:#3367AC" onclick="delFriends(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
')">删除介绍人</label></td>
            <?php } else { ?>
            <label class="btn dinline" onclick="getInfo(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
)">资料</label> |
            <label class="btn dinline" onclick="delFriends(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
')">移出</label>
          </td>
          <?php }?>
        </tr>
        <?php } ?>
        <?php } else { ?>
        <td colspan="6" align="center">暂时没有添加朋友</td>
        <?php }?>
      </table>
      <div style="text-align:right;margin-top:5px">
        <form action="javascript:void(0)" onsubmit="schForFamily(1)" name="form_sch_family" style="margin-bottom:5px">
          继续添加朋友：
          <input id="friend_phone" maxlength="11" placeholder="联系电话"/>
          <input type="submit" class="b_submit" value="搜 索" />
        </form>
      </div>
    </div>

    <!--家庭成员管理-->
    <div id="user_family" class="hide">
      <div style="margin-bottom:3px">
        <?php if ($_smarty_tpl->tpl_vars['family']->value['family_total']==0) {?>
        <font color="red">
          暂时没有家庭成员，请添加！
        </font>
        <?php } else { ?>
        <?php echo $_smarty_tpl->tpl_vars['family']->value['family_name'];?>
,以下是他的<font color="#FF9224"><?php echo $_smarty_tpl->tpl_vars['family']->value['family_total'];?>
</font>个成员：
        <?php }?>
      </div>
      <table class="wu_table_list tr_hover family_table" cellspacing="0" cellpadding="0" width="100%" id="table_family_user" >
        <tr>
          <th width="15%">辈份</th>
          <th width="10%">姓名</th>
          <th width="10%">健康档案</th>
          <th width="20%">联系方式</th>
          <th width="10%">添加时间</th>
          <th width="30%">操作</th>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['family_users']->value!=null) {?>
        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['family_users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
        <tr>
          <td id="parent_<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
"><?php if ($_smarty_tpl->tpl_vars['val']->value['grade_id']==99) {?><font color="#007500"><?php echo $_smarty_tpl->tpl_vars['val']->value['grade_name'];?>
</font><?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['val']->value['grade_name'];
}
if ($_smarty_tpl->tpl_vars['val']->value['real_parent']==1) {?><font color="#3367AC">【家长】</font><?php }?></td>
          <td><label  style="cursor:pointer" onclick="getInfo(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
)"><?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
</label>
          </td>
          <td>
            <?php if ($_smarty_tpl->tpl_vars['val']->value['health_file']==0) {?>
            <label onclick="sendHealth(<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
',<?php echo $_smarty_tpl->tpl_vars['user']->value['sex'];?>
)">健康档案</label>
            <?php } else { ?>
            <label onclick="cheHealth(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
)">健康档案</label>
            <?php }?>
          </td>
          <td><?php echo $_smarty_tpl->tpl_vars['val']->value['mobile_phone'];?>
<font size="4" color="red">|</font></td>
          <td><?php echo $_smarty_tpl->tpl_vars['val']->value['input_time'];?>
</td>
          <td style="text-align:left">
            <?php if ($_smarty_tpl->tpl_vars['val']->value['grade_id']!=99) {?>
            <label style="color:#3367AC" onclick="delFamilyUser(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
')">移出家庭</label>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['val']->value['real_parent']==1) {?>
            <span id="label_parent_<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
"><label style="color:#3367ac" onclick="setRealParent(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['val']->value['grade_name'];?>
','del')">取消家长</label></span>
            <?php } else { ?>
            <span id="label_parent_<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
"><label style="color:#777" onclick="setRealParent(<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['val']->value['grade_name'];?>
','upd')">设为家长</label></span>
            <?php }?>
          </td>
        </tr>
        <?php } ?>
        <?php } else { ?>
        <td colspan="6" align="center">暂时没有添加家长成员</td>
        <?php }?>
      </table>
      <div style="text-align:right;margin-top:5px">
        <form name="form_sch_family" style="margin-bottom:5px">
          继续添加家庭成员：
          <input id="family_phone" maxlength="11" placeholder="联系电话"/>
          <input type="button" class="b_submit" onclick="schForFamily(0)" value="搜 索" />
        </form>
      </div>
    </div>
    <!-- 健康档案 -->
    <div id="health_archive" class="hide"><?php echo $_smarty_tpl->tpl_vars['health_file']->value;?>
</div>
    <input type="hidden" value="users.php" id="URI"/>
    <input type="hidden" value="user_id" id="field"/>
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
" id="ID"/>
  </div>
</div>
<?php }} ?>
