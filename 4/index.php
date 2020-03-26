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
    $exp="/([0-9]+)/";
    $text=$_REQUEST["textinput"] ?? '';
    $matches=preg_match_all($exp, $text, $match);   
    var_dump(
        $matches,        
        $match
    );   
    for ($i=0;$i<count($match[0]);$i++)
    {
        $sum+=(int)($match[0][$i]);
    }    
    $exp_second="/([0-9]+)/";
    $lines=preg_split($exp_second,$text);
    $result=[
        0=>$sum
    ];
    for ($i=0;$i<count($match[0]);$i++)
    {        
        array_push($line,[
            "text"=>"$lines[$i]+$match[0][$i]",
            "weight"=>$match[0][$i],
            "probability"=>(int)$sum/(int)$weight
        ]);
    }
    $result = [
        0=>$sum,
        "data:"=>$line
    ];
    print_r($result);
    ?>
</body>
</html>