var tpUrl = '../../thinkphp/index.php?g=home'; //Tp 路径 
//搜索人事档案
function searchStaff(obj){
  var staffName = obj.elements['staff_name'].value;
  var roleId = obj.elements['role'].value;
  Ajax.call(tpUrl+'&c=hrm&a=staffList','staff_name='+staffName+'&role_id='+roleId+'&f='+true,fullSearchResponse,'GET','JSON');
}

//修改人事档案
function updateStaffArchive(obj){
  var value = obj.getAttribute('value');
  Ajax.call(tpUrl,'column_name='+obj.id+'value='+value,updateStaffArchiveResp,'GET','JSON');
}
function updateStaffArchiveResp(res){
  if (res.code) {
    var obj = document.getElementById(res.id);
    obj.parentNode.parentNode.innerHTML = res.value;
    obj.value = res.value;  
  }
  showMsg(res);
}

function getAdminList(obj){
  var name = obj.getAttribute('name');
  var url = '/thinkphp/home/hrm/staffListForSelect';
  if (obj.value) {
    if ('role_id' == name) {
      url += '/role_id/'+obj.value;
    } else if('group_id' == name) {
      url += '/group_id/'+obj.value;
    }
    $.get(
        url,
        function(res){
          var sltObj = document.getElementById('staff_id');
          sltObj.options.length = 0;
          if (res) {
            var optObj = document.createElement('option');
            optObj.text = '请选择';
            optObj.value= 0;
            sltObj.appendChild(optObj);
            for (var i in res) {
              var optObj = document.createElement('option');
              optObj.value = i;
              optObj.text = res[i];
              sltObj.appendChild(optObj);
            }
          }else{
            var optObj = document.createElement('option');
            optObj.text = '没有员工';
            sltObj.appendChild(optObj);
          }
        });
  }
}
