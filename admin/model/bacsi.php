<?php
class Bacsi
{
    public $mabacsi;
    public $tenbacsi;
    public $chucvi;
    public $chuyenkhoa;
    public $imgbacsi;
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function layDSBS(){
        $query = "SELECT * FROM bacsi ";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }

}

?>