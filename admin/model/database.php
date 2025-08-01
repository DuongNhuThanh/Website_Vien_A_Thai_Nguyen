<?php
class Database
{
    public $servername = "Localhost"; 
    public $username = "root";
    public $password = "";
    public $database= "dataviena";
    public $conn;

    public function ketnoi()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);    
        return $this->conn;
    }
}

?>