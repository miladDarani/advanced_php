<?php

// chech to see if post request 
if('POST' != $_SERVER['REQUEST_METHOD']) {
    $error = ['error' => 'Unsupported Request Method'];
    echo json_encode($error);
    die;
}

$dbh = new PDO('sqlite:register.sqlite');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// get json string from javascript 
$post = file_get_contents('php://input');

// convert the string and puts it into an object for us 
$user = json_decode($post); 




$query = "DELETE FROM users WHERE id = :id";

$params = array(
    ':id' => $user->id
);

$stmt = $dbh->prepare($query);

$stmt->execute($params);






if($dbh->lastInsertId()){
    $success = ['success' => 'User added to database'];
    // convert array to string to echo for Javascript 
    echo json_encode($success);
} else {
    $error = ['error' => 'There was a problem adding the user to the database'];
    // convert array to string to echo for Javascript 
    echo json_encode($error);
}

die;

