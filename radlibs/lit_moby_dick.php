<?php
require_once('php/radlibsVal.php');
$noun1 = $noun2 = $adjective1 = $adjective2 = $adverb = "";
$fail_noun1 = $fail_noun2 = $fail_adj1 = $fail_adj2 = $fail_adv = "";

$output = "";
$formHide = "inline-block";
$outputHide = $errorHide = "none";

if(isset($_POST['noun1']) && isset($_POST['adjective1']) && isset($_POST['adjective1'])){
    $noun1 = fix_string($_POST['noun1']);
    $noun2 = fix_string($_POST['noun2']);
    $adjective1 = fix_string($_POST['adjective1']);
    $adjective2 = fix_string($_POST['adjective2']);
	$adverb = fix_string($_POST['adverb']);


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
    $fail .= validate_adjective($adjective1);
    $fail .= validate_adjective($adjective2);
	$fail .= validate_adverb($adverb);

	// $fail_noun = validate_noun($noun);
	// $fail_verb .= validate_verb($verb);
	// $fail_adj .= validate_adjective($adjective);
	// $fail_pron .= validate_pronoun($pronoun);
	// $fail_adv .= validate_adverb($adverb);
	// $fail_friend .= validate_friend($friend);

	if ($fail == "")
	{
        $output = "<h2>Moby-Dick</h2><p>Moby-Dick; or, The Whale is an 1851 novel by American writer Herman Melville. 
        The book is the sailor Ishmael's narrative of the $adjective2 quest of Ahab, captain of 
        the whaling ship Pequod, for revenge on Moby Dick, the $adjective1 white sperm whale that on the ship's 
        previous voyage $adverb bit off Ahab's $noun1 at the $noun2.</p>";

		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun1 = $fail_noun2 = $fail_noun3 = $fail_verb1 = $fail_adj = $fail_adv = "";
	}

	if ($fail != "")
	{
        $fail_noun1 = validate_noun($noun1);
        $fail_noun2 = validate_noun($noun2);
        $fail_adj1 .= validate_adjective($adjective1);
        $fail_adj2 .= validate_adjective($adjective2);
		$fail_adv .= validate_adverb($adverb);
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
            fail += validateAdjective(form.adjective1.value)
            fail += validateAdjective(form.adjective2.value)
			fail += validateAdverb(form.adverb.value)

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

<form style="display:$formHide;" method="post" action="lit_moby_dick.php" onSubmit="return validate(this)">
	<label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun1</p>
	<input type="text" name="noun1" value="$noun1" placeholder="noun">
	<label class="ui-hidden-accessible">Type an Adjective:</label><p class="err">$fail_adj1</p>
	<input type="text" name="adjective1" value="$adjective1" placeholder="adjective">
	<label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun2</p>
    <input type="text" name="noun2" value="$noun2" placeholder="noun">
	<label class="ui-hidden-accessible">Type an Adverb:</label><p class="err">$fail_adv</p>
    <input type="text" name="adverb" value="$adverb" placeholder="adverb">
    <label class="ui-hidden-accessible">Type an Adjective:</label><p class="err">$fail_adj2</p>
    <input type="text" name="adjective2" value="$adjective2" placeholder="adjective">
    
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