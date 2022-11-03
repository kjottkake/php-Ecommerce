<?php 
require_once "class_Product.php";
class Order extends Product {
    protected function addOrder($id) {
        //get customer_id
        $customer_id = Order::getUser();
        //get product_id
        $product_id = $id;
        //get the time
        $time = Order::getTime();
        //get quantity
        $quantity = Order::getQuantity();
        //insert into orders the customer_id, product_id, time and quantity
        
        $connection = Database::connect();

        if($connection) {
            echo "We are connected";
        } else {
            die ("Database connection failed!");
        } 
        
        //query the database
        $query = "INSERT INTO orders(customer_id,product_id,time,quantity)";
        $query .= "VALUES ('$customer_id', '$product_id', '$time', '$quantity')";
        
        // $result = mysqli_query($connection, $query);

        // printing error message in case of query failure
        // if(!$result){
        //     die('Query failed!' . mysqli_error());
        // }
    }

    protected function getUser(){
        // $connection = Database::connection();
        $user_id = 1;
        return $user_id;
    }

    protected function getTime(){
        $date = date('Y-m-d H:i:s');
        return $date;
    }

    // protected function getProductId($id){
    //     $product_id = $id; 
    //     return $product_id;
    // }

    protected function getQuantity(){
        if(isset($_POST['submit'])) {
                echo "yes, information received"."<br>";
                $quantity = $_POST['quantity'];
                return $quantity;
        }
    }

    function assembleOrder($id){
        Order::addOrder($id);
    }
}
?>