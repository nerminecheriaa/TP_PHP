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
            <form method="POST"  action ="login.php">

   
            <div class="mb-3">

            
        <label for="exampleInputemail" class="form-label">Name</label>
        <input type="text" class="form-control" name="Name" id="exampleInputname" placeholder="Name">
        </div>

        <div class="mb-3">

            
            <label for="exampleInputemail" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email address" id="exampleInputEmail address" placeholder="Email">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="Confirm Password" id="exampleInputPassword1" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
        </div>
        
        <input type="submit" id='submit' value='Sign Up' >
        
      

    </form>
        </div>
        </div>
</div>
    </div> 
</body>
</html>