<?php
require_once('php/radlibsVal.php');
$noun1 = $noun2 = $verb1 = $adverb = "";
$fail_noun1 = $fail_noun2 = $fail_verb1 = $fail_adv = "";

$output = $outputTitle = "";
$formHide = "inline-block";
$outputHide = $errorHide = "none";

if(isset($_POST['noun1']) && isset($_POST['noun2']) && isset($_POST['verb1'])){
    $noun1 = fix_string($_POST['noun1']);
    $noun2 = fix_string($_POST['noun2']);
    $verb1 = fix_string($_POST['verb1']);
    $adverb = fix_string($_POST['adverb']);
	

    $fail = validate_noun($noun1);
    $fail .= validate_noun($noun2);
    $fail .= validate_verb($verb1);
    $fail .= validate_adverb($adverb);
	


	if ($fail == "")
	{
        $outputTitle = "Around the " . ucfirst(strtolower($noun2));
        $output = " I don't know where my $noun1 is<br>
        but I'll find it, somewhere, somehow!<br>
        I've got to let it know,<br>
         how much I care...<br>
        <br>
        Been around the $noun2 and R, R, R,<br>
        I can't find me $noun1<br>
        I don't know when, I don't know why,<br>
        why its $verb1 $adverb<br>
        And I don't know where it can be, my $noun1<br>
        but I'm gonna find it!<br>
        <br>
        Been-a-round the $noun2...<br>
        look-ing for me $noun1...<br>
        Been-a-round the $noun2...<br>
        And I'm gonna find it.<br><br>
        ";
        
        
		
        

		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun1 = $fail_noun2 = $fail_verb1 = $fail_adv = "";
	}

	if ($fail != "")
	{
        $fail_noun1 = validate_noun($noun1);
        $fail_noun2 = validate_verb($noun2);
        $fail_verb1 = validate_verb($verb1);
        $fail_adv = validate_verb($adverb);
        
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
            fail += validateNoun(form.noun2.value)
            

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

<form style="display:$formHide;" method="post" action="pirate_around_the_world.php" onSubmit="return validate(this)">
	<label class="ui-hidden-accessible">Something Pirates Covet:</label><p class="err">$fail_noun1</p>
	<input type="text" name="noun1" value="$noun1" placeholder="Something Pirates Covet">
	<label class="ui-hidden-accessible">Type a Verb (passed tense):</label><p class="err">$fail_verb1</p>
    <input type="text" name="verb1" value="$verb1" placeholder="verb (passed tense)">
    <label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun2</p>
	<input type="text" name="noun2" value="$noun2" placeholder="noun">
	<label class="ui-hidden-accessible">Type an Adverb:</label><p class="err">$fail_adv</p>
    <input type="text" name="adverb" value="$adverb" placeholder="adverb">
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
    <a href="index.php" data-role="button" data-ajax="false">Another Lib</a>
    <a href="../" data-ajax="false">More Games</button>
</div>

</div>

</div>
</body>
</html>


_BODY;


?>