<?php

function displayNavBar(){
    echo "<nav>";

        echo "<a href='mainPage.php'>Home</a>  ";
        echo "<a href='shoppingCart.php'>Shopping Cart</a>  ";
        echo "<a href='adminPage.php'>Admin Page</a>  ";
        echo "<a href='login.php'>Login</a>  ";
        echo "<a href='productPage.php'>Item</a>  ";
        // You can add more pages here
        echo "<a href='https://www.google.com/'>Google</a> ";
        echo "<a href='/phpMyAdmin/index.php'>phpMyAdmin</a> ";
        echo "<a href='index.html'>HTML Test Page</a> ";
    echo "</nav>";
    echo "<br><br>";

}


function showAllData() {
    $connection = mysqli_connect('localhost', 'root', 'root', 'ecommerce');

    if($connection) {
        echo "We are connected"; 
    } else {
        die ("Database connection failed!");
    } 

    
    //query the database
    $query = "SELECT * FROM products";
    $result = mysqli_query($connection, $query);
    // printing error message in case of query failure
    if(!$result){
        die('Query failed!' . mysqli_error());
    }

    // fetching $id from database dynamically
    //but this is not possible without querying the database above first. 
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['product_id']; // saving the ids in a variable
        $name = $row['product_name'];
    echo "<option value='$id'>$name</option>"; //html in php encapsulation
    }
}



// function to read file and return headers and entries
function readThisFile($filename){
    //echo "In readThisFile <br>";

    $file = fopen($filename, "r") or die("Unable to open file, something messed up.");

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
    // echo $headersArray[0];
    // echo $headersArray[1];
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


function dbConnectTester(){
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    //name of my database
    $database = 'ecommerce';

    $connection = mysqli_connect($host,$username,$password,$database);

    if($connection){
        echo "SUCCESS! We're connected to $database<br>";
    }else {
        die ("Database connection failed -- SOMETHING FUCKY IS HAPPENING HERE.");
    }

}


function getDBData($field){
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    //name of my database
    $database = 'ecommerce';

    // creating a connection to database
    $connection = mysqli_connect($host,$username,$password,$database);

    if($connection) {
        echo "We are connected";
    } else {
        die ("Database connection failed!");
    } 

      //query the database
      $query = "SELECT $field FROM products";

        
      $result = mysqli_query($connection, $query);
      
      // printing error message in case of query failure
      if(!$result){
          die('Query failed!' . mysqli_error());
      }

    //read 1 row at a time

    // while($row=mysqli_fetch_assoc($result)){
    //     print_r($row);echo "<br>";
    // }

    
    $row=mysqli_fetch_assoc($result);
    mysqli_close($connection);
    return $row;

}

function getProductName(){
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    //name of my database
    $database = 'ecommerce';

    // creating a connection to database
    $connection = mysqli_connect($host,$username,$password,$database);

    if($connection) {
        echo "-----------------<br>";
        echo "We are connected<br>";
        echo "-----------------<br>";
        echo "<br>";
    } else {
        die ("Database connection failed!");
    } 

      //query the database
      $query = "SELECT product_name, description FROM products";

        
      $result = mysqli_query($connection, $query);
      
      // printing error message in case of query failure
      if(!$result){
          die('Query failed!' . mysqli_error());
      }

    //read 1 row at a time

    while($row=mysqli_fetch_assoc($result)['product_name']){
        print_r($row);echo "<br>";
    }

}

function getProductDescription(){
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    //name of my database
    $database = 'ecommerce';

    // creating a connection to database
    $connection = mysqli_connect($host,$username,$password,$database);

    if($connection) {
        echo "-----------------<br>";
        echo "We are connected<br>";
        echo "-----------------<br>";
        echo "<br>";
    } else {
        die ("Database connection failed!");
    } 

      //query the database
      $query = "SELECT product_name, description FROM products";

        
      $result = mysqli_query($connection, $query);
      
      // printing error message in case of query failure
      if(!$result){
          die('Query failed!' . mysqli_error());
      }

    //read 1 row at a time
      
    while($row=mysqli_fetch_assoc($result)['description']){
        print_r($row);echo "<br>";
    }

}


function genTable($size) {
    echo "<table>";
    for ($i = 0; $i < $size; $i++){
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>item_id</td>";
        echo "<td>image</td>";
        echo "<td>price</td>";
        echo "<td>description</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>