
<?php

session_start();
$secretNumber;
$hiddenNumber;
$output = "";
$name;
$newGame = false;
$otherOutput = "no other output";
$count;

if (isset($_POST['theNumber']) && isset($_SESSION['secretNumber'])) {

    $name = $_POST['theNumber'];
    $output = "You entered $name";
    $secretNumber = $_SESSION['secretNumber'];
    // $count = $_SESSION['count'];
    if($name == ""){
        $output = "You did not type a number!";
    }
    elseif($name < $secretNumber){
        $output = "Your guess of $name is too low.";
        $_SESSION['count'] += 1;
    }
    elseif($name > $secretNumber){
        $output = "Your guess of $name is too high.";
        $_SESSION['count'] += 1;
    }
    // elseif($name < '1' || $name > '100'){
    //     $output = "Your guess was not between 1 and 100! Try again";
    // }
    else{
        $_SESSION['count'] += 1;
        $count = $_SESSION['count'];
        $output = "<p class='win'>You Win!</p><p class='win'>The answer was $secretNumber!<br>You guessed in $count tries!</p>";
        session_destroy();
        $newGame = true;
        // $_SESSION['secretNumber'] = rand(1,100);
        $count = 0;
    }

} 
else {
    $output = "Start Guessing.";
    $_SESSION['secretNumber'] = rand(1,100);
    $_SESSION['count'] = 0;
    $secretNumber = $_SESSION['secretNumber'];
    $count = $_SESSION['count'];
    
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
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

	<!-- <link href="https://fonts.googleapis.com/css?family=Nobile&display=swap" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Capriola&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css?family=Spectral+SC&display=swap" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="css/guessing.css">
	<script src="../jquery-3.5.0.min.js"></script>
    // <script>
    //     $(document).ready(function(){
    //         $(document.body).ready(function() {
                
    //             $(".main").fadeIn(800);
    //         });

    //         $(".link").click(function() {
    //             event.preventDefault();

    //             newLocation = this.href;
    //             $(".main").fadeOut(200);
    //             $("h1").fadeOut(300, newPage);
    //         });

    //         function newPage() {
    //             window.location = newLocation;
    //         }
    //     });
	// </script>
	

</head>
<body>
<div class="main">
<h1>Guessing Game</h1>


<div class="gameArea">

_END;

if($newGame == false){
    echo <<<_END
    <form method="post" action="guessingGame.php">
    <p>Enter a number</p><p>(between 1 and 100)</p><br>
    <input type="number" name="theNumber" min="1" max="100">
    <br>
    <br>
    <p>$output</p>
    <br>
    <input type="submit" value="Guess">
    </form>
    <br>
    
</div>
    
    
        
    

_END;
}


if($newGame == true) {
    echo <<<_END
        
        <form method="post" action="guessingGame.php">
        <br>
        <input type="hidden" name="theNumber" min="1" max="100">
        <br>
        <br>
        <p>$output</p>
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
    </div>
    <a id="goback" href="index.php">Back to Games</a>
</body>
</html>
_END;
?>