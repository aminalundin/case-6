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
            <img src="styles/images/logotype.png" width="250px" alt="logotype">
        </div>
    </main>

    <aside>
        <div class="container">
        <p class="slogan"><strike>REGISTER NEW USER</strike></p>

            <form action="register.php" method="post">

                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username">

                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password">

                <label for="password">CONFIRM PASSWORD</label>
                <input type="password" name="password" id="password2">
            </form>
            <button type="submit" id="sign-up">SIGN UP</button>
        </div>

        <div class="image">
            <img src="styles/images/wine-glass.png" alt="illustration of wine glass" width="200px">
        </div>
    </aside>
</body>

</html>