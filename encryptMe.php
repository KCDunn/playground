<?php

$output = "Encrypted or Decrypted messages show up here!";
$encrypted = "";
$decrypted = "";
$letters = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
    '.',',','"','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','\'','$','?',
    ' ','1','2','3','4','5','6','7','8','9','0','#','%',"!");
$lettersCount = count($letters);
$shiftVal = 0;

if (isset($_POST['encryptMessage'])) {
    $encrypted = $_POST['encryptMessage'];
    $shiftVal = intval($_POST['shiftVal']);
    $temp = 0;
    $tempFill = "";
    $encryptLength = strlen($encrypted);
    
    for($i = 0; $i <= $encryptLength - 1; ++$i){
        $thisDecimal = ord($encrypted[$i]);
        if($thisDecimal >= 32 && $thisDecimal <= 63){
            if($thisDecimal + $shiftVal > 63){
                $tempFill .= chr($thisDecimal - 31 + $shiftVal);
            }
            elseif($thisDecimal + $shiftVal < 32){
                $tempFill .= chr($thisDecimal + 31 + $shiftVal);
            }
            else{
                $tempFill .= chr($thisDecimal += $shiftVal);
            }
        }

        if($thisDecimal >= 64 && $thisDecimal <= 122){
            if($thisDecimal + $shiftVal > 122){
                $tempFill .= chr($thisDecimal - 58 + $shiftVal);
            }
            elseif($thisDecimal + $shiftVal < 64){
                $tempFill .= chr($thisDecimal + 58 + $shiftVal);
            }
            else{
                $tempFill .= chr($thisDecimal += $shiftVal);
            }
        }
        
    }
    $output = $tempFill;

}


if (isset($_POST['decryptMessage'])) {
    $decrypted = $_POST['decryptMessage'];
    $output = "Decrypted Message: $decrypted";
    
    


}
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
    
    
	<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

	<!-- <link href="https://fonts.googleapis.com/css?family=Nobile&display=swap" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Capriola&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Spectral+SC&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/ecrypt.css">

    
	
	

</head>
<body>
<div class="main">



<div id="gameArea">
<h1 id="title">Encrypt Me</h1>
_END;

echo <<<_END
    <form id="encrpt" method="post" action="encryptMe.php">
    <p>Encrypt your secret message.</p><br>
    <input type="textarea" cols="70" rows="150" name="encryptMessage">
    <p>Enter an encryption value</p>
    <p class="enterNum">(between -20 and +20)</p>
    <input type="number" name="shiftVal" min="-20" max="20">
    <br>
    <br>
    <input type="submit" value="Encrypt" >

    <div class="outputArea">
            $output
        </div>
    </form>
<br>
    


_END;

// echo <<<_END
// <form id="decrpt" method="post" action="encryptMe.php">
//     <p>Decrypt your secret message.</p><br>
//     <input type="textarea" cols="70" rows="150" name="decryptMessage">
//     <p>Enter an encryption value, between -20 and +20.</p>
//     <input type="number" name="shiftVal" min="-20" max="20">
//     <br>
//     <br>

//     <input type="submit" value="Decrypt">

//     <div class="outputArea">
//         $output
//     </div>
// </form>
// <br>
    


// _END;

echo <<<_END
    </div>
</div>
</body>
</html>
_END;
?>