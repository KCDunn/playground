<?php

$output = "";
$encrypted = "";
$decrypted = "";
$letters = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
    '.',',','"','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','\'','$','?',
    ' ','1','2','3','4','5','6','7','8','9','0','#','%',"!");
$lettersCount = count($letters);
$shiftVal = 0;

if (isset($_POST['encryptMessage'])) {
    $encrypted =  trim(preg_replace('/\s+/',' ', $_POST['encryptMessage']));
    $shiftVal = intval($_POST['shiftVal']);
    $temp = 0;
    $tempFill = "";
    $encryptLength = strlen($encrypted);
    
    for($i = 0; $i <= $encryptLength - 1; ++$i){
        $thisDecimal = ord($encrypted[$i]);
        $thisNum = $thisDecimal + $shiftVal;
        
        

        if($thisDecimal >= 33 && $thisDecimal <= 122)
        {
            if($i % 2 == 0 && $shiftVal != 0)
            {
                if($thisNum + 2 > 122){
                    $tempFill .= chr($thisNum - 90 + 2);
                    
                }elseif($thisNum + 2 < 33){
                    $tempFill .= chr($thisNum + 92);
                }
                else{
                    $tempFill .= chr($thisNum + 2);
                }
            }
            else{
                if($thisNum > 122){
                    $tempFill .= chr($thisNum - 90);
                    
                }elseif($thisNum < 33){
                    $tempFill .= chr($thisNum + 90);
                }
                else{
                    $tempFill .= chr($thisNum);
                }
            }
            

            // $thisNum = $thisDecimal + $shiftVal;

            // if($thisNum > 122){
            //     $tempFill .= chr($thisDecimal + $shiftVal - 90 );
            // }
            // elseif($thisNum < 33){
            //     $tempFill .= chr($thisDecimal + 90 + $shiftVal);
            // }
            // else{
            //     $tempFill .= chr($thisDecimal + $shiftVal);
            // }
        }
        else{
            $tempFill .= chr($thisDecimal);
        }
        
    
        
    }
    $output = $tempFill;

}


// if (isset($_POST['decryptMessage'])) {
//     $decrypted = $_POST['decryptMessage'];
//     $output = "Decrypted Message: $decrypted";
// }

echo <<<_END

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Encrypt Me | kevincdunn</title>
	<meta name="description" content="Encrypt a secret message.">
	<meta name="keywords" content="encryption, secret message">
	<meta name="author" content="Kevin Dunn">
	<meta name="copyright" content="2020">
    
	<link href="https://fonts.googleapis.com/css2?family=Plaster&display=swap" rel="stylesheet">
    
    <link rel='stylesheet' href='jquery-mobile/jquery.mobile-1.4.5.min.css'>
    <script src='js/jquery-2.2.4.min.js'></script>
    <script src='jquery-mobile/jquery.mobile-1.4.5.min.js'></script>
    <link rel="stylesheet" type="text/css" href="css/encrpt-decrpt.css">

</head>
<body>
<div class="main" data-role="page">
<div id="gameArea" class="ui-content">

_END;

echo <<<_END
    <div class="ui-field-contain">
        <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
            <a href="encryptMe.php" id="encrypt" class="ui-btn  ui-state-disabled ui-corner-all">Encrypt</a>
            <a href="decryptMe.php" id="decrypt" class="off ui-btn ui-corner-all" data-transition="flip">Decrypt</a>
        </fieldset>
    </div>

    <div id="header" data-role="header">
        <h1>Encrypt Me</h1>
    </div>

    <form id="encrpt" method="post" action="encryptMe.php">
        <div class="ui-field-contain>
            <label for="encryptMessage">Write a message to encrypt:</label>
            <textarea name="encryptMessage"></textarea>
        </div>
        
        <div class="ui-field-contain">
            <label for="slider">Slide to create a secret number<br>(between -20 and +20)<br>Use number for decrypting.<label>
            <input type="range" name="shiftVal" value="1" min="-20" max="20">
        </div>
        <div class="ui-field-contain">
            <label for="submit" class="ui-hidden-accessible">Encrypt Message</label>
            <button type="submit" id="submit" class="ui-shadow ui-btn ui-corner-all ui-center">Encrypt</button>
        </div>
        
        <div id="outputArea" class="ui-content">
            $output
        </div>
    </form>

<br>

_END;

echo <<<_END
    
    
    <footer data-role='footer'>
    <a href="index.php" class="ui-btn" data-ajax="false">Back to Playground</button></a>
        <h4>Web App created by <a href='http://www.kevincdunn.com' target='_blank'>kevincdunn.com</a></h4>
    </footer>
    </div>
</div>
</body>
</html>
_END;

?>