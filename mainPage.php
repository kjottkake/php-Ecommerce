<?php
// Turn on error reporting:
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include "classes/class_Product.php";
include "classes/class_User.php";
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
    <?php
    $user = new User();
    $userName = $user->getUser();

    
    echo "<h1>Hello $userName, welcome back to Jixpress!</h1>"; 
    // Have a table to display current products
    $tableName = "products";    //sets variable for table to access
    $object = new Product();    //creates new Product Object
    $tableData = $object->readTable($tableName); //reads table from readTable() and puts into varible
    $object->displayProducts($tableData);  //displays products using displayProducts

    // Names of products should be a hyperlink, than when clicked, will lead the user to the specific product page    

    
    ?>
    
    
    
</body>
</html>
    
    
    
    