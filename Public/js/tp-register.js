/**
 * 显示提醒消息
 */
function showMsg (msg) {
  var objDiv  = document.createElement('div');
  var objBtn  = document.getElementById('msgBtn');
  var objMsg  = document.getElementById('msg');
  var objBody = document.body;

  // 添加遮罩层
  objDiv.style.background = 'rgba(194,194,194,0.2)';
  objDiv.style.position   = 'absolute';
  objDiv.style.top        = 0;
  objDiv.style.left       = 0;
  objDiv.style.width      = '100%';
  objDiv.style.height     = '1000%';
  objDiv.style.zIndex     = 999;
  objDiv.style.opacity    = '0.6';
  objDiv.id = 'clip';

  objBody.appendChild(objDiv);

  // 隐藏溢出内容/滚动条
  objBody.style.overflow = 'hidden';

  // 显示提示信息
  objMsg.className = 'show';

  objMsg.style.left = (objMsg.parentNode.offsetWidth - objMsg.offsetWidth)/2 + 'px';
  objMsg.style.top  = (objMsg.parentNode.offsetHeight - objMsg.offsetHeight)/4 + objBody.scrollTop + 'px';

  objMsg.getElementsByTagName('h3')[0].innerHTML = msg.title ? msg.title : '消息提示';

  var objShut = document.createElement('strong');
  objShut.innerHTML = '×';
  objShut.style.float = 'right';
  objShut.style.marginRight = '0px';
  objShut.style.cursor = 'pointer';
  objMsg.getElementsByTagName('h3')[0].appendChild(objShut);

  objShut.onclick = function () {
    objMsg.className = 'hide';
    objBody.removeChild(objDiv);
    objBody.style.overflow = 'hidden';
  };

  objMsg.getElementsByTagName('p')[0].innerHTML  = msg.message;

  if (msg.timeout) {
    setTimeout(function () {
      objMsg.className = 'hide';
      objBody.removeChild(objDiv);
      objBody.style.overflow = 'hidden';
    }, msg.timeout);
  } else if (msg.swt) {
    objBtn.value = msg.btncontent ? msg.btncontent : '确定';
    objBtn.type = msg.type;
    objBtn.className = 'show';
    objBtn.setAttribute('form', msg.form_id);
    objBtn.onclick = function () {
      objMsg.className = 'hide';
      objBody.removeChild(objDiv);
      objBody.style.overflow = 'hidden';
      objBtn.className = 'hide';
    };
  } else {
    objBtn.value = msg.btncontent ? msg.btncontent : '确定';
    objBtn.className = 'show';
    objBtn.onclick = function () {
      objMsg.className = 'hide';
      objBody.removeChild(objDiv);
      objBody.style.overflow = 'auto';
      objBtn.className = 'hide';
    };
  }
}
/**
 * 员工档案信息验证
 */
function formValidation () {
  var theForm = document.forms['staff'];
  var msg = {'req_msg':true, 'timeout':2000, 'message':''};
  var i = 0;
  // 姓名
  if (!/^[\u4e00-\u9fa5]+$/gi.test(theForm.elements['staff_name'].value)) {
    msg.message = '姓名必须为中文';
    showMsg(msg);
    theForm.elements['staff_name'].focus();
    return false;
  }

  // 性别
  if ((msg.message = radioCheck('sex')) !== true) {
    showMsg(msg);
    return false;
  }

  // 出生日期
  var birthday = new Date(theForm.elements['birthday'].value);
  var d = new Date();
  var age = d.getFullYear()-birthday.getFullYear()-((d.getMonth()<birthday.getMonth()|| d.getMonth()==birthday.getMonth() && d.getDate()<birthday.getDate())?1:0);
  if (age < 18) {
    msg.message = '请认真核实您的年龄，确保符合国家法律法规规定的工作年龄！';
    showMsg(msg);
    theForm.elements['birthday'].focus();
    return false;
  }

  // 身高
  var stature = parseInt(theForm.elements['stature'].value);
  if (stature > 230 || !/^[1-2]\d{2}$/.test(stature)) {
    msg.message = '请您提供准确合理的身高！';
    showMsg(msg);
    theForm.elements['stature'].focus();
    return false;
  }

  // 婚姻状况
  if ((msg.message = radioCheck('marital_status')) !== true) {
    showMsg(msg);
    return false;
  }

  // 身份证号
  var idCard = theForm.elements['identity_card'].value;
  if (!/^[1-9]\d{16,17}X?$/.test(idCard)) {
    msg.message = '请正确填写身份证号码！';
    showMsg(msg);
    theForm.elements['identity_card'].focus();
    return false;         
  }

  // 籍贯 && 家庭地址
  if (!parseInt(theForm.elements['native_province'].value) || !parseInt(theForm.elements['native_city'].value) || !parseInt(theForm.elements['province'].value) || !parseInt(theForm.elements['city'].value) || !theForm.elements['home_address'].value) {
    msg.message = '对不起，您的籍贯或地址填写错误！';
    showMsg(msg);
    theForm.elements['home_address'].focus();
    return false;
  }

  // 照片
  // 联系电话
  var phone = theForm.elements['staff_phone'].value;
  if (!/^1\d{10}$/.test(phone)) {
    msg.message = '请填写您的手机号码！';
    showMsg(msg);
    theForm.elements['staff_phone'].focus();
    return false;
  }

  // 淘宝帐号
  if (theForm.elements['taobao'].value.length < 2) {
    msg.message = '请填写您的淘宝账号！正确的淘宝账号应不少于5个字符！';
    showMsg(msg);
    theForm.elements['taobao'].focus();
    return false;
  }

  // Email
  // 部门
  if (!theForm.elements['branch_id'].value) {
    msg.message = '请选择您所在的部门或您即将加入的部门！';
    showMsg(msg);
    return false;
  }

  // 职位
  if (!theForm.elements['job_title'].value) {
    msg.message = '请您的职位！';
    showMsg(msg);
    theForm.elements['job_title'].focus();
    return false;
  }

  // 入职时间
  if (!theForm.elements['joined_date'].value) {
    msg.message = '请您的入职日期！';
    showMsg(msg);
    theForm.elements['joined_date'].focus();
    return false;
  }

  // 公司宿舍
  if (!theForm.elements['dormitory'].value) {
    msg.message = '请选择是否有在宿舍居住！';
    showMsg(msg);
    return false;
  }

  // 教育经历
  // 工作经历

  // 紧急联系人
  if (!/^[\u4e00-\u9fa5]{2,}$/gi.test(theForm.elements['contact_name[]'][0].value) || !/^[\u4e00-\u9fa5]{2,}$/gi.test(theForm.elements['relation[]'][0].value)) {
    msg.message = '请务必填写紧急联系人信息！';
    showMsg(msg);
    return false;
  }

  // 紧急联系人电话
  var CP_0 = theForm.elements['contact_phone[]'][0].value;
  var CP_1 = theForm.elements['contact_phone[]'][1].value;
  if (!/^1[0-9]{10}/.test(CP_0) && !/^1[0-9]{10}/.test(CP_1)) {
    msg.message = '紧急联系人联系方式必须有一个手机号码！';
    showMsg(msg);
    return false;
  }

  // 紧急联系人联系方式、员工联系方式不能重复使用！
  if (CP_0 == CP_1 || CP_0 == theForm.elements['staff_phone'].value || CP_1 == theForm.elements['staff_phone'].value) {
    msg.message = '紧急联系人联系方式、员工联系方式不能重复使用！';
    showMsg(msg);
    return false;
  }

  return true;
}

/**
 * 验证radio的选项
 */
function radioCheck (inputName) {
  var theForm = document.forms['staff'];
  var msg = '';
  for (var i=0; i < theForm.elements[inputName].length; i++) {
    if (!theForm.elements[inputName][i].checked) {
      switch (inputName) {
        case 'sex'            : msg = '请选择您的性别！'; break;
        case 'marital_status' : msg = '请选择您的婚姻状况'; break;
      }
    } else {
      msg = true;
      break;
    }
  }

  return msg;
}

/**
 * 显示照片
 */
function showPhoto (obj) {
  var imgSrc        = window.URL.createObjectURL(obj.files.item(0));
  var objImg        = document.createElement('img');
  objImg.src           = imgSrc;
  objImg.style.display = 'block';
  objImg.style.width   = '140px';
  objImg.style.height  = '155px';

  var objLabel = document.getElementById('tdPhoto').getElementsByTagName('label').item(0);
  objLabel.innerHTML = '';
  objLabel.appendChild(objImg);
  objLabel.style.paddingTop = 0;
}

//列出文件
function showFiles(obj){
  var count = obj.files.length;
  var td = document.getElementById('listPic');
  td.innerHTML = '';
  for (var i = 0; i < count; i++) {
    var reader = new FileReader();
    var file = obj.files[i];
    reader.readAsDataURL(file);
    reader.onload = function(e){ 
      td.innerHTML += '<div class="rahmen"><img src="'+this.result+'" onclick="showBigPic(this)" style="width:100px;height:110px;"/><span onclick="removePic(this,'+i+')">删除</span><div>';
    }
  }
  return;
}

//查看大图
function showBigPic(obj){
  var msg = [];
  msg.message = '<img src="'+obj.src+'" style="width:600px;height:600px;">';
  showMsg(msg);
}

//移除证书
function removePic(obj,i){
 var fileObj = document.getElementById('pic'); 
 var td = document.getElementById('listPic');
 fileObj.files[i] = null;
 td.removeChild(obj.parentNode);
}
