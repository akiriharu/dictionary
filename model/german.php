<?php
 
class German {
    //db properties
     private $conn;
     private $table = 'german'; 

    //German table properties
     public $id;
     public $phrase;
     public $english_id;

    //Constructor
     public function __construct($db){
      $this->conn = $db;
     }
    //set method
     public function createPhrase(){
        $query = 'INSERT INTO '.$this->table.'
            SET phraseGr = :phrase,
            english_id = :english_id';
        $stmt = $this->conn->prepare($query);
      //clean data
        $this->phrase = htmlspecialchars(strip_tags($this->phrase));
        $this->english_id = htmlspecialchars(strip_tags($this->english_id));
        

        $stmt->bindParam('phrase', $this->phrase);
        $stmt->bindParam('english_id', $this->english_id);

        if($stmt->execute()){
         return true;
        } 
         printf("Error: %s.\n", $stmt->error);

         return false;
        }
        
    //get method
        public function getPhrase(){
        $query = 'SELECT * FROM '.$this->table.' WHERE english_id = :id';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->english_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->phrase = $row['phrase'];
        }
}

?>