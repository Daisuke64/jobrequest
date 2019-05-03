<?php

class Datebase{
    //member variables
    private $servername = "localhost";
    private $username = "root";
    private $password = ""; //mamp users password is root
    private $datebase = "jobrequest";

    public $conn; //this will get the connection

    //Constructor
    //this will construct the connection

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->datebase);
        if($this->conn->connect_error){
            die("Connection Error:".$this->conn->connect_error);
        }else{
            return $this->conn;
        }
    }


}


?>