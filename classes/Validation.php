<?php
class Validation{
    static function clean($str){
    $str = trim($str); //supprime les espaces
    $str = stripcslashes($str);// supprime les barres obliques inverses 
    $str = htmlspecialchars($str);
    return $str;    
    }

    static function name($str){
        //letters only
        $name_regex = "/^([a-zA-Z' ]+)$/";
		if (preg_match($name_regex, $str)) //pour vérifier si la chaîne de caractères $str correspond au motif regex défini dans $name_regex
			return true;
        else return false;
    }

	static function phone($phone) {
		// Vérifie si la chaîne contient uniquement 8 chiffres 
		$phone_regex = "/^[0-9]{8}$/";
		
		// Utilise la fonction preg_match pour vérifier si le numéro de téléphone correspond au motif regex
		if (preg_match($phone_regex, $phone)) {
			return true; // Le numéro de téléphone est valide
		} else {
			return false; // Le numéro de téléphone n'est pas valide
		}
	}

    static function email($str){
		if (filter_var($str, FILTER_VALIDATE_EMAIL)) //fct php pour valider une adresse e-mail
			return true;
    else return false;
	}

    static function password($str){
		/*
	     -> Has minimum 4 characters in length. 
	    -> At least one uppercase English letter. (?=.*?[A-Z])
	     At least one lowercase English letter.  (?=.*?[a-z])
	    -> At least one digit. (?=.*?[0-9])
	    -> At least one special character, (?=.*?[#?!@$%^&*-])
        
    	*/
		$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/"; 

		if (preg_match($password_regex, $str)) 
			return true;
        else return false;
	}
    static function match($str1, $str2){
		if ($str1 === $str2) 
			return true;
        else return false;
	}

}