<?php
class English {
    //db properties
     private $conn;
     private $table = 'english';
     
    //English table properties
      public $id;
      public $phrase;

    //Constructor
     public function __construct($db){
        $this->conn = $db;
     }
   //set method
     public function createPhrase(){
        $query = 'INSERT INTO '.$this->table.' 
                         SET phrase = :phrase';
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->phrase = htmlspecialchars(strip_tags($this->phrase));
        
        $stmt->bindParam('phrase', $this->phrase);
       
        
        if($stmt->execute()){
           return true;
        } 
         printf("Error: %s.\n", $stmt->error);

         return false;


     }

   //get methods
     public function getPhrases(){
        $query = 'SELECT * FROM '.$this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute([]);

        return $stmt;
     }

     

     //do not use
     public function getOnePhrase(){
        $query = 'SELECT * FROM ' .$this->table. ' where id = ?';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->phrase = $row['phrase'];
     }

     public function getId($enPhrase){
        $query = 'SELECT * FROM '.$this->table.' WHERE phrase = ?';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $enPhrase);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];

        return $this->id;

     }
}