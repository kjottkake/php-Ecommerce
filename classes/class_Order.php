<?php 
require_once "class_Product.php";
class Order extends Product {
    protected function addOrder() {
        // if(isset($_POST['submit'])) {
        //     echo "yes, information received"."<br>";
            
        //     $product_name = $_POST['product_name'];
        //     $image_name = $_POST['image_name'];
        //     $description = $_POST['description'];
        //     $price = $_POST['price'];
            
        //     // basic form data validation
        //     if($product_name  && $image_name && $description && $price){
            
        //         echo $product_name."<br>";
        //         echo $image_name."<br>";
        //         echo $description."<br>";
        //         echo $price."<br>";

        //         $connection = mysqli_connect('localhost', 'root', 'root', 'ecommerce');
        
        //         if($connection) {
        //             echo "We are connected";
        //         } else {
        //             die ("Database connection failed!");
        //         } 
                
        //         //query the database
        //         $query = "INSERT INTO products(product_id,product_name,image_name,description,price)";
        //         $query .= "VALUES (NULL, '$product_name', '$image_name', '$description', '$price')";
                
        //         $result = mysqli_query($connection, $query);
                
        //         // printing error message in case of query failure
        //         if(!$result){
        //             die('Query failed!' . mysqli_error());
        //         }

        //     } else{
                
        //         echo "<br>"."The content fields cannot be blank!";
        //     }
        // }





        //get customer_id
        $customer_id = 1;

        //get product_id

        //get quantity

        //insert into orders the customer_id, product_id, time and quantity
    }

    protected function getUser(){

    }

    protected function getTime(){

    }

    protected function getProductId(){

    }

    protected function getQuantity(){
        
    }
}
?>