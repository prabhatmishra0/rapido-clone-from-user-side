<?php

header('Content-Type: application/json');
header('Access-Control-Allow-origin: *');
header('Access-Control-Allow-Method: POST');

include "include/function.php";
include "include/mysql.php";

$data = json_decode(file_get_contents('php://input'), true);

$number = $data["num"];
$number = test_input($number);

// genrate random number for otp
$otp = rand(000000, 999999);

// To hash the otp, use
// $otp = password_hash($otp, PASSWORD_DEFAULT);

// To compare hash with plain text, use
// password_verify("MySuperSafePassword!", $hashed_password)


// get data from database
$sql = "SELECT * FROM `user` WHERE number = $number";

//check number exit on database or not
if(row_exist($sql)) {
    $sql = "UPDATE `user` SET `otp` = '{$otp}' WHERE `number` = '{$number}' ";

    if (query($sql)) {
        throw_response(4002, "account already exit otp will sent in your account");
    }else{
        throw_response(4003,"try after some time otp not updated");
    }
}else{
    $sql = "INSERT INTO `user`(number,otp) VALUES ('{$number}' , '{$otp}')";
    if(query($sql)){
        throw_response(200, "new user registered otp will sent");
    }else{
        throw_response(4002, "api down try again");
    }
    
}




?>