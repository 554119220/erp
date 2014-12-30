<?php /* Smarty version Smarty-3.1.6, created on 2014-12-29 14:47:14
         compiled from "./Application/Home/View\Usersmanage\health_file.html" */ ?>
<?php /*%%SmartyHeaderCode:184455498e05894c5f0-95367328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd03e2ea8517ff5a1eccdd96326a20e459bb2e2c' => 
    array (
      0 => './Application/Home/View\\Usersmanage\\health_file.html',
      1 => 1419835609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184455498e05894c5f0-95367328',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5498e058cdfe6',
  'variables' => 
  array (
    'user_health' => 0,
    'val' => 0,
    'users' => 0,
    'case_list' => 0,
    'val_class' => 0,
    'before_case' => 0,
    'val_disease' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5498e058cdfe6')) {function content_5498e058cdfe6($_smarty_tpl) {?><!-- 顾客健康档案 -->
<div class="healthy_file">
  <div style="width:90%">
    <div class="title"><h3>顾客基本信息</h3>
      <input type="submit" form="base_info_form" class="btn_new" id="btn_base_info" value="<?php if ($_smarty_tpl->tpl_vars['user_health']->value['base_info']){?>编辑<?php }else{ ?>保存<?php }?>" onclick="editBaseInfo(this)"/>
      <span class="appendix"></span>
      <span class="menu-minus" id="ex_base_info" name="base_info" onclick="appendix(this)"></span></div>
    <div id="base_info_view" class="content" style="display:<?php if ($_smarty_tpl->tpl_vars['user_health']->value['base_info']){?>block<?php }else{ ?>none<?php }?>" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['base_info'])>1){?>1<?php }?>">
      <?php echo $_smarty_tpl->tpl_vars['user_health']->value['base_info']['user_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user_health']->value['base_info']['named'];?>
，<?php echo $_smarty_tpl->tpl_vars['user_health']->value['base_info']['base_address'];?>
人
      ，<?php echo $_smarty_tpl->tpl_vars['user_health']->value['base_info']['marry'];?>
<br/>
      是否有定期体检：<?php echo $_smarty_tpl->tpl_vars['user_health']->value['base_info']['regular_check'];?>
<br/>
      多长时间体检一次：<?php echo $_smarty_tpl->tpl_vars['user_health']->value['base_info']['cycle_check'];?>

    </div>
    <div class="content" id="base_info" style="display:<?php if ($_smarty_tpl->tpl_vars['user_health']->value['base_info']){?>none<?php }else{ ?>block<?php }?>">
      <div id="base_info_table">
        <form action="javascript:void(0)" name="base_info_form">
          <table class="table_form" cellspacing="0" border="0" id="table_info">
            <tr> 
              <th><font color="red">*</font> 性别 ：</th>
              <td>
                <label><input type="radio" name="sex" value="男" checked/>男</label>
                <label><input type="radio" name="sex" value="女"/>女</label>
              </td>
              <tr> 
                <th><font color="red">*</font> 籍贯 ：</th>
                <td><input type="text" name="born_address" value="<?php echo $_smarty_tpl->tpl_vars['user_health']->value['base_info']['base_address'];?>
"/> 省（市、自治区）</td>
              </tr>
              <tr>
                <th>当前的婚姻状况 ：</th>
                <td>
                  <label><input type="radio" name="marry" value="未婚">未婚</label>
                  <label><input type="radio" name="marry" value="已婚">已婚</label>
                  <label><input type="radio" name="marry" value="单身" checked="check">单身</label>
                </td>
              </tr>
              <tr>
                <th>是否有定期体检 ：</th>
                <td>
                  <label><input type="radio" name="recheck" value="不" checked>否</label>
                  <label><input type="radio" name="recheck" value="是">是</label>
                </td>
              </tr>
              <tr>
                <th>多长时间体检一次 ：</th>
                <td>
                  <label><input type="radio" name="cycle_check" value="半年" checked>半年</label>
                  <label><input type="radio" name="cycle_check" value="一年">一年</label>
                  <label><input type="radio" name="cycle_check" value="两年">两年</label>
                  <label><input type="radio" name="cycle_check" value="两年以上">两年以上</label>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <div class="title"><h3>血脂、血压、血糖情况</h3>
        <input type="submit" form="blood_form" class="btn_new" id="btn_blood" value="编辑" onclick="editBlood(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_blood" name="blood" onclick="appendix(this)"></span></div>
      <div id="blood_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['blood'])>1){?>1<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['user_health']->value['blood']){?>
        <table style="width:50%" class="examination" id="table_blood" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th width="15%">血糖 mmol/L</th>
            <th width="20%">血脂 mmol/L</th>
            <th width="15%">血压 mmHg</th>
            <th width="15%">体检时间</th>
          </tr>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_health']->value['blood']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <tr>
            <td width="15%"><?php echo $_smarty_tpl->tpl_vars['val']->value['blood_sugar'];?>
</td>
            <td width="20%"><?php echo $_smarty_tpl->tpl_vars['val']->value['blood_fat'];?>
</td>
            <td width="15%"><?php echo $_smarty_tpl->tpl_vars['val']->value['blood_pressure'];?>
</td>
            <td width="15%"><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
          </tr>
          <?php } ?>
        </table>
        <?php }?>
      </div>
      <div class="hide content" id="blood">
        <form action="javascript:void(0)" name="blood_form">
          <table class="table_form table_tr" border="0px" cellspacing="0">
            <tr>
              <th>血型 ：</th>
              <td>
                <label><input type="radio" name="blood" value="A型">A型 </label>
                <label><input type="radio" name="blood" value="B型">B型 </label>
                <label><input type="radio" name="blood" value="AB型">AB型 </label>
                <label><input type="radio" name="blood" value="O型">O型 </label>
              </td>
            </tr>
            <tr>
              <th>一般指标 ：</th>
              <td>
                <input type="text" name="blood_pressure" value="" placeholder="血压"/>
                <input type="text" name="blood_fat" value="" placeholder="血脂"/> mg/dL
                <input type="text" name="blood_sugar" value="" placeholder="血糖"/> mmol/L
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="title"><h3>体重情况</h3>
        <input type="submit" form="weight_form" class="btn_new" id="btn_weight" value="编辑" onclick="editWeight(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_weight" name="weight" onclick="appendix(this)"></span></div>
      <div id="weight_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['weight'])>1){?>1<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['user_health']->value['weight']){?>
        <table class="examination" id="table_weight" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th width="15%">身高</th>
            <th width="15%">体重</th>
            <th width="20%">BMI</th>
            <th width="15%">腰围</th>
            <th width="15%">臀围</th>
            <th width="20%">WHR</th>
            <th width="20%">体验时间</th>
          </tr>
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_health']->value['weight']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['height'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['weight'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['BMI'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['waistline'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['hipline'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['WHR'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
          </tr>
          <?php } ?>
        </table>
        <?php }?>
      </div>
      <div class="hide content" id="weight">
        <form action="javascript:void(0)" name="weight_form">
          <table class="table_form table_tr" border="0px" cellspacing="0">
            <tr>
              <th width="20%">身高 ：</th>
              <td>
                <input type="text" id="txt_height" name="height"/> 厘米
              </td>  
              <th>体重 ：</th>
              <td>
                <input type="text" id="txt_weight" name="weight" onblur="calculater('BMI','<?php echo $_smarty_tpl->tpl_vars['users']->value['sex'];?>
')" /> 千克
              </td>
            </tr>
            <tr>
              <th>体重指数（BMI）：</th>
              <td>
                <input type="text" name="BMI" id="txt_BMI" value="" disabled="true">  
              </td>
            </tr>
            <tr>
              <th>腰围 ：</th>
              <td>
                <input type="text" name="waistline" id="txt_waistline"/> 厘米
              </td>
              <th>臀围 ：</th>
              <td>
                <input type="text" name="hipline" id="txt_hipline" onblur="calculater('WHR','<?php echo $_smarty_tpl->tpl_vars['users']->value['sex'];?>
')" > 厘米
              </td>
            </tr>
            <tr>
              <th>腰臀比（WHR） ：</th>
              <td>
                <input type="text" name="WHR" id="txt_WHR" disabled="true" />
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="title"><h3>工作情况</h3>
        <input type="submit" form="work_form" class="btn_new" id="btn_work" value="编辑" onclick="editWorkInfo(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_work" name="work" onclick="appendix(this)"></span></div>
      <div id="work_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['work'])>1){?>1<?php }?>"></div>
      <div class="hide content" id="work">
        <form action="javascript:void(0)" name="work_form">
          <table class="table_form table_tr" cellspacing="0" border="0">
            <tr>
              <th>工作类型 ：</th>
              <td>
                <label><input type="radio" name="job_type" value="0" /> 体力劳动</label>
                <label><input type="radio" name="job_type" value="1" /> 脑力劳动</label>
              </td>
            </tr>
            <tr>
              <th>每天工作时间 ：</th>
              <td>
                <label><input type="radio" name="worktime" value="0">6小时 </label>
                <label><input type="radio" name="worktime" value="1">6&minus;8小时 </label>
                <label><input type="radio" name="worktime" value="2">8&minus;10小时 </label>
                <label><input type="radio" name="worktime" value="3">10小时</label>
              </td>
            </tr>
            <tr>
              <th>出行情况 ：</th>
              <td>
                <label><input type="checkbox" name="travel" value="地铁">地铁 </label>
                <label><input type="checkbox" name="travel" value="公交">公交 </label>
                <label><input type="checkbox" name="travel" value="步行">步行 </label>
                <label><input type="checkbox" name="travel" value="私家车">私家车 </label>
              </td>
            </tr>
            <tr>
              <th>生活工作环境 ：</th>
              <td>
                <label><input type="checkbox" name="enviroment" value="高空">高空 </label>
                <label><input type="checkbox" name="enviroment" value="高热">高热 </label>
                <label><input type="checkbox" name="enviroment" value="低温">低温 </label>
                <label><input type="checkbox" name="enviroment" value="高辐射">高辐射 </label>
                <label><input type="checkbox" name="enviroment" value="高噪音">高噪音 </label>
              </td> 
            </tr>
            <tr>
              <th>工作中有无危害健康因素 ：</th>
              <td>
                <label>
                  <input type="radio" name="healthy_element" value="0" check="checked">无
                </label>
                <label><input type="radio" name="healthy_element" value="1">有</label>
              </td>
            </tr>

          </table>
        </form>
      </div>
      <div class="title"><h3>生活习惯</h3>
        <input type="submit" form="lifestyle_form" class="btn_new" id="btn_lifestyle" value="编辑" onclick="editLifestyle(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_lifestyle" name="lifestyle" onclick="appendix(this)"></span></div>
      <div id="lifestyle_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['lifestyle'])>1){?>1<?php }?>"></div>
      <div id="lifestyle" class="hide content">
        <form action="javascript:void(0)" name="lifestyle_form">
          <table class="table_form table_tr" border="0" cellspacing="0">
            <tr>
              <th>饮食习惯和品味 ：</th>
              <td>
                <label><input type="checkbox" name="food_taste" value="喜甘甜"/>喜甘甜 </label>
                <label>
                  <input type="checkbox" name="food_taste" value="喜辛辣、刺激"/>喜辛辣、刺激
                </label>
                <label><input type="checkbox" name="food_taste" value="喜咸"/>喜咸</label>
                <label><input type="checkbox" name="food_taste" value="喜油腻"/>喜油腻</label>
                <label><input type="checkbox" name="food_taste" value="喜炙烤"/>喜炙烤</label>
                <label><input type="checkbox" name="food_taste" value="喜清淡"/>喜清淡</label>
              </td>
            </tr>
            <tr>
              <th>一日三餐时间是否固定 ：</th>
              <td>
                <label><input type="radio" name="fixed_dinner" value="否">否</label>
                <label><input type="radio" name="fixed_dinner" value="是">是</label>
              </td>
            </tr>
            <tr>
              <th>用餐时间一般为 ：</th>
              <td>
                <label><input type="radio" name="mealtime" value="0">15分钟以内</label>
                <label><input type="radio" name="mealtime" value="1">15~30分钟以内</label>
                <label><input type="radio" name="mealtime" value="2">30~60分钟以内</label>
                <label><input type="radio" name="mealtime" value="3">60分钟以上</label>
              </td>
            </tr>
            <tr>
              <th>睡眠习惯 ：</th>
              <td>
                <label><input type="radio" name="sleep_habit" value="0">早睡早起</label>
                <label><input type="radio" name="sleep_habit" value="1">早睡晚起</label>
                <label><input type="radio" name="sleep_habit" value="2">晚睡晚起</label>
                <label><input type="radio" name="sleep_habit" value="3">晚睡早起</label>
                <label><input type="radio" name="sleep_habit" value="3">不规律</label>
              </td>
            </tr>
            <tr>
              <th>入睡时间 ：</th>
              <td>
                <label>
                  <input  type="radio" name="bedtime_start" value="0"> 早于22点&nbsp;
                </label>
                <label>
                  <input  type="radio" name="bedtime_start" value="1"> 22点到23点 &nbsp;
                </label>
                <label>
                  <input  type="radio" name="bedtime_start" value="2"> 23点到0点&nbsp;
                </label>
                <label>
                  <input  type="radio" name="bedtime_start" value="3">0点后
                </label>
              </td>
            </tr>
            <tr>
              <th>睡眠质量 ：</th>
              <td>
                <label><input type="radio" name="sleep_quality" value="0"> 良好</label>
                <label><input type="radio" name="sleep_quality" value="1"> 一般</label>
                <label> <input type="radio" name="sleep_quality" value="2"> 入睡困难</label>
                <label><input type="radio" name="sleep_quality" value="3"> 早醒</label>
                <label><input type="radio" name="sleep_quality" value="4"> 易梦</label>
                <label><input type="radio" name="sleep_quality" value="5"> 多梦</label>
              </td>
            </tr>
            <tr>
              <th>睡眠时间 ：</th>
              <td>
                <label><input type="radio" name="bedtime" value="0"> &lt;6小时</label>
                <label><input type="radio" name="bedtime" value="1"> 6-8小时</label>
                <label><input type="radio" name="bedtime" value="2"> 8-10小时</label>
                <label><input type="radio" name="bedtime" value="3"> &gt;10小时</label>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="title"><h3>运动习惯</h3>
        <input type="submit" form="sport_form" class="btn_new" id="btn_sport" value="编辑" onclick="editSport(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_sport" name="sport" onclick="appendix(this)"></span></div>
      <div id="sport_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['sport'])>1){?>1<?php }?>"></div>
      <div class="hide content" id="sport">
        <form action="javascript:void(0)" name="sport_form">
          <table class="table_form table_tr" border="0" cellspacing="0">
            <tr>
              <th>每周运动次数 ：</th>
              <td>
                <label><input type="radio" name="sport_times" value="0">&le;2次</label>
                <label><input type="radio" name="sport_times" value="1">&le;3-4次</label>
                <label><input type="radio" name="sport_times" value="2">&le;5次</label>
              </td>
            </tr>
            <tr>
              <th>平均每次锻炼时间 ：</th>
              <td>
                <label><input type="radio" name="sport_time" value="0">&lt;20</label>
                <label><input type="radio" name="sport_time" value="1">20-40</label>
                <label><input type="radio" name="sport_time" value="2">40-60</label>
                <label><input type="radio" name="sport_time" value="3">&gt;60</label>
              </td>
            </tr>
            <tr>
              <th>锻炼的时间主要在 ：</th>
              <td>
                <label><input type="radio" name="sport_period" value="0">早上</label>
                <label><input type="radio" name="sport_period" value="1">中午</label>
                <label><input type="radio" name="sport_period" value="2">下午</label>
                <label><input type="radio" name="sport_period" value="3">晚上</label>
              </td>
            </tr>
            <tr>
              <th>锻炼方式 ：</th>
              <td>
                <label><input type="checkbox" name="sport_type" value="0">跑步</label>
                <label><input type="checkbox" name="sport_type" value="1">游泳</label>
                <label><input type="checkbox" name="sport_type" value="2">健身器材</label>
                <label><input type="checkbox" name="sport_type" value="3">球类</label>
                <label><input type="checkbox" name="sport_type" value="4">瑜伽</label>
                <label><input type="checkbox" name="sport_type" value="5">气功</label>
                <label><input type="checkbox" name="sport_type" value="4">其他</label>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="title"><h3>吸烟情况</h3>
        <input type="submit" form="smoke_form" class="btn_new" id="btn_smoke" value="编辑" onclick="editSmoke(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_smoke" name="smoke" onclick="appendix(this)"></span></div>
      <div id="smoke_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['smoke'])>1){?>1<?php }?>"></div>
      <div class="hide content" id="smoke">
        <form action="javascript:void(0)" name="smoke_form">
          <table class="table_form table_tr" border="0" cellspacing="0">
            <tr>
              <th>是否吸烟  ：</th>
              <td>
                <label><input type="radio" name="smoke" value="否">否</label>
                <label><input type="radio" name="smoke" value="是">是</label>
                <label><input type="radio" name="smoke" value="偶尔">偶尔</label>
                <label><input type="radio"  name="smoke" value="已戒">已戒</label>
              </td>
            </tr>
            <tr>
              <th>每日吸烟支数 ：</th>
              <td>
                <label>
                  <input type="radio" name="smoke_numbers" value="0"/>1-5支
                </label>
                <label>
                  <input type="radio" name="smoke_numbers" value="1"/>6-10支
                </label>
                <label>
                  <input type="radio" name="smoke_numbers" value="2"/>11-20支
                </label>
                <label>
                  <input type="radio" name="smoke_numbers" value="3"/>20支以上
                </label>
              </td>
            </tr>
            <tr>
              <th>烟龄</th>
              <td>
                <label><input type="radio" name="smoke_age" value="0"/>1-2年</label>
                <label><input type="radio" name="smoke_age" value="1"/>3-5年</label>
                <label><input type="radio" name="smoke_age" value="2"/>5-10年</label>
                <label><input type="radio" name="smoke_age" value="3"/>10年以上</label>
              </td>
            </tr>
            <tr>
              <th>有无被动吸烟 ：</th>
              <td>
                <label>
                  <input type="radio" name="passive_smoke" value="0"/>经常
                </label>
                <label>
                  <input type="radio" name="passive_smoke" value="1"/>偶尔
                </label>
                <label>
                  <input type="radio" name="passive_smoke" value="2"/>很少
                </label>
                <label>
                  <input type="radio" name="passive_smoke" value="3"/>从无
                </label>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="title"><h3>饮酒情况</h3>
        <input type="submit" form="drink_form" class="btn_new" id="btn_drink" value="编辑" onclick="editdrink(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_drink" name="drink" onclick="appendix(this)"></span></div>
      <div id="drink_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['drink'])>1){?>1<?php }?>"></div>
      <div class="hide content" id="drink">
        <form action="javascript:void(0)" name="drink_form">
          <table class="table_form table_tr" border="0"  cellspacing="0">
            <tr>
              <th>是否有饮酒情况 ：</th>
              <td>
                <label><input type="radio" name="drink" value="0"/>没有</label>
                <label><input type="radio" name="drink" value="2"/>偶尔</label>
                <label><input type="radio" name="drink" value="3"/>已戒</label>
              </td>
            </tr>
            <tr>
              <th>主要饮酒种类 ：</th>
              <td>
                <label>
                  <input type="checkbox" name="drink_type" value="白酒" />白酒
                </label>
                <label>
                  <input type="checkbox" name="drink_type" value="啤酒" />啤酒
                </label>
                <label>
                  <input type="checkbox" name="drink_type" value="果酒（如葡萄酒）" />果酒（如葡萄酒）
                </label>
                <label>
                  <input type="checkbox" name="drink_type" value="其它" />其它
                </label>
              </td>
            </tr>
            <tr>
              <th>如经常饮酒，每日下平均饮酒量 ：</th>
              <td>
                <input type="text" name="drink_capacity" value="95">毫升/日
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="title"><h3>过敏史</h3>
        <input type="submit" form="allergy_form" class="btn_new" id="btn_allergy" value="编辑" onclick="editAllergy(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_allergy" name="allergy" onclick="appendix(this)"></span></div>
      <div id="allergy_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['allergy'])>1){?>1<?php }?>"></div>
      <div id="allergy" class="hide content">
        <form action="javascript:void(0)" name="allergy_form">
          <table class="table_form">
            <tr>
              <th>是否有药物食物等过敏史：</th>
              <td>
                <label><input type="radio" name="allergy" value="0"/>无</label>
                <label><input type="radio" name="allergy" value="1"/>有</label>
              </td>
            </tr>
            <tr>
              <th>过敏源 ：</th>
              <td>
                <input type="text" size="80px" name="reason">
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="title"><h3>家庭病历</h3>
        <input type="submit" form="family_case_form" class="btn_new" id="btn_family_case" value="编辑" onclick="editfamilyCase(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_family_case" name="family_case" onclick="appendix(this)"></span></div>
      <div id="family_case_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['family_case'])>1){?>1<?php }?>"></div>
      <div id="family_case" class="hide content">
        <form action="javascript:void(0)" name="family_case_form">
          <table class="table_form" cellspacing="0" border="0">
            <tr>
              <th>如果有恶性肿瘤，请详细填写肿瘤类型 ：</th>
              <td>
                <input type="text" size="80px" name="tumour" />
              </td>
            </tr>
          </table> 
        </form>
      </div>
      <div class="title"><h3>既往病例</h3>
        <input type="submit" form="before_case_form" class="btn_new" id="btn_before_case" value="编辑" onclick="editBeforCase(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_before_case" name="before_case" onclick="appendix(this)"></span></div>
      <div id="before_case_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['before_case'])>1){?>1<?php }?>"></div>
      <div id="before_case" class="hide content">
        <h3>既往是否有以下疾病</h3>
        <form action="javascript:void(0)" name="before_case_form">
          <table class="table_form table_tr" border="0" cellspacing="0">
            <?php  $_smarty_tpl->tpl_vars['val_class'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val_class']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['case_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val_class']->key => $_smarty_tpl->tpl_vars['val_class']->value){
$_smarty_tpl->tpl_vars['val_class']->_loop = true;
?>
            <tr>
              <th><?php echo $_smarty_tpl->tpl_vars['val_class']->value['class'];?>
：</th>
              <td>
                <?php  $_smarty_tpl->tpl_vars['val_disease'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val_disease']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['before_case']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val_disease']->key => $_smarty_tpl->tpl_vars['val_disease']->value){
$_smarty_tpl->tpl_vars['val_disease']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['val_class']->value['class_id']==$_smarty_tpl->tpl_vars['val_disease']->value['class_id']){?> 
                <label>
                  <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['val_disease']->value['sickness_id'];?>
" name="before_disease" ><?php echo $_smarty_tpl->tpl_vars['val_disease']->value['disease'];?>

                </label>
                <?php }?>
                <?php } ?> 
              </td>
            </tr>
            <?php } ?>
          </table>
        </form>
      </div>
      <div class="title"><h3>心理</h3>
        <input type="submit" form="psychology_form" class="btn_new" id="btn_psychology" value="编辑" onclick="editPsychology(this)" />
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_psychology" name="psychology" onclick="appendix(this)"></span></div>
      <div id="psychology_view" class="content" style="display:none" value="<?php if (count($_smarty_tpl->tpl_vars['user_health']->value['psychology'])>1){?>1<?php }?>"></div>
      <div id="psychology" class="hide content">
        <form action="javascript:void(0)" name="psychology_form">
          <table class="table_form table_tr" border="0" cellspacing="0">
            <tr>
              <th>是否经常感觉压抑 ：</th>
              <td>
                <label>
                  <input type="radio" name="psy_situation1" value="0" onclick="up_answer(0,'从来不会感觉压抑')">从来不会
                </label>
                <label>
                  <input type="radio" name="psy_situation1" value="1" onclick="up_answer(0,'有时会感觉压抑')">有时会
                </label>
                <label>
                  <input type="radio" name="psy_situation1" value="2" onclick="up_answer(0,'经常会感觉压抑')">经常会
                </label>
              </td>
            </tr>
            <tr>
              <th>与人之间的沟通交往上是否有障碍 ：</th>
              <td>
                <label>
                  <input type="radio" name="psy_situation3" value="6" onclick="up_answer(1,'与人之间的沟通交往上有障碍')">有
                </label>
                <label>
                  <input type="radio" name="psy_situation3" value="7" onclick="up_answer(1,'与人之间的沟通交往上有时有障碍')">有时有
                </label>
                <label>
                  <input type="radio" name="psy_situation3" value="8" onclick="up_answer(1,'与人之间的沟通交往上没有障碍')">没有
                </label>
              </td>
            </tr>
            <tr>
              <th>是否感觉工作使身心疲惫 ：</th>
              <td>
                <label>
                  <input type="radio" name="psy_situation4" value="9" onclick="up_answer(1,'与人之间的沟通交往上没有障碍')">从来不会
                </label>
                <label>
                  <input type="radio" name="psy_situation4" value="10" onclick="up_answer(1,'与人之间的沟通交往上没有障碍')">有时会
                </label>
                <label>
                  <input type="radio" name="psy_situation4" value="11" onclick="up_answer(1,'与人之间的沟通交往上没有障碍')">经常会
                </label>
              </td>
            </tr>
            <tr>
              <th>是否对自己充满信心 ：</th>
              <td>
                <label>
                  <input type="radio" name="psy_situation5" value="12">从来不是
                </label>
                <label>
                  <input type="radio" name="psy_situation5" value="13">有时是
                </label>
                <label>
                  <input type="radio" name="psy_situation5" value="14">经常是
                </label>
              </td>
            </tr>
            <tr>
              <th>对生活是不感到满意 ：</th>
              <td>
                <label>
                  <input type="radio" name="psy_situation6" value="15">很满意
                </label>
                <label>
                  <input type="radio" name="psy_situation6" value="16">较满意
                </label>
                <label>
                  <input type="radio" name="psy_situation6" value="17">不满意
                </label>
              </td>
            </tr>
            <tr>
              <th>是否关注心理健康 ：</th>
              <td>
                <label>
                  <input type="radio" name="psy_situation7" value="18">很关注
                </label>
                <label>
                  <input type="radio" name="psy_situation7" value="19">较关注
                </label>
                <label>
                  <input type="radio" name="psy_situation7" value="20">不关注
                </label>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="title"><h3>其它</h3>
        <input type="submit" form="other_form" class="btn_new" id="btn_other" value="编辑" onclick="editOther(this)"/>
        <span class="appendix"></span>
        <span class="menu-plus" id="ex_other" name="other" onclick="appendix(this)"></span></div>
      <div id="other_view" class="content" style="display:none"></div>
      <div id="other" class="hide content">
        <form action="javascript:void(0)" name="other_form">
          <h4>目前身体存在哪些不适症状？（若无可不填写）</h4>
          <table class="table_form" border="0" cellspacing="0">
            <tr>
              <td>
                <textarea style="width:98%" rows="5" name="other" ></textarea>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
" id="ID"/>
</div>
<?php }} ?>