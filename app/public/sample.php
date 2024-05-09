<?php
include "_includes/database_connection.php";


// hämta data från tabellen users

// hämta allt från tabellen

// hämta vissa kolumner

// $sql = "SELECT description FROM `spring`WHERE id => 1";
//  bestäm ordning desc or asc

// $sql = "SELECT description FROM `spring`WHERE id => 1 ORDER BY description DESC";

// ta fram i tabellen med specifikt ord
// $sql = "SELECT description FROM `spring` WHERE id >= 1";




// kontrollera om det finns en post request
// print_r($_SERVER);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "posted";
    // print_r($_POST);

    $description = $_POST["description"];

    // validera inkommande data
    if (strlen($description) > 0 && strlen($description) < 50) {
       
        // lägg till i databasen (från phpmyadmin)
        $sql = "INSERT INTO `spring` (`description`) VALUES ('$description')";
        $result = $pdo->exec($sql);
        // print_r($result);
    } else {
        echo "skriv något";
    }

    // echo $sql;
}

$sql = "SELECT * FROM `spring` WHERE id >= 1";

$result = $pdo->query($sql);
$rows = $result->fetchAll();
// print_r($rows);

$id = 1;

// PDO::prepare 
// prepares a statement with named placeholder  - starts with a colon :
$sql = "SELECT * FROM `spring` WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$rows = $stmt->fetchAll();

// print_r($rows);

// PDO::PARAM_INT


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container">
        <div id="form-register">
            <!-- <button onclick="displayRegForm()" id="close-reg-tab">&#x2715;</button> -->
            <form action="sample.php" method="post">
                <label for="description">Ett vårtecken</label>
                <input type="text" name="description" id="description"><br>
                
                <button type="submit" id="sign-up">SIGN UP!</button>
            </form>
        </div>
        </div>
        

        <!-- <div class="log-in-container">
        <div id="form-log-in">
            <button onclick="displayLogInForm()" id="close-log-tab">&#x2715;</button>
            <form action="login.php" method="post">
                <p>username</p>
                <input type="text"><br>
                <p>password</p>
                <input type="password">
            </form>
            <button type="submit" id="log-in">log in</button>
        </div>
        </div> -->
</body>
</html>