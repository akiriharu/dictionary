<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/dbh.php';
include_once '../../model/english.php';
include_once '../../model/spanish.php';

$database = new Dbh();
$db = $database->connect();

$lEnglish = new English($db);

$result = $lEnglish->getPhrases();
$num = $result->rowCount();

if($num > 0) {
$lEn_array = array();
$lEn_array['data'] = array();
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $lEnPhrase = array(
        'id' => $id,
        'phrase' => $phrase
    );

    array_push($lEn_array['data'], $lEnPhrase);

}

echo json_encode($lEn_array);
} else {
    echo json_encode(
        array('message' => 'No Englsh phrase found')
    );
}




?>