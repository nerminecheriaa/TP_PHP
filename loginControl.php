<?php
session_start();
include "classes/Validation.php";
include "classes/Util.php";
include "database/dbh.php";
include "classes/User.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $telephone = Validation::clean($_POST["phone"]);
    $password = Validation::clean($_POST["password"]);
 
    if (!Validation::phone($telephone)) {
    	$em = "Invalid phone number";
        Util::redirect("login.php", "error", $em);
    }
    
    else if(!Validation::password($password)){
    	$em = "Invalid Password(minimum 4 characters,at least one uppercase,one lowercase,one digit,one special character)";
	    Util::redirect("login.php", "error", $em);
    }
    
    else{
        $db= new Dbh();
        $conn= $db->getPdo();
        $user = new User($conn);
        $auth = $user->auth($telephone, $password);
        if($auth) {
            $user_data = $user->getUser();
            $_SESSION['nom'] = $user_data['nom'];
            $_SESSION['telephone'] = $user_data['telephone'];
            // Vérifier si c'est l'administrateur
            if ($telephone == '00000000') {
                $em="logged as admin";
                Util::redirect("admin/products.php", "success", $em);
            } else{
            $sm = "logged in!";
            Util::redirect("index2.php", "success", $sm);}
        }
        else{
            $em="Incorrect phone number or password";
            Util::redirect("login.php", "error", $em);
        }
        
     }


}else{
    $em = "An error occurred";
    Util::redirect("login.php","error", $em);
   
}

?>