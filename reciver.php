<?php

$host = '127.0.0.1';
$port = 13030;

$socket = socket_create(AF_INET,SOCK_STREAM,0) or die('Not created');

$result = socket_bind($socket,$host,$port) or die('not binded');

$result = socket_listen($socket,3) or die('not listing');

do{

$accept = socket_accept($socket) or die('not accept');

$msg = socket_read($accept , 1024);

$msg = trim($msg);

echo $msg;


} while(true);

socket_close($socket);

?>