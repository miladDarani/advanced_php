<?php

if('POST' != $_SERVER['REQUEST_METHOD']) {
    $error = ['error' => 'Unsuported Request Method'];
    echo json_encode($error);
    die;
}

$dbh = new PDO('sqlite:register.sqlite');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Get json string from javascript
// $post = file_get_contents('php://input');

// Convert json string to Object
// $user = json_decode($post);

// The rest is standard PHP
$query = "INSERT INTO users 
          (first, last, email) 
          VALUES 
          (:first, :last, :email)";

$stmt = $dbh->prepare($query);

$params = array(
    ':first' => $_POST['first'],
    ':last' => $_POST['last'],
    ':email' => $_POST['email']
);

$stmt->execute($params);

if($dbh->lastInsertId()) {
    $success = ['success' => 'User added to database'];
    // Convert array to string to echo for Javascript
    echo json_encode($success);
} else {
    $error = ['error' => 'There was a problem adding the user to the database'];
    // Convert array to string to echo for Javascript
    echo json_encode($error);
}

die;

