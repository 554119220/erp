//
//提成系数设置
var tpUrl = '../../thinkphp/index.php?g=home'; //Tp 路径 
function siteCommission(){
  //var tpUrl = '../../thinkphp/index.php?g=home'; //Tp 路径 
  Ajax.call(tpUrl+'&c=hrm&a=siteCommission','view='+true,fullSearchResponse,'GET','JSON');
}

function siteCommissionResp(res){
}

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
