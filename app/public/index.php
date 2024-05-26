<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>make pour decisions</title>
    <link rel="stylesheet" href="styles/index.css">
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
        <a href="index.php">HOME</a>
        <a href="register.php">REGISTER</a>
        <a href="login.php">LOG IN</a>
    </header>

    <?php include "_includes/menu.php"; ?>

    <main>
        <div class="logotype">
            <img src="styles/images/logotype.png" width="300px" alt="logotype">
        </div>
    </main>
    <aside>

        <div class="slogan"><img src="styles/images/slogan.png" alt=""></div>
        <p class="content">WELCOME TO POUR,THE ULTIMATE APP FOR DISCOVERING THE BEST BARS IN YOUR AREA</p><br>

        <p class="content"> JOIN POUR TODAY AND ELEVATE YOUR DRINKING EXPERIENCE, ONE GLASS AT A TIME!</p>

        </p>
    </aside>

    <script src="script.js"></script>
</body>

</html>