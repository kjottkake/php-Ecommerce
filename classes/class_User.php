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
        }
        
    }

    //function for adding user
    protected function addUser(){
        if(isset($_POST['submit'])) {
            echo "yes, information received"."<br>";
            
            

            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            //basic security measures
            $username = User::fixString($username);
            $password = User::fixString($password);
            $email = User::fixString($email);
             // basic form data validation
             if($username && $password && $email){

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

    function createUser(){
        User::addUser();
    }

    function genAdmin(){
        User::createAdmin();
    }

    //basic security meastures
    function fixString($str){
        // Convert special chars. to htmlentities 
        $str = htmlentities($str);
        return $str;
    }
}

?>