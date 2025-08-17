<?php
class Chuyenkhoa
{
    public $machuyenkhoa;
    public $tenchuyenkhoa;
    public $img;
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function layDSCK(){
        $query = "SELECT * FROM chuyenkhoa ";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }
    public function layDSCKHienThi(){
        $query = "SELECT tenchuyenkhoa,anh FROM chuyenkhoa ";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }
   
    public function layDSCKTheoMa($machuyenkhoa){
        $query = "SELECT * FROM chuyenkhoa WHERE machuyenkhoa = '$machuyenkhoa'";
        $kq = mysqli_query($this->conn,$query);
        return $kq;
    }
    public function layTenCK($machuyenkhoa){
        $query = "SELECT tenchuyenkhoa FROM chuyenkhoa WHERE machuyenkhoa = '$machuyenkhoa'";
        $kq = mysqli_query($this->conn,$query);
        return $kq;
    }

    public function themCK($machuyenkhoa,$tenchuyenkhoa,$anh){
        $query = "INSERT INTO chuyenkhoa VALUES ('$machuyenkhoa', '$tenchuyenkhoa','$anh')";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }

    public function suaCK($machuyenkhoa,$tenchuyenkhoa){
        $query = "UPDATE chuyenkhoa SET machuyenkhoa = '$machuyenkhoa', tenchuyenkhoa = '$tenchuyenkhoa' WHERE machuyenkhoa = '$machuyenkhoa'";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }

    public function xoaCK($machuyenkhoa){
        $query = "DELETE FROM chuyenkhoa WHERE machuyenkhoa = '$machuyenkhoa'";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }
}

?>