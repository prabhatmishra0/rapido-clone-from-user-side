<?php
header('Content-Type: application/json');
header('Access-Control-Allow-origin: *');
header('Access-Control-Allow-Method: POST');

include "include/function.php";
include "include/mysql.php";

$data = json_decode(file_get_contents('php://input'), true);

// take name & clean
$name = $data["name"];
$name = test_input($name);

// take email & clean
$email = $data["email"];
$email = test_input($email);

// take num & clean 
$number = $data["num"];
$number = test_input($number);


// check the number is already exit or not

$sql = "SELECT * FROM `user` where number = $number ";

if(row_exist($sql)){
    throw_response(201, "user already exit send to log in page");
}else {
    $sql = "INSERT INTO `user`(name, email, number) VALUES ('{$name}' , '{$email}' , '{$number}') ";
    if(query($sql)){
        throw_response(200,"user registered");
    }else{
        throw_response(202,"user not registered");
    }
}


?>