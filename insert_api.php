<?php

header('Content-Type: application/json');
header('Access-Control-Allow-origin: *');
header('Access-Control-Allow-Method: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,
// Content-Type,Access-Control-Allow-Origin,
// Access-Control-Allow-Methods, Authorization, x-Requested-With');

include "config.php";

$data = json_decode(file_get_contents('php://input'), true);

$name = $data["uname"];
$number = $data["num"];
$email = $data["email"];

// genrate random number for otp

$otp = rand(0, 100000);

// get data from database


$sql = "SELECT * FROM `user` WHERE `number = $number";
if ($result = mysqli_query($conn, $sql)) {
    $count_data_row = mysqli_num_rows($result);
    // echo json_encode(array('status' => 'data inserted succesfully', 'row_cunt' => $count_data_row));

    if ($count_data_row == 0) {
        $sql = "INSERT INTO `user`(number,otp) VALUES ('{$number}','{$otp}') ";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array('status' => 'data inserted', 'message' => 'take name and email from user', 'otp' => $otp));
        } else {
            echo json_encode(array('message' => 'data not inserted (admin issue)'));
        }
    } else {
        $sql = "UPDATE `user` SET `otp` = '{$otp}' WHERE `number` = '{$number}' ";
        if($result = mysqli_query($conn , $sql)){
        echo json_encode(array('message' => 'account already exit', 'otp' => $otp));
        }else{
            echo json_encode(array('message'=> 'try after some times otp was not updated'));
        }
    }
} else {
    echo json_encode(array('status' => 'account already exit'));
}


// $sql = "INSERT INTO user(name, number, email) VALUES ('{$name}', '{$number}', '{$email}')";
    
// if(mysqli_query($conn, $sql)){

//     // $sq = "SELECT * FROM user";
//     // $result = mysqli_query($conn ,$sq);
//     // $output = mysqli_fetch_all($result , MYSQLI_ASSOC);
//     // $json_data = json_encode($output);
//     // echo $json_data;

//     echo json_encode(['status' => true]);


// }else {
//     return json_encode(['status' => false]);
// }

// $sq = "SELECT * FROM user";
// $result = mysqli_query($conn, $sq);
// $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
// $json_data = json_encode($output);
// echo $json_data;