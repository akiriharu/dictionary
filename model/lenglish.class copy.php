<?php
 
// class LEnglish extends Dbh{
//     //db properties
//      private $table = 'english'; 

//     // english table properties
//      public $id;
//      public $phrase;
    
//     //constructor
//     // public function __construct($db){
//       //  $this->conn = $db;  
//      //}

//     //set methods

//     public function setPhrase($enPhrase){
//         $query = 'INSERT INTO '.$this->table.'(phrase) VALUES (?)';
//         $stmt = $this->connect()->prepare($query);
//         $stmt->execute([$enPhrase]);
//     }
//     //get methods
//     public function getPhrase($english_id){
//         $query = 'SELECT phrase FROM '.$this->table.' WHERE id = ?';
//         $stmt = $this->connect()->prepare($query);
//         $stmt->execute([$english_id]);
//         // to get just one row 
//          $onePhrase = $stmt->fetch();
//          echo $onePhrase['phrase']. '<br>';
        
//         //to fetch all result 
//         /*$allPhrases = $stmt->fetchAll();

//         foreach ($allPhrases as $allPhrase){
//             echo $allPhrase['phrase'] . '<br>';
//         }*/
        
//     }

//     public function getId($enPhrase){
//         $query = 'SELECT id FROM' .$this->table. 'WHERE phrase = ?';
//         $stmt = $this->connect()->prepare($query);
//         $stmt->execute([$enPhrase]);
//         while($row = $stmt->fetch()){
//             echo $row['id']. '<br>';
//         }
//     }
// }

// ?>