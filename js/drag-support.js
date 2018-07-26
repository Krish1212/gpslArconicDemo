
$(document).ready(function(){

    var addCommentHTML = $('#add-comment-html').html();
    $('#add-comment-html').remove();
    $('body').on('click', '.comments.add-comment-wrap', function(ev){
        //ev.stopPropagation();
    });


    initDraw(document.getElementById('canvas'));

    function initDraw(canvas) {
        function setMousePosition(e) {
            var ev = e || window.event; //Moz || IE
            if (ev.pageX) { //Moz
                mouse.x = ev.pageX + window.pageXOffset - canvasOffset.left;
                mouse.y = ev.pageY + window.pageYOffset - canvasOffset.top;
            } else if (ev.clientX) { //IE
                mouse.x = ev.clientX + document.body.scrollLeft - canvasOffset.left;
                mouse.y = ev.clientY + document.body.scrollTop - canvasOffset.top;
            }
        }
    
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
    
        canvas.onmousemove = function (e) {
            setMousePosition(e);
            if (element !== null) {
                element.style.width = Math.abs(mouse.x - mouse.startX) + 'px';
                element.style.height = Math.abs(mouse.y - mouse.startY) + 'px';
                element.style.left = (mouse.x - mouse.startX < 0) ? mouse.x + 'px' : mouse.startX + 'px';
                element.style.top = (mouse.y - mouse.startY < 0) ? mouse.y + 'px' : mouse.startY + 'px';
                isDragged = true;
                console.log('dragged');
            }
        };
    
        canvas.onmousedown = function (e){
            if (element == null && !isDragged) {
                console.log("drag start");
                mouse.startX = mouse.x;
                mouse.startY = mouse.y;
                element = document.createElement('div');
                element.className = 'rect';
                element.style.left = (mouse.x - canvasOffset.left) + 'px';
                element.style.top = (mouse.y - canvasOffset.top) + 'px';
                canvas.appendChild(element);
                canvas.style.cursor = "crosshair";
            }
        };
    
        canvas.onmouseup = function (e){    
            if (element !== null && isDragged) {
                canvas.style.cursor = "default";
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
        };
    
    }

    // disable mouse click over add comments box

});


