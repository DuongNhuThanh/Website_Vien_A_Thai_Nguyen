<?php
    require_once '/xampp/htdocs/Vien_A/admin/controler/DichvuController.php';
    $dichvu = new DichvuController();

    if(isset($_GET['madichvu'])){
        $madichvu = $_GET['madichvu'];

        $kq = $dichvu->DSDVTheoMa($madichvu);
        $row = mysqli_fetch_assoc($kq);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $madichvu = $_POST['madichvu'];
        $tendichvu = $_POST['tendichvu'];
        $mota = $_POST['mota'];
        $chiphi = $_POST['chiphi'];
        $chuyenkhoa = $_POST['chuyenkhoa'];

        $dichvu->suaDV($madichvu,$tendichvu,$mota,$chiphi,$chuyenkhoa);
        $dichvu->DSDV();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form sửa dịch vụ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="form" style="margin: 20px 100px;">
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Mã dịch vụ</label>
                <input type="text" class="form-control" name="madichvu" id="" value="<?php echo $row['madichvu']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Tên dịch vụ</label>
                <input type="text" class="form-control" name="tendichvu" id="" value="<?php echo $row['tendichvu']; ?>" required>
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <input type="text" class="form-control" name="mota" id="" value="<?php echo $row['mota']; ?>" required>
            </div>
            <div class="form-group">
                <label for="">Chi phí</label>
                <input type="number" class="form-control" name="chiphi" id="" value="<?php echo $row['chiphi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="">Chuyên khoa</label>
                <input type="text" class="form-control" name="chuyenkhoa" id="" value="<?php echo $row['chuyenkhoa']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
</body>
</html>