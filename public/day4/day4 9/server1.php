<?php

// Ensure browser knows that JSON is being sent back
// and NOT just text/html
header('Content-Type: application/json');

// Make sure we have a POST request
if('POST' != $_SERVER['REQUEST_METHOD']) {
    $error = ['error' => 'Unsupported request method'];
    echo json_encode($error);
    die;
}

// Get the JSON string out of the php://input stream
$post = file_get_contents('php://input');

// Convert json string from Javascript into PHP variable
$post_array = json_decode($post);

// Assume at this point we do something with the variable
// eg: insert data into database

// For this example, we will just return the same
// data we receive
echo json_encode($post_array);
die;

