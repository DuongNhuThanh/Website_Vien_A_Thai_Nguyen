<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Kí</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Đăng Kí</h2>
    <form action="register.php" method="POST">
      <div class="form-group">
        <label for="Username">Tên đăng nhập</label>
        <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập">
      </div>
      <div class="form-group">
        <label for="Password">Mật khẩu</label>
        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Đăng Kí</button>
    </form>
  </div>
</body>
</html>

