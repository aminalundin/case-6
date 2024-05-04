<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>

    <!-- HEADER/HERO -->
    <?php include "_includes/header.php"; ?>

    <div class="hero">
        <h1 class="hero-heading">rare<br>wines<br><i>index</i></h1>

        <p class="hero-content">discover/ <br>
            share</p>
    </div>


    <!-- BUTTONS -->
    <div class="buttons">
        <button onclick="displayRegForm()" id="reg-button">get started</button>
        <button onclick="displayLogInForm()" id="reg-button">log in</button>
    </div>


    <!-- FORMS -->
        <div id="form-register" style="display: none;">
            <button onclick="displayRegForm()">&#x2715;</button>
            <form action="" method="post">

                <input type="text"><br>

                <input type="text"><br>

                <input type="text"><br>

                <input type="text"><br>

                <input type="password"><br>

                <input type="password">
            </form>
            <button id="sign-up">SIGN UP!</button>
        </div>
    
        <div id="form-log-in" style="display: none;">
            <button onclick="displayLogInForm()">&#x2715;</button>
            <form action="" method="post">

                <input type="text"><br>

                <input type="password">
            </form>
            <button id="log-in">log in</button>
        </div>
    

    <script src="script.js"></script>
</body>

</html>