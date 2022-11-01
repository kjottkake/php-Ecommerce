<?php

class User extends Database {
    protected $username;
    protected $password;
    protected $isAdmin;

    //function for creating admin account
    protected function createAdmin(){
        
    }

    //function for adding user
    protected function addUser(){
        $connection = Database::connect();

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