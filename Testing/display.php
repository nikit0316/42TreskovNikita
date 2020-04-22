<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Первый полный сайт на PHP</title></head>
<body>
    <?php
    $name = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    echo "Ваше имя: <b>" . $name . "" . $lastname . '</b>';
    ?>
</body>
</html>