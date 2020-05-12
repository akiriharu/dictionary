<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorisation, X-Requested-With');


include_once '../config/dbh.php';
include_once '../model/english.php';
include_once '../model/spanish.php';
include_once '../model/french.php';
include_once '../model/german.php';
include_once '../model/russian.php';

$database = new Dbh();
$db = $database->connect();

$tablename = $_POST['tablename'];
$pattern = $_POST['pattern'];
$phrases = preg_split('/[.?!]/', $pattern, 0, PREG_SPLIT_NO_EMPTY);

switch($tablename){
    case "spanish" : 
        $result = array();
        foreach($phrases as $phr){ 
        $phr1 = preg_replace('/^[ \t]+/', "", $phr);
        $query = 'SELECT spanish.phraseSp
        FROM english
        RIGHT JOIN spanish ON english.id = spanish.english_id
        WHERE english.phrase = :phrase';
        $stmt = $db->prepare($query); 
        $stmt->bindParam('phrase', $phr1);        
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num > 0) {
           $phr_array = $stmt->fetch();
           
           $result[$phr1] = $phr_array['phraseSp'];

        } else {
            $result[$phr1] = null;
        } 
      }
       echo json_encode($result);
    break;
    case "french" : 
      $result = array();
      foreach($phrases as $phr){ 
      $phr1 = preg_replace('/^[ \t]+/', "", $phr);
      $query = 'SELECT french.phraseFr
      FROM english
      RIGHT JOIN french ON english.id = french.english_id
      WHERE english.phrase = :phrase';
      $stmt = $db->prepare($query); 
      $stmt->bindParam('phrase', $phr1);        
      $stmt->execute();
      $num = $stmt->rowCount();
      if($num > 0) {
         $phr_array = $stmt->fetch();
         
         $result[$phr1] = $phr_array['phraseFr'];

      } else {
          $result[$phr1] = null;
      } 
    }
     echo json_encode($result);
    break;
    case "german" : 
      $result = array();
      foreach($phrases as $phr){ 
      $phr1 = preg_replace('/^[ \t]+/', "", $phr);
      $query = 'SELECT german.phraseGr
      FROM english
      RIGHT JOIN german ON english.id = german.english_id
      WHERE english.phrase = :phrase';
      $stmt = $db->prepare($query); 
      $stmt->bindParam('phrase', $phr1);        
      $stmt->execute();
      $num = $stmt->rowCount();
      if($num > 0) {
         $phr_array = $stmt->fetch();
         
         $result[$phr1] = $phr_array['phraseGr'];

      } else {
          $result[$phr1] = null;
      } 
    }
     echo json_encode($result);
    break;
    case "russian" : 
      $result = array();
      foreach($phrases as $phr){ 
      $phr1 = preg_replace('/^[ \t]+/', "", $phr);
      $query = 'SELECT russian.phraseRu
      FROM english
      RIGHT JOIN russian ON english.id = russian.english_id
      WHERE english.phrase = :phrase';
      $stmt = $db->prepare($query); 
      $stmt->bindParam('phrase', $phr1);        
      $stmt->execute();
      $num = $stmt->rowCount();
      if($num > 0) {
         $phr_array = $stmt->fetch();
         
         $result[$phr1] = $phr_array['phraseRu'];

      } else {
          $result[$phr1] = null;
      } 
    }
     echo json_encode($result);
    break;
    default : 
        echo "The tablename is incorrect.";
}




 