<?php

if('POST' != $_SERVER['REQUEST_METHOD']) {
    $error = ['error' => 'Unsuported Request Method'];
    echo json_encode($error);
    die;
}

try {

$dbh = new PDO('sqlite:register.sqlite');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get json string from javascript
$post = file_get_contents('php://input');

// Convert json string to Object
$user = json_decode($post);

$query = "DELETE FROM users WHERE id = :id";

$params = array(
    ':id' => $user->id
);

$stmt = $dbh->prepare($query);

$stmt->execute($params);

} catch(Exception $e) {
    $error = ['error' => $e->getMessage()];
    echo json_encode($error);
    die;
}

$success = ['success' => 'Record deleted!'];
echo json_encode($success);

die;

