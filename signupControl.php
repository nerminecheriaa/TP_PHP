<?php
include "classes/Validation.php";
include "classes/Util.php";
include "database/dbh.php";
include "classes/User.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nom = Validation::clean($_POST["name"]);
    $telephone = Validation::clean($_POST["phone"]);
    $email = Validation::clean($_POST["email"]);
    $password = Validation::clean($_POST["password"]);
	$re_password = Validation::clean($_POST["re_password"]);

    $data = "&name=".$nom."&phone=".$telephone."&email=".$email;

    if (!Validation::name($nom)){
        $em = "Invalid name";
            Util::redirect("signup.php", "error", $em, $data);
    }
    else if (!Validation::phone($telephone)) {
    	$em = "Invalid phone number";
	        Util::redirect("signup.php", "error", $em, $data);
    }
    else if (!Validation::email($email)) {
    	$em = "Invalid email";
	        Util::redirect("signup.php", "error", $em, $data);
    }
    else if(!Validation::password($password)){
    	$em = "Invalid Password(minimum 4 characters,at least one uppercase,one lowercase,one digit,one special character)";
	    Util::redirect("signup.php", "error", $em, $data);
    }
    else if(!Validation::match($password, $re_password)){
    	$em = "Password and confirm password not match";
	    Util::redirect("signup.php", "error", $em, $data);
    }
    else{
        $db= new Dbh();
        $conn= $db->getPdo();
        $user = new User($conn);
        if($user->phone_unique($telephone)){
                // password hash
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user_data = [$telephone,$email,$password,$nom];
            $res = $user->insert($user_data);
            if ($res) {
                $sm = "Successfully registered!";
             Util::redirect("login.php", "success", $sm, $data);
            }else {
                $em = "An error occurred";
             Util::redirect("signup.php", "error", $em, $data);
            }
        }else {
            $em = "the phone number is already taken";
         Util::redirect("signup.php", "error", $em, $data);
 
        }
     }


}else{
    $em = "An error occurred";
    Util::redirect("signup.php","error", $em);
   
}