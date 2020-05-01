<?php

echo <<<_END

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Games! | kevincdunn</title>
	<meta name="description" content="List if games and web applications.">
	<meta name="keywords" content="games, fun, entertainment">
	<meta name="author" content="Kevin Dunn">
	<meta name="copyright" content="2020">
    
    
	<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

	<!-- <link href="https://fonts.googleapis.com/css?family=Nobile&display=swap" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Capriola&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Spectral+SC&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/gameslist.css">
    <script src="../jquery-3.5.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $(document.body).ready(function() {
                $("#title").delay(100).fadeIn(800);
                $(".main").delay(400).fadeIn(800);
            });

            $(".link").click(function() {
                event.preventDefault();

                newLocation = this.href;
                $(".main").fadeOut(200);
                $("h1").fadeOut(300, newPage);
            });

            function newPage() {
                window.location = newLocation;
            }
        });
	</script>
	

</head>
<body>
<div id="wrapper">
<h1 id="title">Come Play My Games!</h1>

    <div class="main">
        
        <div class="game_item">
            <h2>Guessing Game</h2>
            <p>Guess a number between 1 and 100. How many guesses does it take you?</p>
            <a class="go_to link" href="guessingGame.php">Guessing Game</a>
        </div>
        <div class="game_item">
            <h2>Encrypt Me</h2>
            <p>Encrypt or Decrypt messages sent between you and your conspiracy friends!</p>
            <a class="go_to link" href="encryptMe.php">Encrypt Me</a>
            
        </div>
        <div class="game_item">
            <h2>Rad Libs</h2>
            <p>Like Mad Libs, but radder! Ok well, its Mad Libs.</p>
            <a class="go_to link" href="radlibs.php">Rad Libs</a>
        </div>
        <div class="game_item">
            <h2>Tru Story</h2>
            <p>Read and write true stories based on selected topics</p>
            <a class="go_to link" href="guessingGame.php">Tru Story</a>
        </div>
        <div class="game_item desktop">
            <h2>Pacman</h2>
            <p>A packman where everyone wins! (for desktop/laptop)</p>
            <a class="go_to link" href="packman/">Packman</a>
        </div>
        <div class="game_item desktop">
            <h2>1942</h2>
            <p>Shoot down the enemy planes! (for desktop/laptop)</p>
            <a class="go_to link" href="1942/">1942</a>
        </div>

        
_END;


echo <<<_END
    </div>
    </div>
</body>
</html>
_END;
?>