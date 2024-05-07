<?php
// hantera formulär request for att registrera ny användare

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // dumpa formulärets data till skärmen
    var_dump($_POST);
}

// hämta ut data från formuläret
$username = trim($POST['username']);
$password = trim($POST['password']);


// kontrollera att fälten inte är tomma
if (empty($username) || empty($password)) {
    echo "Please fill out required fields";
    exit;
}



// kontrollera att användare finns

include "_includes/database_connection.php";

try {
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":username" => $username
    ]);

    // hämta användaren från databasen (om inte, skicka till register)
    $user = $stmt->fetch();

    if (!$user) {
        header("Location: register.php");
        exit;
    }
    ;


    // kontrollera att lösenordet är giltligt
    $correct_password = password_verify($password, $user['password']);
    if (!$correct_password) {
        exit;
    }

    // skapa en session för inloggad användare
    session_start();
    $_SESSION["user_id"] = $user['id'];

    // skicka användaren till home.php
    header("Location: home.php");
    exit;

} catch (PDOException $e) {

}




?>