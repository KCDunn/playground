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
        
        <link rel="stylesheet" href="css/kdraw.css">
        
        
    </head>
    <body>
    <h1>K-Draw</h1>
    
    </div>
    <div id='colorPallet'>
            <h3>Color Pallet</h3>
            <div id='colorPicker'>
                <button id="black" class='lineColor' onclick="lineColor('black')"><span></span> Black</button>
                <button id="red" class='lineColor' onclick="lineColor('red')"><span></span> Red</button>
                <button id="green" class='lineColor' onclick="lineColor('green')"><span></span> Green</button>
                <button id="blue" class='lineColor' onclick="lineColor('blue')"><span></span> Blue</button>
                <button id="yellow" class='lineColor' onclick="lineColor('yellow')"><span></span> Yellow</button>
                <button id="orange" class='lineColor' onclick="lineColor('orange')"><span></span> Orange</button>
                <button id="purple" class='lineColor' onclick="lineColor('purple')"><span></span> Purple </button>
                <button id="white" class='lineColor' onclick="lineColor('white')"><span></span> white </button>
            </div>
        </div>
    <div class="row">
        <div id="canvasDiv" class="col-md-12">
             
        </div>
        
    </div>
    
    
        
        <div id='sizePallet'>
            <h3>Line Size</h3>
            <button id="small" class='lineSize' onclick="lineSize(2)">Small   <span></span></button>
            <button id="medium" class='lineSize' onclick="lineSize(4)">Medium <span></span></button>
            <button id="large" class='lineSize' onclick="lineSize(8)">Large   <span></span></button>
        </div>
    
    <br/>
    
</div>

        <a id='reset' href="k_draw.php">Reset</a>
        

        


        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
        
        <script>
            var canWidth = "";
            canvWidth = window.innerWidth;
            canvHeight = window.innerHeight;
            canvHeight = canvHeight - (canvHeight * .30);

            var txt = "";
            txt += "<canvas id='sig-canvas' width='" + canvWidth + "' height='" + canvHeight + "' style='background: #fff;'>";
            txt += "Your browser does not support Canvas</canvas>";

            document.getElementById("canvasDiv").innerHTML = txt;
        </script>
        
        <script src="js/kdraw.js"></script>
        
        
_BODY;

require_once 'footer.php';
    
?>