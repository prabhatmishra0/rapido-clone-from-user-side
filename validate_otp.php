<?php

header('content-Type: application/json');
header('Access-Control-Allow-origin: *');
header('Access-Control-Allow-Method: POST');

include "include/function.php";
include "include/mysql.php";

$data = json_decode(file_get_contents('php://input'),true);

$otp = $data["ot"];

$sql = "SELECT * FROM `user` WHERE otp = $otp";

if(row_exist($sql)){
    throw_response(200,"right otp");
}else{
    throw_response(4001,"wrong otp");
}