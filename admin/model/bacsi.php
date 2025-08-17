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
    public function layBSTheoMaCK($machuyenkhoa){
        $query = "SELECT tenbacsi FROM bacsi WHERE machuyenkhoa = '$machuyenkhoa' ";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }
    


}

?>