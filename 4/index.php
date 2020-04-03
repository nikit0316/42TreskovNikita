<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
textarea[name="textinput"] {
font-size: 15px;
height: 36px;
width: 500px;
}
</style>
<body>
    <?php
    include ("form.php");
    $sum=0;
    $line=[];
    $full_lines=[];
    $exp="/([a-z\s][0-9]+)/";  
    $text=$_REQUEST["textinput"] ?? "";
    if ($text==null or !preg_match($exp,$text)) exit("Введите правильную строку");
    preg_match_all($exp, $text, $match);

    for ($i=0;$i<count($match[0]);$i++)
    {
        $sum+=preg_replace('/[^0-9]/','', $match[0][$i]);
    }    
    
    $lines=preg_split($exp,$text);

    for ($i=0;$i<count($match[0]);$i++)
    {        
        $full_lines[$i]=$lines[$i] . $match[0][$i];
        array_push($line,[
            "text"=>$full_lines[$i],
            "weight"=>preg_replace('/[^0-9]/','', $match[0][$i]),
            "probability"=>preg_replace('/[^0-9]/','', $match[0][$i])/(int)$sum
        ]);
    }
    $result = [
        "sum"=>$sum,
        "data"=>$line
    ];   
    session_start();
    $_SESSION["transition_lines"]=$line;   
    $_SESSION["transition_weight"]=$result['sum'];
    print_r(json_encode($result, JSON_UNESCAPED_UNICODE));
    echo "</br>";
    echo "</br>";
    include ("4.2.php");
    ?>
</body>
</html>