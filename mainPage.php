<?php
// Turn on error reporting:
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    <style><?php cssRules()?></style>
</head>
<body>
    <h1>Homepage</h1>
    <?php 
    
    // Have a table to display current products
    genTable(7);


    //testing associate array
    // $header = array("productname", "stock", "sold");
    // $cars = array ("shoes", "100", "100");
    // $arr = createAssocArray($header, $cars);
    // createTables($arr);
    echo "<br>opening file<br>";
    $file = "testdata.csv";
    $arr = readThisFile($file);
    // $assArr = createAssocArray($arr[headersArray], $arr[valuesArray]);
    // echo $arr[0][0];
    createTable($assArr);

    echo "<br>";
    //get product name
    getProductName();
    getProductDescription();
    // getDBData('product_name');
    
    //gets product from database using database function
    $product = getDBData('product_name');
    $image = getDBData('image_name');
    //gets product_name array of item
    $item = $product['product_name'];
    $url = $image['image_name'];
    // Names of products should be a hyperlink, than when clicked, will lead the user to the specific product page    
    echo "<h1>$item</h1>";
    echo "<img src=$url>";
    
    ?>
    
    
    
</body>
</html>
    
    
    
    