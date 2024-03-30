<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="loginStyle.css">

</head>
<body>
   
<div class="bg-img">  
    
    <div id="form-container">
        <div id="form-inner-container">
        <div id="sign-up-container">

        <img src="src/logo.png" alt="Company Logo" class="logo-img">
        <div class="signup-heading">Sign in</div>
        
            <form method="POST"  >

   
        <div class="mb-3">

            
            <label for="exampleInputemail" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail address" placeholder="Email">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">

            <input type="submit" id='submit' value='LOGIN' name='ajouter' >

        </div>
        <div class="signup-link">Not a member? <a href="signup.php"> Sign up now</a>
        </div>

    </form>
        </div>
        </div>
</div>
</div>         

    
        
    
</body>
</html>