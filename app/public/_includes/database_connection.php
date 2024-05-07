<?php
$pdo = null;

$host = "mysql";
$database = "db_case";
$user = "db_user";
$password = "db_password";



try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
} catch (PDOException $e) {
    echo "Database connection exception $e";
}

// $options = [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
// ];



// fråga databasen
// $sql = "SELECT VERSION()";

// svar från databasen

// $query = $pdo->query($sql);
// $row = $query->fetch();

// print_r($row);



?>