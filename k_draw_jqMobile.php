<?php
echo <<<_BODY
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>K Draw</title>

        
        <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

        <link rel='stylesheet' href='jquery-mobile/jquery.mobile-1.4.5.min.css'>
        <script src='js/jquery-2.2.4.min.js'></script>
        <script src='jquery-mobile/jquery.mobile-1.4.5.min.js'></script>
        
        <link rel="stylesheet" href="css/kdrawNew.css">
        
        
    </head>
<body>


<div data-role='page' id='page'>
    <div data-role="header" id="header">
        <h1>K-Draw</h1>
    </div>

    <h3>Color Pallet: </h3>
    <fieldset id='colorPicker' data-role="controlgroup" data-type="horizontal" data-mini="true">
    
        <button id="black" class='lineColor ui-btn' onclick="lineColor('black')" data-role='button'><span></span> Black</button>
        <button id="red" class='lineColor ui-btn' onclick="lineColor('red')" data-role='button'><span></span> Red</button>
        <button id="orange" class='lineColor ui-btn' onclick="lineColor('orange')" data-role='button'><span></span> Orange</button>
        <button id="yellow" class='lineColor ui-btn' onclick="lineColor('yellow')" data-role='button'><span></span> Yellow</button>
        <button id="green" class='lineColor ui-btn' onclick="lineColor('green')"><span></span> Green</button>
        <button id="blue" class='lineColor ui-btn' onclick="lineColor('blue')"><span></span> Blue</button>
        <button id="purple" class='lineColor ui-btn' onclick="lineColor('purple')"><span></span> Purple </button>
        <button id="white" class='lineColor ui-btn' onclick="lineColor('white')"><span></span> white </button>
    </fieldset>
    
    <div>
        <div id="canvasDiv">
            
        </div>
        
    </div>
    
    
    <h3>Line Size: </h3>
    <fieldset id='sizePallet' data-role="controlgroup" data-type="horizontal" data-mini="true">
        
        <button id="small" class='lineSize ui-btn' onclick="lineSize(2)">Small   <span></span></button>
        <button id="medium" class='lineSize ui-btn' onclick="lineSize(4)">Medium <span></span></button>
        <button id="large" class='lineSize ui-btn' onclick="lineSize(8)">Large   <span></span></button>
    </fieldset>

    <br/>
    <a id='reset' href="k_draw.php">Reset</a>


        
        

        


        <!-- Scripts -->
        
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