<?php
require_once('php/radlibsVal.php');
$noun1 = $verb1 = $noun2 = $verb2 = $noun3 = $verb3 = $adjective1 = $adjective2 = $adjective3 = $adverb = $writer = "";
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
	$adverb = fix_string($_POST['adverb']);
	$writer = fix_string($_POST['writer']);


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
	$fail .= validate_adverb($adverb);
	$fail .= validate_name($writer);

	// $fail_noun = validate_noun($noun);
	// $fail_verb .= validate_verb($verb);
	// $fail_adj .= validate_adjective($adjective);
	// $fail_pron .= validate_pronoun($pronoun);
	// $fail_adv .= validate_adverb($adverb);
	// $fail_friend .= validate_friend($friend);

	if ($fail == "")
	{
        $output = "<h2>Aerosmith - I Don't Want to Miss a Thing</h2><br><h3>Lyrics edited by $writer</h3><br>
        I could $verb3 awake just to $verb2 you $verb1-ing<br>
        Watch you $noun3 while you are " . $verb3 ."ing<br>
        While you're $adverb away and $adjective1<br>
        I could spend my life in this $adjective2 surrender<br>
        I could stay lost in this $noun1 forever
        Ooh, every moment spent with you is a moment I treasure<br>
        Don't want to close my $noun3<br>
        I don't want to fall asleep<br>
        'Cause I'd miss you, babe<br>
        And I don't want to $verb2 a $noun2<br>
        'Cause even when I dream of you<br>
        The $adjective3 dream will never do<br>
        I'd still miss you, babe<br>
        And I don't want to $verb2 a $noun2<br><br><br>";

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
        $fail_adj1 .= validate_adjective($adjective1);
        $fail_adj2 .= validate_adjective($adjective2);
        $fail_adj3 .= validate_adjective($adjective3);
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
            fail = validateNoun(form.noun3.value)
            fail += validateVerb(form.verb1.value)
            fail += validateVerb(form.verb2.value)
            fail += validateVerb(form.verb3.value)
            fail += validateAdjective(form.adjective1.value)
            fail += validateAdjective(form.adjective2.value)
            fail += validateAdjective(form.adjective3.value)
			fail += validateAdverb(form.adverb.value)
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

<form style="display:$formHide;" method="post" action="rock_aerosmith.php" onSubmit="return validate(this)">
	<label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun1</p>
	<input type="text" name="noun1" value="$noun1" placeholder="noun">
	<label class="ui-hidden-accessible">Type a Verb:</label><p class="err">$fail_verb1</p>
	<input type="text" name="verb1" value="$verb1" placeholder="verb">
	<label class="ui-hidden-accessible">Type an Adjective:</label><p class="err">$fail_adj1</p>
	<input type="text" name="adjective1" value="$adjective1" placeholder="adjective">
	<label class="ui-hidden-accessible">Type a Noun:></label><p class="err">$fail_noun2</p>
    <input type="text" name="noun2" value="$noun2" placeholder="noun">
    <label class="ui-hidden-accessible">Type a Verb:</label><p class="err">$fail_verb2</p>
	<input type="text" name="verb2" value="$verb2" placeholder="verb">
	<label class="ui-hidden-accessible">Type an Adverb:</label><p class="err">$fail_adv</p>
    <input type="text" name="adverb" value="$adverb" placeholder="adverb">
    <label class="ui-hidden-accessible">Type an Adjective:</label><p class="err">$fail_adj2</p>
    <input type="text" name="adjective2" value="$adjective2" placeholder="adjective">
    <label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun3</p>
    <input type="text" name="noun3" value="$noun3" placeholder="noun">
    <label class="ui-hidden-accessible">Type a Verb:</label><p class="err">$fail_verb3</p>
    <input type="text" name="verb3" value="$verb3" placeholder="verb">
    <label class="ui-hidden-accessible">Type an Adjective:</label><p class="err">$fail_adj3</p>
    <input type="text" name="adjective3" value="$adjective3" placeholder="adjective">
	<label class="ui-hidden-accessible">Type your Name:<span class="tooltiptext">Or the name of someone you know.</span></label><p class="err">$fail_writer</p>
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