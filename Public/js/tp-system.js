function tpchkboxSelected(obj) {
    var privilegeLevel = obj.getAttribute('level');
    switch (privilegeLevel) {
        case '1':
            var sub = document.getElementById(obj.value);
            var descendentMenu = sub.getElementsByTagName('input');
            for (var i=0; i < descendentMenu.length; i++) {
                descendentMenu[i].checked = obj.checked;
            }
            break;
        case '2':
            var sub = document.getElementById(obj.getAttribute('parentCode'));
            var descendentMenu = sub.getElementsByTagName('input');
            for (var i=0; i < descendentMenu.length; i++) {
                if (descendentMenu[i].getAttribute('parentCode') == obj.value) {
                    descendentMenu[i].checked = obj.checked;
                }
            }

            var parentChkboxList = document.getElementById('privilegeList').getElementsByTagName('input');
            for (var i=0; i < parentChkboxList.length; i++) {
                if (parentChkboxList[i].getAttribute('level') == '1' && obj.getAttribute('parentCode') == parentChkboxList[i].value) {
                    parentChkboxList[i].checked = obj.checked;
                }
            }
            var chkboxList2nd = obj.parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByTagName('input');
            var availableChkboxList = new Array;
            for (var i=0; i < chkboxList2nd.length; i++) {
                if (chkboxList2nd[i].getAttribute('level') == '2') {
                    availableChkboxList.push(chkboxList2nd[i]);
                }
            }
            var checkedNumber2nd = availableChkboxList.length;
            for (var i=0; i < availableChkboxList.length; i++) {
                if (!availableChkboxList[i].checked) {
                    checkedNumber2nd--;
                }
            }
            if (!checkedNumber2nd) {
                obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.getElementsByTagName('input')[0].checked = false;
            } else {
                obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.getElementsByTagName('input')[0].checked = true;
            }
            break;
        case '3':
            var chkboxList3rd = obj.parentNode.parentNode.parentNode.getElementsByTagName('input');
            var checkedNumber = chkboxList3rd.length;
            for (var i=0; i < chkboxList3rd.length; i++) {
                if (!chkboxList3rd[i].checked) {
                    checkedNumber--;
                }
            }
            if (!checkedNumber) {
                obj.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.getElementsByTagName('input')[0].checked = false;
            } else {
                obj.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.getElementsByTagName('input')[0].checked = true;
            }
            var chkboxList2nd = obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByTagName('input');
            var availableChkboxList = new Array;
            for (var i=0; i < chkboxList2nd.length; i++) {
                if (chkboxList2nd[i].getAttribute('level') == '2') {
                    availableChkboxList.push(chkboxList2nd[i]);
                }
            }
            var checkedNumber2nd = availableChkboxList.length;
            for (var i=0; i < availableChkboxList.length; i++) {
                if (!availableChkboxList[i].checked) {
                    checkedNumber2nd--;
                }
            }
            if (!checkedNumber2nd) {
                obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.getElementsByTagName('input')[0].checked = false;
            } else {
                obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.previousSibling.previousSibling.getElementsByTagName('input')[0].checked = true;
            }
            break;
    }
}

/**
 * 保存已选权限
 */
function tpsavePrivilege() {
    var theForm = document.forms['privilegeForm'];
    var privilegeList = [];
    for (var i=0; i < theForm.elements.length; i++) {
        if (theForm.elements[i].type == 'checkbox' && theForm.elements[i].checked) {
            privilegeList.push(theForm.elements[i].value+':'+theForm.elements[i].getAttribute('level'));
        }
    }

    Ajax.call(theForm.action, 'privilege_list='+privilegeList.join(','), savePrivilegeResp, 'POST', 'JSON');
    return false;
}

function tpsavePrivilegeResp(res) {
    showMsg(res);
}
