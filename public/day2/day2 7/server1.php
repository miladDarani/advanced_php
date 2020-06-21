<?php

// default content-type text/html

header('Content-Type: application/json');

echo json_encode($_GET);