<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorisation, X-Requested-With');


include_once '../config/dbh.php';
include_once '../model/english.php';

$database = new Dbh();
$db = $database->connect();

$lEnglish = new English($db);

// get raw data
$phrase = $_POST['phrase'];

 $lEnglish->phrase = $phrase;
if($lEnglish->createPhrase()){
    
    echo json_encode(
          array('message' => 'Phrase Created!')
    );
  }else {
    echo json_encode(
         array('message' => 'Phrase Not Created')
    ); 
}


