<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="msg">
    <input type="submit" name="submit">
</form>


<?php

if (isset($_POST['submit'])) {

    $host = "127.0.0.1";
    $port = 13030;

    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die('Not created');

    socket_connect($socket, $host, $port) or die('not connect');

    // $msg = 'hello';
    $msg = $_POST['msg'];

    socket_write($socket, $msg, strlen($msg));
}

?>