<?php
require_once "class_Database.php";


class User extends Database {
    protected $username;
    protected $password;
    protected $isAdmin;

    //function for creating admin account
    protected function createAdmin(){
        
    }

    //function for adding user
    protected function addUser(){
        if(isset($_POST['submit'])) {
            echo "yes, information received"."<br>";
            
            
            $username = $_POST['username'];
            $password = $_POST['password'];

             // basic form data validation
             if($username && $password){
    
            echo $username."<br>";
            echo $password."<br>";


            // connect to localhost, default username = root ; default password = root
            // 'loginapp' in this case is our database. 
            $connection = Database::connect();

            if($connection) {
                echo "We are connected";
            } else {
                die ("Database connection failed!");
            } 
            
            //query the database
            $query = "INSERT INTO users(username,password)";
            $query .= "VALUES ('$username', '$password')";
            
            $result = mysqli_query($connection, $query);
            
            // printing error message in case of query failure
            if(!$result){
                die('Query failed!' . mysqli_error());
            }

                  
            } else{
                
                echo "<br>"."The username and password fields cannot be blank!";
            }
        }

    }

    function getUser(){
        $og = 1;
        $connection = Database::connect();
        //get the name of the user who's logged in.

        $query = "SELECT * FROM users WHERE customer_id = $og";

        $result = mysqli_query($connection, $query);
        // print_r($result['username']);
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];

        return $username;
    }
}

?>