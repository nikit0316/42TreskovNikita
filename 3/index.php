<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=5.0">
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
    $initial_text = $_REQUEST['textinput'] ?? '';
    $strok_arr = explode(PHP_EOL, $initial_text);
    foreach ($strok_arr as $str) {
        if (count(explode(" ", $str)) < 2) {
            throw new Exception('Строка состоит менее чем из двух слов');
        }
    }
    $count = count($strok_arr);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $stroka = randomiser($strok_arr[$i]);
            while (in_array($stroka, $strok_arr)) {
                $stroka = randomiser($strok_arr[$i]);
            }
            array_push($strok_arr, $stroka);
        }
        print_r($strok_arr);

        $keys = sorting($strok_arr);
        for ($i = 0; $i < count($strok_arr); $i++) {
            $stroka = $strok_arr[$keys[$i]];
            echo "<br> $stroka";
        }
    }

    function randomiser(string $stroka)
    {
        $words_arr = explode(" ", $stroka);
        shuffle($words_arr);
        $randomed_words = "";
        for ($i = 0; $i < count($words_arr); $i++) {
            if ($randomed_words == "") {
                $randomed_words = $words_arr[$i];
            } else {
                $randomed_words = $randomed_words . " " . $words_arr[$i];
            }
        }
        return $randomed_words;
    }

    function sorting(array $stroki)
    {
        $words_arr = array();
        for ($i = 0; $i < count($stroki); $i++) {
            $words_arr[$i] = explode(" ", $stroki[$i])[1];
        }
        natcasesort($words_arr);
        print_r($words_arr);
        $keys = array_keys($words_arr);
        return $keys;
    }
    ?>
</body>
</html>