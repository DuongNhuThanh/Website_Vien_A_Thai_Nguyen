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
    public function themPK($maphieu,$thoigian,$hoten,$email,$sdt,$chuyenkhoa,$bacsi,$dichvu){
        $query = "INSERT INTO phieukham VALUES ('$maphieu','$thoigian','$hoten','$email','$sdt','$chuyenkhoa','$bacsi','$dichvu')";
        $kq = mysqli_query($this->conn,$query);
        return $kq;
    }

}

?>