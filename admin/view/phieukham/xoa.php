<?php
    require_once '/xampp/htdocs/Vien_A/admin/controler/PhieukhamController.php';
    $phieukham = new PhieukhamController();
    
    if(isset($_GET['maphieu'])){
        $maphieu = $_GET['maphieu'];

        $phieukham->xoaPK($maphieu);
    }
?>