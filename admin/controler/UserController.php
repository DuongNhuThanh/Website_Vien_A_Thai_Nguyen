<?php
require_once '/xampp/htdocs/Vien_A/admin/model/database.php';
require_once '/xampp/htdocs/Vien_A/admin/model/user.php';

class UserController
{
    public $db;
    public $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->ketnoi();
        $this->user = new User($this->db);
    }
    public function layUser($username, $password){
        $kq = $this->user->checkUser($username,$password);
        return $kq;
    }
}

?>