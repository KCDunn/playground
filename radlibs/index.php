<?php

$output = "";

// if( isset($_POST['noun']) && issett($_POST['verb']) && isset($_POST['adjective']) && isset($_POST['pronoun']) ) {
if( isset($_POST['noun']) ) {
	$noun = $_POST['noun'];
	$verb = $_POST['verb'];
	$adjective = $_POST['adjective'];
	$pronoun = $_POST['pronoun'];
	$friend = $_POST['friend'];

	$output = "Hello $friend, it is $adjective to $verb you! It has been a long $pronoun.";
}
else{
	$output = "One of the fields has been left empty!";
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
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme&family=Roboto&display=swap" rel="stylesheet">

    <link rel='stylesheet' href='jquery-mobile/jquery.mobile-1.4.5.min.css'>
    <script src='js/jquery-2.2.4.min.js'></script>
    <script src='jquery-mobile/jquery.mobile-1.4.5.min.js'></script>
    <link rel="stylesheet" type="text/css" href="css/radlibs_select_new.css">
    

    <script>
        $(document).ready(function(){
            $(document.body).ready(function() {
                $(".lit").delay(100).animate({opacity: '1.0'});
                $(".rock").delay(250).animate({opacity: '1.0'});
                $(".inform").delay(400).animate({opacity: '1.0'});
                $(".other").delay(550).animate({opacity: '1.0'});
                $("ul").delay(650).slideDown('slow', 'swing');
                $('.1').delay(700).animate({opacity: '1.0'});
                $('.2').delay(900).animate({opacity: '1.0'});
                $('.3').delay(1200).animate({opacity: '1.0'});
                $('.4').delay(1600).animate({opacity: '1.0'});
                
                $( "#showUsernote" ).click(function() {
                    $( "#userNoteP" ).slideToggle('slow');
                });
                $( "#showAuthornote" ).click(function() {
                    $( "#authorNoteP" ).slideToggle('slow');
                });
            });

            
        });
	</script>
	

</head>
_HEAD;

echo <<<_BODY
<body>

<div id="wrapper" data-role="page">

    <div data-role="header">
        <h1>Rad Libs</h1>
    </div>

    <div class="ui-grid-a ui-responsive main">
        <div class="ui-block-a"><div class="game_theme lit" data-role="content">
            <h2>Literary Libs</h2>
            <p>These Rad Libs are based on excerpts from popular literature.</p>
            <ul data-role="listview" data-inset="true">
                <a class="link 1" href="lit_harry_potter.php" data-transition="pop" data-role='button'><li>Harry Potter</li></a>
                <a class="link 2" href="lit_lotr.php" data-transition="pop" data-role='button'><li>Lord of the Rings</li></a>
                <a class="link 3" href="lit_moby_dick.php" data-transition="pop" data-role='button'><li>Moby Dick</li></a>
                <a class="link 4" href="lit_dracula.php" data-transition="pop" data-role='button'><li>Dracula</li></a>
            </ul>
        </div></div>

        <div class="ui-block-b"><div class="game_theme rock" data-role="content">
            <h2>Rock Libs</h2>
            <p>Check out these new lyrics to your favorite Hits, from yesterday and today!</p>
            <ul data-role="listview" data-inset="true">
                <a class="link 1" href="rock_led_zepplin.php" data-transition="pop" data-role='button'><li>Led Zepplin</li></a>
                <a class="link 2" href="rock_aerosmith.php" data-transition="pop" data-role='button'><li>Aerosmith</li></a>
                <a class="link 3" href="rock_commodores.php" data-transition="pop" data-role='button'><li>Commodores</li></a>
            </ul>
        </div></div>
        

        <div class="ui-block-a"><div class="game_theme inform" data-role="content">
            <h2>Informative Libs</h2>
            <p>Keep yourself informed on these most important topics!</p>
            <ul data-role="listview" data-inset="true">
                <a class="link 1" href="inform_weather_alert.php" data-transition="pop" data-role='button'><li>Severe Weather Alert</li></a>
                <a class="link 2" href="inform_poolrules.php" data-transition="pop" data-role='button'><li>Pool Rules</li></a>
            </ul>
        </div></div>
        <div class="ui-block-b"><div class="game_theme other" data-role="content">
            <h2>Pirate Libs</h2>
            <p>All things pirates like!</p>
            <ul data-role="listview" data-inset="true">
                <a class="link 1" href="pirate_life.php" data-transition="pop" data-role='button'><li>Pirates Life</li></a>
                <a class="link 2" href="pirate_bottles.php" data-transition="pop" data-role='button'><li>Bottles</li></a>
                <a class="link 3" href="pirate_around_the_world.php" data-transition="pop" data-role='button'><li>Around the World</li></a>
            </ul>
        </div></div>
    
        <script>
        $('.game_theme').css('opacity', '0.0');
        $('ul').css('display', 'none');
        $('.1').css('opacity', '0');
        $('.2').css('opacity', '0');
        $('.3').css('opacity', '0');
        $('.4').css('opacity', '0');
        </script>

    </div>

    <div id='appInfo' data-role="content">
            <h3 id='userNote'>Using Rad Libs</h3>
            <div id='userNoteP'>
                <p>Rad Libs, based on Mad Libs, is a fun app for friends and family.  
                You can think up creative words that will be needed in order to replace words in a variety of popular works.  
                The words replaced are not known until after the topics form is submitted.  Then the paragraph or statement 
                will be revealed to the players, and now the laughs can begin!  There are a list of Rad Lib game items found in each theme. 
                Click on an item of interest and you will be taken to the form, where you or other players can start thinking up words for that game.   </p>
            </div>
            <h4 id='showUsernote'>Show/Hide</h4>

            <h3 id='authorNote'>Authors Note</h3>
            <div id='authorNoteP'>
                <p>What I enjoyed about creating this game was not just how to code this, 
                but in thinking of how I want the player to see the game.  I don’t want the player to be able to see where in the content words are being replaced.  
                I want that to be revealed after the words are chosen and the form is submitted.  So hiding and showing elements of the game page was a must. </p>
            </div>
            <h4 id='showAuthornote'>Show/Hide</h4>
        </div>

        <script>
        document.getElementById('userNoteP').style.display = 'none';
        document.getElementById('authorNoteP').style.display = 'none';
        </script>



_BODY;
require_once 'footer.php';
?>