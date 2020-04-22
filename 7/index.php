<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
    <textarea name="textinput" placeholder="Enter your text here"></textarea><br>
    ping
    <input type="checkbox" name="ping"/> 
    tracert
    <input type="checkbox" name="tracert"/><br/>
    <input type='submit' value='ok'></button>
</form>
    <?php    
    $site=$_REQUEST["textinput"] ?? "";
    if ($site == ""){
        exit('Пустая строка');
    }

    function ping($site)
    {
        $command = iconv('utf-8','cp866','ping ' . $site);      
        exec($command,$array);        
        if ($array == null) exit ("Неправильный адрес сайта");
        for ($i=0;$i<count($array);$i++)
        {
            $array[$i] = iconv('cp866','utf-8',$array[$i]);
        }
        preg_match('/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/',$array[1],$matches);
        echo "<b>$matches[0]</b>";       
        echo '<br>';
        if (isset($_POST['ping']))
        {   
            preg_match('/[0-9]{1,3}/',$array[9],$matches);      
            $percentage = 100 - (int)$matches[0];
            echo "$percentage% получено пакетов<br>";
        }
    }
    ping($site);

    function tracert($site)
    {
        $command = iconv('utf-8','cp866','tracert ' . $site);
        $matches=[];
        exec($command,$array);
        for ($i=0;$i<count($array);$i++)
        {
            $array[$i]=iconv('cp866','utf-8',$array[$i]);   
            preg_match('/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/',$array[$i],$match);
            if (isset($match[0]))   
            {
                 array_push($matches,$match[0]);    
            }      
        }
        for ($i=0;$i<count($matches);$i++)
        {
            echo $matches[$i];
            echo '<br>';
        }
    }

    if (isset($_POST['tracert']))
    {
        tracert($site);
    }
    ?>
</body>
</html>