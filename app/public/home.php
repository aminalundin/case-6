<?php 
$title = "Hello";
// session_start();
include "_includes/database_connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>make pour decisions</title>
    <link rel="stylesheet" href="styles/styles-home.css">
    <!-- <style>
        @font-face {
            font-family: Monsterrat;
            src: url(fonts/Montserrat-VariableFont_wght.ttf);
        }
    </style> -->
</head>
<body>
    <header>
    <p class="slogan"><strike>MAKE POUR DECISIONS</strike></p>
    </header>


    <div class="top">
        <input type="submit" class="search">

    </div>

    <div id="discover">

    </div>

    <footer>
        <button class="sign_out">SIGN OUT</button>
        <a href="">WHY POUR?</a>
    </footer>

</body>
</html>