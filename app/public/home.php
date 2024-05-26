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
    <header>
        <button onclick="displayMenu()" id="menu-button"><i class="fa-solid fa-bars fa-2xl"></i></button>
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
                <p>Welcome to Pour, the ultimate app for discovering the best wine bars in your city.
                    Whether you're a wine enthusiast seeking new places to explore or a business owner wanting to list
                    your own wine bar,
                    Pour is here to help.</p> <br>
                <p>Our user-friendly platform allows you to browse, view photos,
                    and find the perfect spot for your next wine-tasting adventure. For wine bar owners,
                    our app offers a simple way to add your business and reach a community of passionate wine lovers.
                </p>

            </div>
        </div>

    </aside>
    <script src="script.js"></script>
</body>

</html>