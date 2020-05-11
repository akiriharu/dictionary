<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorisation, X-Requested-With');


include_once '../../config/dbh.php';
include_once '../../model/spanish.php';
include_once '../../model/english.php';

$database = new Dbh();
$db = $database->connect();

$lSpanish = new Spanish($db);
$lEnglish = new English($db);


$enPhrase = $_GET['enPhrase'];
$phrase = $_GET['phrase'];

$lEnglish->phrase = $enPhrase;
$english_id = $lEnglish->getId($enPhrase);

$lSpanish->phrase = $phrase;
$lSpanish->english_id = $english_id;




if($lSpanish->createPhrase()){
    echo json_encode(
         array('message' => 'Phrase Created')
    );
}else {
    echo json_encode(
        array('message' => 'Phrase Not Created')
    );
}