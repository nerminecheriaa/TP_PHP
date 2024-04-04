<?php

class User{
   private $table_name;
   private $conn;

   private $telephone;
   private $email;
   private $nom;

   function __construct($db_conn){
     $this->conn = $db_conn;
     $this->table_name = "utilisateur";
   }

   function insert($data){
    try {
       $sql = 'INSERT INTO '. $this->table_name.'(telephone,email,password,nom) VALUES(?,?,?,?)';
       $stmt = $this->conn->prepare($sql);
       $res = $stmt->execute($data);
       return $res;
    }catch(PDOException $e){
          return 0;
    }
}
    function phone_unique($telephone){
    try {
       $sql = 'SELECT telephone FROM '. $this->table_name.' WHERE telephone=?';
       $stmt = $this->conn->prepare($sql);
       $res = $stmt->execute([$telephone]);
       if($stmt->rowCount() > 0) 
           return 0;
       else return 1;
    }catch(PDOException $e){
          return 0;
    }
}

function auth($telephone, $password){
    try {
        $sql = 'SELECT * FROM ' .$this->table_name.' WHERE telephone=?';
        $stmt = $this->conn->prepare($sql);
        $res = $stmt->execute([$telephone]);
        
        if($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $db_nom = $user["nom"];
            $db_password = $user["password"];
            $db_email = $user["email"];
            $db_telephone = $user["telephone"];
            
            if($db_telephone == $telephone ) {
                
                if (password_verify($password, $db_password)) {
                    $this->nom =  $db_nom;
                    $this->telephone =  $db_telephone;
                    $this->email =  $db_email;
                    return 1; // Authentication successful
                } else {
                    echo "Password verification failed."; // Debugging statement
                    return 0; // Incorrect password
                }
            } else {
                echo "Telephone number mismatch."; // Debugging statement
                return 0; // Telephone number doesn't match
            }
        } else {
            echo "No user found for the given telephone number."; // Debugging statement
            return 0; // No user found
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); // Debugging statement
        return 0; // Error occurred
    }
}


function getUser(){
    $data = array('telephone' => $this->telephone,
                  'email' => $this->email,
                  'nom' => $this->nom);
                  
    return $data;
 }

}