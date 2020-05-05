<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form method="POST">
    <textarea name="textinput" placeholder="Enter your text here"></textarea><br>    
    <textarea name="filename" placeholder="Имя txt-файла"></textarea><br>
    <select name="time">
    <option value=0>Ничего не добавлять
    <option value=1>Время
    <option value=2>Дата и время
    </select>    
    <select name="logger">    
    <option value=0>Браузер
    <option value=1>txt-файл
    </select>
    <input type="submit" name="submit" value="Отправить">
</form>
    <?php
    $text = $_REQUEST['textinput'] ?? "";
    $filename = $_REQUEST['filename'];
    $lines = array("Somebody ", "once told me ", "The world gonna ", "Enroll me ", "i Ain't ");
    abstract class Logger
    {
        function addLine($line=null)
        {
            global $lines;
            if ($line != null) array_push($lines,$line);
        }
    }

    class File extends Logger
    {
        private $dir;

        function __construct($line=null,$dir)
        {
            if ($dir == null)
            {
                exit("Вы не ввели имя файла");
            }
            else $dir = $dir . ".txt";
            global $lines;            
            $fd = fopen($dir, 'w') or die("не удалось создать файл");
            foreach ($lines as $line)
            {
                fwrite($fd, $line);
                fwrite($fd, "\n");
            }
            $checks=checker($lines);
            foreach ($checks as $value)
            {
                fwrite($fd,$value);
                fwrite($fd, "\n");
            }
            fclose($fd);
        }
    }

    class Brow extends Logger
    {
        function __construct()
        {            
            global $lines;
            if (isset($_POST["time"]) && $_POST["time"] == 0)
            {
                foreach($lines as $line)
                {
                    echo $line;
                    echo "<br>";
                }
            }
            else if (isset($_POST["time"]) && $_POST["time"] == 1)
            {
                $d = getdate();
                echo "$d[hours]:$d[minutes]:$d[seconds]";
                echo "<br>";
                foreach($lines as $line)
                {
                    echo $line;
                    echo "<br>";
                }
            }
            else
            {
                $d = getdate();
                echo "$d[mday].$d[mon].$d[year] $d[hours]:$d[minutes]:$d[seconds]";
                echo "<br>";
                foreach($lines as $line)
                {
                    echo $line;
                    echo "<br>";
                }
            }

            $checks=checker($lines);
            foreach ($checks as $value)
            {
                echo "$value <br>";
            }
        }
    }

    function checker($lines)
    {
        foreach($lines as $line)
        {
            if (preg_match('/([A-Z]+)/',$line))
            {
               yield "Строка содержит заглавные буквы $line";
            }         
            else 
            {
                yield "Строка не содержит заглавные буквы $line";
            }
        }
    }
    
    if (isset($_POST['logger']) && ($_POST['logger'] == 1))
    {
        $log = new File($text,$filename);
    }
    else if (isset($_POST['logger']) && ($_POST['logger'] == 0))
    {
        $log = new Brow($text);
    }
    ?>
</body>
</html>