/**
 * 动态获取配送方式
 */
function tpgetShipping (obj) {
    if (obj.value == 0) return false;
    Ajax.call(obj.getAttribute('href')+'/id/'+obj.value, '', tpgetShippingResponse, 'GET', 'JSON');
}

function tpgetShippingResponse (res) {
    var selObj = document.getElementById('shipping_id');
    selObj.length = 0;
    var opt = document.createElement('option');
    opt.text = '配送方式';
    opt.value = 0;
    selObj.add(opt);

    for (var i=0; i<res.length; i++){
        var opt = document.createElement('option'); 
        opt.text = res[i].shipping_name;
        opt.value = res[i].shipping_id;
        selObj.add(opt);
    }
}

function tpaddNewUser() {
    var theForm = document.forms['theForms'];
    var data   = {};
    for (var i=0; i < theForm.elements.length; i++) {
        if (theForm.elements[i].type == 'checkbox' || theForm.elements[i].type == 'radio' || /\[\d{0,}\]/.test(theForm.elements[i].name)) {
            continue;
        }
        if (theForm.elements[i].name) {
            data[theForm.elements[i].name] = theForm.elements[i].value;
        }
    }

    // 性别
    var sex = false; 
    for (var i=0; i < theForm.elements['sex'].length; i++) {
        if (theForm.elements['sex'][i].checked) {
            sex = theForm.elements['sex'][i].value;
            break;
        }
    }
    if (!sex) {
        showMsg({req_msg:true,timeout:2000,message:'请选择性别'});
        return false;
    }
    data['sex'] = sex;

    // 性格
    var character = [];
    for (var i=0; i < theForm.elements['character[]'].length; i++) {
        if (theForm.elements['character[]'][i].checked) {
            character.push(theForm.elements['character[]'][i].value);
        }
    }

    // 疾病
    var disease = [];
    for (var i=0; i < theForm.elements['disease[]'].length; i++) {
        if (theForm.elements['disease[]'][i].checked) {
            disease.push(theForm.elements['disease[]'][i].value);
        }
    }

    // 社会关系
    var rowsObj = document.getElementById('socialTable').tBodies[0].getElementsByTagName('tr');
    var social = {};
    for (var i in rowsObj) {
        var cellsObj = rowsObj[i].children;
        var subSocial = {};
        for (var j in cellsObj) {
            if (!isNaN(j) && cellsObj[j].children[0].tagName != 'IMG') {
                var name = cellsObj[j].children[0].name.replace(/\[\d+\]/, '');
                if (cellsObj[j].children[0].type != 'radio') {
                    subSocial[name] = cellsObj[j].children[0].value;
                } else {
                    if (cellsObj[j].children[0].checked) {
                        subSocial[name] = cellsObj[j].children[0].value;
                    } else if (cellsObj[j].children[1].checked) {
                        //console.log(cellsObj[j].children[1]);
                        subSocial[name] = cellsObj[j].children[0].value;
                    }
                }
            }
        }
        social[i] = subSocial;
    }

    if (!data['user_name'].length) {
        showMsg({req_msg:true,timeout:2000,message:'请填写顾客姓名！'});
        return false;
    }
    if (!/\d{6,8}/.test(data['home_phone']) && !/[13,14,15,18,17]{1}\d{9}/.test(data['mobile_phone'])) {
        var message = '固定电话、手机号码必须填写一项！';
        if (/^0\d{11}/.test(data['mobile_phone'])) {
            message = '手机号码前请勿加0！';
        }
        showMsg({req_msg:true,timeout:2000,message:message});
        return false;
    }
    if (!data['role_id']) {
        showMsg({req_msg:true,timeout:2000,message:'请选择顾客归属平台！'});
        return false;
    }
    if (!data['province']) {
        showMsg({req_msg:true,timeout:2000,message:'请选择省/直辖市！'});
        return false;
    }
    if (!data['city']) {
        showMsg({req_msg:true,timeout:2000,message:'请选择城市！'});
        return false;
    }
    if (!data['address'].length) {
        showMsg({req_msg:true,timeout:2000,message:'请填写地址！'});
        return false;
    }
    if (!data['from_where']) {
        showMsg({req_msg:true,timeout:2000,message:'请选择顾客来源！'});
        return false;
    }
    if (!data['customer_type']) {
        showMsg({req_msg:true,timeout:2000,message:'请选择购买力！'});
        return false;
    }
    if (!data['eff_id']) {
        showMsg({req_msg:true,timeout:2000,message:'请选择顾客分类！'});
        return false;
    }

    // 验证数据
    Ajax.call(theForm.action,'data='+JSON.stringify(data)+'&character='+JSON.stringify(character)+'&disease='+JSON.stringify(disease)+'&social='+JSON.stringify(social),tpaddNewUserResp,'POST','JSON');
    return false;
}

function tpaddNewUserResp (resp) {
    showMsg(resp);
}

function tpisRepeat() {
	var area_code    = document.getElementById('area_code').value;
	var home_phone   = document.getElementById('home_phone').value;
	var mobile_phone = document.getElementById('mobile_phone').value;

	var phone = '';

	if ((area_code.length && ! /^0\d{2,3}$/.test(area_code)) || (home_phone.length && ! /^[1-9]{1}\d{5,7}$/.test(home_phone))) {
		showMsg({req_msg: true,message: '请正确填写固话号码！！'});

		document.getElementById('home_phone').value = '';
		return false;
	} else if (home_phone.length) {
		phone = '&area_code='+area_code+'&hphone='+home_phone;
	}

	if (mobile_phone.length && /^1[34578]{1}\d{9}/.test(mobile_phone)) {
		phone += '&mphone='+mobile_phone;
	} else if (mobile_phone.length) {
		showMsg({req_msg: true,message: '请填写正确的手机号码！！'});
		document.getElementById('mobile_phone').value = '';
		return false;
	}

	if (phone.length) {
		Ajax.call('users.php?act=add_custom', phone, tpisRepeatResp, "POST", "TEXT");
	}
}

function tpisRepeatResp(res) {
	if (res == 1) {
		var home_phone = document.getElementById('home_phone').value;
		var mobile_phone = document.getElementById('mobile_phone').value;

		// 显示用户已经存在的信息
		// 是否被列入黑名单
		if (inBlacklist(home_phone, mobile_phone)) {} else {
			document.getElementById('infos').innerHTML = '';
		}
	} else {
		showMsg({req_msg: true, message: '<b><font color="red">'+res+'</font></b>'});
		document.getElementById('area_code').value    = '';
		document.getElementById('home_phone').value   = '';
		document.getElementById('mobile_phone').value = '';
	}

	return false;
}

/* 添加一行记录 */
function tpaddLines(obj) {
	var newobj   = obj.parentNode.parentNode;
	var tbodies  = newobj.parentNode;
	var tr       = tbodies.insertRow(tbodies.rows.length);
	tr.innerHTML = newobj.innerHTML;
	var input    = tr.getElementsByTagName('input');
    var index    = tbodies.rows.length-1;

	for (var el in input) {
		if (!isNaN(el)) {
			input[el].name = input[el].name.replace(/\[\d{0,}\]/, '['+index+']');
		}
	}
	var select = tr.getElementsByTagName('select');
	for (el in select) {
		if (!isNaN(el)) {
			select[el].name = select[el].name.replace(/\[\d{0,}\]/, '['+index+']');
		}
	}
	obj.style.display = 'none';
}

/* 删除一行记录 */
function tpremoveLine(obj) {
	var newobj = obj.parentNode.parentNode;
	var tbodies = newobj.parentNode;

	if (tbodies.rows.length == 1) {
        var cellsObj = tbodies.getElementsByTagName('td');
        for (var i=0; i < cellsObj.length; i++) {
            if (cellsObj[i].children[0].tagName == 'INPUT') {
                cellsObj[i].children[0].value = ''; 
            } else if (cellsObj[i].children[0].tagName == 'SELECT') {
                cellsObj[i].children[0].options[0].selected = 'selected'; 
            }
        }
        return;
	}
	tbodies.deleteRow(newobj.rowIndex -1);
	var index = tbodies.rows.length - 1;
	tbodies.getElementsByTagName('tr').item(index).getElementsByTagName('img').item(0).style.display = 'inline';
}

// 从数据库中删除一条社会关系记录
function tpremoveRela(obj, rela_id, user_id) {
	var newobj = obj.parentNode.parentNode;
	var table = newobj.parentNode;

	if (rela_id == 0 && user_id == 0) {
        /*
		if (table.rows.length == $row_number) {
			return;
		}
        */
		removeLine(obj);
	} else {
		if (confirm('是否永久删除该行记录？')) {
			Ajax.call('users.php', 'act=del_rela&rela_id='+rela_id+'&user_id='+user_id, tpdelFeedback, 'POST', 'TEXT');
			removeLine(obj);
		}
	}
}

/**
 * 级联下拉菜单
 */
function tplinkSelectMenu() {
    var searchUrl = document.getElementById('searchUrl').value;
    var brandId   = document.getElementById('brand').value;
    Ajax.call(searchUrl, 'brand_id='+brandId, tplinkSelectMenuResp, 'POST', 'JSON');
}

function tplinkSelectMenuResp(res) {
    var subSelectObj = document.getElementById('goods');
    subSelectObj.length = 0;
    subSelectObj.appendChild(new Option('请选择商品', ''));
    for (var i in res) {
        subSelectObj.add(new Option(res[i], i));
    }
    return false;
}

/**
 * 查询产品相关的顾客
 */
function tpshowGoodsUsers(obj) {
    Ajax.call(obj.getAttribute('AJAXhref'), 'goodsId='+obj.value, tpshowGoodsUsersResp, 'GET', 'JSON');
}

function tpshowGoodsUsersResp(res) {
    document.getElementById('listDiv').innerHTML = res.main;
    document.getElementById('pageDiv').innerHTML = res.page;
    init();
}

function tpsubmitFormFlusher() {
    var theForm = document.forms['flusherForm'];
    var data = {};
    for (var i = 0; i < theForm.elements.length; i++) {
        if (theForm.elements[i].value == 0 || !theForm.elements[i].value) {
            if (theForm.elements[i].name == 'flush_platform') {
                showMsg({req_msg:true,timeout:2000,message:'请选择账号类型！'});
            } else if (theForm.elements[i].name == 'flush_account') {
                showMsg({req_msg:true,timeout:2000,message:'请填写刷单账号！'});
            }
            return false;
        }
        if (!theForm.elements[i].name) {
            continue;
        }
        data[theForm.elements[i].name] = theForm.elements[i].value;
    }
    Ajax.call(theForm.action, 'data='+JSON.stringify(data), tpsubmitFormFlusherResp, 'POST', 'JSON');
    return false;
}

function tpsubmitFormFlusherResp(res) {
    showMsg(res);
}
