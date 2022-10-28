<?php
require_once "class_Database.php";
echo "In class: Product<br>";

class Product extends Database{
    // properties example, add more properties if needed
    protected $product_Name;
    protected $description;
    //Jason Adding Additional Properties
    protected $image_name;
    protected $price;
    
    // a method example, add other methods if needed. 
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
                    if($key == 'product_name'){
                        echo "<td><a href=\"productPage.php\">$value</a></td>";
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
                        echo "<td><a href=\"productPage.php\">$value</a></td>";
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

    //reads table from superclass, without exposing super class method readFromTable()
    function readTable($tableName){
        $table = Database::readFromTable($tableName);
        return $table;
    }

    //constructor for display
    // public function __construct($arr){
    //     $this->displayProducts($arr);
    // }
    
}



?>