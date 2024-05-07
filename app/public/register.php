<?php

include "_includes/database_connection.php";

// hantera formulär request for att registrera ny användare

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // dumpa formulärets data till skärmen
    var_dump($_POST);
}

// hämta ut data från formuläret
$username = trim($POST['username']);
$password = trim($POST['password']);
$password2 = trim($POST['password2']);

// kontrollera att fälten inte är tomma
if (empty($username) || empty($password) || empty($password2)) {

    exit;
}

// kontrollera att lösenorden matchar varandra
if ($password !== $password2) {

    exit;
}

// unikt användarnamn


try {
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":username" => $username
    ]);

    // hämta användaren från databasen
    $user = $stmt->fetch();

    if ($user) {

        exit;
    }

    // kryptera lösenord
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // registrera användare i databasen
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password_hashed
    ]);

    // skicka användaren till login.php
    header("Location: login.php");
    exit;

} catch (PDOException $e) {

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
      
</body>
</html>