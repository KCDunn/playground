<?php
$output = "";
$formHide = "inline-block";
$outputHide = "none";

// if( isset($_POST['noun']) && issett($_POST['verb']) && isset($_POST['adjective']) && isset($_POST['pronoun']) ) {
if( isset($_POST['noun']) ) {
	$noun = $_POST['noun'];
	$verb = $_POST['verb'];
	$adjective = $_POST['adjective'];
	$pronoun = $_POST['pronoun'];
	$friend = $_POST['friend'];

    $output = "Hello $friend, this is a $adjective test sentence for Radlibs!  I hope you like $noun's, because $pronoun are totaly $adjective right now!";
    $formHide = "none";
    $outputHide = "inline-block";
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
	<script src="js/radlibs.js"></script>
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
		
		function validate(form)
		{
			fail = validateNoun(form.noun.value)
			fail += validateVerb(form.verb.value)
			fail += validateAdjective(form.adjective.value)
			fail += validatePronoun(form.pronoun.value)
			fail += validateAdverb(form.adverb.value)
			fail += validateFriend(form.friend.value)

			if (fail == "") return true
			else { alert(fail); return false }
		}

	</script>
    
    

</head>
_HEAD;

echo <<<_BODY
<body>
<div id="wrapper">

<div class="main">
<h1>Rad Libs</h1>

<form style="display:$formHide;" method="post" action="radlibs2.php" onSubmit="return validate(this)">
	<label class="tooltip">Type a Noun:<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label>
	<input type="text" name="noun">
	<label class="tooltip">Type a Verb:<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label>
	<input type="text" name="verb">
	<label class="tooltip">Type an Adjective:<span class="tooltiptext">Used to modify a noun. ('hot' potato, 'cold' ice, 'green' eggs) <a class="tipRef" style="color: lightblue;" href="https://coolestwords.com/cool-adjectives/" target="blank">Cool Adjectives</a></span></label>
	<input type="text" name="adjective">
	<label class="tooltip">Type a Pronoun:<span class="tooltiptext">A word that replaces noun in a sentence. (he, she, you, me) <a class="tipRef" style="color: lightblue;" href="http//www.google.com" target="blank">Cool Pronouns</a></span></label>
	<input type="text" name="pronoun">
	<label class="tooltip">Type an Adverb:<span class="tooltiptext">Describes, modifies, or provides more information about a verb. ('quickly' run, 'safely' jump) <a class="tipRef" style="color: lightblue;" href="https://grammar.yourdictionary.com/parts-of-speech/adverbs/list-of-100-adverbs.html" target="blank">Adverbs</a></span></label>
	<input type="text" name="adverb">
	<label class="tooltip">Type your Name:<span class="tooltiptext">Or the name of someone you know.</span></label>
	<input type="text" name="friend">
	<br>
	<input type="submit" value="Lets do this!">
</form>

<div id="output" style="display:$outputHide;">
    <h3>Radlibs Output:</h3>
    <p>$output</p>
    <a href="radlibs2.php"><button id="newGame">Play Again</button></a>
    <a href="index.php"><button id="goBack">More Games</button></a>
</div>

</div>

</div>
</body>
</html>


_BODY;








function fix_string($string)
{
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities ($string);
}
?>