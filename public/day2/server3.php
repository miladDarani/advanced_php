<?php

//default content type is text for html

// header('Content-Type: application/json');
$post= file_get_contents('php://input');
echo $post;