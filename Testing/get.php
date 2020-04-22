<?php
$login = 'Не определен';
$password = 'Не определен';
if (isset($_GET['login']))
{
    $login= $_GET['login'];
}
if (isset($_GET['age']))
{
    $age = $_GET['age'];
}
echo "Ваш логин: $login <br> Ваш возраст: $age";
?>