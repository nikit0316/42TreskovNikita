<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $ini = parse_ini_file("C:/xampp/htdocs/42TreskovNikita/6/index.ini", true);   
    $text = file("C:/xampp/htdocs/42TreskovNikita/6/" . $ini["main"]["filename"]);
    $source_text= $text;    
    function first()
    {
        global $text;
        global $source_text;
        global $ini;        
        for ($i=0;$i<count($text);$i++)
        {            
            $symbol = preg_replace('/"/', '', $ini["first_rule"]["symbol"]);            
            $pos = strpos($source_text[$i], $symbol);           
            if ($pos === 0) 
            {
                if ($ini["first_rule"]["upper"]) 
                {
                    $text[$i] = mb_strtoupper($text[$i]);
                } 
                else 
                {
                    $text[$i] = mb_strtolower($text[$i]);                    
                };
            }
        };
    };
        
    function second()
    {        
        global $text;
        global $source_text;
        global $ini;        
        for ($x=0;$x<count($text);$x++)
        {            
            $symbol = preg_replace('/"/', '', $ini["second_rule"]["symbol"]);
            $pos = strpos($source_text[$x], $symbol);                   
            $number_array = ['0','1','2','3','4','5','6','7','8','9'];           
            if ($pos === 0)
            {
                for ($i=0;$i<strlen($text[$x]);$i++)
                {
                    if (preg_match('/[0-9]/',$text[$x][$i]) && $ini["second_rule"]["direction"] === '+')
                    {
                        for ($j=0;$j<10;$j++)
                        {
                            if ($text[$x][$i] === $number_array[$j])
                            {
                                $text[$x][$i] = $number_array[$j+1] ?? $number_array[0];
                            break;
                            }
                        }
                    };

                    if (preg_match('/[0-9]/',$text[$x][$i]) && $ini["second_rule"]["direction"] === '-')
                    {
                        for ($j=0;$j<10;$j++)
                        {
                            if ($text[$x][$i] === $number_array[$j])
                            {
                                $text[$x][$i] = $number_array[$j-1] ?? $number_array[9];
                            break;
                            }
                        }
                    };
                };               
            }   
            echo $text[$x];
            echo '<br>';         
        };
    };
    
    function third()
    {
        global $text;
        global $ini;   
        global $source_text;
        $chars = $ini["third_rule"]["delete"];        
        for ($x=0;$x<count($text);$x++)
        {            
            $symbol = preg_replace('/"/', '', $ini["third_rule"]["symbol"]);
            $pos = strpos($source_text[$x], $symbol);            
            if ($pos === 0)
            {
               $text[$x] = preg_replace('/['.$chars.']/', '', $text[$x]);                
            }   
        }  
    }   
    third();
    first();
    second();  
    $test = 'проверка';
$splitTest = str_split($test);
print_r($splitTest);
    ?>
</body>
</html>