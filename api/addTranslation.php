<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorisation, X-Requested-With');


include_once '../config/dbh.php';
include_once '../model/spanish.php';
include_once '../model/english.php';
include_once '../model/french.php';
include_once '../model/german.php';
include_once '../model/russian.php';

$database = new Dbh();
$db = $database->connect();

$lEnglish = new English($db);

$enPhrase = $_POST['enPhrase'];
$tablename = $_POST['tablename'];
$phrase = $_POST['phrase'];


$english_id = $lEnglish->getId($enPhrase);

switch ($tablename) {
    case "spanish" : 
        $lSpanish = new Spanish($db);
        $lSpanish->phrase = $phrase;
        $lSpanish->english_id = $english_id;
        $bool = $lSpanish->createPhrase();
    break;
    case "french" : 
        $lFrench = new French($db);
        $lFrench->phrase = $phrase;
        $lFrench->english_id = $english_id;
        $bool = $lFrench->createPhrase();
    break;
    case "german" : 
        $lGerman = new German($db);
        $lGerman->phrase = $phrase;
        $lGerman->english_id = $english_id;
        $bool = $lGerman->createPhrase();
    break;
    case "russian" : 
        $lRussian = new Russian($db);
        $lRussian->phrase = $phrase;
        $lRussian->english_id = $english_id;
        $bool = $lRussian->createPhrase();
    break;
}

if($bool){
    echo json_encode(
        array('message' => 'Translation added')
    );
} else {
    echo json_encode(
        array('message' => 'Translation Not added')
    );
}

