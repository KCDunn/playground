<?php

$noun = $verb = $adjective = $pronoun = $adverb = $friend = "";
$fail_noun = $fail_verb = $fail_adj = $fail_pron = $fail_adv = $fail_friend = $fail = "";

$output = "";
$formHide = "inline-block";
$outputHide = $errorHide = "none";

if(isset($_POST['noun']) && isset($_POST['adverb']) && isset($_POST['adjective'])){
	$noun = fix_string($_POST['noun']);
	$verb = fix_string($_POST['verb']);
	$adjective = fix_string($_POST['adjective']);
	$pronoun = fix_string($_POST['pronoun']);
	$adverb = fix_string($_POST['adverb']);
	$friend = fix_string($_POST['friend']);


	// if (isset($_POST['noun']))
	// 	$noun = fix_string($_POST['noun']);
	// if (isset($_POST['verb']))
	// 	$verb = fix_string($_POST['verb']);
	// if (isset($_POST['adjective']))
	// 	$adjective = fix_string($_POST['adjective']);
	// if (isset($_POST['pronoun']))
	// 	$pronoun = fix_string($_POST['pronoun']);
	// if (isset($_POST['adverb']))
	// 	$adverb = fix_string($_POST['adverb']);
	// if (isset($_POST['friend']))
	// 	$friend = fix_string($_POST['friend']);

	$fail = validate_noun($noun);
	$fail .= validate_verb($verb);
	$fail .= validate_adjective($adjective);
	$fail .= validate_pronoun($pronoun);
	$fail .= validate_adverb($adverb);
	$fail .= validate_friend($friend);

	// $fail_noun = validate_noun($noun);
	// $fail_verb .= validate_verb($verb);
	// $fail_adj .= validate_adjective($adjective);
	// $fail_pron .= validate_pronoun($pronoun);
	// $fail_adv .= validate_adverb($adverb);
	// $fail_friend .= validate_friend($friend);

	if ($fail == "")
	{
		$output = "Hello $friend, this is a $adjective test sentence for Radlibs!  I hope you like $noun's, because $pronoun are totaly $adjective right now!";
		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun = $fail_verb = $fail_adj = $fail_pron = $fail_adv = $fail_friend = "";
	}

	if ($fail != "")
	{
		$fail_noun = validate_noun($noun);
		$fail_verb .= validate_verb($verb);
		$fail_adj .= validate_adjective($adjective);
		$fail_pron .= validate_pronoun($pronoun);
		$fail_adv .= validate_adverb($adverb);
		$fail_friend .= validate_friend($friend);
	}
}





// if( isset($_POST['noun']) && issett($_POST['verb']) && isset($_POST['adjective']) && isset($_POST['pronoun']) ) {
// if( isset($_POST['noun']) ) {
// 	$noun = $_POST['noun'];
// 	$verb = $_POST['verb'];
// 	$adjective = $_POST['adjective'];
// 	$pronoun = $_POST['pronoun'];
// 	$friend = $_POST['friend'];

//     $output = "Hello $friend, this is a $adjective test sentence for Radlibs!  I hope you like $noun's, because $pronoun are totaly $adjective right now!";
//     $formHide = "none";
//     $outputHide = "inline-block";
// }
// else{
// 	$output = "One of the fields has been left empty!";
// }


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
	<label class="tooltip">Type a Noun:<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label><p class="err">$fail_noun</p>
	<input type="text" name="noun" value="$noun">
	<label class="tooltip">Type a Verb:<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb</p>
	<input type="text" name="verb" value="$verb">
	<label class="tooltip">Type an Adjective:<span class="tooltiptext">Used to modify a noun. ('hot' potato, 'cold' ice, 'green' eggs) <a class="tipRef" style="color: lightblue;" href="https://coolestwords.com/cool-adjectives/" target="blank">Cool Adjectives</a></span></label><p class="err">$fail_adj</p>
	<input type="text" name="adjective" value="$adjective">
	<label class="tooltip">Type a Pronoun:<span class="tooltiptext">A word that replaces noun in a sentence. (he, she, you, me) <a class="tipRef" style="color: lightblue;" href="http//www.google.com" target="blank">Cool Pronouns</a></span></label><p class="err">$fail_pron</p>
	<input type="text" name="pronoun" value="$pronoun">
	<label class="tooltip">Type an Adverb:<span class="tooltiptext">Describes, modifies, or provides more information about a verb. ('quickly' run, 'safely' jump) <a class="tipRef" style="color: lightblue;" href="https://grammar.yourdictionary.com/parts-of-speech/adverbs/list-of-100-adverbs.html" target="blank">Adverbs</a></span></label><p class="err">$fail_adv</p>
	<input type="text" name="adverb" value="$adverb">
	<label class="tooltip">Type your Name:<span class="tooltiptext">Or the name of someone you know.</span></label><p class="err">$fail_friend</p>
	<input type="text" name="friend" value="$friend">
	<br>

	<div id="error" style="display:$errorHide;">Sorry, the following errors were found!<br>
		<p><font color=#ff7755>$fail</font></p>
	</div>
		
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


//PHP functions for form validation
function validate_noun($field)
{
	if($field == "") return "Noun not entered.<br>";
	else if (preg_match("/w/", $field))
		return "Only letters, numbers, - and _ in nouns.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl 'noun' language please.<br>";
	else if (strlen($field) > 46)
		return "The longest English word is about 45 letters max. You wrote " . strlen($field) . " letters, for 'noun'!<br>";
}

function validate_verb($field)
{
	if($field == "") return "Verb not entered.<br>";
	else if (preg_match("/[^a-zA-Z]/", $field))
		return "Only letters in verbs.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl 'verb' language please.<br>";
	else if (strlen($field) > 46)
		return "The longest English word is about 45 letters max. You wrote " . strlen($field) . " letters, for 'verb'!<br>";
}


function validate_adjective($field)
{
	if($field == "") return "Adjective not entered.<br>";
	else if (preg_match("/[^a-zA-Z]/", $field))
		return "Only letters in adjectives.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl adjectives please.<br>";
	else if (strlen($field) > 46)
		return "The longest English word is about 45 letters max. You wrote " . strlen($field) . " letters, for 'adjective'!<br>";
}

function validate_pronoun($field)
{
	if($field == "") return "Pronoun not entered.<br>";
	else if (preg_match("/[^a-zA-Z]/", $field))
		return "Only letters in pronouns.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl pronouns please.<br>";
	else if (strlen($field) > 46)
		return "The longest English word is about 45 letters max. You wrote " . strlen($field) . " letters, for 'pronoun'!<br>";
}

function validate_adverb($field)
{
	if($field == "") return "Adverb not entered.<br>";
	else if (preg_match("/[^a-zA-Z]/", $field))
		return "Only letters in adverbs.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl adverbs please.<br>";
	else if (strlen($field) > 46)
		return "The longest English word is about 45 letters max. You wrote " . strlen($field) . " letters, for 'adverb'!<br>";
}

function validate_friend($field)
{
	if($field == "") return "Name not entered.<br>";
	else if (preg_match("/[^a-zA-Z]/", $field))
		return "Only letters used in Names.<br>";
	else if (preg_match("/fuck/i", $field, $match) || preg_match("/shit/i", $field, $match) || preg_match("/ass/i", $field, $match))
		return "No fowl names please.<br>";
	else if (strlen($field) > 55)
		return "Names length is set to 55 characters max.<br>";
}

// fix strings on input

function fix_string($string)
{
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities ($string);
}
?>