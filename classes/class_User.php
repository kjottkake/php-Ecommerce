<?php
require_once "class_Database.php";


class User extends Database {
    protected $username;
    protected $password;
    protected $hasAdmin;
    protected $isLoggedIn;

    //function for creating admin account
    protected function createAdmin(){
        $hasAdmin = false;
        if ($hasAdmin == false){
        $connection = Database::connect();

        if($connection) {
            echo "We are connected";
        } else {
            die ("Database connection failed!");
        } 
        $query = "INSERT INTO users(username,password,email,customer_id,role)";
        $query .= "VALUES ('admin', '0admin0', 'admin@ecommerce.com', 420,  0)";
        //if there isn't an admin account add admin account
        
        $result = mysqli_query($connection, $query);
            
        $this->$hasAdmin = true; 

        print_r($this->$hasAdmin);
        }
        
    }

    //function for adding user
    protected function addUser(){
        if(isset($_POST['submit'])) {
            echo "yes, information received"."<br>";
            
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
             // basic form data validation
             if($username && $password && $email){
    
                // echo $username."<br>";
                // echo $password."<br>";
                // echo $email."<br>";

                // connect to localhost, default username = root ; default password = root
                // 'loginapp' in this case is our database. 
                $connection = Database::connect();

                if($connection) {
                    echo "We are connected";
                } else {
                    die ("Database connection failed!");
                } 
                
                //query the database
                $query = "INSERT INTO users(username,password,email)";
                $query .= "VALUES ('$username', '$password', '$email')";
                
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

    protected function loggedIn(){

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

    function createUser(){
        User::addUser();
    }

    function genAdmin(){
        User::createAdmin();
    }
}

?>