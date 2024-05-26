<?php

declare(strict_types=1);
session_start();

include "_includes/database_connection.php";


$sql = "SELECT business.*, users.username FROM business JOIN users ON business.user_id = users.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$rows = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register new user</title>
    <link rel="stylesheet" href="styles/register.css">
    <link rel="stylesheet" href="https://use.typekit.net/hlg0mdj.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header class="mobile-header">
        <button onclick="displayMenu()" id="menu-button"><i class="fa-solid fa-bars fa-2xl"></i></button>
    </header>
    <header class="desktop-header">
        <a href="home.php">HOME</a>
        <a href="share.php">ADD YOUR BAR</a>
        <a href="discover.php">DISCOVER</a>
        <a href="account.php">MY ACCOUNT</a>
        <a href="logout.php">LOG OUT</a>
    </header>

    <?php include "_includes/logged_in_menu.php"; ?>

    <main>
        <div class="logotype">
            <img src="styles/images/logotype.png" width="300px" alt="logotype">
        </div>
    </main>

    <aside>

        <div class="slogan"><img src="styles/images/businesses.png" alt="" width="300px"></div>

        <ul id="result">
            <?php

            foreach ($rows as $row) {

                $li = "<li>";

                $li .= "<span class=\"name\">";
                $li .= $row['name'];
                $li .= "</span>";

                $li .= "<span class=\"address\">";
                $li .= $row['address'];
                $li .= "</span>";

                if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $row['user_id']) {

                    $li .= "<a href='account_edit.php?id=" . $row['id'] . "'>";
                    $li .= "EDIT";
                    $li .= "</a>";
                } else {
                    $li .= "<span></span>";
                }

                $li .= "</li>";
                echo $li;
            }
            ?>
        </ul>
    </aside>
    <script src="script.js"></script>
</body>

</html>