<?php

header('Content-Type: application/json');

$dbh = new PDO('sqlite:register.sqlite');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$query = "SELECT * from users";

$stmt = $dbh->prepare($query);



$stmt->execute();

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
die;