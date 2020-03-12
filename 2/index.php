<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include("blocks/forms.php"); ?>
    <?php
    $initial_str = $_REQUEST['textinput'] ?? '';
    $counter = 0;
    $final_string = "";
    function doing($a = "")
    {
        function replacing($a = "")
        {
            for ($i = 0; $i < strlen($a); $i++) {
                global $counter;
                $symbol = $a[$i];
                switch ($symbol) {
                    case 'h':
                        $symbol = "4";
                        $counter++;
                        break;

                    case 'i':
                        $symbol = "1";
                        $counter++;
                        break;

                    case 'e':
                        $symbol = "3";
                        $counter++;
                        break;

                    case 'o':
                        $symbol = "0";
                        $counter++;
                        break;

                    default:
                        break;
                }
                yield $symbol;
            }
        }
        $b = "";
        $generator = replacing($a);
        foreach ($generator as $value) {
            $b = $b . $value;
        }
        return $b;
    }
    $final_string = doing($initial_str);
    echo "$final_string количество: $counter";
    ?>
</body>

</html>