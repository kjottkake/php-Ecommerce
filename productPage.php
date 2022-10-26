<?php
include "functions.php";
include "classes/class_Product.php";
displayNavBar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce - Product Page </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <style><?php cssRules()?></style>
</head>
<body>
    
    <?php 
    $tableName = "products";
    $productObj = new Product;
    $dbObj = new Database;

    $arr = $productObj->readFromTable($tableName);
    $obj->displayProducts($arr);
    // Display specific information about product selected in the previous page. 
    // Note that the product page can only be accessed from the main page. 
    // Add a form : with a select field to choose quantity, and a submit button named "Add to cart", which will populate the shopping cart. 
    // Shopping cart information can be preserved in a cookie. If the user closes the browser and reopens the page, the shopping cart information can be repopulated from the cookie. 
    // Modify the shopping cart link in the navigation bar when an item is added to it. 
    
    
    ?>
    
    
    
</body>
</html>
    