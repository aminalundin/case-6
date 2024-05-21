<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>discover</title>
    <link rel="stylesheet" href="styles/discover.css">
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

    <form action="discover.php" method="post">
        <input id="search" type="search" name="search" placeholder="search..">

        <button type="submit">search</button>

    </form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = trim($_POST['search']);

        include "_includes/database_connection.php";

        try {
            // Use a prepared statement to prevent SQL injection
            $sql = "SELECT `name`, `address` FROM `business` WHERE `name` LIKE :name";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':name' => '%' . $name . '%']);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
                echo "<div id='results'>";
                foreach ($rows as $row) {
                    echo "<div class='result'>";
                    echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                    echo "<p>" . htmlspecialchars($row['address']) . "</p>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p>No results found for '" . htmlspecialchars($name) . "'</p>";
            }
        } catch (PDOException $e) {
            echo "Database connection exception: $e";
        }
    }
    ?>
    </aside>
<!-- 
    <div class="result">
        hej
    </div> -->
    <script src="script.js"></script>
</body>

</html>