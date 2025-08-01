<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phiếu khám</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <table class="table table-dark table-striped">
            <?php if($kq): ?>
                <tr>
                    <th>Mã phiếu</th>
                    <th>Thời gian</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Chuyên khoa</th>
                    <th>Bác sĩ</th>
                    <th>Dịch vụ</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($kq)): ?>
                    <tr>
                        <td><?php echo $row['maphieu']; ?></td>
                        <td><?php echo $row['thoigian']; ?></td>
                        <td><?php echo $row['hoten']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['sdt']; ?></td>
                        <td><?php echo $row['chuyenkhoa']; ?></td>
                        <td><?php echo $row['bacsi']; ?></td>
                        <td><?php echo $row['dichvu']; ?></td>
                        <td><a href="./view/phieukham/xoa.php?maphieu=<?php echo $row['maphieu']; ?>">Xóa</a></td>
                    </tr>
                <?php endwhile;?>
            <?php endif; ?>    
        </table>
    </div>
</body>
</html>