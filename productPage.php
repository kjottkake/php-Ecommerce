<?php
// Turn on error reporting:
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "functions.php";
include "classes/class_User.php";
include "classes/class_Product.php";
include "classes/class_Order.php";
displayNavBar();

// $id = 16;
// $obj = new Order;
// $obj->assembleOrder($id);

?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <title>Ecommerce - Product Page </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
    <?php 
    //check to see who's logged in
    $user = new User;
    $loggedInUser = $user->getUser();
    $pageUrl = $_GET['id'];

    // $id = 4;

    echo "<h1>product id $pageUrl </h1>";

    $obj = new Product;
    $objData = $obj->getIndividualItem($pageUrl);   
    $obj->displayProducts($objData);

    // Display specific information about product selected in the previous page. 
    // Note that the product page can only be accessed from the main page. 
    // Add a form : with a select field to choose quantity, and a submit button named "Add to cart", which will populate the shopping cart. 
    // Shopping cart information can be preserved in a cookie. If the user closes the browser and reopens the page, the shopping cart information can be repopulated from the cookie. 
    // Modify the shopping cart link in the navigation bar when an item is added to it.     
    // $obj = new Order;
    // $obj->assembleOrder($pageUrl);
    ?>
    <form action="productPage.php?id=<?php echo $pageUrl?>" method="post">
        <label for="quantity">Quantity (between 1 and 5):</label>
        <input type="number" id="quantity" name="quantity" min="1" max="5">
        <!-- <input type="submit" value="Submit"> -->
        <input class="btn btn-primary" type="submit" name="submit" value="Add To Cart" >
    </form>
    <?php
    //create new order
    $obj = new Order;
    $obj->assembleOrder($pageUrl);
    ?>
    
    
</body>
</html>
    