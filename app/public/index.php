<?php
declare(strict_types=1);

include "_includes/database_connection.php";
// include "register.php";
// include "login.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "posted";
    // print_r($_POST);

    $username_1 = $_POST["username_1"];
    

    // validera inkommande data
    if (strlen($username_1) > 0 && strlen($username_1) < 50) {
       
        // lägg till i databasen (från phpmyadmin)
        $sql = "INSERT INTO `users` (`username`) VALUES ('$username_1')";
        $result = $pdo->exec($sql);
        print_r($result);
    } else {
        echo "skriv något";
    }

    // echo $sql;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "posted";
    // print_r($_POST);

    
    $password_1 = $_POST["password_1"];

    // validera inkommande data
    if (strlen($password_1) > 0 && strlen($password_1) < 50) {
       
        // lägg till i databasen (från phpmyadmin)
        $sql = "INSERT INTO `users` (`password`) VALUES ('$password_1')";
        $result = $pdo->exec($sql);
        print_r($result);
    } else {
        echo "skriv något";
    }

    // echo $sql;
}
// $id = 1;

// PDO::prepare 
// prepares a statement with named placeholder  - starts with a colon :
// $sql = "SELECT * FROM `spring` WHERE id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// $rows = $stmt->fetchAll();

// print_r($rows);

?>

<style>
/* 
.video {
                padding: 0;
                margin: 0;
                display: flex;
                justify-content: center;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -100;
                overflow: hidden;
                object-fit: cover;
            }

            video {
                object-fit: cover;
                overflow: hidden;
            } */
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>

<!-- <div class="video">
            <video autoplay muted loop>
                <source src="styles/images/light.mp4" type="video/mp4">
            </video>
        </div> -->

    <!-- HEADER/HERO -->
    <?php include "_includes/header.php"; ?>

    <div class="hero">
        <img src="styles/images/pour-logotype-white.png" alt="pour-logotype" class="hero-logo">
        <h1 class="hero-heading">WINE BAR INDEX</h1>

        <p class="hero-content">DISCOVER YOUR NEW FAVOURITE BARS, SHARE
YOUR RECOMMENDATIONS, 
OWNER? 
PUT YOURS ON THE LIST</p>
    </div>


    <p class="slogan"><strike>MAKE POUR DECISIONS</strike></p>



    <!-- BUTTONS -->
    <div class="buttons">
        <button onclick="displayRegForm()" id="reg-button">GET STARTED</button>
        <button onclick="displayLogInForm()" id="reg-button">LOG IN</button>
    </div>


    <!-- FORMS -->


    <div class="container">
        <div id="form-register" style="display: none;">

            <button onclick="displayRegForm()" id="close-reg-tab">&#x2715;</button>

            <form action="index.php" method="post">

                <label for="username_1">username</label>
                <input type="text" name="username_1" id="username_1">
                
                <label for="password_1">password</label>
                <input type="password" name="password_1" id="password_1">
                <!-- <p>email</p>
                <input type="text"><br>
                <p>username</p>
                <input type="text"><br>
                <p>password</p>
                <input type="password"><br>
                <p>confirm password</p>
                <input type="password2"> -->
                <button type="submit" id="sign-up">SIGN UP!</button>
            </form>
        </div>
        </div>
        

        <div class="log-in-container">
        <div id="form-log-in" style="display: none;">
            <button onclick="displayLogInForm()" id="close-log-tab">&#x2715;</button>
            <form action="index.php" method="post">
                <label for="username_2">username</label>
                <input type="text" name="username_2" id="username_2">
                
                <label for="password_2">password</label>
                <input type="password" name="password_2" id="password_">
            </form>
            <button type="submit" id="log-in">log in</button>
        </div>
        </div>
    

    <script src="script.js"></script>
</body>

</html>