console.log("Service application");
$(document).ready(function(){
    var itemCnt=0;
    var itemObjArray = [];
    $('.product-info').bind('click', function(){
        if($(this).parent('.product').hasClass('active')){
            var itemId = $(this).attr('prod-id');
            $(this).parent('.product').removeClass('active');
            $(this).children('div.product-select').css('display','none');
            $(this).parent('div').children('.product-count').children('.product-quantity').text('1');
            itemCnt--;
            if(itemCnt <= 0) {
                $('.item-count').css('display','none');
                itemCnt=0;
            } else 
            $('.item-count').text(itemCnt);
            for(var i = 0; i < itemObjArray.length; i++) {
                if(itemObjArray[i]['prod-id'] == itemId) {
                    itemObjArray.splice(i, 1);
                    break;
                }
            }
            console.log(itemObjArray);
        } else {
            $(this).parent('.product').addClass('active');
            $(this).children('.product-select').css('display','block');
            itemCnt++;
            if(itemCnt == 1) $('.item-count').css('display','block');
            $('.item-count').text(itemCnt);
            var itemObj = {};
            itemObj['prod-id'] = $(this).attr('prod-id');
            itemObj['product-quantity'] = $(this).parent('.product').children('.product-count').children('.product-quantity').text();
            $.each($(this).children('div'), function(i, val){
                //console.log("item = " + i + " == " + $(val).attr('class') + " == " + $(val).text() );
                if($(val).attr('class') === 'product-select') return;
                if($(val).attr('class') === 'product-photo'){
                    //console.log($(val).children('img').attr('src'));
                    itemObj[$(val).attr('class')] = $(val).children('img').attr('src');
                } else 
                itemObj[$(val).attr('class')] = $(val).text();
            });
            console.log(itemObj);
            itemObjArray.push(itemObj);
            console.log(itemObjArray);
        }
    });
    $('.product-count .add').bind('click', function(){
        var itemId = $(this).parent('.product-count').parent('.product').children('.product-info').attr('prod-id');
        var quantity = $(this).parent('div').children('.product-quantity').text();
        quantity++;
        $(this).parent('div').children('.product-quantity').text(quantity);
        updateItemObjArray(itemId, itemObjArray, quantity);
    });
    $('.product-count .remove').bind('click', function(){
        var itemId = $(this).parent('.product-count').parent('.product').children('.product-info').attr('prod-id');
        var quantity = $(this).parent('div').children('.product-quantity').text();
        if (quantity > 1) quantity--;
        $(this).parent('div').children('.product-quantity').text(quantity);
        updateItemObjArray(itemId, itemObjArray, quantity);
    });
    function updateItemObjArray(itemId,itemObjArray,quantity) {
        for(var i = 0; i < itemObjArray.length; i++) {
            if(itemObjArray[i]['prod-id'] == itemId) {
                itemObjArray[i]['product-quantity'] = quantity;
                break;
            }
        }
        console.log(itemObjArray);
    }
    $('.cart').bind('click', function(){
        //alert(JSON.stringify(itemObjArray));
        if(itemObjArray.length >= 1)
            window.location = 'viewcart.php?cartItems='+JSON.stringify(itemObjArray);
        else
            alert('Please select atleast 1 product to view the cart items');
    });

    
});
