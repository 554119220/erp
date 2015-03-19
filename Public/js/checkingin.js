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
            $("#editForm [name='type_id']").val(data.type_id);
          }
        });
  }
  return false; 
}

//登记迟到
function lateRecord(){
  return true;
}
