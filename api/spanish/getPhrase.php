<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/dbh.php';
include_once '../../model/spanish.php';

$database = new Dbh();
$db = $database->connect();

$lSpanish = new Spanish($db);

$lSpanish->english_id = isset($_GET['english_id']) ? $_GET['english_id'] : die();

$lSpanish->getPhrase();

$lSp_array = array(
    'id' => $lSpanish->id,
    'phrase' => $lSpanish->phrase,
    'english_id' => $lSpanish->english_id
);

print_r(json_encode($lSp_array));