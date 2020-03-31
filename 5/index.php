<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include ("form.php");
$flag = true;
$password=$_REQUEST["textinput"] ?? "";
$exp_length = "/[\S]{10,}/";
$exp_upper = "/[A-Z]{2,}/";
$exp_down = "/[a-z]{2,}/";
$exp_number = "/[0-9]{2,}/";
$exp_special = "/[%$#_*]{2,}/";
$exp_row = "/(.)\\1\\1/";
$exp_array = [
    "/[\S]{10,}/",
    "/[A-Z]/",
    "/[a-z]/",
    "/[0-9]/",
    "/[%$#_*]/",
    "/(.)\\1\\1\\1/"
];
$error_array = array("Пароль меньше 10 символов",
"Меньше 2 прописных символов",
"Меньше 2 строчных символов",
"Меньше 2 цифр",
"Меньше 2 специальных символов",
"Болле 3 одинаковых символов подряд");

function check($exps,$errors,$text)
{
    global $flag;
    if (!preg_match($exps[0],$text))
    {
        $flag=false;
        exit($errors[0]);
    }

    for ($i=1;$i<5;$i++)
    {
        preg_match_all($exps[$i],$text,$matches);
        var_dump($matches[0]);
        echo "<br>";
        echo "<br>";
        if (count($matches[0]) < 2)
        {
            $flag=false;
            exit($errors[$i]);
        }
    }

    if (preg_match($exps[5],$text))
    {
        $flag=false;
        exit($errors[5]);
    }

    if ($flag)
    {
        echo "Пароль подходит";
    };
}
check($exp_array,$error_array,$password);
?>
</body>
</html>