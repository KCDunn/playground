<?php
require_once('php/radlibsVal.php');
$noun1 = $verb1 = $noun2 = $verb2 = $noun3 = $verb3 = $adjective1 = $adjective2 = $adjective3 = "";
$fail_noun1 = $fail_noun2 = $fail_noun3 = $fail_verb1 = $fail_verb2 = $fail_verb3 = $fail_adj1 = $fail_adj2 = $fail_adj3 = $fail_adv = $fail_writer = "";

$output = "";
$formHide = "inline-block";
$outputHide = $errorHide = "none";

if(isset($_POST['noun1']) && isset($_POST['verb1']) && isset($_POST['adjective1'])){
    $noun1 = fix_string($_POST['noun1']);
    $noun2 = fix_string($_POST['noun2']);
    $noun3 = fix_string($_POST['noun3']);
    $verb1 = fix_string($_POST['verb1']);
    $verb2 = fix_string($_POST['verb2']);
    $verb3 = fix_string($_POST['verb3']);
    $adjective1 = fix_string($_POST['adjective1']);
    $adjective2 = fix_string($_POST['adjective2']);
    $adjective3 = fix_string($_POST['adjective3']);


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

    $fail = validate_noun($noun1);
    $fail .= validate_noun($noun2);
	$fail .= validate_noun($noun3);
    $fail .= validate_word($verb1);
    $fail .= validate_word($verb2);
    $fail .= validate_word($verb3);
    $fail .= validate_adjective($adjective1);
    $fail .= validate_adjective($adjective2);
    $fail .= validate_adjective($adjective3);

	// $fail_noun = validate_noun($noun);
	// $fail_verb .= validate_verb($verb);
	// $fail_adj .= validate_adjective($adjective);
	// $fail_pron .= validate_pronoun($pronoun);
	// $fail_adv .= validate_adverb($adverb);
	// $fail_friend .= validate_friend($friend);

	if ($fail == "")
	{
		$output = "<h2>Pool Rules</h2>
		<ul id='poolRules'>
			<li>Food or drink is $noun1 in the pool area.</li>
			<li>No $verb2 allowed in the pool areal</li>
			<li>Alcoholic $noun3's are prohibited.</li>
			<li>Any person suspected of being under the influence of $noun2 shall be prohibited from entering the pool.</li>
			<li>Pets or any animals are not allowed in the $noun1 except for service animals</li>
			<li>No $adjective2 on the pool deck</li>
			<li>Children shall not use pool without $noun3 in attendance.</li>
			<li>Bathers must wear $adjective3 swim attire. </li>
			<li>No $verb1 except in designated " . $verb1 . "ing areas.</li>
			<li>Management has the right to $verb3 any patron for non-compliance with the above rules.</li>
		</ul>
		
        ";

		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun1 = $fail_noun2 = $fail_noun3 = $fail_verb1 = $fail_verb2 = $fail_verb3 = $fail_adj1 = $fail_adj2 = $fail_adj3 = "";
	}

	if ($fail != "")
	{
        $fail_noun1 = validate_noun($noun1);
        $fail_noun2 = validate_noun($noun2);
        $fail_noun3 = validate_noun($noun3);
        $fail_verb1 .= validate_word($verb1);
        $fail_verb2 .= validate_word($verb2);
        $fail_verb3 .= validate_word($verb3);
        $fail_adj1 .= validate_adjective($adjective1);
        $fail_adj2 .= validate_adjective($adjective2);
        $fail_adj3 .= validate_adjective($adjective3);
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
	<script src="../js/jquery-3.5.0.min.js"></script>
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
            fail = validateNoun(form.noun1.value)
            fail = validateNoun(form.noun2.value)
            fail = validateNoun(form.noun3.value)
            fail += validateVerb(form.verb1.value)
            fail += validateVerb(form.verb2.value)
            fail += validateVerb(form.verb3.value)
            fail += validateAdjective(form.adjective1.value)
            fail += validateAdjective(form.adjective2.value)
            fail += validateAdjective(form.adjective3.value)

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
<h1>Informative RadLibs</h1>

<form style="display:$formHide;" method="post" action="inform_poolrules.php" onSubmit="return validate(this)">
	<label class="tooltip">Type a Noun:<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label><p class="err">$fail_noun1</p>
	<input type="text" name="noun1" value="$noun1">
	<label class="tooltip">Type a Verb:<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb1</p>
	<input type="text" name="verb1" value="$verb1">
	<label class="tooltip">Type an Adjective:<span class="tooltiptext">Used to modify a noun. ('hot' potato, 'cold' ice, 'green' eggs) <a class="tipRef" style="color: lightblue;" href="https://coolestwords.com/cool-adjectives/" target="blank">Cool Adjectives</a></span></label><p class="err">$fail_adj1</p>
	<input type="text" name="adjective1" value="$adjective1">
	<label class="tooltip">Type a Noun:<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label><p class="err">$fail_noun2</p>
    <input type="text" name="noun2" value="$noun2">
    <label class="tooltip">Type a Verb (present tense):<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb2</p>
	<input type="text" name="verb2" value="$verb2">
    <label class="tooltip">Type an Adjective:<span class="tooltiptext">Used to modify a noun. ('hot' potato, 'cold' ice, 'green' eggs) <a class="tipRef" style="color: lightblue;" href="https://coolestwords.com/cool-adjectives/" target="blank">Cool Adjectives</a></span></label><p class="err">$fail_adj2</p>
    <input type="text" name="adjective2" value="$adjective2">
    <label class="tooltip">Type a Noun:<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label><p class="err">$fail_noun3</p>
    <input type="text" name="noun3" value="$noun3">
    <label class="tooltip">Type a Verb:<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb3</p>
    <input type="text" name="verb3" value="$verb3">
    <label class="tooltip">Type an Adjective:<span class="tooltiptext">Used to modify a noun. ('hot' potato, 'cold' ice, 'green' eggs) <a class="tipRef" style="color: lightblue;" href="https://coolestwords.com/cool-adjectives/" target="blank">Cool Adjectives</a></span></label><p class="err">$fail_adj3</p>
    <input type="text" name="adjective3" value="$adjective3">
	
	<br>

	<div id="error" style="display:$errorHide;">Sorry, the following errors were found!<br>
		// <p><font color=#ff7755>fail</font></p>
	</div>
		
	<br>
	<input type="submit" value="Lets do this!">
</form>

<div id="output" class="poolRules" style="display:$outputHide;">
    $output
    
</div>

</div>

</div>
<a href="index.php"><button id="newGame">Another Lib</button></a>
<a href="../"><button id="goBack">More Games</button></a>
</body>
</html>


_BODY;


?>