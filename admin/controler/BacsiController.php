<?php
require_once '/xampp/htdocs/Vien_A/admin/model/database.php';
require_once '/xampp/htdocs/Vien_A/admin/model/bacsi.php';

class BacsiController
{
    public $db;
    public $bacsi;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->ketnoi();
        $this->bacsi = new Bacsi($this->db);
    }
    public function DSBS(){
        $kq = $this->bacsi->layDSBS();
        require_once '/xampp/htdocs/Vien_A/admin/view/bacsi/index.php';
    }
    public function DSBSUSER(){
        $kq = $this->bacsi->layDSBS();
        return $kq;
    }
    
}

?>