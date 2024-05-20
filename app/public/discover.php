<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>discover</title>
    <link rel="stylesheet" href="styles/discover.css">
</head>

<body>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $name = $_POST['search'];

        include "_includes/database_connection.php";

        try {
            // hämta från databasen
            $sql = "SELECT `name`, `address` FROM `business` WHERE name LIKE '{$name}'";
            $stmt = $pdo->query($sql);
            $rows = $stmt->fetch();

            print_r($rows);
            // $query = "SELECT * FROM business WHERE name LIKE '{$name}'";
            // $stmt = $pdo->prepare($query);
            // $stmt->execute([
            //     ':name' => $name
            // ]);
    
            // hämtar användare från databasen
            // $company = $stmt->fetch(); 
    
            // echo $company;
    



        } catch (PDOException $e) {
            // echo "database connection exception";
        }


    }

    ?>

    <!-- <div id="gallery">
           
        </div> -->
    <form action="discover.php" method="post">
        <input id="search" type="search" name="search" placeholder="search..">

        <button type="submit">search</button>

    </form>

</body>

</html>