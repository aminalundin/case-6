<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "user trying to submit form";
    var_dump($_POST);

    // hämta data från formuläret
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    // $open = trim($_POST['open_hours']);
  

    // kontrollera att fälten inte är tomma
    if (empty($name) || empty($address)) {
        echo "missing values<br>";
        exit;
    }

    // kontrollera att företaget inte redan finns
    include "_includes/database_connection.php";

    try {
        $sql = "SELECT * FROM `business` WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name
        ]);

        // hämtar företagsnamn från databasen
        $company = $stmt->fetch();

        if ($company) {
            echo "företaget finns redan";
            exit;
        }

        // registrera nytt företag i databasen
        $sql = "INSERT INTO `business` (name, address) VALUES (:name, :address)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':address' => $address,
            // ':open_hours' => $open
        ]);


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
    <title>register</title>
    <link rel="stylesheet" href="styles/register.css">
</head>

<body>
    <header>
        <a href="register.php">GET STARTED</a>
        <a href="login.php">LOG IN</a>
    </header>
    <main>

        <div class="logotype">
            <img src="styles/images/logotype.png" width="300px" alt="logotype">
        </div>
    </main>

    <aside>
        <div class="container">
            <p class="slogan">add your business here</p>

            <form action="share.php" method="post">

            <label for="name">NAME</label>
            <input type="text" name="name" id="name">

            <label for="address">ADDRESS</label>
            <input type="text" name="address" id="address">

            <!-- <label for="open_hours">OPENING HOURS</label>
            <input type="text" name="open_hours" id="open_hours"> -->

            <!-- <label for="image">UPLOAD IMAGE</label>
            <input type="image" src="" alt=""> -->

            <button type="submit">REGISTER BUSINESS</button>
            </form>
        </div>

        <!-- <div class="image">
            <img src="styles/images/wine-glass.png" alt="illustration of wine glass" width="200px">
        </div> -->
    </aside>
</body>

</html>
<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add your business</title>
    <link rel="stylesheet" href="styles/register.css">
</head>

<body>
    <div class="submit-form">
        <form action="share.php" method="post">
            <label for="name">name NAME</label>
            <input type="text" name="name" id="name">

            <label for="address">ADDRESS</label>
            <input type="text" name="address" id="address">

            <label for="open_hours">OPENING HOURS</label>
            <input type="text" name="open_hours" id="open_hours">

            <label for="image">UPLOAD IMAGE</label>
            <input type="image" src="" alt="">

            <button type="submit">REGISTER BUSINESS</button>
        </form>
    </div>
</body>

</html> -->