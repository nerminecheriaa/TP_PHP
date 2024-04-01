<?php
include "classes/Validation.php";
$name = $phone= $email ="";
if (isset($_GET["name"])) {
	$name = $_GET["name"];
}
if (isset($_GET["email"])) {
	$email = $_GET["email"];
}
if (isset($_GET["phone"])) {
	$phone = $_GET["phone"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="signupStyle.css">
</head>

<body>
    <div class="bg-img">
    <div id="form-container">
        <div id="form-inner-container">
        <div id="sign-up-container">

        <img src="src/logo.png" alt="Company Logo" class="logo-img">
        <div class="signup-heading">Sign Up</div>

        <?php
            if(isset($_GET['error'])) { ?>
                <p class="error"><?=Validation::clean($_GET['error'])?> </p>
        
        <?php } ?>
        <?php 
                if (isset($_GET['success'])) { ?>
                	<p class="success"><?=Validation::clean($_GET['success'])?></p>
        <?php } ?>

         <form   action ="signupControl.php" method="POST">

        <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputname" placeholder="Name" value="<?=$name?>">
        </div>

        <div class="mb-3">  
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" id="exampleInputphone" placeholder="phone" value="<?=$phone?>">
        </div>

        <div class="mb-3">  
            <label  class="form-label">Email address</label>
            <input type="text" class="form-control" name="email" id="exampleInputEmail address" placeholder="Email" value="<?=$email?>">
        </div>

        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
        </div>
        
        <div class="mb-3">
            <label  class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="re_password" id="exampleInputPassword1" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
        </div>
        
        <input type="submit" id='submit' value='Sign Up' >
        
      

    </form>
        </div>
        </div>
</div>
    </div> 
</body>
</html>