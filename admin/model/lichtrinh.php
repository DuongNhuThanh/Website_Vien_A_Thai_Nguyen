<?php
class Lichtrinh
{
    public $id;
    public $mabacsi;
    public $tenbacsi;
    public $casang;
    public $diadiem;
    public $cachieu;
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function layDSLT(){
        $query = "SELECT * FROM lichtrinh";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }

}

?>