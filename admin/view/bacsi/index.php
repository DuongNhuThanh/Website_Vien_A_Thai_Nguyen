<?php
require_once "/xampp/htdocs/Vien_A/admin/controler/ChuyenkhoaController.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bác sĩ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="max-width: 100%;">
        <table class="table table-dark table-striped">
            <?php if ($kq):  ?>
                <tr style="text-align: center;">
                    <th>Mã bác sĩ</th>
                    <th>Tên bác sĩ</th>
                    <th>Chức vị</th>
                    <th>Mã - Chuyên khoa</th>
                    <th>Ảnh</th>

                </tr>
                <?php while ($row = mysqli_fetch_assoc($kq)):  ?>
                    <?php
                    if (isset($row['machuyenkhoa'])) {
                        $ck = new ChuyenkhoaController();
                        $maCk = $row['machuyenkhoa'];
                        $kqCK = $ck->TenCK($maCk);
                        $tenchuyenkhoa = mysqli_fetch_assoc($kqCK);
                    }
                    ?>
                    <tr style="text-align: center; line-height: 150px;">
                        <td><?php echo $row['mabacsi']; ?></td>
                        <td><?php echo $row['tenbacsi']; ?></td>
                        <td><?php echo $row['chucvi']; ?></td>
                        <td><?php echo  $row['machuyenkhoa'] . "-" . $tenchuyenkhoa['tenchuyenkhoa']; ?></td>
                        <td>
                            <?php
                            if (!empty($row['avartar'])) {
                                // Mã hóa BLOB thành base64
                                $image_data = base64_encode($row['avartar']);
                                echo '<img src="data:image/jpeg;base64,' . htmlspecialchars($image_data) . '" alt="Ảnh bác sĩ" style="width: 150px; height: 150px; border-radius: 100%;">';
                            } else {
                                echo '<p>Ảnh không tồn tại.</p>';
                            }
                            ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>