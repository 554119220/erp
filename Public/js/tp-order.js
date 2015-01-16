function tpgetShipping(obj) {
    Ajax.call(obj.getAttribute('href'), 'pay_id='+obj.value, getShippingResp, 'GET', 'JSON');
}

function tpgetShippingResp(resp) {
    var shipping = document.getElementById('shipping_id');
    var defaultOpt = shipping.options[0];
    shipping.length = 0;
    shipping.appendChild(defaultOpt);
    for (var i in resp) {
        var opt = new Option(resp[i],i);
        shipping.appendChild(opt);
    }
}

/**
 * 查询订单是否已经存在
 */
function tpcheckOrderSn (obj) {
    var orderSn = obj.value.replace(/(^\ +|\ +$)/, '');
    if (/^C\d{2}-\d{7}-\d{7}$|^\d{14}$|^\d{15}$|^\d{13}$|^\d{10,11}$|^\d{8}-\d{8}-\d{10}$|^\d{6}[0-9a-z]{6}$/i.test(orderSn)) {
        Ajax.call(obj.getAttribute('AJAXhref'), 'orderSn='+orderSn, checkOrderSnResp, 'GET', 'JSON');
    } else if (orderSn.length > 0){
        obj.focus();
        showMsg({req_msg:true,message:'请填写正确的订单编号！'});
    }
}

function tpcheckOrderSnResp(res) {
    if (res.req_msg) {
        showMsg(res);
        document.getElementById('detail').parentNode.removeChild(document.getElementById('detail'));
    }
    return false;
}

/**
 * 保存新订单
 */
function tpaddNewOrder (obj) {
    var id = document.getElementById('ID').value;    // 顾客ID

    var orderInfo = document.forms['order_info'];
    var goodsList = document.forms['goodsList'];
    var tableObj  = document.getElementById('goods_list');

    var consignee   = orderInfo.elements['consignee'].value;
    var tel         = orderInfo.elements['tel'].value;
    var mobile      = orderInfo.elements['mobile'].value;
    var province    = orderInfo.elements['province'].value;
    var city        = orderInfo.elements['city'].value;
    var district    = orderInfo.elements['district'].value;
    var address     = orderInfo.elements['address'].value;
    var pay_id      = orderInfo.elements['pay_id'].value;
    var shipping_id = orderInfo.elements['shipping_id'].value;
    var remarks     = orderInfo.elements['remarks'].value;
    var admin_id    = orderInfo.elements['admin_id'].value;
    //var platform  = orderInfo.elements['platform'].value;
    var team        = orderInfo.elements['team'].value;
    var order_type  = orderInfo.elements['order_type'].value;

    var platform_order_sn = orderInfo.elements['platform_order_sn'].value; // 订单编号

    var res = new Array ();
    res['timeout'] = 2000;

    if (!consignee) {
        res['message'] = '请正确填写收货人姓名！';
        showMsg(res);
        return false;
    }

    if (!mobile && !tel) {
        res['message'] = '请输入收货人联系方式（非常重要）！';
        showMsg(res);
        return false;
    }

    if (province == 0 || city == 0 || !address) {
        res['message'] = '请提供详细的收货地址，以便订单可以准确配送！';
        showMsg(res);
        return false;
    }

    if (pay_id == 0) {
        res['message'] = '请选择订单所使用的支付方式！';
        showMsg(res);
        return false;
    }

    if (shipping_id == 0) {
        res['message'] = '请选择最优的配送方式！';
        showMsg(res);
        return false;
    }

    /*
       if (platform == 0)
       {
       res['message'] = '请选择产生该订单的销售平台！';
       showMsg(res);
       return false;
       }
       */

    if (team == 0) {
        res['message'] = '请选择产生该订单的购买平台！';
        showMsg(res);
        return false;
    }

    if (team != 1 && team != 9 && team != 27 && team != 28 && team != 2 && !platform_order_sn) {
        res['message'] = '非中老年、会员部订单须提供购买平台的订单编号';
        showMsg(res);
        return false;
    }

    if (!order_type) {
        if (confirm('您没有选择订单类型，系统将按静默订单进行处理？')) {
            order_type = 3;
        }
    }

    if (tableObj.rows.length <= 2) {
        res['message'] = '请先添加商品，再提交订单！';
        showMsg(res);
        return false;
    }

    if (admin_id == 0) {
        if (!confirm('该订单未选择归属客服，将作为静默订单处理！是否继续？')) {
            return false;
        }
    }

    if (goods_amount == 0) {
        if (!confirm('确认该订单的商品总额为0元？')) {
            return false;
        }
    }

    var data = {
        "user_id":id,
        "platform_order_sn":platform_order_sn,
        "tel":tel,
        "mobile":mobile,
        "province":province,
        "city":city,
        "district":district,
        "pay_id":pay_id,
        "shipping_id":shipping_id,
        "shipping_fee":shipping_fee,
        "consignee":consignee,
        "address":address,
        "admin_id":admin_id,
        //"platform":platform,
        "team":team,
        "order_type":order_type,
        "goods_amount":goods_amount,
        "remarks":remarks
    };

    for (var i = orderInfo.elements['order_source'].length -1; i > 0; i--) {
        if (orderInfo.elements['order_source'][i].checked) {
            data['platform_type'] = orderInfo.elements['order_source'][i].value;
        }
    }

    var goods = {};
    for (var i = 2; i < tableObj.rows.length; i++) {
        if (tableObj.rows.length > 3) {
            goods[i-2] = {
                "goods_sn"     : goodsList.elements['list_id[]'][i-2].value,
                "goods_price"  : goodsList.elements['list_price[]'][i-2].value,
                "goods_number" : goodsList.elements['list_number[]'][i-2].value,
                "is_gift"      : goodsList.elements['list_gift[]'][i-2].value,
            };
        } else {
            goods[i-2] = {
                "goods_sn"     : goodsList.elements['list_id[]'].value,
                "goods_price"  : goodsList.elements['list_price[]'].value,
                "goods_number" : goodsList.elements['list_number[]'].value,
                "is_gift"      : goodsList.elements['list_gift[]'].value,
            };
        }
    }

    data['shipping_fee'] = goodsList.elements['shipping_fee'].value;
    data['goods_amount'] = goodsList.elements['goods_amount'].value;
    data['goods_list']   = goods;

    Ajax.call(obj.getAttribute('AJAXhref'), 'orderInfo='+JSON.stringify(data), addNewOrderResponse, 'POST', 'JSON');
}

/**
 * 添加新订单回调函数
 */
function tpaddNewOrderResponse (res) {
    // 提交订单后，删除顾客详情行
    if(res.response_action == 'add_new_order' && res.code == 1) {
        removeRow('detail');
    }

    showMsg(res);
}

/**
 * 删除一个商品
 */
function tpremoveGoods (obj) {
    var rowObj = obj.parentNode.parentNode;       // 行DOM

    var domGoodsList = document.getElementById('goods_id');
    for (var i = domGoodsList.length -1; i >= 0; i--) {
        if (/【库存：\d+】/.test(domGoodsList.options[i].text) && obj.previousSibling.value === domGoodsList.options[i].value) {
            var storage = parseInt(domGoodsList.options[i].text.match(/【库存：(\d+)】/)[1])+parseInt(rowObj.cells[3].innerText);
            domGoodsList.options[i].text = domGoodsList.options[i].text.replace(/【库存：\d+】/, '【库存：'+storage+'】');
        }
    }
    rowObj.parentNode.deleteRow(rowObj.rowIndex); // 删除行
    calcOrderAmount();  // 重新计算金额
}

/**
 * 计算订单费用
 */
function tpcalcOrderAmount () {
    var goodsAmount = 0; // 商品总金额
    var shippingFee = parseFloat(document.getElementById('shipping_fee').value); // 运费
    var isPackage   = 0;

    var tableObj = document.getElementById('goods_list');
    for (var i = 2; i < tableObj.rows.length; i++) {
        if (tableObj.rows[i].cells[5].innerText != '赠品' && tableObj.rows[i].cells[5].innerText != '补发') {
            goodsAmount += parseFloat(tableObj.rows[i].cells[5].innerText);
            if (parseFloat(tableObj.rows[i].cells[5].innerText) == 0.1) {
                isPackage = 1;
            }
        } else {
            goodsAmount += 0;
        }
    }

    var newGoodsAmount = document.getElementById('goods_amount').value;
    if (newGoodsAmount != 0 && newGoodsAmount != goodsAmount) {
        if (confirm('确定该订单的商品金额为【'+newGoodsAmount+'】？')) {
            document.getElementById('goods_amount').value = newGoodsAmount;
            goodsAmount = newGoodsAmount;
        } else {
            document.getElementById('goods_amount').value = goodsAmount;
        }
    } else {
        document.getElementById('goods_amount').value = goodsAmount;
    }

    var pointDiscount = document.getElementById('pointDiscount').innerText;
    pointDiscount = pointDiscount ? pointDiscount : 0;

    document.getElementById('order_amount').innerHTML = parseFloat(goodsAmount)+parseFloat(shippingFee)-parseFloat(pointDiscount) + '元';
}

/**
 * 积分抵扣
 */
function tpgetPointDiscount(obj) {
    var id = document.getElementById('ID').value;    // 顾客ID
    if (obj.value < 0) {
        return false;
    } else if (obj.value < 0) {
        obj.value = '';
        obj.focus();
        showMsg({req_msg:true,timeout:2000,message:'请输入正确的积分数量！'});
    }
    Ajax.call(obj.getAttribute('AJAXhref'), 'userId='+id+'&points='+obj.value, getPointDiscountResp, 'GET', 'JSON');
}

function tpgetPointDiscountResp(resp) {
    document.getElementById('pointDiscount').innerText = resp.pointDiscount;
    calcOrderAmount();
    if (resp.req_msg) {
        document.getElementById('rankPoints').value = resp.exchangePoints;
        showMsg(resp);
    }
}

/**
 * 添加新商品
 */
var goodsName = null;
function tpaddNewGoods () {
    // 表单对象
    var theForm = document.forms['theForm'];
    var pattern = /(【库存：)(\d+)(】)$/;

    // 商品信息
    var number   = theForm.elements['number'].value;
    var goodsObj = theForm.elements['goods_id'];
    var id       = goodsObj.value;
    var price    = isGift ? 0 : theForm.elements['price'].value;

    var isGift     = null;
    var promotions = null;

    for (var i = theForm.elements['is_gift'].length-1; i >= 0; i--) {
        if (theForm.elements['is_gift'][i].checked) {
            isGift = theForm.elements['is_gift'][i].value;
            promotions = theForm.elements['is_gift'][i].parentNode.innerText;
            theForm.elements['is_gift'][i].checked = false;
            break;
        }
    }

    if (0 == id) {
        showMsg({req_msg:true,timeout:2000,message:'请选择购买的商品！'});
        return false;
    }

    for (var i = 0; i < goodsObj.length; i++) {
        if (goodsObj.options[i].selected) {
            var name = goodsObj.options[i].text;
            if (pattern.test(name)) {
                var storage = parseInt(name.match(pattern)[2]) - number;
                if (storage < 0) {
                    showMsg({req_msg:true,timeout:2000,message:'库存不足，无法下单。请考虑其它同类商品！'});
                    return false;
                } else {
                    goodsObj.options[i].text = name.replace(pattern, '$1'+storage+'$3');
                }
                name = name.replace(pattern, '');
            }
        }
    }

    var goodsList = document.getElementById('goods_list'); 
    var rowObj = goodsList.insertRow(goodsList.rows.length);

    // 商品ID
    var goodsId = rowObj.insertCell(0);
    goodsId.innerHTML = '<input type="checkbox" name="list_id[]" value="'+id+'" id="goods_id_'+id+'"/><strong onclick="removeGoods(this)">删除</strong>';

    // 商品名称
    goodsName = rowObj.insertCell(1);
    goodsName.colSpan = 4;
    rowObj.style.height = '20px';
    if (isNaN(id)) {
        Ajax.call('order.php?act=packing_goods&id='+id, '', packingGoodsListResp, 'GET', 'TEXT');
    } else {
        goodsName.innerHTML = name+'<input type="hidden" name="list_name[]" value="'+name+'"/>';
    }

    // 商品价格
    var goodsPrice = rowObj.insertCell(2);
    goodsPrice.innerHTML = price+'<input type="hidden" name="list_price[]" value="'+price+'"/>';

    // 商品数量
    var goodsNumber = rowObj.insertCell(3);
    goodsNumber.innerHTML = number+'<input type="hidden" name="list_number[]" value="'+number+'"/>';

    // 赠品
    var gift = rowObj.insertCell(4);
    var promotions = '';
    if (1 == isGift) {
        promotions = '赠品';
    } else if (2 == isGift) {
        promotions = '活动';
    } else if (3 == isGift) {
        promotions = '补发';
    } else {
        promotions = '';
    }

    gift.innerHTML = promotions+'<input type="hidden" name="list_gift[]" value="'+isGift+'"/>';

    var amount = price*100*number/100;

    // 单个商品总价
    var singleAmount = rowObj.insertCell(5);
    singleAmount.innerHTML = isGift != 1 && isGift != 3 ? amount : promotions;

    // 计算订单总金额
    calcOrderAmount();
}

function tppackingGoodsListResp (res) {
    goodsName.innerHTML = res;
    goodsName = null;
}


