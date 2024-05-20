<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "user trying to submit form";
    var_dump($_POST);

    // hämta data från formuläret
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);

    // kontrollera att fälten inte är tomma
    if (empty($username) || empty($password) || empty($password2)) {
        echo "missing values<br>";
        exit;
    }

    // kontrollera att lösenorden är samma

    if ($password !== $password2) {
        echo "lösenorden matchar inte<br>";
        exit;
    }

    // kontrollera att användarnamnet inte redan finns
    include "_includes/database_connection.php";

    try {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username
        ]);

        // hämtar användare från databasen
        $user = $stmt->fetch();  
        
        if ($user) {
            echo "användarnamnet finns redan";
            exit;
        }


        // kryptera lösenord
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        echo "lösenordet krypterat: $password_hashed<br>";
    
    
        // registrera ny användare i databasen

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password_hashed

        ]);


    } catch (PDOException $e) {
        echo "database connection exception";
    }




    // skicka användaren till login.php
    header("Location: login.php");
    exit;


}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>make pour decisions</title>
    <link rel="stylesheet" href="styles/register.css">
    <link rel="stylesheet" href="https://use.typekit.net/hlg0mdj.css">
    
</head>

<body>
    <!-- <header>
        <a href="register.php">GET STARTED</a>
        <a href="login.php">LOG IN</a>
    </header> -->
    <?php  include "_includes/header.php"; ?>
    <main>

        <div class="logotype">
            <img src="styles/images/logotype.png" width="300px" alt="logotype">
        </div>
    </main>

    <aside>
        <div class="slogan"><img src="styles/images/register.png" alt="" width="350px"></div>
        <div class="container">

            <form action="register.php" method="post">

                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username">

                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password">

                <label for="password2">CONFIRM PASSWORD</label>
                <input type="password" name="password2" id="password2">

                <button type="submit">SIGN UP</button>
            </form>
        </div>

        <!-- <div class="image">
            <img src="styles/images/wine-glass.png" alt="illustration of wine glass" width="200px">
        </div> -->
    </aside>
</body>

</html>