<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
    <select name="months">
    <option value=0>Текущий месяц
    <option value=1>Январь
    <option value=2>Февраль
    <option value=3>Март
    <option value=4>Апрель
    <option value=5>Май
    <option value=6>Июнь
    <option value=7>Июль
    <option value=8>Август
    <option value=9>Сентябрь
    <option value=10>Октябрь
    <option value=11>Ноябрь
    <option value=12>Декабрь
    </select>
    <input type="submit" name="submit" value="Отправить">
</form>
    <?php
    function draw_calendar()
    {
        $month=$_POST['months'];
        echo $month;
        $date = date("d/m/y");
    }
    draw_calendar();
    ?>
</body>
</html>