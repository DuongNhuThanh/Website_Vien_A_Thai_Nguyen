<?php
require_once '\xampp\htdocs\Vien_A\admin\controler\BacsiController.php';
$bacsi = new BacsiController();
$kqBS = $bacsi->DSBSUSER();
if ($kqBS) {
    while ($bs = mysqli_fetch_assoc($kqBS)) {
        $rowBS[] = $bs;
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

require_once '\xampp\htdocs\Vien_A\admin\controler\DichvuController.php';
$dichvu = new DichvuController();
$kqDV = $dichvu->DSDVUSER();
if ($kqDV) {
    while ($dv = mysqli_fetch_assoc($kqDV)) { //lấy toàn bộ dữ liệu kq truy vấn
        $rowDV[] = $dv; // Thêm từng dòng dữ liệu vào mảng $rowDV
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đặt lịch khám bệnh viện A Thái Nguyên</title>
    <link rel="stylesheet" href="./asset/main.css">
    <link rel="stylesheet" href="./asset/icon/themify-icons-font/themify-icons/themify-icons.css">
</head>

<body>
    <div class="main">
        <div class="header">
            <div class="header-top">
                <div class="chirld">
                    <i class="ti-headphone-alt"></i>
                    <b> HOTLINE: </b>
                    <b id="number">0208.3846112</b>
                </div>
                <div>
                    <form action="" class="search" method="post">
                        <div class="search-nav">
                            <input type="text" placeholder="   Tìm kiếm">
                            <i class="ti-search"></i>
                        </div>
                    </form>
                </div>

                <div class="chirld">
                    <i class="ti-clipboard"></i>
                    <a href="#booking">
                        <b id="text"> Đặt lịch khám </b>
                    </a>
                </div>
            </div>
            <div class="header-mid">
                <div class="logo"><a href=""><img src="./asset/img/logo.png" alt=""></a></div>

                <div class="nav">
                    <li>
                        <i class="ti-home"></i>
                        <a href="#" target="_parent">Trang chủ</a>
                    </li>
                    <li>
                        <i class="ti-user"></i>
                        <a href="./bacsi.html" target="_parent">Bác sĩ</a>
                    </li>
                    <li>
                        <i class="ti-bookmark-alt"></i>
                        <a href="" target="_parent">
                            Chuyên khoa
                        </a>
                        <ul class="subnav">
                            <li>Lâm sàn</li>
                            <li>Nhi</li>
                            <li>Nội tổng hợp</li>
                            <li>Gây mê và hồi sức</li>
                            <li>Khoa chấn thương</li>
                        </ul>
                    </li>
                    <li>
                        <i class="ti-archive"></i>
                        <a href="./dichvu.html" target="_parent">Dịch vụ</a>
                    </li>
                    <li>
                        <i class="ti-list"></i>
                        <a href="" target="_parent">
                            Khác
                        </a>
                        <ul class="subnav">
                            <li id="login">
                                <i class="ti-user"></i>
                                <a href="login.php" target="_parent">Đăng nhập</a>
                            </li>
                            <li id="register">
                                <i class="ti-user"></i>
                                <a href="register.php" target="_parent">Đăng kí</a>
                            </li>
                        </ul>
                    </li>

                </div>
            </div>
        </div>
        <div class="slider-body">
            <div class="slider">
                <div class="image">
                    <div class="slider">
                        <img id="slide" src="./asset/img/img1.png" alt="Slide image" />
                    </div>
                </div>

                <script>
                    const images = [
                        "./asset/img/img1.png",
                        "./asset/img/img2.png"
                    ];
                    let currentIndex = 0;

                    setInterval(() => {
                        currentIndex = (currentIndex + 1) % images.length;
                        document.getElementById("slide").src = images[currentIndex];
                    }, 2500);
                </script>
            </div>
        </div>

        <div class="doctor-container">
            <div class="container-doc">

                <div class="box-doctor">
                    <div class="img-doc">
                        <img src="./asset/img/img_Bs_Ha.webp" alt="">
                    </div>
                    <div class="name-doc">
                        <h4>BS.CK2 Nguyễn Thị Thu Hà</h4>
                    </div>
                    <div class="chyenkhoa-doc">
                        <h4>Nhi Khoa</h4>
                    </div>
                    <div class="booking-now">
                        <h4>Đặt lịch ngay</h4>
                        <div class="ti-arrow-right"></div>
                    </div>
                </div>
                
                <div class="box-doctor">
                    <div class="img-doc">
                        <img src="./asset/img/img_BS_Huyen.webp" alt="">
                    </div>
                    <div class="name-doc">
                        <h4>ThS.BS.CK2 Hoàng Thị Thu Huyền</h4>
                    </div>
                    <div class="chyenkhoa-doc">
                        <h4>Sản phụ khoa - Ung bướu</h4>
                    </div>
                    <div class="booking-now">
                        <h4>Đặt lịch ngay</h4>
                        <div class="ti-arrow-right"></div>
                    </div>
                </div>

                <div class="box-doctor">
                    <div class="img-doc">
                        <img src="./asset/img/img_Bs_Trung.webp" alt="">
                    </div>
                    <div class="name-doc">
                        <h4>PGS.TS.BS Lâm Việt Trung</h4>
                    </div>
                    <div class="chyenkhoa-doc">
                        <h4>Tiêu hóa - Ngoại tiết niệu</h4>
                    </div>
                    <div class="booking-now">
                        <h4>Đặt lịch ngay</h4>
                        <div class="ti-arrow-right"></div>
                    </div>
                </div>

                <div class="box-doctor">
                    <div class="img-doc">
                        <img src="./asset/img/img_BS_Hieu.webp" alt="">
                    </div>
                    <div class="name-doc">
                        <h4>BS.CK2 Võ Đức Hiếu</h4>
                    </div>
                    <div class="chyenkhoa-doc">
                        <h4>Ung bướu</h4>
                    </div>
                    <div class="booking-now">
                        <h4>Đặt lịch ngay</h4>
                        <div class="ti-arrow-right"></div>
                    </div>
                </div>

                <div class="box-doctor">
                    <div class="img-doc">
                        <img src="./asset/img/img_Bs_Thang.webp" alt="">
                    </div>
                    <div class="name-doc">
                        <h4>TS.BS Nguyễn Bá Thắng</h4>
                    </div>
                    <div class="chyenkhoa-doc">
                        <h4>Nội thần kinh</h4>
                    </div>
                    <div class="booking-now">
                        <h4>Đặt lịch ngay</h4>
                        <div class="ti-arrow-right"></div>
                    </div>
                </div>

                <div class="box-doctor">
                    <div class="img-doc">
                        <img src="./asset/img/img_BS_Nam.webp" alt="">
                    </div>
                    <div class="name-doc">
                        <h4>PGS.TS.BS Trần Thanh Nam</h4>
                    </div>
                    <div class="chyenkhoa-doc">
                        <h4>Nội tiết</h4>
                    </div>
                    <div class="booking-now">
                        <h4>Đặt lịch ngay</h4>
                        <div class="ti-arrow-right"></div>
                    </div>
                </div>

                <div class="box-doctor">
                    <div class="img-doc">
                        <img src="./asset/img/img_Bs_Linh.webp" alt="">
                    </div>
                    <div class="name-doc">
                        <h4>ThS.CK2 Huỳnh Phan Phúc Linh</h4>
                    </div>
                    <div class="chyenkhoa-doc">
                        <h4>Cơ xương khớp</h4>
                    </div>
                    <div class="booking-now">
                        <h4>Đặt lịch ngay</h4>
                        <div class="ti-arrow-right"></div>
                    </div>
                </div>

            </div>
            <a href="">Xem thêm</a>
        </div>
        <div>
            
        </div>
        <div class="container">
            <div class="row-body">
                <div class="col-75">
                    <div class="text-justify">
                        <h2 class="upper-case">Đặt lịch khám</h2>
                    </div>
                    <form action="./admin/view/phieukham/them.php" id="form-dk" method="POST">
                        <div class="time">
                            <label for="">Khung giờ <small>*</small></label>
                            <select name="khunggio" id="">
                                <option value="14:00">14:00 </option>
                                <option value="09:00">09:00 </option>
                                <option value="13:00">13:00 </option>
                                <option value="15:00">15:00 </option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-row-32">
                                <div class="form-group">
                                    <label for="">Họ và tên <small>*</small></label>
                                    <input type="text" name="hoten" placeholder="Họ và tên" required>
                                </div>
                            </div>
                            <div class="col-row-32">
                                <div class="form-group">
                                    <label for="">Email <small>*</small></label>
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-row-32">
                                <div class="form-group">
                                    <label for="">Số điện thoại <small>*</small></label>
                                    <input type="text" name="sdt" placeholder="Số điện thoại" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-row-32">
                                <div class="form-group">
                                    <label for="">Chuyên khoa</label>
                                    <select name="chuyenkhoa" id="">
                                        <?php foreach ($rowCK as $ck) { ?>
                                            <option><?php echo $ck['tenchuyenkhoa']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-row-32">
                                <div class="form-group">
                                    <label for="">Bác sĩ</label>
                                    <select name="bacsi" id="">
                                        <?php foreach ($rowBS as $bs) { ?>
                                            <option><?php echo $bs['tenbacsi']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-row-32">
                                <div class="form-group">
                                    <label for="">Dịch Vụ</label>
                                    <select name="dichvu" id="">
                                        <?php foreach ($rowDV as $dv) { ?>
                                            <option><?php echo $dv['tendichvu']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group-center center">
                                <button type="submit">
                                    <i class="ti-check-box"></i>
                                    Gửi thông tin đặt lịch
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-25">
                    <div class="confirm box">
                        <h3><i class="ti-check-box"></i>Lịch hẹn mới xác nhận</h3>
                    </div>

                    <div class=" new-feed  box">
                        <h3><i class="ti-receipt"></i>Tin bài mới</h3>

                        <div class="form-new">
                            <img src="./asset/img/new-1.jpeg" alt="">
                            <a class="font-weight" href="#">
                                Lãnh đạo tỉnh thăm, động viên và chúc Tết tại Bệnh viện
                                <br>
                                <div class="time-newfeed"><i class="ti-notepad"></i>06/02/2024</div>
                            </a>
                        </div>
                        <div class="form-new">
                            <img src="./asset/img/new-2.jpeg" alt="">
                            <a class="font-weight" href="#">
                                Bệnh viện A tổ chức Hội nghị Tổng kết công tác bệnh viện năm 2023
                                <br>
                                <div class="time-newfeed"><i class="ti-notepad"></i>31/01/2024</div>
                            </a>
                        </div>
                        <div class="form-new">
                            <img src="./asset/img/new-3.png" alt="">
                            <a class="font-weight" href="#">
                                Báo cáo tự kiểm tra, đánh giá chất lượng Bệnh viện năm 2023
                                <br>
                                <div class="time-newfeed"><i class="ti-notepad"></i>30/01/2024</div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="foot" class="footer">
            <div class="row-footer text-while">
                <div class="col-30 ">
                    <div class="infor">
                        <img src="./asset/img/logo-bottom.png" alt="">
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
                            <img src="./asset/img/map.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-botton">
                <p>Copyright ©2024 - Bệnh viện A Thái Nguyên - Chịu trách nhiệm nội dung:
                    GĐBV BSCKII Hà Hải Bằng</p>
            </div>
        </div>
    </div>
</body>

</html>