
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bác sĩ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <table class="table table-dark table-striped">
            <?php if($kq):  ?>
                <tr>
                    <th>Mã bác sĩ</th>
                    <th>Tên bác sĩ</th>
                    <th>Chức vị</th>
                    <th>Chuyên khoa</th>
                </tr>
                <?php while( $row = mysqli_fetch_assoc($kq) ):  ?>
                <tr>
                    <td><?php echo $row['mabacsi']; ?></td>
                    <td><?php echo $row['tenbacsi']; ?></td>
                    <td><?php echo $row['chucvi']; ?></td>
                    <td><?php echo $row['chuyenkhoa']; ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php endwhile; ?>    
            <?php endif; ?>    
        </table>
    </div>
</body>
</html>