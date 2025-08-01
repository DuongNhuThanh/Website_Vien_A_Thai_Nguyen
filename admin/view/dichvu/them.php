<?php
    require_once '/xampp/htdocs/Vien_A/admin/controler/DichvuController.php';
    $dichvu = new DichvuController();
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $madichvu = $_POST['madichvu'];
        $tendichvu = $_POST['tendichvu'];
        $chuyenkhoa = $_POST['chuyenkhoa'];
        $mota = $_POST['mota'];
        $chiphi = $_POST['chiphi'];


        $dichvu->themDV($madichvu, $tendichvu, $mota, $chiphi, $chuyenkhoa);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm dịch vụ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="form" style="margin: 20px 100px;">
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Mã dịch vụ</label>
                <input type="text" class="form-control" name="madichvu" id="" placeholder="Nhập mã dịch vụ" required>
            </div>
            <div class="form-group">
                <label for="">Tên dịch vụ</label>
                <input type="text" class="form-control" name="tendichvu" id="" placeholder="Nhập tên dịch vụ" required>
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <input type="text" class="form-control" name="mota" id="" placeholder="Nhập mô tả" required>
            </div>
            <div class="form-group">
                <label for="">Chi phí</label>
                <input type="text" class="form-control" name="chiphi" id="" placeholder="Nhập chi phí" required>
            </div>
            <div class="form-group">
                <label for="">Chuyên khoa</label>
                <input type="text" class="form-control" name="chuyenkhoa" id="" placeholder="Nhập chuyên khoa" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>
</html>