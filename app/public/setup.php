<?php

include "_includes/database_connection.php";


try {

    // ny tabell med namnet users för att registrera användare och för att användare ska kunna logga in
    $sql = "CREATE TABLE IF NOT EXISTS `db_case`.`users` 
    (`id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(50) NOT NULL , 
    `password` VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`id`), UNIQUE (`username`)) ENGINE = InnoDB;";
    $pdo->exec($sql);

    // ny tabell med namnet category för registrerad användare
    $sql = "CREATE TABLE IF NOT EXISTS `db_case`.`category` 
    (`id` INT NOT NULL AUTO_INCREMENT , 
    `category` VARCHAR(50) NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $pdo->exec($sql);

    // ny tabell med namnet business där användare kan registrera sitt företag
    $sql = "CREATE TABLE IF NOT EXISTS `db_case`.`business` 
    (`id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(50)  , 
    `address` VARCHAR(50) , 
    `open_hours` VARCHAR(50) , 
    `image_url` VARCHAR(100) NULL DEFAULT NULL , 
    `date_updated` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `user_id` (INT FOREIGN KEY table users) , 
    `category_id` (INT FOREIGN KEY table category) , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $pdo->exec($sql);


    // Meddelande om att databasen är klar med tabell setup
    echo "Database setup complete <br>";
} catch (PDOException $e) {
    echo "Database setup exception $e";
}