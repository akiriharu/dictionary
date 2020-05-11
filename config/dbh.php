<?php

class Dbh {
   private $host = "localhost";
   private $user = "root";
   private $pwd = "";
   private $dbName = "dictionary";
   private $conn;

   public function connect(){
       $this->conn = null;
    try{  
       $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
       $this->conn = new PDO($dsn, $this->user, $this->pwd);
       $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    } catch(PDOException $e){
        echo 'Conncetion Error: ' .$e->getMessage();
    }
    return $this->conn;
    }
}

?>