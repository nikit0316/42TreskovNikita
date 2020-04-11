<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
Вам нужен доступ в интернет?
<input type="checkbox" name="formWheelchair"/><br/>
</form> 
<?php
function checkbox_verify($_name)
{
  $result=0;
  if (isset($_REQUEST[$_name]))
  {
    $result=2;
    if ($_REQUEST[$_name]=='on') $result=1;
  }
  return $result;
}
echo checkbox_verify('formwheelchair');
?>     
</body>
</html>