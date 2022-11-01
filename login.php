<?php
// Turn on error reporting:
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "classes/class_User.php";
include "functions.php";


displayNavBar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce - Login </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
    <?php 
    
    // First add a method in the User class for creating an admin account. This method should run only once, the first time, this page is loaded. Essentially, do a check on the database to check if an admin account exist. 
    
    // Implement login functionality here
    
    // Implement registration functionality instead, if a register hyperlink is clicked. 
    
    // HINT : You can toggle between login form or registration form on the same page, based on whether the register link was clicked or not. The login form should have a button to switch to the register form, while the register form should have a button switching back to the login form. 
    
    
    ?>

    <div class="container">
      
      <div class="col-sm-6">
          
          <form action="login_create.php" method="post">
                <div class="form-group">
                  <label for="username">Username</label> 
                  <input type="text" name="username" class="form-control">
                  
                </div>

                <div class="form-group">
                  <label for="email">Email</label> 
                  <input type="text" name="email" class="form-control">
                  
                </div>
              
              
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                    
                </div>
                
                <input class="btn btn-primary" type="submit" name="submit" value="Submit" >
                
                
          </form>
          
      </div>
      
      
  </div>
    
    
</body>
</html>