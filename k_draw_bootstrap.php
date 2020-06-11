<?php
echo <<<_BODY
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compatible" content='IE+edge'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>K Draw</title>
        <link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="css/kdrawNew.css">
        
        
    </head>
    <body>
    <h1>K-Draw</h1>
    
    </div>
    <div id='colorPallet' class='container-fluid bg-secondary' style='padding-bottom: 3px;'>
            <h3>Color Pallet</h3>
            <div id='colorPicker'>
                <button id="black" class='lineColor btn btn-dark' onclick="lineColor('black')" roll='button'><span></span> Black</button>
                <button id="red" class='lineColor btn btn-danger' onclick="lineColor('red')" role='button'><span></span> Red</button>
                <button id="orange" class='lineColor btn btn-default' onclick="lineColor('orange')" role='button'><span></span> Orange</button>
                <button id="yellow" class='lineColor btn btn-warning' onclick="lineColor('yellow')" role='button'><span></span> Yellow</button>
                <button id="green" class='lineColor btn btn-success' onclick="lineColor('green')" role='button'><span></span> Green</button>
                <button id="blue" class='lineColor btn btn-primary' onclick="lineColor('blue')" role='button'><span></span> Blue</button>
                <button id="purple" class='lineColor btn btn-default' onclick="lineColor('purple')" role='button'><span></span> Purple </button>
                <button id="white" class='lineColor btn btn-default' onclick="lineColor('white')" role='button'><span></span> white </button>
            </div>
        </div>
    <div class="row">
        <div id="canvasDiv" class="col-md-12">
             
        </div>
        
    </div>
    
    
        
        <div id='sizePallet' class='container-fluid bg-secondary' style='padding-bottom: 3px;'>
            <h3>Line Size</h3>
            <button id="small" class='lineSize btn btn-light rem1' onclick="lineSize(2)">Small   <span></span></button>
            <button id="medium" class='lineSize btn btn-light' onclick="lineSize(4)">Medium <span></span></button>
            <button id="large" class='lineSize btn btn-light' onclick="lineSize(8)">Large   <span></span></button>
        </div>
    
    <br/>
    
</div>

        <a id='reset' class='btn-sm btn-warning' href="k_draw.php">Reset</a>
        

        


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