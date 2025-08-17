<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách chuyên khoa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="max-width: 100%;">
        <div style=" margin-bottom: 20px;">
            <a href="./view/chuyenkhoa/them.php">Thêm chuyên khoa</a>
        </div>
        <table class="table table-dark table-striped">
            <?php if ($kq):  ?>
                <tr style="text-align: center;">
                    <th>Mã chuyên khoa</th>
                    <th>Tên chuyên khoa</th>
                    <th>Ảnh</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($kq)):  ?>
                    <tr style="line-height: 130px; text-align: center;">
                        <td><?php echo $row['machuyenkhoa']; ?></td>
                        <td><?php echo $row['tenchuyenkhoa']; ?></td>
                        <td>
                            <?php 
                                if (!empty($row['anh'])) {
                                    // Mã hóa BLOB thành base64
                                    $image_data = base64_encode($row['anh']);
                                    echo '<img src="data:image/jpeg;base64,' . htmlspecialchars($image_data) . '" alt="Ảnh chuyên khoa" style="width: 100px;height: 100px;">';
                                } else {
                                    echo '<p>Ảnh không tồn tại.</p>';
                                }
                            ?>
                        </td>
                        <td><a href="./view/chuyenkhoa/sua.php?machuyenkhoa=<?php echo $row['machuyenkhoa'] ?>">Sửa</a></td>
                        <td><a href="./view/chuyenkhoa/xoa.php?machuyenkhoa=<?php echo $row['machuyenkhoa'] ?>">Xóa</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>