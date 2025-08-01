<?php
    require_once '/xampp/htdocs/Vien_A/admin/controler/ChuyenkhoaController.php';
    $chuyenkhoa = new ChuyenkhoaController();

    if(isset($_GET['machuyenkhoa'])){
        $machuyenkhoa = $_GET['machuyenkhoa'];

        $kq = $chuyenkhoa->DSCKTheoMa($machuyenkhoa);
        $row = mysqli_fetch_assoc($kq);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $machuyenkhoa = $_POST['machuyenkhoa'];
        $tenchuyenkhoa = $_POST['tenchuyenkhoa'];

        $chuyenkhoa->suaCK($machuyenkhoa,$tenchuyenkhoa);
        $chuyenkhoa->DSCK();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form sửa chuyên khoa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="form" style="margin: 20px 100px;">
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Mã chuyên khoa</label>
                <input type="text" class="form-control" name="machuyenkhoa" id="" value="<?php echo $row['machuyenkhoa']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Tên chuyên khoa</label>
                <input type="text" class="form-control" name="tenchuyenkhoa" id="" value="<?php echo $row['tenchuyenkhoa']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
</body>
</html>