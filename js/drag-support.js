initDraw(document.getElementById('canvas'));

function initDraw(canvas) {
    function setMousePosition(e) {
        var ev = e || window.event; //Moz || IE
        if (ev.pageX) { //Moz
            mouse.x = ev.pageX + window.pageXOffset - offset.left;
            mouse.y = ev.pageY + window.pageYOffset - offset.top;
        } else if (ev.clientX) { //IE
            mouse.x = ev.clientX + document.body.scrollLeft - offset.left;
            mouse.y = ev.clientY + document.body.scrollTop - offset.top;
        }
    }

    var mouse = {
        x: 0,
        y: 0,
        startX: 0,
        startY: 0
    };
    
    var element = null;

    var offset = {
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
        }
    };

    canvas.onmousedown = function (e){
        if (element == null) {
            console.log("drag start");
            mouse.startX = mouse.x;
            mouse.startY = mouse.y;
            element = document.createElement('div');
            element.className = 'rect';
            element.style.left = (mouse.x - offset.left) + 'px';
            element.style.top = (mouse.y - offset.top) + 'px';
            canvas.appendChild(element);
            canvas.style.cursor = "crosshair";
        }
    };

    canvas.onmouseup = function (e){    
        if (element !== null) {
            element = null;
            canvas.style.cursor = "default";
            console.log("drag end");
        }
    };

}