<?php declare(strict_types=1);
session_start();

include "_includes/database_connection.php";


// förvalda värden för variabler
$name = "";
$id = 0;
$address = "";


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $user_id = $_SESSION['user_id'];


    // om posten ska raderas
    if (isset($_POST['delete'])) {

        $sql = "DELETE FROM `business` WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);

        $result = $stmt->execute();

        header("Location: sample.php");
    }



    if (strlen($name) > 0 && strlen($name) <= 50) {

        $sql = "UPDATE `business` SET `name` = :name, `address` = :address, `user_id` = :user_id  WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue('name', $name, PDO::PARAM_STR);
        $stmt->bindValue('address', $address, PDO::PARAM_STR);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->bindValue('user_id', $user_id, PDO::PARAM_INT);

        $result = $stmt->execute();

        header("Location: account.php");

    }
}


if ($_SERVER['REQUEST_METHOD'] === "GET") {

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $sql = "SELECT * FROM `business` WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch();

    if ($row) {
        $name = $row['name'];
        $address = $row['address'];
    }
}

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
    <header>
        <button onclick="displayMenu()" id="menu-button"><i class="fa-solid fa-bars fa-2xl"></i></button>
    </header>

    <?php include "_includes/logged_in_menu.php"; ?>

    <main>
        <div class="logotype">
            <img src="styles/images/logotype.png" width="300px" alt="logotype">
        </div>
    </main>
    <aside>
        <form action="account_edit.php" method="post">


            <label for="name">business name</label>
            <input type="text" name="name" id="name" value="<?= $name ?>">


            <label for="address">address</label>
            <input type="text" name="address" id="address" value="<?= $address ?>">


            <input type="submit" value="SAVE" name="save" id="edits">
            <input type="submit" value="REMOVE" name="delete" id="edits">



            <input type="hidden" name="id" value="<?= $id ?>">
        </form>
    </aside>

    <script src="script.js"></script>

</body>

</html>