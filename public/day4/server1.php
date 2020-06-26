<?php 
header('Content-Type: application/json');
if('POST' !=$_SERVER['REQUEST_METHOD']){
    $error = ['error' => "unsupported"];
    echo json_encode($error);
    die;
}

$post = file_get_contents('php://input');
//converts json string from JS into PHP variable
$post_Array = json_decode($post);


echo json_encode($post_array);
die;
