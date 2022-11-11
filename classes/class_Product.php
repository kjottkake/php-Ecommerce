<?php
require_once "class_Database.php";
// echo "In class: Product<br>";

class Product extends Database{
    // properties example, add more properties if needed
    protected $product_Name;
    protected $description;
    // Additional Properties
    protected $image_name;
    protected $price;
    
    // Method of adding products to Database
    protected function addProductToDB(){
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

            } else{
                
                echo "<br>"."The content fields cannot be blank!";
            }
        }
    }

    //method to delete item
    function deleteProduct(){
        $table = 'products';
        $column = 'product_id';
        Database::deleteRowInDB($table, $column);
    }

    //a method to displayProducts on page
    function displayProducts($resArray){
        echo "<table>";
        // echo "<pre>";
        //     print_r($resArray);
        foreach ($resArray as $item){
            
            if ($isFirstRow == FALSE){
                // first print headers
                echo "<tr>";
                foreach ($item as $key => $value){
                    echo "<th> $key </th>";
                }
                echo "</tr>";
                
                //then print first row of values
                echo "<tr>";
                foreach ($item as $key => $value){
                    // echo '<pre>' . $value; 
                    // echo $value['item_id'];
                    // print_r($item);
                    

                    if($key == 'product_name'){
                        // echo "$item_id";
                        $itemId = $item['product_id'];
                        echo "<td><a href=\"productPage.php?id=$itemId\">$value</a></td>";
                    }
                    else if ($key == 'image_name'){
                        echo "<td><img src=\"$value\"></td>";
                    } else {
                    echo "<td><h1> $value </h1></td>";
                    }
                }
                echo "</tr>";
                
                $isFirstRow = TRUE;
                
            }else {
                // then print every subsequent row of values
                echo "<tr>";
                foreach ($item as $key => $value){
                    if($key == 'product_name'){
                        $itemId = $item['product_id'];
                        echo "<td><a href=\"productPage.php?id=$itemId\">$value</a></td>";
                    }
                    else if ($key == 'image_name'){ 
                        echo "<td><img src=\"$value\"></td>";
                    } else {
                    echo "<td><h1> $value </h1></td>";
                    }
                }
                echo "</tr>";
            }
        }    
        echo "</table>";
    }

    //function to display only 1 item for the product page
    function getIndividualItem($item_id){
        //connect to db
        $connection = Database::connect();
        $query = "SELECT * FROM products WHERE product_id = $item_id;";

        $result = mysqli_query($connection, $query);

        //error checking
        // printing error message in case of query failure
        if(!$result){
            die('Query failed!' . mysqli_error($connection));
        }else {
            //echo "Entries Retrieved!<br>";
        }

        //read 1 row at a time
        $idx = 0;
        while($row=mysqli_fetch_assoc($result)){
            //print_r($row);echo "<br>";
            $resArray[$idx] = $row;
            $idx++;
        }
        Database::disconnect($connection);
        return $resArray;
    }


    //reads table from superclass, without exposing super class method readFromTable()
    function readTable($tableName){
        $table = Database::readFromTable($tableName);
        return $table;
    }

    //read user input for new product
    function getNewItem(){
        Product::addProductToDB();
    }


    //constructor for display
    // public function __construct($arr){
    //     $this->displayProducts($arr);
    // }
    
}



?>