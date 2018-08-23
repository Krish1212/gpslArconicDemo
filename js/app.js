console.log("Service application");

//This should happen only on the part shop page (purchase.php)
function onPartspageload(){
    console.log('Inside Purchase page');
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
            //console.log(itemObjArray);
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
            //console.log(itemObj);
            itemObjArray.push(itemObj);
            //console.log(itemObjArray);
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
        //console.log(itemObjArray);
    }
    $('.cart').bind('click', function(){
        //alert(JSON.stringify(itemObjArray));
        if(itemObjArray.length >= 1) {
            //window.location = 'viewcart.php?cartItems='+ JSON.stringify(itemObjArray);
            $('<input type="hidden" name="cartItems">').val(JSON.stringify(itemObjArray)).appendTo('#hiddenform');
            $('#hiddenform').submit();
        }
        else
            alert('Please select atleast 1 product to view the cart items');
    });
}

//This should happen only on the machinery page (machinery.php)
function onMachinerypageload(){
    console.log("Inside machinery page");
    $(document).ready(function(){

        var showCommentHTML = $('#show-comment-html').html();
        $('#show-comment-html').remove();

        $.ajax({
            url:"serveComments.php",
            type:"POST",
            context:document.body,
            data:{'type':'get','page':'wiring'},
            beforeSend: function(){
                console.log('before sending');
            },
            complete: function(){
                console.log('completed sending');
            },
            success: function(result){
                //console.log('inside success');
                //console.log(result);
                var comments = '';
                $.each(result, function(idx,obj){
                    if (idx === 'url') return;
                    comments += '<p>' + obj.data + '<span class="user-info">-Added by ' + obj.user + '</span></p>';
                });
                $('.wiring.comments-list').html(comments);
                $.ajax({
                    url:"serveComments.php",
                    type: "POST",
                    context: document.body,
                    data: {type:'get',page:'hydraulic'},
                    success: function(response){
                        //console.log(response);
                        var comments = '';
                        $.each(response, function(idx,obj){
                            if(idx === 'url') return;
                            comments += '<p>' + obj.data + '<span class="user-info">-Added by ' + obj.user + '</span></p>';
                        });
                        $('.hydraulic.comments-list').html(comments);
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            },
            error: function(error){
                console.log('inside error');
                console.log(error);
            }
        });
        $('.submit.button').bind('click', function(){
            var comment = $('#feedback').val();
            if(comment == '') {
                alert('Please type any message in the text box');
                return;
            }
            $.ajax({
                url:"serveComments.php",
                type: "POST",
                data: {type:'put',page:'machinery',data:comment},
                success: function(response){
                    console.log(response.success);
                    if(response.success){
                        alert('Feedback saved successfully');
                    }
                    $('#feedback').val('').empty();
                },
                error:function(error){
                    console.log(error);
                }
            });
        });

        $('.previous.button').bind('click', function(){
            console.log('previous comments');
    
            var data = {
                page : whereami,
                type : 'get'  
            };
            $.ajax({
                url: "serveComments.php",
                type:"POST",
                data:data,
                success: function(res){
                    console.log("response from comments.php");
                    console.log(res);
                    if(res == null) return;

                    var wrap = $('body');
                    wrap.append('<div class="js-wrapper">'+ showCommentHTML + '</div>');
                    var listWrap = wrap.find('.comment-list');
                    var template = listWrap.html();
                    var _html = "";
                    $.each(res, function(idx, item){
                        if(idx != "url"){
                            _html += template.replace(/#data/g, item.data).replace(/#idx/g, idx).replace(/#username/g,item.user);
                        }
                    });
                    listWrap.html(_html);
                    var tempWrap = wrap.find('.show-comment-wrap');
                    tempWrap.addClass('js-show-comments');
                    tempWrap.fadeIn();
                    $(this).prop('disabled', true);
                },
                error: function(err){
                    alert(err);
                    console.error(err);
                }
            });
        });

        $('body').on('click', '.popup-close, .show-more', function(ev){
            var wrap = $(this).parents('.js-wrapper');
            wrap.fadeOut("slow", function(){
                wrap.remove();
            });
        });

    });
}

function dragSupport(){

    var addCommentHTML = $('#add-comment-html').html();
    var showCommentHTML = $('#show-comment-html').html();
    $('#add-comment-html').remove();
    $('#show-comment-html').remove();

    $(".scroll-top").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    var canvas = $('#canvas');
    var canvasJSElement = document.getElementById("canvas");
    var mouse = {
        baseX: 0,
        baseY: 0,
        x: 0,
        y: 0,
        startX: 0,
        startY: 0
    };
    var element = null;
    var isDragged = false;
    var canvasOffset = {
        top: $('#canvas').offset().top,
        left: $('#canvas').offset().left
    };
    var coordinates = [];

    function setMousePosition(e) {
        var ev = e || window.event; //Moz || IE
        if (ev.pageX) { //Moz
            //mouse.x = ev.pageX + window.pageXOffset - canvasOffset.left;
            //mouse.y = ev.pageY + window.pageYOffset - canvasOffset.top;
            mouse.x = ev.pageX - canvasOffset.left;
            mouse.y = ev.pageY - canvasOffset.top;
        } else if (ev.clientX) { //IE
            mouse.x = ev.clientX + document.body.scrollLeft - canvasOffset.left;
            mouse.y = ev.clientY + document.body.scrollTop - canvasOffset.top;
        }
    }
   
    $('body').on('mousemove', '#canvas', function(ev){
        setMousePosition(ev);
        if (element !== null) {
            element.style.width = Math.abs(mouse.x - mouse.startX) + 'px';
            element.style.height = Math.abs(mouse.y - mouse.startY) + 'px';
            element.style.left = (mouse.x - mouse.startX < 0) ? mouse.x + 'px' : mouse.startX + 'px';
            element.style.top = (mouse.y - mouse.startY < 0) ? mouse.y + 'px' : mouse.startY + 'px';
            isDragged = true;
            console.log('dragged');
        }
    });
    
    $('body').on('mousedown', '#canvas', function(ev){
        if (element == null && !isDragged) {
            console.log("drag start");
            mouse.startX = mouse.x;
            mouse.startY = mouse.y;
            element = document.createElement('div');
            element.className = 'rect';
            element.style.left = (mouse.x - canvasOffset.left) + 'px';
            element.style.top = (mouse.y - canvasOffset.top) + 'px';
            canvas.append(element);
            canvasJSElement.style.cursor = "crosshair";
            coordinates = [];
        }
    });
    
    $('body').on('mouseup', '#canvas', function(ev){
        if (element !== null && isDragged) {
            canvasJSElement.style.cursor = "default";
            console.log("drag end");

            $(canvas).find(".comments.add-comment-wrap").remove();
            $(canvas).append(addCommentHTML);
            var addCommentElement = $(canvas).find(".comments.add-comment-wrap");
            var addCommentWidth = addCommentElement.width();

            var boxOffset = $(element).offset();
            var boxWidth = $(element).width();
            var boxHeight = $(element).height();

            var pos = boxOffset.left + boxWidth + 6 - canvasOffset.left;
            if( $(canvas).width() - pos < addCommentWidth){ // place on the left
                pos = boxOffset.left - addCommentWidth - 26 - canvasOffset.left;
            }
            var top = boxOffset.top - canvasOffset.top;
            $(canvas).find(".comments.add-comment-wrap").css({
                top : top,
                left : pos
            });

            // store coordinates
            // coordinates = [top, left, width, height]
            coordinates = [top, pos, boxWidth, boxHeight];

            element = null;
            isDragged = false;
        }
    });

    $('body').on('mousedown', '.stop-propagation', function(ev){
        ev.stopPropagation();
    });
    
    $('body').on('mousedown', '#canvas .cancel, .popup-close', function(ev){
        var wrap = $(this).parents('.wrapper');
        wrap.fadeOut("slow", function(){
            wrap.remove();
        });
    });

    $('body').on('click', '#canvas .show-more', function(ev){
        var wrap = $(this).parents('.wrapper');
        wrap.fadeOut("slow", function(){
            wrap.remove();
        });
    });

    function cleanup(s){
        return s.replace(/^\s+|\s+$/g, "");
    }

    $('body').on('mousedown', '.drawings .prev-comments', function(ev){
        console.log('previous comments');

        if(whereami == null){
            console.log("ERROR: Feed in the whereami variable");
            return;
        }

        var wrap = $('#canvas');
        if( wrap.find('.show-comment-wrap').length > 0 ){

        }else{
            var data = {
              page : whereami,
              type : 'get'  
            };
            $.ajax({
                url: "serveComments.php",
                type:"POST",
                data:data,
                success: function(res){
                    console.log("response from comments.php");
                    console.log(res);
                    if(res == null) return;

                    // hide all highlights
                    $('#canvas .rect, #canvas .comments').fadeOut();

                    /* wrap.append(showCommentHTML);
                    var listWrap = wrap.find('.comment-list');
                    var template = listWrap.html();
                    var _html = ""; */
                    $.each(res, function(idx, item){
                        console.log(item.coor);
                        if(idx != "url"){
                            // var newtop = (item.coor[0] * canvasW)
                            var commbox = '<div class="dcomment rect" style="position:absolute;top:' + item.coor[0] + 'px;left:' + item.coor[1] + 'px;width:' + (item.coor[2]) + 'px;height:' + (item.coor[3]) + 'px;"><p class="tooltip">' + item.data + '</p></div>';
                            $('#canvas').append(commbox);
                            //_html += template.replace(/#data/g, item.data).replace(/#idx/g, idx).replace(/#username/g,item.user);
                        }
                    });
                    /* listWrap.html(_html);
                    wrap.find('.show-comment-wrap').fadeIn();
                    $(this).prop('disabled', true); */
                },
                error: function(err){
                    alert(err);
                    console.error(err);
                }
            });
        }
    });
    $('#canvas').on('mouseover', '.dcomment', function(){
        $(this).children('p').css({'display':'block','z-index':99});
    });
    $('#canvas').on('mouseout', '.dcomment', function(){
        $(this).children('p').css({'display':'none'});
    });


    $('body').on('mousedown', '#canvas .add-comment-wrap .save-comment', function(ev){
        console.log('save comments');

        if(whereami == null){
            console.log("ERROR: Feed in the whereami variable");
            return;
        }

        // get hold of the comment popup
        var wrap = $('#canvas .add-comment-wrap');
        var textarea = wrap.find('textarea');
        var val = textarea.val();
        val = cleanup(val);

        if(val && val.length > 0 && coordinates && coordinates.length == 4){
            // save comments
            var data = {
                type : 'put',
                page : whereami,
                data : val,
                coor : coordinates
            };
            var _this = this;
            var response = false;
            $.ajax({
                url: "serveComments.php",
                type:"POST",
                data:data,
                success: function(res){
                    console.log("response from comments.php");
                    console.log(res);
                    if(res == undefined || res == "" || res.success == false){
                        return;
                    }
                    wrap.find('.news').text(
                        res.success ? "Comments Saved..." : res.msg
                    );
                    if(res.success){
                        textarea.val('');
                        setTimeout(function(){
                            wrap.fadeOut("slow", function(){
                                wrap.remove();
                            });
                        }, 1400);
                    }else{
                        wrap.find('.save-comment').prop('disabled', false);
                    }
                },
                error: function(err){
                    console.log(err);
                    response = {success:false, msg: err};
                }
            });
        }
    });

    $('body').on('keyup', '#canvas .add-comment-wrap textarea', function(ev){
        var savebtn = $('#canvas .save-comment');
        if( $(this).val().length > 0 ){
            savebtn.prop('disabled', false);
        }else{
            savebtn.prop('disabled', 'disabled');
        }
    });

    $('body').on('mousedown', '.todo', function(ev){
        alert('todo');
    });
    
    $('.drawings .highlight').click(function(ev){
        document.body.style.cursor = "crosshair";
        $('#canvas').css({border:'3px dotted red'});
    });
    $('.boxer').bind('click', function(ev){
        //ev.stopPropagation();
        $(this).addClass('target');
        var target = $(this).children('a').attr('data-id');
        $(this).parents('.drawings').children("." + target).addClass('target');
    });
}

function onviewcartPageload(){
    cartTable = $('.cart-table').html();
    //console.log(cartTable);
    $('#checkout').bind('click',function(){
        $.ajax({
            url:"send_email.php",
            type:"POST",
            data:{'message':cartTable},
            beforeSend: function(){
                $('#checkout').text('Sending Email...').addClass('process').removeClass('active').attr('disabled','disabled');
            },
            complete: function(){
                $('#checkout').text('Checkout').addClass('active').removeClass('process');
            },
            success: function(result){
                console.log('result > ' + result);
                if(result.success){
                    alert('Cart items emailed to: jstevenson@gpsl.co');
                } else {
                    alert(result.message);
                }
            },
            error: function(error){
                console.error(error);
            }
        });
    });
}