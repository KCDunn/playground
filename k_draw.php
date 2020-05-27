<?php
echo <<<_BODY
<!DOCTYPE html>
<html>
    <head>
        <title>K Draw</title>
        <script src="js/jquery-3.5.0.min.js"></script>
        <style>
            *{
                margin: 0px;
                padding: 0px;
            }
            html, body, #wrapper{
                height: 95%;
            }
            body{
                background-color: rgb(51, 51, 51);
            }
            #wrapper{
                width: 730px;
                /* background-color: rgb(223, 82, 0); */
                margin: auto;
                margin-top: 20px;
                padding: 10px;
                border-radius: 8px;
            }
            h1{
                display: block;
                background-color: rgb(99, 99, 99);
                width: 710px;
                margin-bottom: 5px;
                padding: 2px;
                padding-left: 8px;
                border-radius: 5px;
                color: white;
                
            }
            #pad {
                background: #def;
                border: 1px solid #aaa;
                display: inline-block;
                border-radius: 8px;
            }
            #colorPallet{
                height: 400px;
                display: inline-block;
                vertical-align: top;
                background-color: rgb(99, 99, 99);
            }
            #sizePallet{
                display: block;
                padding-left: 50px;
            }
            .lineColor, #colorPallet h3{
                display: block;
                margin: 10px;
            }
            .lineColor, .lineSize{
                padding: 8px;
                width: 90px;
                margin: 10px;
            }
            #sizePallet{
                width: 673px;
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
                color: white;
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
            $('document').ready(function(){
                $('#black').click(function(){
                    context.strokeStyle = red;
                    
                })

            })
        </script>
    </head>
    <body>
        <div id='wrapper'>
        <h1>K Draw</h1>
        <canvas id='pad' width='600' height="400"></canvas>

        <div id='colorPallet' width='480' height='60'>
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
            canvas = $('#pad')[0]
            context = canvas.getContext("2d")
            pendown = false

            function lineColor(color) {
                context.strokeStyle = color;
            };

            function lineSize(size) {
                context.lineWidth = size;
            };

            $('#pad').mousemove(function(event)
            {
                
                var xpos = event.pageX - canvas.offsetLeft
                var ypos = event.pageY - canvas.offsetTop
                

                if (pendown) {
                    context.lineTo(xpos, ypos) 
                    if(xpos < 0 || xpos > 600 || ypos < 0 || ypos > 400){
                        pendown = false
                    }
                }else{
                    context.moveTo(xpos, ypos)
                } 
                
                
                context.stroke()
            })

            $('#pad').mousedown(function() {
            
                pendown = true
                // context.lineWidth = 4
                 } )
            $('#pad').mouseup(function() {
                 pendown = false
                 context.beginPath()
                 
                  } )

            
        </script>
        </div>
_BODY;

require_once 'footer.php';
    
?>