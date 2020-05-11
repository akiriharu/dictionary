<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorisation, X-Requested-With');


include_once '../../config/dbh.php';
include_once '../../model/english.php';
include_once '../../model/spanish.php';
include_once '../../model/french.php';
include_once '../../model/german.php';
include_once '../../model/russian.php';

$database = new Dbh();
$db = $database->connect();

$tablename = $_GET['tablename'];
$pattern = $_GET['pattern'];
switch($tablename){
    case "spanish" : 
        $query = 'SELECT english.phrase, '.$tablename.'.phraseSp
        FROM english
        LEFT JOIN '.$tablename.' ON english.id = '.$tablename.'.english_id
        WHERE english.phrase LIKE "'.$pattern.'%"';
    break;
    case "french" : 
        $query = 'SELECT english.phrase, '.$tablename.'.phraseFr
        FROM english
        LEFT JOIN '.$tablename.' ON english.id = '.$tablename.'.english_id
        WHERE english.phrase LIKE "'.$pattern.'%"';
    break;
    case "german" : 
        $query = 'SELECT english.phrase, '.$tablename.'.phraseGr
        FROM english
        LEFT JOIN '.$tablename.' ON english.id = '.$tablename.'.english_id
        WHERE english.phrase LIKE "'.$pattern.'%"';
    break;
    case "russian" : 
        $query = 'SELECT english.phrase, '.$tablename.'.phraseRu
        FROM english
        LEFT JOIN '.$tablename.' ON english.id = '.$tablename.'.english_id
        WHERE english.phrase LIKE "'.$pattern.'%"';
    default : 
        echo "The tablename is incorrect.";
}



$stmt = $db->prepare($query);
         
$result = $stmt->execute([$tablename, $tablename, $tablename, $pattern]);
$num = $stmt->rowCount();

if($num > 0) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($rows);

} else {
    echo json_encode(
        array('message' => 'No phrases found')
    );
}