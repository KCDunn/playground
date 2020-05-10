<?php

$output = "";

// if( isset($_POST['noun']) && issett($_POST['verb']) && isset($_POST['adjective']) && isset($_POST['pronoun']) ) {
if( isset($_POST['noun']) ) {
	$noun = $_POST['noun'];
	$verb = $_POST['verb'];
	$adjective = $_POST['adjective'];
	$pronoun = $_POST['pronoun'];
	$friend = $_POST['friend'];

	$output = "Hello $friend, it is $adjective to $verb you! It has been a long $pronoun.";
}
else{
	$output = "One of the fields has been left empty!";
}


echo <<<_HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mad Libs | kevincdunn</title>
	<meta name="description" content="Come up with words: verbs, nouns, adjectives, etc.">
	<meta name="keywords" content="mad libs">
	<meta name="author" content="Kevin Dunn">
	<meta name="copyright" content="2018">
    
    
	<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

	<!-- <link href="https://fonts.googleapis.com/css?family=Nobile&display=swap" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Capriola&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css?family=Spectral+SC&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/radlibs_select.css">
	<script src="../jquery-3.5.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $(document.body).ready(function() {
                $("#wrapper").fadeIn(800);
            });

            $(".link").click(function() {
                event.preventDefault();

                newLocation = this.href;
                $("").fadeOut(300, newPage);
            });

            function newPage() {
                window.location = newLocation;
            }
        });
	</script>
	

</head>
_HEAD;

echo <<<_BODY
<body>
<h1>Rad Libs</h1>
<div id="wrapper">
    
    <div id="main">


        <div class="game_theme lit">
            <h2>Literary Libs</h2>
            <p>These Rad Libs are based on excerpts from popular literature.</p>
            <ul>
                <a href="literary-libs/harry_potter.php"><li>Harry Potter</li></a>
                <a href="literary-libs/lotr.php"><li>Lord of the Rings</li></a>
                <a href="literary-libs/moby_dick.php"><li>Moby Dick</li></a>
                <a href="literary-libs/dracula.php"><li>Dracula</li></a>
            </ul>
        </div>
        <div class="game_theme rock">
            <h2>Rock Libs</h2>
            <p>Check out these new lyrics to your favorite Hits, from yesterday and today!</p>
            <ul>
                <a href="rockin-libs/led_zepplin.php"><li>Led Zepplin</li></a>
                <a href="rockin-libs/aerosmith.php"><li>Aerosmith</li></a>
                <a href="rockin-libs/commodores.php"><li>Commodores</li></a>
                
            </ul>
            
        </div>
        <div class="game_theme inform">
            <h2>Informative Libs</h2>
            <p>Keep yourself informed on these most important topics!</p>
            <ul>
                <a href="informative-libs/weather-alert.php"><li>Severe Weather Alert</li></a>
                <a href="informative-libs/pool-rules.php"><li>Pool Rules</li></a>
                
            </ul>
        </div>
        <div class="game_theme other">
            <h2>Pirate Libs</h2>
            <p>All things pirates like!</p>
            <ul>
                <a href="pirate-libs/pirates_life.php"><li>Pirates Life</li></a>
                <a href="pirate-libs/bottles.php"><li>Bottles</li></a>
                <a href="pirate-libs/around_the_world.php"><li>Around the World</li></a>
            </ul>
        </div>

    </div>
</div>
<a id="goback" href="index.php">Back to Games</a>
</body>
</html>


_BODY;

?>