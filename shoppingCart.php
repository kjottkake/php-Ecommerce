<?php
// Turn on error reporting:
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "functions.php";
// include "classes/class_Order.php";
include "classes/class_Product.php";

displayNavBar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce - Shopping Cart </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php 
    $obj = new Product;

    // Displays the current items in the shopping cart. 
    $jsonDataFromFile = file_get_contents("./data/shoppingCart.json");
    $jsonObj = json_decode($jsonDataFromFile, true);
    // var_dump($jsonObj);
    $total = 0;
    foreach($jsonObj as $key => $value){
        echo '<br>Item ID: ' . $value["product_id"] ;
        echo 'Quantity: ' . $value["quantity"] . '<br>';
        $total = $value["quantity"] + $total;
        $objData = $obj->getIndividualItem($value["product_id"]);
        $obj->displayProducts($objData);  
    }

    // Cookie can be used to store product ID and quantity of the products in the shopping cart. 
    // Add a button for "Pay", when clicked, a form should appear for the customer to fill in his details, with a final button named "confirm Pay", which adds the order onto the database. 
    // After the order has been added to the database, cookie for the shopping cart should be destroyed. 
    echo "<h1>Current Items in Cart: $total</h1>";    
    ?>
    
    
    
    
</body>
</html>