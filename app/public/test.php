<?php
include "_includes/upload.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="test.php" method="post" enctype="multipart/form-data">

        <label for="image">UPLOAD IMAGE</label>


        <input type="file" name="name">
        <input type="submit" value="submit" name="submit">

    </form>

</body>

</html>