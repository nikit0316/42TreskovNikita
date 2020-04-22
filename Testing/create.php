<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
</head>
<body>
    <?php
    require_once 'connection.php';

    if (isset($_POST['name']) && ($_POST['company']))
    {
        $link = mysqli_connect($host, $user, $password, $database) or die ('Ошибка ' . mysqli_error($link));
        $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
        $company = htmlentities(mysqli_real_escape_string($link, $_POST['company']));
        $query = "insert into tovars values(null,'$name','$company')";
        $result = mysqli_query($link,$query) or die ("Ошибка" . mysqli_error($link));
        if ($result)
        {
            echo "<span style='color:blue;'>Данные добавлены</span>";
        }
        mysqli_close($link);
    }
    ?>
    <h2>Добавить новую модель</h2>
    <form method ='post'>
        <p>Введите модель:<br>
        <input type='text' name='name'/></p>
        <p>Производитель: <br> 
        <input type="text" name="company" /></p>
        <input type="submit" value="Добавить">
    </form>
</body>
</html>