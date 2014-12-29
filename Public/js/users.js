/**
 * 动态获取配送方式
 */
function getShipping (obj) {
    if (obj.value == 0) return false;
    Ajax.call(obj.getAttribute('href')+'/id/'+obj.value, '', getShippingResponse, 'GET', 'JSON');
}

function getShippingResponse (res) {
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


