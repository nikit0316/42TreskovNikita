<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'connection.php';
    $link = mysqli_connect($host,$user,$password,$database) or die ('Ошибка' . mysqli_error($link));
    $query = 'Select * from tovars';
    $result = mysqli_query($link,$query) or die ('Ошибка' . mysqli_error($link));
    if ($result)
    {
        $rows = mysqli_num_rows($result);
        echo "<table><tr><th>Id</th><th>Модель</th><th>Производитель</th></tr>";
        for ($i=0;$i<$rows;$i++)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            echo "</tr>";
        }
        echo '</table>';

        mysqli_free_result($result);
    }
    
    mysqli_close($link);
    ?>
</body>
</html>