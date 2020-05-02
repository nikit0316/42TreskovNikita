<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
class MyClass
{
    public $var1 = 'значение 1';
    public $var2 = 'значение 2';
    public $var3 = 'значение 3';

    protected $protected = 'защищенная переменная';
    private   $private   = 'закрытая переменная';

    function iterateVisible() {
       echo "MyClass::iterateVisible:\n";
       foreach ($this as $key => $value) {
           print "$key => $value\n";
       }
    }
}

$class = new MyClass();

foreach($class as $key => $value) {
    print "$key => $value\n";
}
echo "\n";


$class->iterateVisible();

?>
</body>
</html>