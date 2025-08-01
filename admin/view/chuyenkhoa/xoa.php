<?php
    require_once '/xampp/htdocs/Vien_A/admin/controler/ChuyenkhoaController.php';
    $chuyenkhoa = new ChuyenkhoaController();
    
    if(isset($_GET['machuyenkhoa'])){
        $machuyenkhoa = $_GET['machuyenkhoa'];

        $chuyenkhoa->xoaCK($machuyenkhoa);
    }
?>