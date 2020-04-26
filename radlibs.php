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


    <link rel="stylesheet" type="text/css" href="css/radlibs.css">
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
<div id="wrapper">

<div class="main">
<h1>Rad Libs</h1>

<form method="post" action="radlibs.php">
	<label>Type a Noun:</label>
	<input type="text" name="noun">
	<label>Type a Verb:</label>
	<input type="text" name="verb">
	<label>Type an Adjective:</label>
	<input type="text" name="adjective">
	<label>Type a Pronoun:</label>
	<input type="text" name="pronoun">
	<label>Type a Friends Name:</label>
	<input type="text" name="friend">
	<br>
	<input type="submit" value="Lets do this!">
</form>



</div>

<div id="output">
<h3>Radlibs Output:</h3>
<p>$output</p></div>
<script>
	smallArray = ['one', 'two', 'three'];
	
	

	function displayItems() {
		for (j = 0 ; j < displayItems.arguments.length ; ++j)
		document.write("game " + j + ": " + diplayItems.arguments[j] + "<br>")
	}
	displayItems(smallArray);
</script>
</div>
</body>
</html>


_BODY;

?>