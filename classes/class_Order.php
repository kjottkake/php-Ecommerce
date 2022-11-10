<?php 
require_once "class_Product.php";
class Order extends Database {
    protected $customer_id;
    protected $product_id;
    protected $time;
    protected $quantity;

    protected function addOrder($id) {
        //get customer_id
        // $customer_id = Order::getUser();
        $customer_id = 1;
        //get product_id
        $product_id = $id;
        //get the time
        $time = Order::getTime();
        //get quantity
        $quantity = Order::getQuantity();
        echo "<br>Quantity $quantity<br>";
        echo "<br>Customer_id: $customer_id<br>";
        echo "<br>product_id: $product_id<br>";
        echo "<br>time: $time<br>";
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
        
        $result = mysqli_query($connection, $query);

        // printing error message in case of query failure
        if(!$result){
            die('Query failed!' . mysqli_error($connection));
        }else {
            echo "Entry Added!<br>";
        }

    }

    protected function getUser(){
        // $connection = Database::connection();
        $user_id = 1;
        return $user_id;
    }

    protected function getTime(){
        // $date = date('Y-m-d H:i:s');
        $date = time();
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

    function generateJSON($id){
        $quantity = Order::getQuantity();
        //check if file exists
        if(file_exists('./data/shoppingCart.json')){
            echo "Files exists, adding concents to file";
            //add data to file 
            $current_data=file_get_contents('./data/shoppingCart.json');
            $array_data=json_decode($current_data, true);

            $new_data=array(
                "product_id" => $id,
                "quantity" => $quantity
            );

            $array_data[]=$new_data;
            $json = json_encode($array_data);

            file_put_contents("./data/shoppingCart.json", $json);
        } else {
            echo "json file does not exist";
        }


        // $array = Array(
        //     "0" => Array (
        //     "product_id" => "$id",
        //     "quantity" => "$quantity"
        //     )
        // );
    }


    // function generateJSON(){
    //    $array = Array (
    //      "0" => Array (
    //         "id" => "16",
    //         "quantity" => "4"
    //      ),
    //      "1" => Array (
    //         "id" => "17",
    //         "quantity" => "5"
    //      )
    //      );

    //     $json = json_encode($array);
        
    //     echo "$json";

    //     file_put_contents("./data/shoppingCart.json", $json);
    // }


    function populateCart(){

    }
}
?>