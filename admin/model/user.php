<?php
class User
{
    public $id;
    public $usename;
    public $password;
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function checkUser($username, $password){
        $query = "SELECT * FROM users Where username = '$username'AND pass = '$password' ";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }

}

?>