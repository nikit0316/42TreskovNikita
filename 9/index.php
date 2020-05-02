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
    $text = $_REQUEST['textinput'];
    $filename = $_REQUEST['filename'];
    $lines = array("Somebody", "once told me", "The world gonna", "Enroll me", "i Ain't ");
    abstract class Logger
    {               
        function __construct($line=null)
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
            parent::__construct($line);
            global $lines;            
            $fd = fopen($dir, 'w') or die("не удалось создать файл");
            foreach ($lines as $line)
            {
                fwrite($fd, $line);
                fwrite($fd, '\n');
            }
            fclose($fd);

        }
    }

    class Brow extends Logger
    {
        function __construct($line=null)
        {
            parent::__construct($line);
            global $lines;
            if (isset($_POST["time"]) && $_POST["time"] == 0)
            {
                foreach($lines as $line)
                {
                    echo $line;
                }
            }
            else if (isset($_POST["time"]) && $_POST["time"] == 1)
            {
                $d = getdate();
                echo "$d[hours]:$d[minutes]:$d[seconds]";
                foreach($lines as $line)
                {
                    echo $line;
                }
            }
            else
            {
                $d = getdate();
                echo "$d[mday].$d[mon].$d[year] $d[hours]:$d[minutes]:$d[seconds]";
                foreach($lines as $line)
                {
                    echo $line;
                }
            }
        }
    }
    
    if ($_POST['logger'] === 0)
    {
        
    }
    ?>
</body>
</html>