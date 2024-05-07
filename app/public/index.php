<?php
declare(strict_types=1);

include "_includes/database_connection.php";
// include "register.php";
// include "login.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>

    <!-- HEADER/HERO -->
    <?php include "_includes/header.php"; ?>

    <div class="hero">
        <h1 class="hero-heading">rare<br>wines<br><i>index</i></h1>

        <p class="hero-content">discover/ <br>
            share</p>
    </div>



    <!-- BUTTONS -->
    <div class="buttons">
        <button onclick="displayRegForm()" id="reg-button">get started</button>
        <button onclick="displayLogInForm()" id="reg-button">log in</button>
    </div>


    <!-- FORMS -->


    <div class="container">
        <div id="form-register" style="display: none;">
            <button onclick="displayRegForm()" id="close-reg-tab">&#x2715;</button>
            <form action="register.php" method="post">
                <p>name</p>
                <input type="text"><br>
                <p>surname</p>
                <input type="text"><br>
                <p>email</p>
                <input type="text"><br>
                <p>username</p>
                <input type="text"><br>
                <p>password</p>
                <input type="password"><br>
                <p>confirm password</p>
                <input type="password2">
            </form>
            <button type="submit" id="sign-up">SIGN UP!</button>
        </div>
        </div>
        

        <div class="log-in-container">
        <div id="form-log-in" style="display: none;">
            <button onclick="displayLogInForm()" id="close-log-tab">&#x2715;</button>
            <form action="login.php" method="post">
                <p>username</p>
                <input type="text"><br>
                <p>password</p>
                <input type="password">
            </form>
            <button type="submit" id="log-in">log in</button>
        </div>
        </div>
    

    <script src="script.js"></script>
</body>

</html>