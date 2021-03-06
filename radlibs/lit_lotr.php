<?php
require_once('php/radlibsVal.php');
$noun1 = $verb1 = $noun2 = $verb2 = $noun3 = $adjective1 = $adjective2 = "";
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
    $fail = validate_noun($noun2);
    $fail = validate_noun($noun3);
    $fail .= validate_word($verb1);
    $fail .= validate_word($verb2);
    $fail .= validate_adjective($adjective1);


	if ($fail == "")
	{
        $output = "<h2>Lord of the " . $noun3 . "</h2> <p>The $noun1 of civilization rests in the fate of the One $noun3, 
        which has been $adjective1 for centuries. Powerful forces are unrelenting in their $verb2 for it. 
        But fate has $verb1 it in the " . $noun2 . "s of a young Hobbit named Frodo Baggins, who 
        inherits the $noun3 and steps into legend. A daunting task lies ahead for Frodo when he becomes 
        the " . $noun3 . "-bearer - to destroy the One $noun3 in the fires of Mount Doom where it was forged.</p>";

		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun1 = $fail_noun2 = $fail_noun3 = $fail_verb1 = $fail_verb2 = $fail_verb3 = $fail_adj = $fail_adv = $fail_writer = "";
	}

	if ($fail != "")
	{
        $fail_noun1 = validate_noun($noun1);
        $fail_noun2 .= validate_noun($noun2);
        $fail_noun3 .= validate_noun($noun3);
        $fail_verb1 .= validate_word($verb1);
        $fail_verb2 .= validate_word($verb2);
        $fail_adj1 .= validate_adjective($adjective1);
        $fail_adj2 .= validate_adjective($adjective2);
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
<div data-role="page" id="wrapper">
    <div data-role="header">
        <h1>Literary RadLibs</h1>
    </div>
<div data-role="content" class="main">

<form style="display:$formHide;" method="post" action="lit_lotr.php" onSubmit="return validate(this)">
	<label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun1</p>
	<input type="text" name="noun1" value="$noun1" placeholder="noun">
	<label class="ui-hidden-accessible">Type a Verb (past tense):</label><p class="err">$fail_verb1</p>
	<input type="text" name="verb1" value="$verb1" placeholder="verb">
	<label class="ui-hidden-accessible">Type an Adjective:</label><p class="err">$fail_adj1</p>
	<input type="text" name="adjective1" value="$adjective1" placeholder="adjective">
	<label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun2</p>
    <input type="text" name="noun2" value="$noun2" placeholder="noun">
    <label class="ui-hidden-accessible">Type a Verb:</label><p class="err">$fail_verb2</p>
	<input type="text" name="verb2" value="$verb2" placeholder="verb">
    <label class="ui-hidden-accessible">Type an Adjective:</label><p class="err">$fail_adj2</p>
    <input type="text" name="adjective2" value="$adjective2" placeholder="adjective">
    <label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun3</p>
    <input type="text" name="noun3" value="$noun3" placeholder="noun">
    
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
    <a href="../">More Games data-role="button" data-ajax="false"</a>
</div>

</div>

</div>
</body>
</html>


_BODY;


?>