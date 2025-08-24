<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../asset/main.css">
    <link rel="stylesheet" href="../asset/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="main">
        <div style="margin-bottom: 50px;" class="header">
            <div class="header-mid">
                <div class="logo"><a href=""><img src="../asset/img/logo.png" alt=""></a></div>

                <div class="nav">
                    <form action="" method="GET">
                    <li>
                        <i class="ti-calendar"></i>
                        <input style="border: none; font-weight: 550; " type="submit" name="phieukham" id="" value="Phiếu khám">
                    </li>
                    <li>
                        <i class="ti-user"></i>
                        <input style="border: none; font-weight: 550; " type="submit" name="bacsi" id="" value="Bác sĩ">

                    </li>
                    <li>
                        <i class="ti-receipt"></i>
                        <input style="border: none; font-weight: 550; " type="button" name="lichtrinh" id="" value="Lịch trình Bác sĩ">

                    </li>
                    <li>
                        <i class="ti-bookmark-alt"></i>
                        <input style="border: none; font-weight: 550; " type="submit" name="chuyenkhoa" id="" value="Chuyên khoa">
                    </li>
                    <li>
                        <i class="ti-archive"></i>
                        <input style="border: none; font-weight: 550; " type="submit" name="dichvu" id="" value="Dịch vụ">
                    </li>
                    <li>
                        <input style="border: none; font-weight: 550; " type="submit" name="logout" id="" value="Thoát">
                    </li>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
session_start();
ob_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    require_once '/xampp/htdocs/Vien_A/admin/controler/BacsiController.php';
    require_once '/xampp/htdocs/Vien_A/admin/controler/ChuyenkhoaController.php';
    require_once '/xampp/htdocs/Vien_A/admin/controler/PhieukhamController.php';
    require_once '/xampp/htdocs/Vien_A/admin/controler/LichtrinhController.php';
    require_once '/xampp/htdocs/Vien_A/admin/controler/DichvuController.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $action = !empty($_GET) ? key($_GET) : 'phieukham';

        switch ($action) {
            case 'bacsi':
                $bacsi = new BacsiController();
                $bacsi->DSBS();
                break;
            case 'lichtrinh':
                $lichtrinh = new LichtrinhController();
                $lichtrinh->DSLT();
                break;
            case 'chuyenkhoa':
                $chuyenkhoa = new ChuyenkhoaController();
                $chuyenkhoa->DSCK();
                break;
            case 'dichvu':
                $dichvu = new DichvuController();
                $dichvu->DSDV();
                break;
            case 'logout':
                if(isset($_SESSION['role'])){
                    unset($_SESSION['role']);
                    header('Location: ../index.php');
                }
            default:
                $phieukham = new PhieukhamController();
                $phieukham->DSPK();
                break;
        }
    }
} else {
    header('Location:login.php');
    exit();
}
?>

