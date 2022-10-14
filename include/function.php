<?php

/**
 * If the code is true, set the result to true, set the code to 200, and set the message to the
 * message. Otherwise, set the result to false, set the code to the code, and set the message to the
 * message.
 * 
 * @param code The HTTP status code you want to return.
 * @param mess The message you want to display.
 * @param data The data to be sent to the server.
 */
function throw_response($code, $mess = "", $data = null)
{
    $response = [];

    $response['result'] = ($code === true || $code == 200) ? true : false;
    $response['code'] = ($code === true) ? 200 : $code;
    $response['message'] = $mess;
    if ($data)  $response['data'] = $data;

    echo json_encode($response);
    exit;
}


/**
 * It removes any extra spaces, slashes, and special characters from the user input.
 * 
 * @param data The data to be validated.
 * 
 * @return The function test_input() is being returned.
 */

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}