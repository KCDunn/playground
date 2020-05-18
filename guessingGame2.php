
<?php

session_start();
$secretNumber;
$output = "";
$userGuess;
$newGame = false;
$otherOutput = "no other output";
$count;

if (!(isset($_SESSION['secretNumber']))){
    $_SESSION['secretNumber'] = rand(1,100);
    $_SESSION['count'] = 0;
}


if (isset($_POST['theNumber'])) {

    $userGuess = $_POST['theNumber'];

    $secretNumber = $_SESSION['secretNumber'];
    // $count = $_SESSION['count'];

    if($userGuess == ""){
        $output = "You did not type a number!";
    }
    elseif(!($userGuess >= 1 && $userGuess <= 100)){
        $output = "Must be a number between 1 and 100.";
    }
    elseif($userGuess < $secretNumber){
        $output = "Your guess of $userGuess is too low.";
        $_SESSION['count'] += 1;
    }
    elseif($userGuess > $secretNumber){
        $output = "Your guess of $userGuess is too high.";
        $_SESSION['count'] += 1;
    }
    else{
        $_SESSION['count'] += 1;
        $count = $_SESSION['count'];
        $output = "<p id='guessed1'>The answer was $secretNumber!</p><p id='guessed2'>You guessed in $count tries!</p>";
        session_destroy();
        $newGame = true;
    }

} 
else {
    $output = "Start Guessing.";
    
}



    




$secretNumber = $_SESSION['secretNumber'];
$count = $_SESSION['count'];


echo <<<_END

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Guessing Game | kevincdunn</title>
	<meta name="description" content="Guess a number between 1 and 100.">
	<meta name="keywords" content="guessing game">
	<meta name="author" content="Kevin Dunn">
	<meta name="copyright" content="2018">
    
    
	<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->



    <link rel="stylesheet" type="text/css" href="css/guessing.css">
    <script src="js/jquery-3.5.0.min.js"></script>
    <script>
        $('document').ready(function()
        {
            $("h4").animate({fontSize: "2.3em"});
            $("#guessed1").delay(2000).animate({fontSize: "1.4em"});
            $("#guessed2").delay(3000).animate({fontSize: "1.4em"});

            $("#newGame").click(function() {
                event.preventDefault();
                newLocation = this.href;
                $("h4").animate({fontSize: ".8em"});
                $("#guessed1").animate({fontSize: ".5em"})
                $("#guessed2").animate({fontSize: ".5em"})
                $("#guess_count").animate({opacity: "0.0"});
                $("#youWin").delay().slideUp(900, newPage);
            })

            function newPage() {
                window.location = "guessingGame2.php";
            }
        })
    </script>

    
	

</head>
<body>
<div class="main">
<h1>Guessing Game</h1>


<div class="gameArea">

_END;

if($newGame == false){
    echo <<<_END
    <form method="post" action="guessingGame2.php">
    <p>Enter a number</p><p>(between 1 and 100)</p><br>
    <input id="inputNum" type="number" name="theNumber" min="1" max="100">
    <br>
    <br>
    $output
    <br>
    <br>
    <input type="submit" value="Guess">
    </form>
    <br>
    
</div>
    
    
        
    

_END;
}


if($newGame == true) {
    echo <<<_END
        
        <form id="youWin" method="post" action="guessingGame2.php">
        <br>
        <br>
        <br>
        <h4>You Win!</h4>
        $output
        <br>
        <input id="newGame" type="submit" value="Play Again">
        <br>
        </form>
        <br>
    </div>
        
        
_END;
}

echo <<<_END
        <div id="guess_count"><p>$count Guesses</p></div>
        <p>Secret Number: $secretNumber</p>
    </div>
    <a id="goback" href="index.php">Back to Playground</a>
<script>
    window.onload = function() {
        document.getElementById('inputNum').focus();
    };
</script>
</body>
</html>
_END;
?>