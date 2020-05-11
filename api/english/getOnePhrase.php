<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/dbh.php';
include_once '../../model/english.php';

$database = new Dbh();
$db = $database->connect();

$lEnglish = new English($db);

$lEnglish->id = isset($_GET['id']) ? $_GET['id'] : die();

$lEnglish->getOnePhrase();

$lEn_array = array(
    'id' => $lEnglish->id,
    'phrase' => $lEnglish->phrase
);

print_r(json_encode($lEn_array));