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
        $stmt = $db->prepare($query);         
        $stmt->execute([$tablename, $tablename, $tablename, $pattern]);
        $num = $stmt->rowCount();
        if($num > 0) {
           $p_array = array();
           $p_array['data'] = array();
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              $lPhrase = array(
                'phrase' => $phrase,
                'phraseSp' => $phraseSp
              );
              array_push($p_array['data'], $lPhrase);
            }
          echo json_encode($p_array);
        } else {
          echo json_encode(
           array('message' => 'No Englsh phrase found')
             );
        }
    break;
    case "french" : 
        $query = 'SELECT english.phrase, '.$tablename.'.phraseFr
        FROM english
        LEFT JOIN '.$tablename.' ON english.id = '.$tablename.'.english_id
        WHERE english.phrase LIKE "'.$pattern.'%"';
        $stmt = $db->prepare($query);         
        $stmt->execute([$tablename, $tablename, $tablename, $pattern]);
        $num = $stmt->rowCount();
        if($num > 0) {
           $p_array = array();
           $p_array['data'] = array();
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              $lPhrase = array(
                'phrase' => $phrase,
                'phraseFr' => $phraseFr
              );
              array_push($p_array['data'], $lPhrase);
            }
          echo json_encode($p_array);
        } else {
          echo json_encode(
           array('message' => 'No Englsh phrase found')
             );
        }
    break;
    case "german" : 
        $query = 'SELECT english.phrase, '.$tablename.'.phraseGr
        FROM english
        LEFT JOIN '.$tablename.' ON english.id = '.$tablename.'.english_id
        WHERE english.phrase LIKE "'.$pattern.'%"';
        $stmt = $db->prepare($query);         
        $stmt->execute([$tablename, $tablename, $tablename, $pattern]);
        $num = $stmt->rowCount();
        if($num > 0) {
           $p_array = array();
           $p_array['data'] = array();
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              $lPhrase = array(
                'phrase' => $phrase,
                'phraseGr' => $phraseGr
              );
              array_push($p_array['data'], $lPhrase);
            }
          echo json_encode($p_array);
        } else {
          echo json_encode(
           array('message' => 'No Englsh phrase found')
             );
        }
    break;
    case "russian" : 
        $query = 'SELECT english.phrase, '.$tablename.'.phraseRu
        FROM english
        LEFT JOIN '.$tablename.' ON english.id = '.$tablename.'.english_id
        WHERE english.phrase LIKE "'.$pattern.'%"';
        $stmt = $db->prepare($query);         
        $stmt->execute([$tablename, $tablename, $tablename, $pattern]);
        $num = $stmt->rowCount();
        if($num > 0) {
           $p_array = array();
           $p_array['data'] = array();
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              $lPhrase = array(
                'phrase' => $phrase,
                'phraseRu' => $phraseRu
              );
              array_push($p_array['data'], $lPhrase);
            }
          echo json_encode($p_array);
        } else {
          echo json_encode(
           array('message' => 'No Englsh phrase found')
             );
        }
    break;
    default : 
        echo "The tablename is incorrect.";
}




 