<?php

header('Content-Type: application/json');

if(!empty($_GET['id'])) {
    $response = ['message' => 'You sent a GET request with an attached id'];
    echo json_encode($response);
    die;
}

if(!empty($_POST['name'])) {
    $response = ['message' => 'You sent a POST request with a name parameter'];
    echo json_encode($response);
    die;
}