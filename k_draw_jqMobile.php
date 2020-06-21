<?php
echo <<<_BODY
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compatible" content='IE+edge'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>K Draw</title>

        <link rel='stylesheet' href='jquery-mobile/jquery.mobile-1.4.5.min.css'>
        <script src="js/jquery-3.5.0.min.js"></script>
        <script> src='jquery-mobile/jquery.mobile-1.4.5.min.js'</script>
        
        <link rel="stylesheet" href="css/kdrawNew.css">
        
        <script>
            var _hmt = _hmt || []; (function() {
                var hm = document.createElement('script');
                hm.src = '//hm.baidu.com/hm.js?73c27e26f610eb3c9f3feb0c75b03925';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </head>
<body>


<div data-role='page' id='pageone'>
    <div data-role='header'>
        <h1>K-Draw</h1>
    </div>
    <div data-role='content' class='ui-content'>
        <div id='colorPallet' class='' style='padding-bottom: 3px;'>
            <h3>Color Pallet</h3>
            <div id='colorPicker'>
                <button id="black" class='lineColor' onclick="lineColor('black')" roll='button'><span></span> Black</button>
                <button id="red" class='lineColor' onclick="lineColor('red')" role='button'><span></span> Red</button>
                <button id="orange" class='lineColor' onclick="lineColor('orange')" role='button'><span></span> Orange</button>
                <button id="yellow" class='lineColor' onclick="lineColor('yellow')" role='button'><span></span> Yellow</button>
                <button id="green" class='lineColor' onclick="lineColor('green')" role='button'><span></span> Green</button>
                <button id="blue" class='lineColor' onclick="lineColor('blue')" role='button'><span></span> Blue</button>
                <button id="purple" class='lineColor' onclick="lineColor('purple')" role='button'><span></span> Purple </button>
                <button id="white" class='lineColor' onclick="lineColor('white')" role='button'><span></span> white </button>
            </div>
        </div>
        <div>
            <div id="canvasDiv">
                
            </div>
            
        </div>
    
    
        
        <div id='sizePallet' class='' style='padding-bottom: 3px;'>
            <h3>Line Size</h3>
            <button id="small" class='lineSize' onclick="lineSize(2)">Small   <span></span></button>
            <button id="medium" class='lineSize' onclick="lineSize(4)">Medium <span></span></button>
            <button id="large" class='lineSize' onclick="lineSize(8)">Large   <span></span></button>
        </div>
    
        <br/>
    </div>
    <a id='reset' href="k_draw.php">Reset</a>
</div>

        
        

        


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