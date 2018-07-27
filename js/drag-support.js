
$(document).ready(function(){

    var addCommentHTML = $('#add-comment-html').html();
    $('#add-comment-html').remove();

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
   
    $('body').on('mousemove', canvas, function(ev){
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
    
    $('body').on('mousedown', canvas, function(ev){
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
        }
    });
    
    $('body').on('mouseup', canvas, function(ev){
        if (element !== null && isDragged) {
            canvasJSElement.style.cursor = "default";
            console.log("drag end");

            $(canvas).find(".comments.add-comment-wrap").remove();
            $(canvas).append(addCommentHTML);
            var addCommentElement = $(canvas).find(".comments.add-comment-wrap");
            var addCommentWidth = addCommentElement.width();

            var boxOffset = $(element).offset();
            var boxWidth = $(element).width();

            var pos = boxOffset.left + boxWidth + 6 - canvasOffset.left;
            if( $(canvas).width() - pos < addCommentWidth){ // place on the left
                pos = boxOffset.left - addCommentWidth - 26 - canvasOffset.left;
            }
            $(canvas).find(".comments.add-comment-wrap").css({
                top : boxOffset.top - canvasOffset.top,
                left : pos
            });
            element = null;
            isDragged = false;
        }
    });

    //$('body').on('click', '.comments.add-comment-wrap', function(ev){
    $('body').on('mousedown', '#canvas .add-comment-wrap', function(ev){
        ev.stopPropagation();
    });
    
    $('body').on('mousedown', '#canvas .cancel', function(ev){
        $(this).parents('.wrapper').remove();
    });

    $('body').on('keyup', '#canvas textarea', function(ev){
        var savebtn = $('#canvas .save');
        if( $(this).val().length > 0 ){
            savebtn.prop('disabled', false);
        }else{
            savebtn.prop('disabled', 'disabled');
        }
    });

    $('body').on('mousedown', '#canvas .save', function(ev){
        alert('todo');
    });
    
});


