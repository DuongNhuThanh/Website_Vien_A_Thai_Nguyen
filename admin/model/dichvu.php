<?php
class Dichvu
{
    public $madichvu;
    public $tendichvu;
    public $mota;
    public $chiphi;
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function layDSDV(){
        $query = "SELECT * FROM dichvu";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }

    public function layDSDVTheoMa($madichvu){
        $query = "SELECT * FROM dichvu WHERE madichvu = '$madichvu'";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }

    public function themDV($madichvu,$tendichvu,$mota,$chiphi,$chuyenkhoa){
        $query = "INSERT INTO dichvu VALUES ('$madichvu', '$tendichvu', '$mota', '$chiphi', '$chuyenkhoa')";
        $kq = mysqli_query($this->conn,$query);
        return $kq;
    }

    public function suaDV($madichvu,$tendichvu,$mota,$chiphi,$chuyenkhoa){
        $query = "UPDATE dichvu SET madichvu = '$madichvu', tendichvu = '$tendichvu', mota = '$mota', chiphi = '$chiphi', chuyenkhoa = '$chuyenkhoa' WHERE madichvu = '$madichvu'";
        $kq = mysqli_query($this->conn,$query);
        return $kq;
    }
    public function xoaDV($madichvu){
        $query = " DELETE FROM dichvu WHERE madichvu = '$madichvu'";
        $kq = mysqli_query($this->conn,$query);
        return $kq;
    }

}

?>
