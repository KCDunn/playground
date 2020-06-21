<?php
require_once('php/radlibsVal.php');
$noun1 = $noun2 = $outputTitle = "";
$songNum = 3;
$fail_noun1 = $fail_noun2 = $fail_songNum = "";

$output = "";
$formHide = "inline-block";
$outputHide = $errorHide = "none";

if(isset($_POST['noun1']) && isset($_POST['noun2']) && isset($_POST['songNum'])){
    $noun1 = fix_string($_POST['noun1']);
    $noun2 = fix_string($_POST['noun2']);
    $songNum = fix_string($_POST['songNum']);
	

    $fail = validate_noun($noun1);
    $fail .= validate_noun($noun2);
    $fail .= validate_number($songNum);
	


	if ($fail == "")
	{
        $outputTitle = "Bottles!";
        $output = "";
        
        do{
            $nxtSongNum = $songNum - 1;

            $output .= "-$songNum-<br>$songNum bottles of $noun1 on the $noun2,<br>
            $songNum  bottles of $noun1.<br>
            Take one down, pass it around,<br>
            $nxtSongNum bottles of $noun1 on the $noun2!<br><br>";
            $songNum--;
        }while($songNum > 0);

        $output .= "<br>There are no more $noun1 on the $noun2!<br>";
        
        
		
        

		$formHide = "none";
		$outputHide = "inline-block";
		$fail_noun1 = $fail_noun2 = "";
	}

	if ($fail != "")
	{
        $fail_noun1 = validate_noun($noun1);
        $fail_noun2 = validate_noun($noun2);
        $fail_songNum = validate_number($songNum);
        
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

<form style="display:$formHide;" method="post" action="pirate_bottles.php" onSubmit="return validate(this)">
	<label class="ui-hidden-accessible">Type a Noun:</label><p class="err">$fail_noun1</p>
	<input type="text" name="noun1" value="$noun1" placeholder="noun">
	<label class="ui-hidden-accessible">Type a Noun (plural):</label><p class="err">$fail_noun2</p>
    <input type="text" name="noun2" value="$noun2" placeholder="noun (plural)">
    <label>Number between 1 and 99</label>
	<label class="ui-hidden-accessible">Choose between 1 - 99:</label><p class="err">$fail_songNum</p>
	<input type="range" name="songNum" value="$songNum" min="1" max="99">
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
    <a href="../" data-role="button" data-ajax="false">More Games</a>
</div>

</div>

</div>
</body>
</html>


_BODY;


?>