<?php
require_once('../php/radlibsVal.php');
$noun1 = $verb1 = $noun2 = $noun3 = $verb2 = $noun3 = $adjective1 = $adjective2 = "";
$fail_noun1 = $fail_noun2 = $fail_noun3 = $fail_verb1 = $fail_verb2 = $fail_adj1 = $fail_adj2 = "";

$output = "";
$formHide = "inline-block";
$outputHide = $errorHide = "none";

if(isset($_POST['noun1']) && isset($_POST['verb1']) && isset($_POST['adjective1'])){
    $noun1 = fix_string($_POST['noun1']);
	$noun2 = fix_string($_POST['noun2']);
	$noun3 = fix_string($_POST['noun3']);
    $verb1 = fix_string($_POST['verb1']);
    $verb2 = fix_string($_POST['verb2']);
    $adjective1 = fix_string($_POST['adjective1']);
    $adjective2 = fix_string($_POST['adjective2']);

    $fail = validate_noun($noun1);
	$fail = validate_noun($noun2);
	$fail = validate_noun($noun3);
    $fail .= validate_word($verb1);
    $fail .= validate_word($verb2);
    $fail .= validate_adjective($adjective1);
    $fail .= validate_adjective($adjective2);


	if ($fail == "")
	{
        $output = "<h2>Hazardous Weather Outlook</h2>
		<p>Hazardous Weather Outlook<br>
		<br>
		This Hazardous Weather Outlook is for portions of Middle Tennessee.<br>
		<br>
		.DAY ONE...Today and Tonight.<br>
		<br>
		A few strong to briefly severe $noun1 may occur. The main
		$verb1 will be $adjective1 wind gusts. Some storms will produce small
		$noun2.<br>
		<br>
		.DAYS TWO THROUGH SEVEN...Thursday through Tuesday.<br>
		<br>
		No $adjective2 $noun1 is expected at this time.<br>
		<br>
		.$noun3 INFORMATION STATEMENT...<br>
		<br>
		$noun3 activation may be needed. Please $verb2 any information about
		observed severe weather to the NWS while following all local, state,
		and CDC guidelines.<br>
		<br>
		$$<br>

        </p>";

		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun1 = $fail_noun2 = $fail_verb1 = $fail_verb2 = $fail_adj1 = $fail_adj2 = "";
	}

	if ($fail != "")
	{
        $fail_noun1 = validate_noun($noun1);
        $fail_noun2 = validate_noun($noun2);
        $fail_verb1 .= validate_word($verb1);
        $fail_verb2 .= validate_word($verb2);
        $fail_adj1 .= validate_adjective($adjective1);
        $fail_adj2 .= validate_adjective($adjective2);
	}
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


	<link rel="stylesheet" type="text/css" href="../css/radlibs.css">
	<script src="../js/radlibs.js"></script>
	<script src="../../jquery-3.5.0.min.js"></script>
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
            fail += validateVerb(form.verb1.value)
            fail += validateVerb(form.verb2.value)
            fail += validateAdjective(form.adjective1.value)
            fail += validateAdjective(form.adjective2.value)

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

<form style="display:$formHide;" method="post" action="weather-alert.php" onSubmit="return validate(this)">
	<label class="tooltip">Type a Noun:<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label><p class="err">$fail_noun1</p>
	<input type="text" name="noun1" value="$noun1">
	<label class="tooltip">Type a Verb:<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb1</p>
	<input type="text" name="verb1" value="$verb1">
	<label class="tooltip">Type an Adjective (present participle):<span class="tooltiptext">Used to modify a noun. ('hot' potato, 'cold' ice, 'green' eggs) <a class="tipRef" style="color: lightblue;" href="https://coolestwords.com/cool-adjectives/" target="blank">Cool Adjectives</a></span></label><p class="err">$fail_adj1</p>
	<input type="text" name="adjective1" value="$adjective1">
	<label class="tooltip">Type a Noun (plural):<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label><p class="err">$fail_noun2</p>
    <input type="text" name="noun2" value="$noun2">
    <label class="tooltip">Type a Verb:<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb2</p>
	<input type="text" name="verb2" value="$verb2">
    <label class="tooltip">Type an Adjective:<span class="tooltiptext">Used to modify a noun. ('hot' potato, 'cold' ice, 'green' eggs) <a class="tipRef" style="color: lightblue;" href="https://coolestwords.com/cool-adjectives/" target="blank">Cool Adjectives</a></span></label><p class="err">$fail_adj2</p>
	<input type="text" name="adjective2" value="$adjective2">
	<label class="tooltip">Type a Noun:<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label><p class="err">$fail_noun3</p>
	<input type="text" name="noun3" value="$noun3">
	<br>

	<div id="error" style="display:$errorHide;">Sorry, the following errors were found!<br>
		// <p><font color=#ff7755>fail</font></p>
	</div>
		
	<br>
	<input type="submit" value="Lets do this!">
</form>

<div id="output" style="display:$outputHide;">
    $output
    <a href="../radlibs.php"><button id="newGame">Another Lib</button></a>
    <a href="../index.php"><button id="goBack">More Games</button></a>
</div>

</div>

</div>
</body>
</html>


_BODY;


?>