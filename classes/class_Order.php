<?php 
require_once "class_Product.php";
class Order extends Database {
    protected $customer_id;
    protected $product_id;
    protected $time;
    protected $quantity;

    protected function addOrder($customer_id, $id, $quantity) {
        //get customer_id
        // $customer_id = Order::getUser();
        //get product_id
        $product_id = $id;
        //get the time
        $time = Order::getTime();
        //get quantity
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
            die('Query failed! Something fucked up in the order process' . mysqli_error($connection));
        }else {
            echo "Entry Added!<br>";
        }
        Database::disconnect($connection);
    }

    protected function getUser(){
        $user_id = 1;
        return $user_id;
    }

    protected function getTime(){
        //gets time in miliseconds 
        $date = time();
        return $date;
    }

    protected function getQuantity(){
        if(isset($_POST['submit'])) {
                echo "yes, information received"."<br>";
                $quantity = $_POST['quantity'];
                return $quantity;
        }
    }

    function assembleOrder($customer_id, $id, $quantity){
        Order::addOrder($customer_id, $id, $quantity);
    }

    //function for generating JSON file
    function generateJSON($id){
        $found = false; 
        $quantity = Order::getQuantity();
        //checking if the json file exists on directory
        if(file_exists('./data/shoppingCart.json')){
            echo "Files exists, adding contents to file"; //message alerting user file is found
            //gets data from file found 
            $current_data=file_get_contents('./data/shoppingCart.json');
            $array_data=json_decode($current_data, true); //decodes json data from data from file

            //check if item appears already in JSON data
            foreach ($array_data as $key => $value) {
                if ($value['product_id']==$id) {
                    //update
                    echo "fouund dubplicate";
                    $found = true;
                    $array_data[$key]['quantity']=$array_data[$key]['quantity']+$quantity;
                    $json = json_encode($array_data);
    
                    file_put_contents("./data/shoppingCart.json", $json);
                }
            }

            //if there isn't a repeat entry in JSON data
            if ($found == false) {
                echo "repeat not found!!!";
                $new_data=array( //set new data to be written to JSON file.
                    "product_id" => $id,
                    "quantity" => $quantity
                );
    
                $array_data[]=$new_data;
                $json = json_encode($array_data);
    
                file_put_contents("./data/shoppingCart.json", $json);
            }
            // $new_data=array(
            //     "product_id" => $id,
            //     "quantity" => $quantity
            // );

            // $array_data[]=$new_data;
            // $json = json_encode($array_data);

            // file_put_contents("./data/shoppingCart.json", $json);
        } else { //if the file does not exist, display error message, this will eventually be replaced by creating a json file
            echo "json file does not exist";
            $new_data=array(
                "product_id" => $id,
                "quantity" => $quantit
            );

            $array_data[]=$new_data;
            $json = json_encode($array_data);
            file_put_contents("./data/shoppingCart.json", $json);
        }
        // header("Refresh:0");
    }

    function setCookie(){
        $cookie_name = "cart";
        $cookie_value = 1;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/"); // 86400 = 1 day
        // header("Refresh:0");
    }

}

//Code References:
//setCookie() referred from https://www.w3schools.com/php/php_cookies.asp

?>