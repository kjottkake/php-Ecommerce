<?php
// Turn on error reporting:
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "functions.php";
include "classes/class_Product.php";
include "classes/class_Order.php";
displayNavBar();


// $obj = new Order;

//     $jsonDataFromFile = file_get_contents("./data/shoppingCart.json");
//     $jsonObj = json_decode($jsonDataFromFile, true);

//     foreach($jsonObj as $key => $value){
//     $product_id = $value["product_id"];
//     $quantity = $value["quantity"];
//     $obj->assembleOrder(1, $product_id, $quantity);
//     }

if (isset($_POST['submit'])) {
    $obj = new Order;

    $jsonDataFromFile = file_get_contents("./data/shoppingCart.json");
    $jsonObj = json_decode($jsonDataFromFile, true);

    foreach($jsonObj as $key => $value){
    $product_id = $value["product_id"];
    $quantity = $value["quantity"];
    $obj->assembleOrder(1, $product_id, $quantity);
    }
    //deletes json data
     file_put_contents("./data/shoppingCart.json", json_encode([]));
    // return;
    echo "Thanks for placing yoru order!";
    echo "<meta http-equiv='refresh' content='0'>";
}

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
    $totalItems = 0;

    echo "<h1>Items in Cart:</h1>";
    // foreach($jsonObj as $key => $value){
    //     echo '<br>Item ID: ' . $value["product_id"] ;
    //     echo 'Quantity: ' . $value["quantity"] . '<br>';
    //     $total = $value["quantity"] + $total;
    //     $objData = $obj->getIndividualItem($value["product_id"]);
    //     $obj->displayProducts($objData);  
    // }

    echo "<table>";
    $grandTotal = 0;
    foreach($jsonObj as $key => $value){
        $id = $value["product_id"];
        $itemPrice = $obj->getValue($id, "price");
        $itemName = $obj->getValue($id, 'product_name');
        $itemQuantity = $value["quantity"];
        $itemTotal = $itemPrice * $itemQuantity;

        //caculations
        $grandTotal = $grandTotal + $itemTotal;
        $totalItems = $totalItems + $itemQuantity;
        // echo '<br>Item ID: ' . $value["product_id"] ;   
        // echo  $obj->getValue($id, 'product_name');
        // echo " price:  ";
        // // echo $obj->getValue($id, 'product_name') . "Item name: ";
        // echo $obj->getValue($id, "price");
        // echo ' Quantity: ' . $value["quantity"] . '<br>';
        echo "<tr>";
        echo "<th>". $itemName ."<th>";
        echo "<th>". $itemPrice ."<th>";
        echo "<th>". $itemQuantity."<th>";
        echo "<th><b>". $itemTotal."</b><th>";
        echo "<tr>";    
    }
    echo "</table>";
    echo "<h1>Total: $grandTotal</h1>";
    echo "<h1>Current Items in Cart: $totalItems</h1>";  
    // Cookie can be used to store product ID and quantity of the products in the shopping cart. 
    // Add a button for "Pay", when clicked, a form should appear for the customer to fill in his details, with a final button named "confirm Pay", which adds the order onto the database. 
    // After the order has been added to the database, cookie for the shopping cart should be destroyed. 
      
    ?>
    <form action="shoppingCart.php" method="post">
    <div class="form-group">
                  <label for="firstname">first name</label> 
                  <input type="text" name="firstname" class="form-control">
                  
                </div>

                <div class="form-group">
                  <label for="lastname">last name</label> 
                  <input type="text" name="lastname" class="form-control">
                  
                </div>  
              
              
                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" name="address" class="form-control">
                    
                </div>

                <div class="form-group">
                    <label for="country">country</label>
                    <input type="text" name="country" class="form-control">
                    
                </div>
                
                <input class="btn btn-primary" type="submit" name="submit" value="Submit Order" >
                
    </form>

    
    
    <?php 
    // $obj = new Order;

    // $jsonDataFromFile = file_get_contents("./data/shoppingCart.json");
    // $jsonObj = json_decode($jsonDataFromFile, true);

    // foreach($jsonObj as $key => $value){
    // $product_id = $value["product_id"];
    // $quantity = $value["quantity"];
    // $obj->assembleOrder(1, $product_id, $quantity);
    // }

    //need to delete cookies and json
    // file_put_contents("./data/shoppingCart.json", json_encode([]));
    // echo "Thanks for placing yoru order!"
    ?>
    
</body>
</html>