<?php
error_reporting(E_ALL & ~E_WARNING);
    require_once '/xampp/htdocs/Vien_A/admin/controler/PhieukhamController.php';
    $phieukham = new PhieukhamController();
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $thoigian = $_POST['khunggio'];
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $chuyenkhoa = $_POST['chuyenkhoa'];
        $bacsi = $_POST['bacsi'];
        $dichvu = $_POST['dichvu'];

        // echo $thoigian,$hoten,$email,$sdt,$chuyenkhoa,$bacsi,$dichvu;
        $phieukham->themPK($maphieu,$thoigian,$hoten,$email,$sdt,$chuyenkhoa,$bacsi,$dichvu);
        
    }
       

?>