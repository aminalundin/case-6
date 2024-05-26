<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>make pour decisions</title>
    <link rel="stylesheet" href="styles/home-page.css">
    <link rel="stylesheet" href="https://use.typekit.net/hlg0mdj.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php include "_includes/logged_in_menu.php"; ?>
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

    <main>
        <div class="logotype">
            <img src="styles/images/logotype.png" width="300px" alt="logotype">
        </div>
    </main>
    <aside>
        <div class="slogan"><img src="styles/images/slogan.png" alt="" width="350px"></div>
        <div class="aside-content">

            <div class="info-text">
                <p>Welcome to Pour, the ultimate app for discovering the best bars in your city.
                    Whether you're a wine enthusiast, cocktail lover or a business owner wanting to list
                    your own bar,
                    Pour is here to help.</p> <br>
                <p>Our user-friendly platform allows you to browse, view photos,
                    and find the perfect spot for your next adventure. For bar owners,
                    our app offers a simple way to add your business and reach our growing community of dedicated
                    enthusiasts.
                </p>

            </div>
        </div>

    </aside>
    <script src="script.js"></script>
</body>

</html>