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
    $adjective1 = fix_string($_POST['adjective1']);
    $adjective2 = fix_string($_POST['adjective2']);
	$writer = fix_string($_POST['writer']);



    $fail = validate_noun($noun1);
    $fail .= validate_noun($noun2);
    $fail .= validate_noun($noun3);
    $fail .= validate_word($verb1);
    $fail .= validate_adjective($adjective1);
    $fail .= validate_adjective($adjective2);
	$fail .= validate_name($writer);

	if ($fail == "")
	{
        $output = "<h2>Commodores - Brick House!</h2><br><h3>Lyrics edited by $writer</h3><br>
        Ow, she's a $noun1... $noun2<br>
        She's $adjective1-$adjective1, just lettin' it all $verb1 out<br>
        She's a $noun1... $noun2<br>
        That lady's $adjective2, and that's a fact<br>
        Ain't holding nothing back<br>
        Ow, she's a $noun1... $noun2<br>
        Well put-together, everybody knows<br>
        This is how the story goes...<br>
        <br><br>
        
        ";

		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun1 = $fail_noun2 = $fail_verb1 = $fail_adj1 =$fail_adj2 = $fail_writer = "";
	}

	if ($fail != "")
	{
        $fail_noun1 = validate_noun($noun1);
        $fail_noun2 = validate_noun($noun2);
        $fail_noun3 = validate_noun($noun3);
        $fail_verb1 .= validate_word($verb1);
        $fail_adj1 .= validate_adjective($adjective1);
        $fail_adj2 .= validate_adjective($adjective2);
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
            fail += validateAdjective(form.adjective1.value)
            fail += validateAdjective(form.adjective2.value)
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

<form style="display:$formHide;" method="post" action="rock_commodores.php" onSubmit="return validate(this)">
	<label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun1</p>
	<input type="text" name="noun1" value="$noun1" placeholder="noun">
	<label class="ui-hidden-accessible">Type a Verb:</label><p class="err">$fail_verb1</p>
	<input type="text" name="verb1" value="$verb1" placeholder="verb">
	<label class="ui-hidden-accessible">Type an Adjective:</label><p class="err">$fail_adj1</p>
	<input type="text" name="adjective1" value="$adjective1" placeholder="adjective">
	<label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun2</p>
    <input type="text" name="noun2" value="$noun2" placeholder="noun">
    <label class="ui-hidden-accessible">Type an Adjective:</label><p class="err">$fail_adj2</p>
    <input type="text" name="adjective2" value="$adjective2" placeholder="adjective">
    <label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun3</p>
    <input type="text" name="noun3" value="$noun3" placeholder="noun">
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