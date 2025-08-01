<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách chuyên khoa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div style=" margin-bottom: 20px;">
            <a href="./view/chuyenkhoa/them.php">Thêm chuyên khoa</a>
        </div>
        <table class="table table-dark table-striped">
            <?php if ($kq):  ?>
                <tr>
                    <th>Mã chuyên khoa</th>
                    <th>Tên chuyên khoa</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($kq)):  ?>
                    <tr>
                        <td><?php echo $row['machuyenkhoa']; ?></td>
                        <td><?php echo $row['tenchuyenkhoa']; ?></td>
                        <td><a href="./view/chuyenkhoa/sua.php?machuyenkhoa=<?php echo $row['machuyenkhoa'] ?>">Sửa</a></td>
                        <td><a href="./view/chuyenkhoa/xoa.php?machuyenkhoa=<?php echo $row['machuyenkhoa'] ?>">Xóa</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>