<?php
    require_once '/xampp/htdocs/Vien_A/admin/controler/DichvuController.php';
    $dichvu = new DichvuController();
    
    if(isset($_GET['madichvu'])){
        $madichvu = $_GET['madichvu'];

        $dichvu->xoaDV($madichvu);
    }
?>