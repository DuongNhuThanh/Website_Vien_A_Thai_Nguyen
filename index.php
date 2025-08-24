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
    <link rel="stylesheet" href="./asset/main_a.css">
    <link rel="stylesheet" href="./asset/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./asset/javascript/main-js.js">
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
                        <a href="#">Trang chủ</a>
                    </li>
                    <li>
                        <i class="ti-user"></i>
                        <a href="#" onclick="location.replace('./customer/view/bacsi.php')">Bác sĩ</a>
                    </li>
                    <li>
                        <i class="ti-bookmark-alt"></i>
                        <a href="#" onclick="location.replace('./customer/view/chuyenkhoa.php')">Chuyên khoa </a>
                    </li>
                    <li>
                        <i class="ti-archive"></i>
                        <a href="#" onclick="location.replace('./customer/view/dichvu.php')">Dịch vụ</a>
                    </li>
                    <li>
                        <i class="ti-list"></i>
                        <a href="" target="_parent">
                            Khác
                        </a>
                        <ul class="subnav">
                            <li id="login">
                                <i class="ti-user"></i>
                                <a href="#" onclick="location.replace('login.php')">Đăng nhập</a>
                            </li>
                            <li id="register">
                                <i class="ti-user"></i>
                                <ahref="#" onclick="location.replace('register.php')">Đăng kí</ahref=>
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
            </div>
        </div>

        <div class="doctor-container">
            <div class="container-doc">
                <?php
                $i = 0;
                foreach ($rowBS as $bs) {
                    if ($i >= 6) break; // Dừng vòng lặp sau khi đã hiển thị 6 bác sĩ

                    if ($bs['machuyenkhoa']) {
                        $maCKBS = $bs['machuyenkhoa'];
                        $kqCKBS = $chuyenkhoa->TenCK($maCKBS);
                        $TenCKBS = mysqli_fetch_assoc($kqCKBS);
                    }
                ?>
                    <div class="box-doctor"
                        data-bacsi="<?php echo htmlspecialchars($bs['tenbacsi']); ?>"
                        data-mack="<?php echo htmlspecialchars($bs['machuyenkhoa']); ?>">

                        <div class="img-doc">
                            <?php
                            if (!empty($bs['avartar'])) {
                                $image_data = base64_encode($bs['avartar']);
                                echo '<img src="data:image/jpeg;base64,' . htmlspecialchars($image_data) . '" alt="Ảnh bác sĩ">';
                            } else {
                                echo '<p>Ảnh không tồn tại.</p>';
                            }
                            ?>
                        </div>

                        <div class="name-doc">
                            <?php echo htmlspecialchars($bs['tenbacsi']); ?>
                        </div>

                        <div class="chyenkhoa-doc">
                            <?php echo htmlspecialchars($TenCKBS['tenchuyenkhoa']); ?>
                        </div>

                        <div class="booking-now">
                            <h4>Đặt lịch ngay</h4>
                            <div class="ti-arrow-right"></div>
                        </div>
                    </div>
                <?php
                    $i++; // Tăng biến đếm sau mỗi lần hiển thị
                }
                ?>
            </div>

            <div><a href="./customer/view/bacsi.php">Xem thêm</a></div>
        </div>

        <div class="container-form-infor">
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
                                    <select name="chuyenkhoa" id="chuyenkhoa">
                                        <option value="">Chọn chuyên khoa</option>
                                        <?php foreach ($rowCK as $ck) { ?>
                                            <option value="<?php echo $ck['machuyenkhoa']; ?>">
                                                <?php echo $ck['tenchuyenkhoa']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-row-32">
                                <div class="form-group">
                                    <label for="">Bác sĩ</label>
                                    <select name="bacsi" id="bacsi" required>
                                        <option value="">Chọn bác sĩ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-row-32">
                                <div class="form-group">
                                    <label for="">Dịch Vụ</label>
                                    <select name="dichvu" id="dichvu" required>
                                        <option value="">Chọn dịch vụ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="description">
                            <div class="form-group">
                                <label for="">Triệu chứng</label>
                                <input type="text" name="mota" placeholder="Triệu chứng" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group-center center">
                                <button type="button" onclick="showConfirm()">
                                    <i class="ti-check-box"></i>
                                    Gửi thông tin đặt lịch
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="infoDisplay" style="display: none;">
                        <h3>Thông Tin Đã Đặt</h3>
                        <div id="displayContent"></div>
                    </div>
                </div>
                <div id="confirmBox" class="overlay">
                    <div class="popup">
                        <h3>Xác nhận thông tin đặt lịch</h3>
                        <div id="infoPreview"></div>
                        <div class="btn-click">
                            <button class="submit" onclick="submitForm()">Xác nhận gửi</button>
                            <button class="close" onclick="closeConfirm()">Hủy</button>
                        </div>
                    </div>
                </div>
                <script>
                    function showConfirm() {
                        const form = document.getElementById('form-dk');
                        const data = {
                            hoten: form.hoten.value.trim(),
                            email: form.email.value.trim(),
                            sdt: form.sdt.value.trim(),
                            khunggio: form.khunggio.value.trim(),
                            chuyenkhoa: form.chuyenkhoa.selectedIndex > -1 ? form.chuyenkhoa.options[form.chuyenkhoa.selectedIndex].text : '',
                            bacsi: form.bacsi.selectedIndex > -1 ? form.bacsi.options[form.bacsi.selectedIndex].text : '',
                            //để -1 để loại bỏ trường hợp nhấn đặt lịch thì nhảy thông tin thẳng form thì 
                            // 0 sự thay đổi khác -1 sự thay đổi sẽ thỏa mãn điều kiện bên dưới !data.chuyenkhoa
                            //nhấn đặt lịch ngay sẽ lấy tự động đc chuyên khoa và bác sĩ nên sẽ là 0 lần thay đổi vậy nên mới cần đặt 2 cái về -1 để 0 lần thay đổi >-1 thỏa mãn điều kiện
                            dichvu: form.dichvu.selectedIndex > 0 ? form.dichvu.options[form.dichvu.selectedIndex].text : '',
                            mota: form.mota.value.trim()
                            //trường hợp khi không nhấn đặt lịch ngay mà chọn thủ công thì khi chọn thì bắt buộc chọn chuyên khoa thì mới chọn đc bác sĩ và dịch vụ
                            //-> khi chọn chuyên khoa thì -1+1 = 0 -1 và lúc đó bác sĩ và chuyên khoa cũng phải chọn để theo chuyên khoa thì -1 bác sĩ +1 = 0>-1 thỏa mãn 
                            // tương tự dịch vụ
                        };

                        // Kiểm tra tất cả các trường bắt buộc
                        if (!data.hoten || !data.email || !data.sdt || !data.khunggio || !data.chuyenkhoa || !data.bacsi || !data.dichvu || !data.mota) {
                            alert("Vui lòng điền đầy đủ tất cả các trường trước khi xác nhận!");
                            return;
                        }

                        const preview = `
                        <p><strong>Họ tên:</strong> ${data.hoten}</p>
                        <p><strong>Email:</strong> ${data.email}</p>
                        <p><strong>SĐT:</strong> ${data.sdt}</p>
                        <p><strong>Khung giờ:</strong> ${data.khunggio}</p>
                        <p><strong>Chuyên khoa:</strong> ${data.chuyenkhoa}</p>
                        <p><strong>Bác sĩ:</strong> ${data.bacsi}</p>
                        <p><strong>Dịch vụ:</strong> ${data.dichvu}</p>
                        <p><strong>Triệu chứng:</strong> ${data.mota}</p>
                        `;
                        document.getElementById('infoPreview').innerHTML = preview;
                        document.getElementById('confirmBox').style.display = 'flex';
                    }

                    function closeConfirm() {
                        document.getElementById('confirmBox').style.display = 'none';
                    }

                    function submitForm() {
                        const form = document.getElementById('form-dk');
                        const data = {
                            hoten: form.hoten.value.trim(),
                            email: form.email.value.trim(),
                            sdt: form.sdt.value.trim(),
                            khunggio: form.khunggio.value.trim(),
                            chuyenkhoa: form.chuyenkhoa.selectedIndex > 0 ? form.chuyenkhoa.options[form.chuyenkhoa.selectedIndex].text : '',
                            bacsi: form.bacsi.selectedIndex > 0 ? form.bacsi.options[form.bacsi.selectedIndex].text : '',
                            dichvu: form.dichvu.selectedIndex > 0 ? form.dichvu.options[form.dichvu.selectedIndex].text : '',
                            mota: form.mota.value.trim()
                        };

                        const display = `
                        <p><strong>Họ tên:</strong> ${data.hoten}</p>
                        <p><strong>Email:</strong> ${data.email}</p>
                        <p><strong>SĐT:</strong> ${data.sdt}</p>
                        <p><strong>Khung giờ:</strong> ${data.khunggio}</p>
                        <p><strong>Chuyên khoa:</strong> ${data.chuyenkhoa}</p>
                        <p><strong>Bác sĩ:</strong> ${data.bacsi}</p>
                        <p><strong>Dịch vụ:</strong> ${data.dichvu}</p>
                        <p><strong>Triệu chứng:</strong> ${data.mota}</p>
                        `;
                        document.getElementById('displayContent').innerHTML = display;
                        document.getElementById('confirmBox').style.display = 'none';
                        form.submit();
                    }
                </script>

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
        <div class="feed-back center" style="margin: 150px 0;">
            <div>
                <h1>Feed-back</h1>
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
    <script src="./asset/javascript/main_js.js"></script>


</body>

</html>