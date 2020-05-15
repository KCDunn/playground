<?php
require_once('../php/radlibsVal.php');
$noun1 = $verb1 = $verb2 = $verb3 = $verb4 = "";
$songNum = 0;
$fail_noun1 = $fail_verb1 = $fail_verb2 = $fail_verb3 = $fail_verb4 = "";

$output = $outputTitle = "";
$formHide = "inline-block";
$outputHide = $errorHide = "none";

if(isset($_POST['noun1']) && isset($_POST['verb1']) && isset($_POST['verb2'])){
    $noun1 = fix_string($_POST['noun1']);
    $verb1 = fix_string($_POST['verb1']);
    $verb2 = fix_string($_POST['verb2']);
    $verb3 = fix_string($_POST['verb3']);
    $verb4 = fix_string($_POST['verb4']);
	

    $fail = validate_noun($noun1);
    $fail .= validate_verb($verb1);
    $fail .= validate_verb($verb2);
    $fail .= validate_verb($verb3);
    $fail .= validate_verb($verb4);
	


	if ($fail == "")
	{
        $outputTitle = "Pirates Life";
        $output = "Yo ho, yo ho,<br>
        a pirates life for me!<br>
        We $verb3, we $verb4, we $verb1, and $verb2.<br>
        Drink up me hearties YO HO!<br>
        We $verb4 and $verb3 and don't give a $noun1.<br>
        Drink up me hearties YO HO!<br>
        Yo ho yo ho,<br>
        a pirates life for me!<br>
        ";
        
        
		
        

		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun1 = $fail_verb1 = $fail_verb2 = $fail_verb3 = $fail_verb4 = "";
	}

	if ($fail != "")
	{
        $fail_noun1 = validate_noun($noun1);
        $fail_verb1 = validate_verb($verb1);
        $fail_verb2 = validate_verb($verb2);
        $fail_verb3 = validate_verb($verb3);
        $fail_verb4 = validate_verb($verb4);
        
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
            fail += validateNoun(form.noun2.value)
            

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
<h1>Pirate Libs</h1>

<form style="display:$formHide;" method="post" action="pirates_life.php" onSubmit="return validate(this)">
    <label class="tooltip">Type a Verb:<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb1</p>
    <input type="text" name="verb1" value="$verb1">
    <label class="tooltip">Type a Verb:<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb2</p>
	<input type="text" name="verb2" value="$verb2">
	<label class="tooltip">Type a Noun:<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label><p class="err">$fail_noun1</p>
	<input type="text" name="noun1" value="$noun1">
	<label class="tooltip">Type a Verb:<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb3</p>
	<input type="text" name="verb3" value="$verb3">
	<label class="tooltip">Type a Verb:<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb4</p>
	<input type="text" name="verb4" value="$verb4">
	<br>

	<div id="error" style="display:$errorHide;">Sorry, the following errors were found!<br>
		// <p><font color=#ff7755>fail</font></p>
	</div>
		
	<br>
	<input type="submit" value="Lets do this!">
</form>

<div id="output" style="display:$outputHide;">
    <h2>$outputTitle</h2>
    <br>
    <p>$output</p>
    <a href="../radlibs.php"><button id="newGame">Another Lib</button></a>
    <a href="../index.php"><button id="goBack">More Games</button></a>
</div>

</div>

</div>
</body>
</html>


_BODY;


?>