<html>
<head>
<title>Веб-сайт</title>
</head>
<body>
<?php
$foo = true;
$a=10;
$b=5;
echo "foo = true <br>";
if($foo)
  echo $a+$b;
else
  echo $a-$b;
$foo = false;
echo "<br> foo = false <br>";
if($foo)
  echo $a+$b;
else
  echo $a-$b;
?>
</body>
</html>