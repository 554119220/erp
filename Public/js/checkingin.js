/*=============================================================================
#     FileName: checkingin.js
#         Desc: 考勤功能
#       Author: Wuyuanhang
#        Email: 1828343841@qq.com
#     HomePage: kjrs_crm
#      Version: 0.0.1
#   LastChange: 2015-03-11 10:24:02
#      History:
=============================================================================*/
/*修改考勤类型*/
function controlVacate(typeId,act){
  if (typeId) {
    $.get(
        $("#url").val()+'/controlCheckinginType/type_id/'+typeId+'/act/'+act,
        function (data){
          if (data) {
            $("#editForm [name='name']").val(data.type_name);
            $("#editForm [name='type'] option ").each(
              function(){
                if($(this).val() == data.parent_id){
                  $(this).attr('selected',true);
                }
              });
            for (var i in data.salary_rule) {
              $("#editForm [name='times']").val(data.salary_rule[0]);
              $("#editForm [name='operation'] option").each(function(){
                if ($(this).val() == data.salary_rule[1]) {
                  $(this).attr('selected',true);
                }
              });
              $("#editForm [name='rule_item'] option").each(function(){
                if ($(this).val() == data.salary_rule[2]) {
                  $(this).attr('selected',true);
                }
              });
              $("#editForm [name='salary_rule']").val(data.salary_rule[3]);
            }
            $("#editForm [name='type_id']").val(data.type_id);
            $("#editForm [name='check_id']").val(data.check_id);
          }
        });
  }
  return false; 
}

//修改加班设置
function editOt(checkId){
  if (checkId) {
    $.get(
        $('#url').val()+'/editOt/check_id/'+checkId+'/behave/edit',
        function (data){
          if (data) {
            $("#editForm [name='role_id'] option").each(
              function(){
                if ($(this).val() == data.role_id) {
                  $(this).attr('selected',true);
                } 
              });
            $("#editForm [name='staff_id'] option").each(
              function(){
                if ($(this).val() == data.staff_id) {
                  $(this).attr('selected',true);
                }
              });
            $("#editForm [name='start_time']").val(data.start_time);
            $("#editForm [name='date']").val(data.date);
            $("#editForm [name='reason']").val(data.reason);
            $("#editForm [name='check_id']").val(data.check_id);
          }
        }); 
  }else{
    return false;
  }
}

/*修改*/
function editCheckinginApproal(approvalId){
  if (approvalId) {
    $.get(
        $('#url').val()+'/editApproval/behave/edit/approval_id/'+approvalId,
        function(data){
          if (data) {
            $("#editForm [name='role_id'] option").each(
              function(){
                if ($(this).val() == data.role_id) {
                  $(this).attr('selected',true);
                }
              });
            $("#editForm [name='type_id'] option").each(
              function(){
                if ($(this).val() == data.type_id) {
                  $(this).attr('selected',true);
                }
              });
            $("#editForm [name='staff_id'] option").each(
              function(){
                if ($(this).val() == data.staff_id) {
                  $(this).attr('selected',true);
                }
              });
            $("#editForm [name='approval_id']").val(data.approval_id);
          }
        });
  }
}
//继续添加考勤薪资规则
function moreCheckinginRule(obj){
  var trObj                   = obj.parentNode.parentNode;
  var tableObj                = trObj.parentNode;
  var index                   = trObj.rowIndex;
  var insertTr                = tableObj.insertRow(index+1);
  insertTr.innerHTML          = trObj.innerHTML;
  var btn                     = insertTr.cells[1].getElementsByTagName('label');
  insertTr.cells[0].innerHTML = '';
  btn                         = btn[0];
  btn.innerHTML               = '－'
    btn.onclick                 = function(){
      removeTr(insertTr); 
    }
}
//删除行
function removeTr(obj){
  obj.parentNode.deleteRow(obj.rowIndex);
} 
