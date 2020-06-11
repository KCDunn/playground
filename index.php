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

    <link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/gamelist.css">
    <script src="js/jquery-3.5.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $(document.body).ready(function() {

                $("#title").delay(100).animate({opacity: "1.0"});
                $("#main").delay(300).animate({opacity: "1.0"});
                $("#footer").delay(500).animate({opacity: "1.0"});
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

<div id="wrapper" class="container">
<h1 id="title"><a href="../kevincdunn"><span>KCD's</span></a> PLAYGROUND!</h1>

    <div id="main" class='card-columns'>

        <script>
            
            document.getElementById('main').style.opacity = '0';
            document.getElementById('title').style.opacity = '0';
            document.getElementById('footer').style.opacity = '0';
        </script>
        
        <div class='card'>
            <div class="game_item card-body text-center">
                <h2 class='card-title'>Rad Libs</h2>
                <p class='card-text'>Like Mad Libs, but radder! Ok well, its Mad Libs.</p>
                <a class="go_to link btn btn-block btn-secondary stretched-link" href="radlibs/">Play</a>
            </div>
        </div>

        <div class='card'>
            <div class="game_item card-body text-center">
                <h2 class='card-title'>True Story</h2>
                <p class='card-text'>Read and write true stories based on selected topics</p>
                <a class="go_to link btn btn-block btn-secondary stretched-link" href="https://truestory.kevincdunn.com">Play</a>
            </div>
        </div>

        <div class='card'>
            <div class="game_item card-body text-center">
                <h2 class='card-title'>K Draw</h2>
                <p class='card-text'>Make some Art <br>or just scrible!</p>
                <a class="go_to link btn btn-block btn-secondary stretched-link" href="k_draw.php">Play</a>
            </div>
        </div>

        <div class='card'>
            <div class="game_item card-body text-center">
                <h2 class='card-title'>Encrypt Me</h2>
                <p class='card-text'>Encrypt or Decrypt messages sent between you and your conspiracy friends!</p>
                <a class="go_to link btn btn-block btn-secondary stretched-link" href="encryptMe.php">Play</a>
                
            </div>
        </div>

        <div class='card'>
            <div class="game_item card-body text-center desktop">
                <h2 class='card-title'>Pacman</h2>
                <p class='card-text'>A packman where everyone wins! (for desktop/laptop)</p>
                <a class="go_to link btn btn-block btn-secondary stretched-link" href="packman/">Play</a>
            </div>
        </div>

        <div class='card'>
            <div class="game_item card-body text-center desktop">
                <h2 class='card-title'>1942</h2>
                <p class='card-text'>Shoot down the enemy planes! (for desktop/laptop)</p>
                <a class="go_to link btn btn-block btn-secondary stretched-link" href="1942/">Play</a>
            </div>
        </div>

    </div>
        
_END;


echo <<<_END
    </div>
    </div>
    <footer class='jumbotron text-center bg-light' id='footer'>
        Web App created by <a href='http://www.kevincdunn.com' target='_blank'>kevincdunn.com</a>
    </footer>
    <script>
            
        document.getElementById('main').style.opacity = '0';
        document.getElementById('title').style.opacity = '0';
        document.getElementById('footer').style.opacity = '0';
    </script>

    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.css"></script>

</body>
</html>
_END;
?>