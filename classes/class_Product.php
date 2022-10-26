<?php
require_once "class_Database.php";

echo "In class: Product<br>";

class Product extends Database{
    // properties example, add more properties if needed
    protected $product_Name;
    protected $description;
    
    
    // a method example, add other methods if needed. 
    protected function addProductToDB(){
        
    }

    //a method to displayProducts on page
    protected function displayProducts($resArray){
        echo "<table>";
            
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
                    echo "<td> $value </td>";
                }
                echo "</tr>";
                
                $isFirstRow = TRUE;
                
            }else {
                // then print every subsequent row of values
                echo "<tr>";
                foreach ($item as $key => $value){
                    echo "<td> $value </td>";
                }
                echo "</tr>";
            }
            
                

        }    
        echo "</table>";
    }
    
}



?>