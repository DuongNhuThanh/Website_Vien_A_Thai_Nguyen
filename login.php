<?php
require_once "/xampp/htdocs/Vien_A/admin/controler/UserController.php";
$user = new UserController();
session_start();
ob_start();
if ((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $kq = $user->layUser($username, $password);
  $row = $kq->fetch_assoc();

  if ($row) {
    $_SESSION['role'] = $row['role']; 
    if ($row['role'] == 1) {
      header('Location: admin/index.php');
      exit();
    }else {
       
    }
  } else {
    $txt_erro="username hoặc pass không tồn tại";
  }
}
?>

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
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập hoặc email" required>
      </div>
      <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" required>
      </div>
      <input type="submit" name="dangnhap" class="btn btn-success btn-block" value="Đăng nhập"></input>
      <?php
          if(isset($txt_erro)&&($txt_erro!="")){
            echo $txt_erro;
          }
      ?>
    </form>
  </div>
</body>

</html>