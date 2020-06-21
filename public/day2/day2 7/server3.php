<?php

// default content-type text/html

// header('Content-Type: application/json');

$post = file_get_contents('php://input');

echo $post;

// echo json_encode($_POST);