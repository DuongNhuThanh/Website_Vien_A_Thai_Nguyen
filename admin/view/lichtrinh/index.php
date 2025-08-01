<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dnah sách lịch trình bác sĩ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <table class="table table-dark table-striped">
            <?php if($kq): ?>
                <tr>
                    <th>Mã Bác sĩ</th>
                    <th>Tên Bác sĩ</th>
                    <th>Ca sáng</th>
                    <th>Địa điểm</th>
                    <th>Ca chiều</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($kq)): ?>
                <tr>
                    <td><?php echo $row['mabacsi'] ?></td>
                    <td><?php echo $row['tenbacsi'] ?></td>
                    <td><?php echo $row['casang'] ?></td>
                    <td><?php echo $row['diadiem'] ?></td>
                    <td><?php echo $row['cachieu'] ?></td>
                </tr>
                <?php endwhile; ?>    
            <?php endif; ?>    
        </table>
    </div>
</body>
</html>