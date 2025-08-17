<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách dịch vụ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <div style=" margin-bottom: 20px;">
            <a href="./view/dichvu/them.php">Thêm dịch vụ</a>
        </div>
        <table class="table table-dark table-striped">
            <?php if($kq):  ?>
                <tr>
                    <th>Mã dịch vụ</th>
                    <th>Tên dịch vụ</th>
                    <th>Mô tả</th>
                    <th>Chi phí</th>
                    <th>Chuyên khoa</th>
                </tr>
                <?php while( $row = mysqli_fetch_assoc($kq) ):  ?>
                <tr>
                    <td><?php echo $row['madichvu']; ?></td>
                    <td><?php echo $row['tendichvu']; ?></td>
                    <td><?php echo $row['mota']; ?></td>
                    <td><?php echo $row['chiphi']; ?></td>
                    <td><?php echo $row['machuyenkhoa']; ?></td>
                    <td><a href="./view/dichvu/sua.php?madichvu=<?php echo $row['madichvu']; ?>">Sửa</a></td>
                    <td><a href="./view/dichvu/xoa.php?madichvu=<?php echo $row['madichvu']; ?>">Xóa</a></td>
                </tr>
                <?php endwhile; ?>    
            <?php endif; ?>    
        </table>
    </div>
</body>
</html>