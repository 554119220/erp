<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-09 09:07:26
         compiled from ".\Application\Home\View\Index\statistics.html" */ ?>
<?php /*%%SmartyHeaderCode:320255525d0ce6ea059-19903012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd629249b8f445a2f1c135047818a48cd237e5f3' => 
    array (
      0 => '.\\Application\\Home\\View\\Index\\statistics.html',
      1 => 1418888382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320255525d0ce6ea059-19903012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'personIndexInfo' => 0,
    'groupRanking' => 0,
    'roleRanking' => 0,
    's' => 0,
    'msg' => 0,
    'notice' => 0,
    'public' => 0,
    'message_num' => 0,
    'stats_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5525d0ce8583b7_59182749',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5525d0ce8583b7_59182749')) {function content_5525d0ce8583b7_59182749($_smarty_tpl) {?><!--=============================================================================
#     FileName: statistics.htm
#         Desc:  
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2014-12-03 09:08:03
#      History:
=============================================================================-->
<br />
<div style="marign:12px;">
  你好！<?php echo $_SESSION['admin_name'];?>

</div>
<div style="text-align:right;width:750px">
  <a class="btn_new" href="report_forms.php?act=nature_stats">&gt;&gt;查看详细报表</a>
</div>
<div>
<table width="750px" cellpadding="0" cellspacing="0" class="index_small">
  <tr style="none">
    <td style="line-height:14px">
      <ul id="ranking_ul">
        <li>
        <div class="ranklist_div">
          <div class="ranklist_div_title center">今日订单数</div>
          <div class="center pd25">
            <h3 class="big"><?php if ($_smarty_tpl->tpl_vars['personIndexInfo']->value['todayOrder']==0) {?>0<?php } else {
echo $_smarty_tpl->tpl_vars['personIndexInfo']->value['todayOrder']['num'];
}?></h3></div>
          <hr />
          <div class="bottom">小组中排名： <b><?php echo $_smarty_tpl->tpl_vars['groupRanking']->value['today_order_num_ranking'];?>
</b></div>
          <div class="bottom">部门中排名： <b><?php echo $_smarty_tpl->tpl_vars['roleRanking']->value['today_order_num_ranking'];?>
</b></div>
        </div>
        </li>
        <li>
        <div class="ranklist_div">
          <div class="ranklist_div_title center ">今日销量</div>
          <div class="center pd25"><h3 class="<?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['personIndexInfo']->value['monthOrder']['amount'], $tmp)>11) {?>font-size-31<?php } else { ?>big<?php }?>"><?php if ($_smarty_tpl->tpl_vars['personIndexInfo']->value['todayOrder']==0) {?>0<?php } else {
echo $_smarty_tpl->tpl_vars['personIndexInfo']->value['todayOrder']['amount'];
}?></h3></div>
          <hr />    
          <div class="bottom">小组中排名： <b><?php echo $_smarty_tpl->tpl_vars['groupRanking']->value['today_order_amount_ranking'];?>
</b></div>
          <div class="bottom">部门中排名： <b><?php echo $_smarty_tpl->tpl_vars['roleRanking']->value['today_order_amount_ranking'];?>
</b></div>
        </div>
        </li>
        <li>
        <div class="ranklist_div">
          <div class="ranklist_div_title center">当月订单数</div>
          <div class="center pd25"><h3 class="big"><?php if ($_smarty_tpl->tpl_vars['personIndexInfo']->value['monthOrder']==0) {?>0<?php } else {
echo $_smarty_tpl->tpl_vars['personIndexInfo']->value['monthOrder']['num'];
}?></h3></div>
          <hr />    
          <div class="bottom">小组中排名： <b><?php echo $_smarty_tpl->tpl_vars['groupRanking']->value['month_order_num_ranking'];?>
</b></div>
          <div class="bottom">部门中排名： <b><?php echo $_smarty_tpl->tpl_vars['roleRanking']->value['month_order_num_ranking'];?>
</b></div>
        </div>
        </li>
        <li>
        <div class="ranklist_div">
          <div class="ranklist_div_title center">当月销量</div>
          <div class="center pd25"><h3 class="<?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['personIndexInfo']->value['monthOrder']['amount'], $tmp)>11) {?>font-size-31<?php } else { ?>big<?php }?>"><?php if ($_smarty_tpl->tpl_vars['personIndexInfo']->value['monthOrder']==0) {?>0<?php } else {
echo $_smarty_tpl->tpl_vars['personIndexInfo']->value['monthOrder']['amount'];
}?></h3></div>
          <hr />    
          <div class="bottom">小组中排名： <b><?php echo $_smarty_tpl->tpl_vars['groupRanking']->value['month_order_amount_ranking'];?>
</b></div>
          <div class="bottom">部门中排名： <b><?php echo $_smarty_tpl->tpl_vars['roleRanking']->value['month_order_amount_ranking'];?>
</b></div>
        </div>
        </li>
      </ul>
    </div>
  </td>
</tr>
</table>
</div>
<!--服务，任务，销量进度-->
<div class="process_div">
  <h3>各指标完成进度</h3>
  <section class="container" style="margin-top:8px;">
  <div class="progress" id="today_sale">
    <table width="100%">
      <tr>
        <td width="15%"> 今日服务完成 </td>
        <td width="70%"><div class="process_box">
            <div class="progress-bar <?php echo $_smarty_tpl->tpl_vars['s']->value['serviceSchedule'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['s']->value['serviceWidth'];?>
"></div>
            <div class="progress-content">已完成<?php echo $_smarty_tpl->tpl_vars['s']->value['servicePersent'];?>
</div>
        </div></td>
        <td width="15%" class="td_al"><b><?php echo $_smarty_tpl->tpl_vars['s']->value['serviceData'];?>
</b></td>
      </tr>
    </table>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['s']->value['monthData']) {?>
  <div class="progress" id="today_service">
    <table width="100%">
      <tr>
        <td width="15%">今日销量完成 </td>
        <td width="70%"><div class="process_box">
            <div class="progress-bar <?php echo $_smarty_tpl->tpl_vars['s']->value['todaySchedule'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['s']->value['todayWidth'];?>
"></div>
            <div class="progress-content">已完成<?php echo $_smarty_tpl->tpl_vars['s']->value['todayPersent'];?>
</div>
          </div>
        </td>
        <td width="15%" class="td_al"><b><?php echo $_smarty_tpl->tpl_vars['s']->value['todayData'];?>
</b></td>
      </tr>
    </table>
  </div>
  <div class="progress" id="month_sale">
    <table width="100%">
    <tr>
      <td width="15%">当月销量完成 </td>
      <td width="70%">
        <div class="process_box">
          <div class="progress-bar <?php echo $_smarty_tpl->tpl_vars['s']->value['monthSchedule'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['s']->value['monthWidth'];?>
"></div>
          <div class="progress-content">已完成<?php echo $_smarty_tpl->tpl_vars['s']->value['monthPersent'];?>
</div>
        </div>
      </td>
      <td width="15%" class="td_al"><b><?php echo $_smarty_tpl->tpl_vars['s']->value['monthData'];?>
</b></td>
    </tr>
  </table>
</div>
<?php } else { ?>
<div class="process"><font color="red">你还没有填写本月目标销量，请尽快填写！</div>
<?php }?>
</section>
<div style="text-align:center;clear:both;"></div>
</div>
<!--消息、公告、提醒-->
<hr />
<div style="padding:6px;" class="<?php if ($_smarty_tpl->tpl_vars['msg']->value&&$_smarty_tpl->tpl_vars['notice']->value&&$_smarty_tpl->tpl_vars['public']->value) {?>show<?php } else { ?>hide<?php }?>">
  &gt;&gt;&gt;&gt; 你有
  <button class="btn_new" value="msg" onclick="getMessage(this)"><?php echo $_smarty_tpl->tpl_vars['message_num']->value;?>
3 条信息</button>， 
  <button class="btn_new" value="notice" onclick="getMessage(this)"><?php echo $_smarty_tpl->tpl_vars['notice']->value;?>
1 条提醒</button>，
  <button class="btn_new" value="public" onclick="getMessage(this)"><?php echo $_smarty_tpl->tpl_vars['public']->value;?>
1 条公告</button>
  &gt;&gt;&gt;&gt;
</div>
<div style="margin-top:5px;" class="hide"></div>
<input type="hidden" id="date_status" value="<?php echo $_smarty_tpl->tpl_vars['stats_info']->value['date_status'];?>
"/>

<?php }} ?>
