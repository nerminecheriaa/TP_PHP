<?php
session_start();
include "classes/Util.php";
if(isset($_SESSION['nom'])&& isset($_SESSION['telephone']))
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet" 
	      type="text/css" 
	      href="loginStyle.css">
</head>
<body>
    <div id="form-container">
        <div id="form-inner-container">
        <div id="sign-up-container">
   <h2>Welcome <?=$_SESSION['nom']?></h2>

   <form method="GET" action="main feed/index.php" >
        
   <input type="submit" id='submit' value='MAINFEED'>

    </form>
   
   <form method="Get" action="LOGOUT.php" >
        
        <input type="submit" id='submit' value='LOGOUT'>

    </form>

</body>
</html>

<?php }else {
    $em="first login";
    Util::redirect("login.php", "error", $em);} ?>