<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Đăng Nhập</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Đăng Nhập</h2>
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập hoặc email">
      </div>
      <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
      </div>
      <button type="submit" class="btn btn-success btn-block">Đăng Nhập</button>
    </form>
  </div>
</body>
</html>