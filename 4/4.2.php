<?php
$lines_array=$_SESSION["transition_lines"];
$weight_sum=$_SESSION["transition_weight"];
session_destroy();
for ($i=0;$i<count($lines_array);$i++)
{
    $weight_arr[$i]=($weight_arr[$i-1] ?? 0) + $lines_array[$i]['weight'];
}
print_r ($weight_arr);
asking($lines_array);

function generator($lines,$count=1)
{    
    for ($j=0;$j<$count;$j++)
    {
        global $weight_sum;
        global $weight_arr;    
        $randomizer=rand(1,$weight_sum);    
        $curr_line=null;       

        for ($i=0;$i<count($lines);$i++)
        {
            if ($randomizer<=$weight_arr[$i])
            {
                $curr_line=$lines[$i];
                break;
            }
        };
        yield $curr_line;
    }
};

function asking($lines)
{    
    $final=[];

    for ($i=0;$i<count($lines);$i++)
    {
        $count[$lines[$i]['text']]=0;
    }

    foreach (generator($lines,10000) as $line)
    {       
        $count[$line['text']]++;
    };

    for ($i=0;$i<count($lines);$i++)
    {        
        array_push(
            $final,[
                "text"=>$lines[$i]['text'],
                "count"=>$count[$lines[$i]['text']],
                "calculated_probability"=>$count[$lines[$i]['text']]/10000
            ]
        ); 
    };

    print_r(json_encode($final, JSON_UNESCAPED_UNICODE));
};
?>