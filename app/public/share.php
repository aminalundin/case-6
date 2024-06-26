<?php
// include_once "_includes/upload.php";
include "_includes/database_connection.php";
session_start();
$status_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $hours = trim($_POST['hours']);
    $category = filter_input(INPUT_POST, 'bars', FILTER_VALIDATE_INT);

    if (empty($name) || empty($address) || empty($hours) || empty($category)) {
        echo "Missing values<br>";
        exit;
    }

    try {
        $sql = "SELECT * FROM business WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':name' => $name]);
        $company = $stmt->fetch();

        if ($company) {
            echo "Företaget finns redan<br>";
            exit;
        }

        if (!empty($_FILES['file']['name'])) {
            $target_dir = "uploads/";
            $file_name = basename($_FILES['file']['name']);
            $target_file_path = $target_dir . $file_name;
            $file_type = pathinfo($target_file_path, PATHINFO_EXTENSION);
            $allow_types = ['jpg', 'png', 'jpeg', 'gif'];

            if (in_array($file_type, $allow_types)) {

                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file_path)) {

                    $sql = "INSERT INTO business (name, address, open_hours, image_url, category_id, user_id) VALUES (:name, :address, :open_hours, :image_url, :category_id, :user_id)";
                    $stmt = $pdo->prepare($sql);
                    $insert = $stmt->execute([
                        ':name' => $name,
                        ':address' => $address,
                        ':open_hours' => $hours,
                        ':category_id' => $category,
                        ':image_url' => $file_name,
                        ':user_id' => $_SESSION['user_id']
                    ]);

                    if ($insert) {
                        // $status_message = "Business registered successfully";
                    } else {
                        // $status_message = "Error inserting data into database";
                    }
                } else {
                    // $status_message = "Error uploading file";
                }
            } else {
                // $status_message = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed";
            }
        } else {
            // $status_message = "Please select an image to upload";
        }
    } catch (PDOException $e) {
        echo "Database connection exception: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
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

    <body>
        <?php include "_includes/logged_in_menu.php"; ?>

        <main>
            <div class="logotype">
                <img src="styles/images/logotype.png" width="300px" alt="logotype">
            </div>
        </main>

        <aside>
            <div class="slogan"><img src="styles/images/add.png" alt="" width="400px"></div>
            <div class="container">
                <!-- <p class="slogan">Add your business here</p> -->

                <?php if (!empty($status_message)) {
                    echo '<p>' . $status_message . '</p>';
                } ?>

                <form action="share.php" method="post" enctype="multipart/form-data">
                    <label for="name">NAME</label>
                    <input type="text" name="name" id="name">

                    <label for="address">ADDRESS</label>
                    <input type="text" name="address" id="address">

                    <label for="hours">OPENING HOURS</label>
                    <input type="text" name="hours" id="hours">

                    <label for="bars">CHOOSE A CATEGORY</label>
                    <select name="bars" id="bars">
                        <?php
                        $sql = "SELECT category, id FROM category";
                        $stmt = $pdo->query($sql);
                        $rows = $stmt->fetchAll();

                        foreach ($rows as $row) {
                            $category = htmlspecialchars($row["category"]);
                            $id = $row['id'];
                            echo '<option value=' . $id . '>' . $category . '</option>';
                        }
                        ?>
                    </select>

                    <label for="file">UPLOAD IMAGE</label>
                    <input type="file" name="file" id="file">

                    <button type="submit">REGISTER BUSINESS</button>
                </form>
            </div>
        </aside>
        <script src="script.js"></script>
    </body>

</html>