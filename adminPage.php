<?php
// Turn on error reporting:
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "functions.php";
include "classes/class_Database.php";
include "classes/class_Product.php";

$tableName = "products";
$object = new Product();
$tableData = $object->readTable($tableName);
$object->displayProducts($tableData);


displayNavBar();

//OLD FUNCTIONS;
postToDB();
// connectAndRetrieve();
// $object = new Database;

//function post to DB 
function postToDB() {
    if(isset($_POST['submit'])) {
        echo "yes, information received"."<br>";
        
        $product_name = $_POST['product_name'];
        $image_name = $_POST['image_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        
        // basic form data validation
        if($product_name  && $image_name && $description && $price){
        
            echo $product_name."<br>";
            echo $image_name."<br>";
            echo $description."<br>";
            echo $price."<br>";
    
            // connect to localhost, default username = root ; default password = root
            // 'loginapp' in this case is our database. 
    
            $connection = mysqli_connect('localhost', 'root', 'root', 'ecommerce');
    
            if($connection) {
                echo "We are connected";
            } else {
                die ("Database connection failed!");
            } 
            
            //query the database
            $query = "INSERT INTO products(product_id,product_name,image_name,description,price)";
            $query .= "VALUES (NULL, '$product_name', '$image_name', '$description', '$price')";
            
            $result = mysqli_query($connection, $query);
            
            // printing error message in case of query failure
            if(!$result){
                die('Query failed!' . mysqli_error());
            }
        //else statement if the content fields are blank    
        } else{
            
            echo "<br>"."The content fields cannot be blank!";
        }
    }
}


function connectAndRetrieve(){
    /*
    CONNECTING TO PRODUCTS AND GETTING DATA FROM PRODUCTS
    */
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'ecommerce';

    // creating a connection to database
    $connection = mysqli_connect($host,$username,$password,$database);

    if($connection){
        echo "We are connected<br>";
    }else {
        die ("Database connection failed");
    }

    //query the database
    $query = "SELECT product_id,product_name,image_name,description,price FROM products";

    $result = mysqli_query($connection, $query);
            
    // printing error message in case of query failure
    if(!$result){
        die('Query failed!' . mysqli_error($connection));
    }else {
        echo "Entries Retrieved!<br>";
    }

    //read 1 row at a time

    while($row=mysqli_fetch_assoc($result)){
        print_r($row);echo "<br>";
    }

    mysqli_close($connection);
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

    /*
    BEGIN OBJECT ORIENTED PROGRAMMING MADNESS
    */

    //END OOPROG



    // Add a form  to create a new product



    // Add functionality to delete an existing product
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
   
</body>
</html>