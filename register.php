<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Kí</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script>
    function validateForm(event) {
      const pass1 = document.forms["registerForm"]["password1"].value;
      const pass2 = document.forms["registerForm"]["password2"].value;

      if (pass1 !== pass2) {
        alert("Mật khẩu không trùng khớp. Vui lòng kiểm tra lại.");
        event.preventDefault(); // Ngăn form gửi đi
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Đăng Kí</h2>
    <form name="registerForm" action="register.php" method="POST" onsubmit="return validateForm(event)">
      <div class="form-group">
        <label for="Username">Email</label>
        <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập" required>
      </div>
      <div class="form-group">
        <label for="number">Số điện thoại</label>
        <input type="number" class="form-control" name="number" placeholder="Nhập số điện thoại" required>
      </div>
      <div class="form-group">
        <label for="Password">Mật khẩu</label>
        <input type="password" class="form-control" name="password1" placeholder="Nhập mật khẩu" required>
      </div>
      <div class="form-group">
        <label for="Password">Nhập lại mật khẩu</label>
        <input type="password" class="form-control" name="password2" placeholder="Nhập lại mật khẩu" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Đăng Kí</button>
    </form>
  </div>
</body>
</html>