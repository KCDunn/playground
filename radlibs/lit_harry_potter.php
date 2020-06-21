<?php
require_once('php/radlibsVal.php');
$noun1 = $verb1 = $noun2 = $noun3 = $adjective1 = $adjective2 = $friend = "";
$fail_noun1 = $fail_noun2 = $fail_noun3 = $fail_verb1 = $fail_adj1 = $fail_adj2 = $fail_friend = "";

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

    $fail = validate_noun($noun1);
    $fail .= validate_noun($noun2);
    $fail .= validate_noun($noun3);
    $fail .= validate_word($verb1);
    $fail .= validate_adjective($adjective1);
    $fail .= validate_adjective($adjective2);
	$fail .= validate_name($friend);

	// $fail_noun = validate_noun($noun);
	// $fail_verb .= validate_verb($verb);
	// $fail_adj .= validate_adjective($adjective);
	// $fail_pron .= validate_pronoun($pronoun);
	// $fail_adv .= validate_adverb($adverb);
	// $fail_friend .= validate_friend($friend);

	if ($fail == "")
	{
        $output = "<h2>Harry Potter</h2><p>Adaptation of the first of J.K. Rowling's $adjective1 " . $noun2 . "'s novels about $friend, 
        who learns on his eleventh birthday that he is the orphaned son of two powerful $noun1 and possesses 
        $adjective2 magical powers of his own. He is $verb1 from his life as an unwanted child to become a $noun2 at Hogwarts, 
        an English boarding school for $noun1. There, he meets several friends who become his closest allies 
        and help him discover the truth about his parents' mysterious " . $noun3 . ".</p>";

		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun1 = $fail_noun2 = $fail_noun3 = $fail_verb1 = $fail_adj = $fail_friend = "";
	}

	if ($fail != "")
	{
        $fail_noun1 = validate_noun($noun1);
        $fail_noun2 = validate_noun($noun2);
        $fail_noun3 = validate_noun($noun3);
        $fail_verb1 .= validate_word($verb1);
        $fail_adj1 .= validate_adjective($adjective1);
        $fail_adj2 .= validate_adjective($adjective2);
		$fail_friend .= validate_name($friend);
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
            fail += validateAdjective(form.adjective1.value)
            fail += validateAdjective(form.adjective2.value)
			fail += validateName(form.friend.value)

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
		

		<form style="display:$formHide;" method="post" action="lit_harry_potter.php" onSubmit="return validate(this)">
			<label for="noun1" class="ui-hidden-accessible">Type a Noun (plural):</label><p class="err">$fail_noun1</p>
			<input type="text" name="noun1" value="$noun1" placeholder="noun (plural)">
			<label for="verb1" class="tooltip ui-hidden-accessible">Type a Verb (past tense):<span class="tooltiptext">Action, state, or relation between two things.(set, have, make) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2018/02/10/list-of-1000-present-tense-verbs/" target="blank">Ponderous Verbs</a></span></label><p class="err">$fail_verb1</p>
			<input type="text" name="verb1" value="$verb1" placeholder="verb">
			<label for="adjective1" class="tooltip ui-hidden-accessible">Type an Adjective:<span class="tooltiptext">Used to modify a noun. ('hot' potato, 'cold' ice, 'green' eggs) <a class="tipRef" style="color: lightblue;" href="https://coolestwords.com/cool-adjectives/" target="blank">Cool Adjectives</a></span></label><p class="err">$fail_adj1</p>
			<input type="text" name="adjective1" value="$adjective1" placeholder="adjective">
			<label for="noun2" class="tooltip ui-hidden-accessible">Type a Noun:<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label><p class="err">$fail_noun2</p>
			<input type="text" name="noun2" value="$noun2" placeholder="noun">
			<label for="adjective2" class="tooltip ui-hidden-accessible">Type an Adjective:<span class="tooltiptext">Used to modify a noun. ('hot' potato, 'cold' ice, 'green' eggs) <a class="tipRef" style="color: lightblue;" href="https://coolestwords.com/cool-adjectives/" target="blank">Cool Adjectives</a></span></label><p class="err">$fail_adj2</p>
			<input type="text" name="adjective2" value="$adjective2" placeholder="adjective">
			<label for="noun3" class="tooltip ui-hidden-accessible">Type a Noun:<span class="tooltiptext">Person, place, or thing.(dog, park, water) <a class="tipRef" style="color: lightblue;" href="https://studentsandwriters.com/2019/11/11/new-worlds-funniest-mad-libs-noun-list/" target="blank"> Nouns</a></span></label><p class="err">$fail_noun3</p>
			<input type="text" name="noun3" value="$noun3" placeholder="noun">
			<label for="friend" class="tooltip ui-hidden-accessible">Type your Name:<span class="tooltiptext">Or the name of someone you know.</span></label><p class="err">$fail_friend</p>
			<input type="text" name="friend" value="$friend" placeholder="friend">
			<br>

			<div id="error" style="display:$errorHide;">Sorry, the following errors were found!<br>
				// <p><font color=#ff7755>fail</font></p>
			</div>
				
			<br>
			<input type="submit" value="Lets do this!">
		</form>

		<div class="content" id="output" style="display:$outputHide;">
			$output
			<a href="index.php"  data-ajax="false" data-role="button" data-transition="fade">Another Lib</a>
			<a href="../index.php"  data-ajax="false" data-role="button" data-transition="fade">More Games</button></a>
		</div>

	</div>

</div>
</body>
</html>


_BODY;


?>