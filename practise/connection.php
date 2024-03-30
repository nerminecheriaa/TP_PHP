<?php 

$dbname="books";
$dbuser="books";
$dbpass="password";
$dbhost="localhost";


try{
        $pdo = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpass);
}
catch( PDOException $e){
        echo " connection failed ". $e->getMessage();
}




?>