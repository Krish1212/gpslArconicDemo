
$(document).ready(function(){

    var addCommentHTML = $('#add-comment-html').html();
    var showCommentHTML = $('#show-comment-html').html();
    $('#add-comment-html').remove();
    $('#show-comment-html').remove();

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
    
    $('body').on('mousedown', '#canvas .cancel, .popup-close, #canvas .show-more', function(ev){
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

                    wrap.append(showCommentHTML);
                    var listWrap = wrap.find('.comment-list');
                    var template = listWrap.html();
                    var _html = "";
                    $.each(res, function(idx, item){
                        if(idx != "url"){
                            _html += template.replace(/#data/g, item.data).replace(/#idx/g, idx);
                        }
                    });
                    listWrap.html(_html);
                    wrap.find('.show-comment-wrap').fadeIn();
                    $(this).prop('disabled', true);
                },
                error: function(err){
                    alert(err);
                    console.error(err);
                }
            });
        }
    });

    $('body').on('mousedown', '#canvas .save-comment', function(ev){
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

    $('body').on('keyup', '#canvas textarea', function(ev){
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
    
    $('.highlight').click(function(ev){
        document.body.style.cursor = "crosshair";
        $('#canvas').css({border:'3px dotted red'});
    });

});