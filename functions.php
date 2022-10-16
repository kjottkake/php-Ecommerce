<?php

function displayNavBar(){
    echo "<nav>";

        echo "<a href='mainPage.php'>Home</a>  ";
        echo "<a href='shoppingCart.php'>Shopping Cart</a>  ";
        echo "<a href='adminPage.php'>Admin Page</a>  ";
        // You can add more pages here
        echo "<a href='https://www.google.com/'>Google</a> ";
        echo "<a href='/phpMyAdmin/index.php'>phpMyAdmin</a> ";
        echo "<a href='index.html'>HTML Test Page</a> ";
    echo "</nav>";
    echo "<br><br>";

}

// function to read file and return headers and entries
function readThisFile($filename){
    //echo "In readThisFile <br>";

    $file = fopen($filename, "r") or die("Unable to open file");

    //Output one line until end-of-file
    $idx = 0;
    while(!feof($file)){

        if ($idx==0){
            $headersArray = fgetcsv($file);

        }else{
            $line = fgetcsv($file);

            if(!(is_null($line[1]))){
                $valuesArray[$idx-1] = $line;
            }

        }

        $idx++;
    }

    fclose($file);

    return array('headersArray' => $headersArray,
                 'valuesArray' => $valuesArray);

}

// creates a 2 dimensional associative array, given a headers array and a values array. 
function createAssocArray($headersArray,$valuesArray){
    // create an associative Array given headers and Values
    foreach ($valuesArray as $item => $value){
    //print_r($item);print_r($value);echo "<br>";
    $idx = 0;
        foreach ($headersArray as $key){
            $resArray[$item][$key] = $value[$idx];         
            $idx++;
        }
    }
    
    return $resArray;
    
}


// take an associative array as input and creates a table from it. 
function createTable($resArray){
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

function testNuts(){
    echo "<h2>deeeeez nuts was here</h2>";
}


?>