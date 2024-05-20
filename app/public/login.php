<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "user trying to submit form";
    var_dump($_POST);

    // hämta data från formuläret
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    // kontrollera att fälten inte är tomma
    if (empty($username) || empty($password)) {
        echo "missing values<br>";
        exit;
    }


    // kontrollera att användaren finns
    include "_includes/database_connection.php";

    try {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username
        ]);

        // hämtar användare från databasen
        $user = $stmt->fetch();

        // kontrollera att användaren finns, om inte, skicka till register.php

        if (!$user) {
            header("Location: register.php");
            exit;
        }

        // kontrollera att lösenordet stämmer
        $is_matching_passwords = password_verify($password, $user['password']);
        if (!$is_matching_passwords) {
            echo "lösenordet matchar inte<br>";
            exit;
        }

        // skapa en session för inloggad användare

        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION["username"] = $user["username"];

        // skicka användaren till home.php
        header("Location: home.php");
        exit;



    } catch (PDOException $e) {
        echo "database connection exception";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <link rel="stylesheet" href="styles/register.css">
</head>

<body>
<header>
    <button onclick="displayMenu()" id="menu-button">menu</button>
    </header>
    
    <?php  include "_includes/menu.php"; ?> 
    <main>

        <div class="logotype">
            <img src="styles/images/logotype.png" width="300px" alt="logotype">
        </div>
    </main>

    <aside>
        <div class="container">
            <p class="slogan"><strike>WELCOME BACK</strike></p>

            <form action="login.php" method="post">

                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username">

                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password">

                <button type="submit">LOG IN</button>
            </form>
        </div>

        <!-- <div class="image">
            <img src="styles/images/wine-glass.png" alt="illustration of wine glass" width="200px">
        </div> -->
    </aside>
    <script src="script.js"></script>
</body>

</html>