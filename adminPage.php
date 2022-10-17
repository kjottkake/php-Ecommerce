<?php
include "functions.php";
include "classes/class_Database.php";
displayNavBar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce - Admin Area </title>
</head>
<body>
    <h1>Hey cool dude, you're at the admin pageasdfadf</h1>
    <h2>test</h2>
    <p>lol</p>
    <?php
    
    testNuts();
    testNuts();
    // Have a table to display current products
    echo "<table>";
    // Add a form  to create a new product
    // Add functionality to delete an existing product
    ?>

    <!-- db area  -->
    <?php
    echo "Database section: ";

    // Creating new database object
    // $db = new Database;

    // $db->connect();
    dbConnectTester();


    ?>
    <h2>Add New Item</h2>
    <div class="container">
        
        <div class="col-sm-6">
            
            <form action="login_create.php" method="post">
                <div class="form-group">
                    <label for="product_name">Product Name</label> 
                    <input type="text" name="product_name" class="form-control">
                    
                </div>
                
                <div class="form-group">
                    <label for="image_name">Image Url</label>
                    <input type="text" name="image_name" class="form-control">
                    
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control">
                    
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control">
                    
                </div>
                
                <input class="btn btn-primary" type="submit" name="submit" value="Submit" >
                
                
            </form>
            
        </div>
        
        
    </div>
   
</body>
</html>