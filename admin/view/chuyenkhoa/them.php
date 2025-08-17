<?php
    require_once '/xampp/htdocs/Vien_A/admin/controler/ChuyenkhoaController.php';
    $chuyenkhoa = new ChuyenkhoaController();
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $machuyenkhoa = $_POST['machuyenkhoa'];
        $tenchuyenkhoa = $_POST['tenchuyenkhoa'];
        $anh = $_FILES['anh'];

        $chuyenkhoa->themCK($machuyenkhoa, $tenchuyenkhoa, $anh);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm chuyên khoa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="form" style="margin: 20px 100px;">
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Mã chuyên khoa</label>
                <input type="text" class="form-control" name="machuyenkhoa" id="" placeholder="Nhập mã chuyên khoa" required>
            </div>
            <div class="form-group">
                <label for="">Tên chuyên khoa</label>
                <input type="text" class="form-control" name="tenchuyenkhoa" id="" placeholder="Nhập tên chuyên khoa" required>
            </div>
            <div class="form-group">
                <label for="">Ảnh chuyên khoa</label>
                <input type="file" class="form-control" name="anh" id="" placeholder="Chọn chuyên khoa" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>
</html>