<?php
include "functions.php";
include "classes/class_Database.php";
displayNavBar();


if(isset($_POST['submit'])) {
    echo "yes, information received"."<br>";
    
    
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    $product_name = $_POST['product_name'];
    $image_name = $_POST['image_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    // basic form data validation
    if($product_name  && $image_name && $description && $price){
    
        echo $product_name."<br>";
        echo $image_name."<br>";
        echo $description."<br>";
        echo $price."<br>";

        // connect to localhost, default username = root ; default password = root
        // 'loginapp' in this case is our database. 

        $connection = mysqli_connect('localhost', 'root', 'root', 'ecommerce');

        if($connection) {
            echo "We are connected";
        } else {
            die ("Database connection failed!");
        } 
        
        //query the database
        $query = "INSERT INTO products(product_id,product_name,image_name,description,price)";
        $query .= "VALUES (NULL, '$product_name', '$image_name', '$description', '$price')";
        
        $result = mysqli_query($connection, $query);
        
        // printing error message in case of query failure
        if(!$result){
            die('Query failed!' . mysqli_error());
        }

        
        
        
    } else{
        
        echo "<br>"."The content fields cannot be blank!";
    }
    
 
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce - Admin Area </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <style><?php cssRules()?></style>
</head>
<body>
    <h1>Hey cool dude, you're at the admin pageasdfadf</h1>
    <?php
    
    // Have a table to display current products
    // Add a form  to create a new product
    // Add functionality to delete an existing product
    ?>

    <!-- db area  -->
    <?php

    //Test Code::::::
    // echo "Database section: ";
    // dbConnectTester();


    ?>
    <h2>Add New Item</h2>
    <div class="container">
        
        <div class="col-sm-6">
            
            <form action="adminpage.php" method="post">
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