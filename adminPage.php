<?php
// Turn on error reporting:
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "functions.php";
include "classes/class_Database.php";
include "classes/class_Product.php";

displayNavBar();

if(isset($_POST['submit'])){
    if ($_POST['submit'] == 'Delete'){
    deleteRows();
    }
  }

function deleteRows(){

    $connection = mysqli_connect('localhost', 'root', 'root', 'ecommerce');
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    $id = $_POST['id'];

    // making the query to be sent to database
    $query = "DELETE FROM products ";
      
    // where to delete them 
    $query .= " WHERE product_id = $id "; 
    // WHERE is a mysql command, to signify which id to update the data to.

    echo $query."<br>";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed!" . mysqli_error($connection));
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
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Hey cool dude, you're at the admin pageasdfadf</h1>
    <?php
    
    // Have a table to display current products
    $tableName = "products";
    $object = new Product();
    $tableData = $object->readTable($tableName);
    $object->displayProducts($tableData);

    // Add a form  to create a new product
    $object->getNewItem();
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
                
                <!-- <input class="btn btn-primary" type="submit" name="submit" value="Submit" > -->
            </form>
        </div>   
    </div>
    <?php
    // Add functionality to delete an existing product
    ?>
    <h2>
        Delete Item
    </h2>
    <form action="adminPage.php" method="post">
        <div class="form-group">
                    <select name="id" id="">
                    <?php
                        
                        showAllData();
                    ?>
                    </select>
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="Delete" >
    </form>
</body>
</html>