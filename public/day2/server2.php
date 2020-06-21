<?php

//default content type is text for html

header('Content-Type: application/json');

echo json_encode($_POST);