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
    $deleteObj = new Product;
    $deleteObj->deleteProduct();
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
                
                <input class="btn btn-primary" type="submit" name="submit" value="Submit" >
            </form>
        </div>   
    </div>
    <!-- deleting item -->
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