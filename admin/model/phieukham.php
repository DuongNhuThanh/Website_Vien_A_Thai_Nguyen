<?php
class Phieukham
{
    public $maphieu;
    public $thoigian;
    public $hoten;
    public $email;
    public $sdt;
    public $chuyenkhoa;
    public $tenbacsi;
    public $tendichvu;
    public $mota;

    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function layDSPK(){
        $query = "SELECT * FROM phieukham";
        $kq = mysqli_query($this->conn, $query);
        return $kq;
    }

    public function xoaPK($maphieu){
        $query = " DELETE FROM phieukham WHERE maphieu = '$maphieu'";
        $kq = mysqli_query($this->conn,$query);
        return $kq;
    }
    public function themPK($thoigian,$hoten,$email,$sdt,$chuyenkhoa,$bacsi,$dichvu,$mota){
        $query = "INSERT INTO phieukham VALUES ('$thoigian','$hoten','$email','$sdt','$chuyenkhoa','$bacsi','$dichvu','$mota')";
        $kq = mysqli_query($this->conn,$query);
        return $kq;
    }

}

?>