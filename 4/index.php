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
<form>
    <textarea name="textinput" placeholder="Enter your text here"></textarea><br>
    <button>go</button>
</form>
    <?php
    $sum=0;
    $line=[];
    $exp="/([a-z\s][0-9]+)/";  
    $text=$_REQUEST["textinput"] ?? "";
    $matches=preg_match_all($exp, $text, $match);
    for ($i=0;$i<count($match[0]);$i++)
    {
        $sum+=preg_replace('/[^0-9]/','', $match[0][$i]);
    }    
    $lines=preg_split($exp,$text);    
    for ($i=0;$i<count($match[0]);$i++)
    {        
        array_push($line,[
            "text"=>$lines[$i] . $match[0][$i],
            "weight"=>preg_replace('/[^0-9]/','', $match[0][$i]),
            "probability"=>preg_replace('/[^0-9]/','', $match[0][$i])/(int)$sum
        ]);
    }
    $result = [
        "sum"=>$sum,
        "data"=>$line
    ];    
    print_r(json_encode($result, JSON_UNESCAPED_UNICODE));    
    ?>
</body>
</html>
