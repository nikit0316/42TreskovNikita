<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Вход на сайт</h3>
<form method="POST">
    Логин: <input type="text" name="login" /><br><br>
    Пароль: <input type="text" name="password" /><br><br>
    <input type="submit" value="Войти">
</form>
<?php
$login='';
$password='';
function posting (){
if (isset($_POST['login']) || isset($_POST['password'])){ 
    $login=$_POST['login'];
    $password = $_POST['password'];
    echo "Ваш логин: $login <br> Ваш пароль: $password";
    $fd = fopen("log.txt", 'a+') or die("не удалось открыть файл");
    fwrite($fd,$login . ' ' . $password . PHP_EOL);
    fclose($fd);
}
}
posting();

?>
</body>
</html>