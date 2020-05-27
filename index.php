<?php

echo <<<_END

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Playground | kevincdunn</title>
	<meta name="description" content="List of games and web applications.">
	<meta name="keywords" content="games, fun, entertainment">
	<meta name="author" content="Kevin Dunn">
	<meta name="copyright" content="2020">
    
    
	<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->
    <link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/gameslist2.css">
    <script src="js/jquery-3.5.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $(document.body).ready(function() {

                $("#title").delay(100).animate({opacity: "1.0"});
                $("#main").delay(300).animate({opacity: "1.0"});
            });

            $(".link").click(function() {
                event.preventDefault();

                newLocation = this.href;
                $("#main").fadeOut(200);
                $("h1").fadeOut(300, newPage);
            });

            function newPage() {
                window.location = newLocation;
            }
        });
	</script>
	

</head>
<body>

<div id="wrapper">
<h1 id="title"><a href="../kevincdunn"><span>KCD's</span></a> PLAYGROUND!</h1>

    <div id="main">

    <script>
        // document.getElementById('main').style.display = 'none';
        // document.getElementById('title').style.display = 'none';

        document.getElementById('main').style.opacity = '0';
        document.getElementById('title').style.opacity = '0';
    </script>

        <div class="game_item">
            <h2>Rad Libs</h2>
            <p>Like Mad Libs, but radder! Ok well, its Mad Libs.</p>
            <a class="go_to link" href="radlibs/">Rad Libs</a>
        </div>
        <div class="game_item">
            <h2>True Story</h2>
            <p>Read and write true stories based on selected topics</p>
            <a class="go_to link" href="https://truestory.kevincdunn.com">True Story</a>
        </div>
        <div class="game_item desktop">
            <h2>K Draw</h2>
            <p>Make some Art <br>or just scrible!</p>
            <a class="go_to link" href="k_draw.php">K Draw</a>
        </div>
        
        <div class="game_item">
            <h2>Encrypt Me</h2>
            <p>Encrypt or Decrypt messages sent between you and your conspiracy friends!</p>
            <a class="go_to link" href="encryptMe.php">Encrypt Me</a>
            
        </div>
        <div class="game_item desktop">
            <h2>Pacman</h2>
            <p>A packman where everyone wins! (for desktop/laptop)</p>
            <a class="go_to link" href="packman/">Packman</a>
        </div>
        <div class="game_item desktop">
            <h2>1942</h2>
            <p>Shoot down the enemy planes! (for desktop/laptop)</p>
            <a class="go_to link" href="1942/">1942</a>
        </div>

        
_END;


echo <<<_END
    </div>
    </div>
</body>
</html>
_END;
?>