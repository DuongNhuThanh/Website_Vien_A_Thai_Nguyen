<?php
    require_once '\xampp\htdocs\Vien_A\admin\controler\ChuyenkhoaController.php';
    $chuyenkhoa = new ChuyenkhoaController();
    $kqCK = $chuyenkhoa->DSCKHienThi();
    if ($kqCK) {
        while ($ck = mysqli_fetch_assoc($kqCK)) {
            $rowCK[] = $ck;
    }
}
require_once '\xampp\htdocs\Vien_A\admin\controler\ChuyenkhoaController.php';
$chuyenkhoa = new ChuyenkhoaController();
$kqCK = $chuyenkhoa->DSCKUSER();
if ($kqCK) {
    while ($ck = mysqli_fetch_assoc($kqCK)) {
        $rowCK[] = $ck;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chuyên khoa </title>
    <link rel="stylesheet" href="../../asset/main.css">
    <link rel="stylesheet" href="../../asset/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../asset/chuyenkhoa.css">
</head>

<body>
    <div class="header">
        <div class="header-top">
            <div class="chirld">
                <i class="ti-headphone-alt"></i>
                <b> HOTLINE: </b>
                <b id="number">0208.3846112</b>
            </div>

            <div class="chirld">
                <i class="ti-clipboard"></i>
                <a href="#booking">
                    <b id="text"> Đặt lịch khám </b>
                </a>
            </div>
        </div>
        <div class="header-mid">
            <div class="logo"><a href=""><img src="../../asset/img/logo.png" alt=""></a></div>

            <div class="nav">
                <li>
                    <i class="ti-home"></i>
                    <a href="#" onclick="location.replace('../../index.php')">Trang chủ</a>
                </li>
                <li>
                    <i class="ti-user"></i>
                    <a href="#" onclick="location.replace('bacsi.php')">Bác sĩ</a>
                </li>
                <li>
                    <i class="ti-bookmark-alt"></i>
                    <a href="#" onclick="location.replace('chuyenkhoa.php')">Chuyên khoa</a>
                </li>
                <li>
                    <i class="ti-archive"></i>
                    <a href="#">Dịch vụ</a>
                </li>
                <li>
                    <i class="ti-list"></i>
                    <a href="" target="_parent">
                        Khác
                    </a>
                    <ul class="subnav">
                        <li id="login">
                            <i class="ti-user"></i>
                            <a href="#" onclick="location.replace('../../login.php')">Đăng nhập</a>
                        </li>
                        <li id="register">
                            <i class="ti-user"></i>
                            <a href="#" onclick="location.replace('../../register.php')">Đăng kí</a>
                        </li>
                    </ul>
                </li>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="title">
            <h1>Đa dạng dịch vụ</h1>
            <h5>Phục vụ các dịch vụ khám chữa bệnh tiên tiến, tận tình</h5>
        </div>
        <!-- <div class="grid_container">
            <?php foreach($rowCK as $ck) { ?>
                <div class="khoa_item">
                    <?php
                            if (!empty($ck['anh'])) {
                                // Mã hóa BLOB thành base64
                                $image_data = base64_encode($ck['anh']);
                                echo '<img src="data:image/jpeg;base64,' . htmlspecialchars($image_data) . '" alt="Ảnh chuyên khoa">';
                            } else {
                                echo '<p>Ảnh không tồn tại.</p>';
                            }
                    ?>
                    <p><?php echo htmlspecialchars($ck['tenchuyenkhoa']); ?></p>
                </div> 
            <?php }; ?>
        </div> -->
    </div>
    <div id="foot" class="footer">
            <div class="row-footer text-while">
                <div class="col-30 ">
                    <div class="infor">
                        <img src="../../asset/img/logo-bottom.png" alt="">
                        <p>Đường Quang Trung, Phường Thịnh Đán, TP Thái Nguyên, Thái Nguyên.</p>
                        <ul class="contact-footer">
                            <li class="chird-botton">
                                <i class="ti-headphone"></i>
                                <a href="#">0208.3846112</a>
                            </li>
                            <li class="chird-botton">
                                <i class="ti-email"></i>
                                <a href="#">hotro@benhviena.vn</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col-30 box-list">
                    <h3 class="title">Menu</h3>
                    <ul class="list">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Tin tức</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-30 box-list">
                    <h3 class="title">Liên Kết</h3>
                    <ul class="list">
                        <li><a href="#">Bộ Y tế</a></li>
                        <li><a href="#">TT truyền thông GDSK TW</a></li>
                        <li><a href="#">Tổ chức Y tế thế giới</a></li>
                        <li><a href="#">Cục quản lý KCB</a></li>
                        <li><a href="#">Sở Y tế thái nguyên</a></li>
                    </ul>
                </div>
                <div class="col-30 box-list">
                    <h3 class="title">Đối Tác</h3>
                    <ul class="list">
                        <li><a href="#">Đại học Y Hà Nội</a></li>
                        <li><a href="#">Đại học Y Dược Thái Nguyên</a></li>
                    </ul>
                    <div id="map">
                        <a href="https://maps.app.goo.gl/Qomwtw9s64jRYvAz7">
                            <img src="../../asset/img/map.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-botton">
                <p>Copyright ©2024 - Bệnh viện A Thái Nguyên - Chịu trách nhiệm nội dung:
                    GĐBV BSCKII Hà Hải Bằng</p>
            </div>
        </div>
</body>

</html>