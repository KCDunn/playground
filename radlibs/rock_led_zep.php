<?php
require_once('php/radlibsVal.php');
$noun1 = $verb1 = $noun2 = $verb2 = $adjective = $writer = "";
$fail_noun1 = $fail_noun2 = $fail_verb1 = $fail_verb2 = $fail_adj = $fail_writer = "";

$output = "";
$formHide = "inline-block";
$outputHide = $errorHide = "none";

if(isset($_POST['noun1']) && isset($_POST['verb1']) && isset($_POST['adjective'])){
    $noun1 = fix_string($_POST['noun1']);
    $noun2 = fix_string($_POST['noun2']);
    $verb1 = fix_string($_POST['verb1']);
    $verb2 = fix_string($_POST['verb2']);
	$adjective = fix_string($_POST['adjective']);
	$writer = fix_string($_POST['writer']);



    $fail = validate_noun($noun1);
    $fail .= validate_noun($noun2);
    $fail .= validate_word($verb1);
    $fail .= validate_word($verb2);
	$fail .= validate_adjective($adjective);
	$fail .= validate_name($writer);

	
	if ($fail == "")
	{
        $output = "<h2>Led Zepplin - $noun and $verb1</h2><br><h3>Song edited by $writer</h3><br>
        It's been a long $noun2 since I $noun and" . $verb1 . "ed
        It's been a long $noun2 since I did the $verb2
        Oh let me get it back let me get it back
        Let me get it back baby where I come from
        It's been a long $noun2 been a long $noun2
        Been a long $adjective $adjective $adjective $adjective $adjective $noun2.
        Yes it has
        <br><br><br>";

		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun1 = $fail_noun2 = $fail_noun3 = $fail_verb1 = $fail_verb2 = $fail_verb3 = $fail_adj = $fail_adv = $fail_writer = "";
	}

	if ($fail != "")
	{
        $fail_noun1 = validate_noun($noun1);
        $fail_noun2 = validate_noun($noun2);
        $fail_noun3 = validate_noun($noun3);
        $fail_verb1 .= validate_word($verb1);
        $fail_verb2 .= validate_word($verb2);
        $fail_verb3 .= validate_word($verb3);
		$fail_adj .= validate_adjective($adjective);
		$fail_adv .= validate_adverb($adverb);
		$fail_writer .= validate_name($writer);
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Spectral+SC&display=swap" rel="stylesheet">

	<link rel='stylesheet' href='jquery-mobile/jquery.mobile-1.4.5.min.css'>
    <script src='js/jquery-2.2.4.min.js'></script>
    <script src='jquery-mobile/jquery.mobile-1.4.5.min.js'></script>
	<link rel="stylesheet" type="text/css" href="css/radlibs_select_new.css">

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
			fail += validateAdjective(form.adjective.value)
			fail += validateName(form.writer.value)

			if (fail == "") return true
			else { alert(fail); return false }
		}

	</script>
    
    

</head>
_HEAD;

echo <<<_BODY
<body>
<div data-role="page" id="wrapper">
    <div data-role="header">
        <h1>Literary RadLibs</h1>
    </div>
<div data-role="content" class="main">

<form style="display:$formHide;" method="post" action="rock_led_zepplin.php" onSubmit="return validate(this)">
	<label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun1</p>
	<input type="text" name="noun1" value="$noun1" placeholder="noun">
	<label class="ui-hidden-accessible">Type a Verb:</label><p class="err">$fail_verb1</p>
	<input type="text" name="verb1" value="$verb1" placeholder="verb">
	<label class="ui-hidden-accessible">Type an Adjective:</label><p class="err">$fail_adj</p>
	<input type="text" name="adjective" value="$adjective" placeholder="adjective">
	<label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun2</p>
    <input type="text" name="noun2" value="$noun2" placeholder="noun">
    <label class="ui-hidden-accessible">Type a Verb:</label><p class="err">$fail_verb2</p>
	<input type="text" name="verb2" value="$verb2" placeholder="noun">
	<label class="ui-hidden-accessible">Type your Name:</label><p class="err">$fail_writer</p>
	<input type="text" name="writer" value="$writer" placeholder="your name">
	<br>

	<div id="error" style="display:$errorHide;">Sorry, the following errors were found!<br>
		// <p><font color=#ff7755>fail</font></p>
	</div>
		
	<br>
	<input type="submit" value="Lets do this!">
</form>

<div id="output" style="display:$outputHide;">
    $output
    <a href="index.php" data-role="button" data-ajax="false">Another Lib</a>
    <a href="../" data-role="button" data-ajax="false">More Games</a>
</div>

</div>

</div>
</body>
</html>


_BODY;


?>