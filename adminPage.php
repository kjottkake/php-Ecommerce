<?php
include "functions.php";
include "classes/class_Database.php";
displayNavBar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce - Admin Area </title>
</head>
<body>
    <h1>Hey cool dude, you're at the admin pageasdfadf</h1>
    <h2>test</h2>
    <p>lol</p>
    <?php
    
    testNuts();
    testNuts();
    // Have a table to display current products
    echo "<table>"
    // Add a form  to create a new product
    
    // Add functionality to delete an existing product
    
    
    
    ?>

    <!-- db area  -->
    <?php
    echo "Database section: ";

    // Creating new database object
    $db = new Database;

    $db->connect();

    // $host = 'localhost';
    // $username = 'root';
    // $password = 'root';
    // $database = 'loginapp';

    // $connection = mysqli_connect($host,$username,$password,$database);

    // if($connection){
    //     echo "We are connected<br>";
    // }else {
    //     die ("Database connection failed");
    // }


    ?>

</body>
</html>