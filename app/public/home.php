<?php 
$title = "Hello";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>make pour decisions</title>
    <style>
        @font-face {
            font-family: Monsterrat;
            src: url(fonts/Montserrat-VariableFont_wght.ttf);
        }
    </style>
</head>
<body>
    <?php echo $title; ?>

    <form action="">
        <label for="name">name</label>
        <input type="text">
        <label for="surname">surname</label>
        <input type="text">
        <label for="email">email</label>
        <input type="text">
        <label for="username">username</label>
        <input type="text">
        <label for="password">password</label>
        <input type="password">
        <label for="password">confirm password</label>
        <input type="password">
    </form>

    <button class="reg-button">get started</button>
    <button class="log-in-button">log in</button>
</body>
</html>