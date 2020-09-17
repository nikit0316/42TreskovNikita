<?php
function curlTask(){
    $array = array(
        'login'   => 'MisterMan',
        'password' => 'qf12r12rvwef'
    );		
$agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36'; 
$ch=curl_init('http://localhost/42TreskovNikita/3kPHP/1/index.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_exec($ch);
curl_close($ch);
}
curlTask();
?>