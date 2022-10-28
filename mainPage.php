<?php
// Turn on error reporting:
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "classes/class_Product.php";
include "functions.php";

displayNavBar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce - Main Page </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Homepage</h1>
    <?php 
    $tableName = "products";
    $object = new Product();
    $tableData = $object->readTable($tableName);
    $object->displayProducts($tableData);
    
    // Have a table to display current products
    

    // Names of products should be a hyperlink, than when clicked, will lead the user to the specific product page    

    
    ?>
    
    
    
</body>
</html>
    
    
    
    