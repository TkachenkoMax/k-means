<?php

require_once 'logic/App.php';

$app = new App($_POST);
$data = $app->handle();

echo json_encode($data);