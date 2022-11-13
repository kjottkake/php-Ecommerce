<?php // superclass definition : Database
// contains Database related methods. 

// echo "In class: Database<br>";

class Database{
    //function for connecting to database
    protected function connect(){
        // echo "Database : connect<br>";
        
        $host = 'localhost';
        $username = 'root';
        $password = 'root';
        $database = 'ecommerce';

        $connection = mysqli_connect($host,$username,$password,$database);

        if($connection){
            // echo "We are connected!<br>";
        }else {
            die ("Database connection failed");
        }
        return $connection;
    }

    //function for disconnecting from database
    protected function disconnect($connection){
        mysqli_close($connection);
    }
    
    //function that reads from table
    protected function readFromTable($tableName){
        // echo "<br>THIS SHIT IS CONNECTED<br>";
        // echo "Database:readFromTable<br>";
        $connection = Database::connect();
        //query the database
        $query = "SELECT * FROM $tableName";

        $result = mysqli_query($connection, $query);

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

    //function that deletes rows in database
    protected function deleteRowInDB($table, $column){
        //establish connection
        $connection = Database::connect();

        $id = $_POST['id'];

        // making the query to be sent to database
        $query = "DELETE FROM $table ";
        
        // where to delete them 
        $query .= " WHERE $column = $id "; 

        echo $query."<br>";

        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Query Failed!" . mysqli_error($connection));
        }

        //disconnect
        Database::disconnect($connection);
    }

    // sanitize input
    protected function cleanVar($var, $connection){
        
    }

    function showListOfOrders(){
        $connection = Database::connect();
        $query = "SELECT orders.product_id, orders.quantity, customers.firstname, customers.country from orders INNER JOIN customers ON orders.customer_id=customers.customer_id";
        $result = mysqli_query($connection, $query);

        $result = mysqli_query($connection, $query);

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

    //constructs table and stuff
    // public function __construct($table){
    //     $this->readFromTable($table);
    // }


    
}


?>