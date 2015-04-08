function switchTag(obj){
  $.post(
      obj.getAttribute('url'),
      {tag:obj.value},
      function(data){
        if (data) {
          $('#participantField').html('');
          var obj = $("[name='participantSel'");
          obj.attr('data-placeholder',data.name);
          obj.html(data.html);
        }
      });
}

/*切换比例*/
function switchRatio(obj){
  var id        = obj.attr('value');
  var ratioList = ['identical','cumulative','product'];
  for(var i in ratioList){
    $('#'+ratioList[i]).hide();
  }
  $('#'+id).css('display',''); 
}

/*提成参与者*/
function addChecked(obj){
  var name  = obj.getAttribute('name');
  var obj   = $("[name='"+name+"']");
  var value = obj.val();
  if (value != 0) {
    var text  = obj.find('option:selected').text();
    obj.find('option:selected').attr('disabled',true);
    var divObj = $('#participantField');
    var html   = divObj.html();
    html += '<label title="点击删除"><input name="participant[]" type="checkbox" value="'
      +value+'" checked> '+text+'<input name="participant_name[]" type="checkbox" value="'
      +text+'" checked style="display:none" />'+'</label>';
    divObj.html(html);
    divObj.find('label').each(function(){
      $(this).bind('click',function(){
        removeParticipant($(this),obj);
      });
    });
  }
}

//移除参与者
function removeParticipant(item,obj){
  var value = item.find('input:checked').val();
  obj.find("[value='"+value+"']").attr('disabled',false);
  item.remove();
}

/*套用工资套账*/
function switchSalaryClass(obj){
  $.get(
      obj.getAttribute('url')+'/class_id/'+obj.value,
      function(data){
        $('#resource').html(data);
      }
      );
}

/*工资套账设置中员工列表*/
function getStaffForSalaryClass(obj){
  
}

/*修改工资项目*/
function editSalaryItem(act,itemId){
  if (itemId) {
    $.get(
        $('#url').val()+'/editSalaryItem/item_id/'+itemId+'/act/'+act,
        function (data){
          if (data) {
            $("#editForm [name='item_name']").val(data.item_name); 
            $("#editForm [name='operation_type']").each(function(){
              if ($(this).val() == data.operation_type) {
                $(this).attr('checked',true);
              }}); 
            $("#editForm [name='editable']").each(function(){
              if ($(this).val() == data.editable) {
                $(this).attr('checked',true);
              }
            });
            $("#editForm [name='default_value']").val(data.default_value); 
            if (data.expression) {
              $("#editForm [name='expression'] option").each(function(){
                if ($(this).val() == data.expression[0]) {
                  $(this).attr('selected',true);
                }}); 
              $("#editForm [name='operation'] option").each(function(){
                if ($(this).val() == data.expression[1]) {
                  $(this).attr('selected',true);
                } 
              });
              $("#editForm [name='expression_item']").val(data.expression[2]);
            }
            $("#editForm [name='level']").val(data.level);
            $("#editForm [name='item_id']").val(data.item_id);
          }
        });
  }
}

/*工资审批*/
function editSalaryApprovalForm(id){
  var url = $('#url').val();
  $.get(
      url+'/editSalaryApproval/behave/edit/approval_id/'+id,
      function(data){
        if (data) {
          $("#editForm [name='role_id'] option").each(function(){
            if ($(this).val() == data.role_id) {
              $(this).attr('selected',true);
            } 
          });
          $("#editForm [name='admin_id'] option").each(function(){
            if ($(this).val() == data.admin_id) {
              $(this).attr('selected',true);
            } 
          });

          $("#editForm [name='approval_id']").val(data.approval_id);
        }
      });
}

/*修改工资审批人*/
function editSalaryApproval(obj){

}

/*删除工资审批人*/
function delSalaryApproval(obj){
  var url = obj.getAttribute('href');
  $.get(
      url,
      function (data){
        alertFun(data);
      });
}

//提醒
function alertFun(data){
  if (!data.res) {
    $("#myAlert").removeClass('alert-success');
    $("#myAlert").addClass('alert-warning');
  }
  $("#myAlert span").html(data.text);
  $("#myAlert").css('display','inline-block');

  setTimeout(function(){
    $("#myAlert").css('display','none');
    window.top.location.href = data.href;
  },3000);
}

/*添加工资套账*/
function addSalaryClass(obj){
  if (0 != obj.elements['type'].value) {
    var div      = document.getElementById('staff_list');
    var elements = obj.elements['staff_select'].elements;
    //var elements = obj.elements['staff_select'].options;
    //var length   = obj.elements['role_id'].options.length;
    $('.search-choice-close').each(function(){
      var index = parseInt($(this).attr('data-option-array-index'))-length;
      var staffId = elements[index].value;
      div.innerHTML += '<input type="checkbox" name="staff_id[]" checked value="'+staffId+'"/>';
    });
    if (div.innerHTML) {
      obj.elements['role_id'].options[0].selected = true;
    }
  }
  return true;
}

//添加提成规则
function addCommissionRule(obj){
  var msgBox = $(".alert-warning"); 
  msgBox.find('.close').click(function(){
    msgBox.hide();
  });


  if('' == $('#participantField').html()){
    msgBox.find('span').html('没有选择提成参与者');
    msgBox.show();
    return false;
  }

  /*提成比例类型*/
  var sort2 = $('input[name="sort2"]:checked').val();
  var error = false;
  switch (sort2) {
    case 'identical' : 
      if (!$("[name='identical_commission'").val()) {
        error = true;
      }
      break;
    case 'cumulative' :
      break;
    case 'product' : break;
                     if (!$("[name='product_commission'").val()) {
                       error = true;
                     }
  }

  if (0 == $("[name='base_sales']").val()) {
    msgBox.find('span').html('没有填写保底销量');
    msgBox.show();
    $("[name='base_sales'").focus();
    return false;
  }

  if ($('[name="rule_name"').val() == '') {
    msgBox.find('span').html('没有填写备注名');
    msgBox.show();
    $("[name='rule_name'").focus();
    return false;
  }

  if (error) {
    msgBox.find('span').html('没有填写提成比例');
    msgBox.show();
    $("[name='"+sort2+"_commission']").focus();
    return false;
  }
}

//获取工资（调薪）
function getOriginalSalary(staffId){
  if (staffId) {
    $.post(
        $("[name='url']").val()+'/originalSalary',
        {staff_id:staffId},
        function(data){
          $("#salary").html(data);
        }
        );
  }
}

//获取平台和快递方式（提成设置）
function getCardinalityType(obj){
  if (document.getElementById('cardinalityType')) {
    var tableObj = obj.parentNode.parentNode.parentNode.parentNode;
    tableObj.deleteRow(1);
  }
  if (2 == obj.value || 3 == obj.value) {
    $.post(
        $("[name='url']").val()+'/getCardinalityType',
        {type:obj.value},
        function(data){
          if (data) {
            var tableObj = obj.parentNode.parentNode.parentNode.parentNode;
            var trObj      = tableObj.insertRow(obj.parentNode.parentNode.parentNode.rowIndex+1);
            var tdObj      = trObj.insertCell(0);
            tdObj.setAttribute('colspan',5);
            var selectObj  = document.createElement('select');
            selectObj.name = 'cardinalityType';
            selectObj.id   = 'cardinalityType';
            for(var i = 0; i < data.length;i++){
              var opt = document.createElement('option');
              opt.value = data[i].value;
              opt.text = data[i].name;
              selectObj.appendChild(opt);
            }
            tdObj.appendChild(selectObj);
          }
        },
          'JSON'
            );
  }else return;
}

/*部门所有或部分员工*/
function switchTr(obj){
  if (obj.value == 0) {
    $('#roleSelect').css("display",'');
    $('#staffSelect').css("display",'none');
  }else{
    $('#roleSelect').css("display",'none');
    $('#staffSelect').css("display",'');
  }
  document.getElementById('role_id').options[0].selected = true;
}

//修改调薪记录
function editAdjustSalary(logId){ 
  if (logId) {
    var url = $('#url').val();
    $.get(
        url+'/editAdjustSalary/behave/edit/log_id/'+logId,
        function(data){
         if (data) {
            $("#editForm [name='staff_id'] option").each(
              function(){
                setSelected($(this),data.staff_id);
              })
            $("#editForm [name='role_id'] option").each(
              function(){
                setSelected($(this),data.role_id);
              })
            $("#editForm [name='salary']").val(data.salary);
            $("#editForm [name='start_time']").val(data.start_time);
            $("#editForm [name='log_id']").val(data.log_id);
         } 
        });
  }
}

//修改工资套账
function editSalaryItem(obj,classId){
  var url = $('#url').val();
  $.get(
      url+'/editSalaryClass/behave/'+obj.getAttribute('behave')+'/class_id/'+classId,
      function(data){
        if (data) {
          $("#resource").html(data.main);
        }
      });
}
