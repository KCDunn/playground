<?php
echo <<<_BODY
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compatible" content='IE+edge'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>K Draw</title>
        <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <script src="js/jquery-3.5.0.min.js"></script>
        
        <style>
            *{
                margin: 0px;
                padding: 0px;
            }
            html, body{
                height: 100%;
            }
            body{
                background-color: rgb(51, 51, 51);
                
            }
            #wrapper{
                height: 87%;
                /* background-color: rgb(223, 82, 0); */
                margin: auto;
                border-radius: 8px;
            }
            h1{
                font-family: 'Rock Salt', cursive;
                display: block;
                background-color: rgb(99, 99, 99);
                margin-bottom: 5px;
                padding: 2px;
                border-radius: 5px;
                color: white;
                
            }
            #pad {
                
                background: #def;
                border: 1px solid #aaa;
                display: inline-block;
                border-radius: 8px;
                margin: auto;
                text-alighn: center;
            }
            #colorPallet{
                display: inline-block;
                vertical-align: top;
                background-color: rgb(99, 99, 99);
            }
            #sizePallet{
                display: block;
            }
            .lineColor, #colorPallet h3{
                display: inline-block;
                margin: 10px;
            }
            .lineColor, .lineSize{
                padding: 8px;
                margin: 10px;
            }
            #sizePallet{
                background-color: rgb(99, 99, 99);
            }
            #sizePallet h3{
                display: inline-block;
            }
            #sizePallet, #colorPallet{
                border-radius: 5px;
            }
            button{
                border: 1px solid white;
                border-radius: 8px;
                text-align: justify;
                transition: 0.2s;
            }
            button:hover{
                border: 1px solid black;
            }
            button span{
                display: inline-block;
                width: 10px;
                height: 10px;
                border: 1px solid black;
                vertical-align: middle;
            }
            #black span{
                background: black;
                color: white;
            }
            #blue span{
                background: blue;
            }
            #green span{
                background: green;
            }
            #red span{
                background: red;
            }
            #yellow span{
                background: yellow;
            }
            #orange span{
                background: orange;
            }
            #purple span{
                background: purple;
            }
            .lineSize span{
                border-radius: 50px;
                background-color: black;
                position: relative;
                left: 8px;
            }
        
            #small span {
                width: 2px;
                height: 2px;
            }
            #medium span{
                width: 4px;
                height: 4px;
            }
            #large span{
                width: 8px;
                height: 8px;
            }
            h3{
                font-family: 'Open Sans', sans-serif;
                color: white;
                font-size: 1.1em;
            }
            #reset{
                color: orangered;
                text-decoration: none;
            }
            footer{
                background-color: grey;
                height: 10%;
                padding-top: 30px;
                text-align: center;
            }
            footer button{
                padding: 5px;
                background-color: orangered;
                /* color: white; */
                margin-bottom: 8px;
                transition: 0.5s;
            }
            footer button:hover{
                background-color: orange;
                /* color: white; */
            }
            footer a{
                text-decoration: none;
                color: black;
            }
            footer a:hover{
                color: rgb(2, 49, 88);
            }
            
        </style>
        <script>
            
        </script>
    </head>
    <body>
        <div id='wrapper'>
        <h1>K - Draw</h1>
        <canvas id='pad' width='320' height="400"></canvas>

        <div id='colorPallet'>
            <h3>Color Pallet</h3>
            <button id="black" class='lineColor' onclick="lineColor('black')"><span></span> Black</button>
            <button id="red" class='lineColor' onclick="lineColor('red')"><span></span> Red</button>
            <button id="green" class='lineColor' onclick="lineColor('green')"><span></span> Green</button>
            <button id="blue" class='lineColor' onclick="lineColor('blue')"><span></span> Blue</button>
            <button id="yellow" class='lineColor' onclick="lineColor('yellow')"><span></span> Yellow</button>
            <button id="orange" class='lineColor' onclick="lineColor('orange')"><span></span> Orange</button>
            <button id="purple" class='lineColor' onclick="lineColor('purple')"><span></span> Purple </button>
            
        </div>
        
        <div id='sizePallet'>
            <h3>Line Size</h3>
            <button id="small" class='lineSize' onclick="lineSize(2)">Small   <span></span></button>
            <button id="medium" class='lineSize' onclick="lineSize(4)">Medium <span></span></button>
            <button id="large" class='lineSize' onclick="lineSize(8)">Large   <span></span></button>
        </div>

        <a id='reset' href="k_draw.php">Reset</a>
        


        <script>
(function() {
        window.requestAnimFrame = (function (callback) {
            return window.requestAnimationFrame ||
             window.webkitRequestAnimationFrame ||
              window.mozRequestAnimationFrame ||
              window.oRequestAnimationFrame ||
               window.msRequestAnimationFrame ||
                function (callback) {
                window.setTimeout(callback, 1000/60);
            };
        })();


        var canvas = document.getElementById('pad');
        var ctx = canvas.getContext('2d');
        

        function lineColor(color) {
            ctx.strokeStyle = color;
        };

        function lineSize(size) {
            ctx.lineWidth = size;
        };

        ctx.strokeStyle = '#ccaabb';
        ctx.lineWidth = '6';

        var drawing = false;
        var mousePos = { x:0, y:0 };
        var lastPos = mousePos;

        canvas.addEventListener('mousedown', function(e){
            drawing = true;
            lastPos = getMousePos(canvas, e);
        }, false);

        canvas.addEventListener('mouseup', function(e){
            drawing = false;
        }, false);

        canvas.addEventListener('mousemove', function(e){
            mousePos = getMousePos(canvas, e);
        }, false);

       
       
        canvas.addEventListener('touchstart', function(e) {
            e.preventDefault();
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mouseDown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);

        canvas.addEventListener('touchend', function(e) {
           var mouseEvent = new MouseEvent('mouseup', {});
           canvas.dispatchEvent(mouseEvent);
        }, false);

        canvas.addEventListener('touchmove', function(e) {
            e.preventDefault();
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent('mousemove', {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false)


        function getMousePos(canvasDom, mouseEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return{
                x: mouseEvent.clientX - rect.left, 
                y: mouseEvent.clientY - rect.top
            };
        }

        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };


        }

        
        
        

        function renderCanvas() {
            if (drawing) {
                ctx.moveTo(lastPos.x, lastPos.y);
                ctx.stroke();
                lastPos = mousePos;
            }
        }

        
        (function drawLoop () {
            requestAnimFrame(drawLoop);
            renderCanvas();
        })();
    })();

            
        </script>
        </div>
        <h1 id='demo'></h1>
_BODY;

require_once 'footer.php';
    
?>