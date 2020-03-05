<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include ("blocks/forms.php");?>
    <?php
    $initial_str = $_REQUEST['textinput'] ?? '';
    $counter = 0;
    function doing($a="")
    {
        for ($i=0;$i<strlen($a);$i++)
        {
            global $counter;
            switch($a[$i])
            {
                case 'h':
                    $a[$i]='4';
                    $counter++;
                break;

                case 'i':
                    $a[$i]='1';
                    $counter++;
                break;

                case 'e':
                    $a[$i]='3';
                    $counter++;
                break;

                case 'o':
                    $a[$i]='0';
                    $counter++;
                break;

                default:
                break;
            }
        }
        return $a;
    }
    $final_string=doing($initial_str);
    echo "$final_string количество: $counter<br>"
    ?>    
</body>
</html>