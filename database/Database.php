<?php
// Create a blueprint for interacting with database
    class Database {
        private $servername;
        private $username;
        private $password;
        private $dbname;

       public function __construct(){
            // initialize the variables
            $this->servername = "localhost";
            $this->username = "root";
            $this->password ="";
            $this->dbname = "brainwave";
            session_start();
        }

        function connect(){
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
            // Test if the database connected
            if($conn){
                // The database connected
                return $conn;
            }else{
                return mysqli_connect_error();
            }
        }
    }
?>