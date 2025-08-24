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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chuyên khoa </title>
    <link rel="stylesheet" href="../../asset/main.css">
    <link rel="stylesheet" href="../../asset/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../asset/bacsi_css.css">
    <script src="../../asset/javascript/main_js.js" defer></script>
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
                    <a href="#">Bác sĩ</a>
                </li>
                <li>
                    <i class="ti-bookmark-alt"></i>
                    <a href="#" onclick="location.replace('chuyenkhoa.php')">Chuyên khoa</a>
                </li>
                <li>
                    <i class="ti-archive"></i>
                    <a href="#" onclick="location.replace('dichvu.php')">Dịch vụ</a>
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
            <h1>Trang thông tin bác sĩ</h1>
            <h5>Thăm khám cùng các Bác sĩ đầu ngành với trình độ cao và nhiều năm khám, chữa bệnh</h5>
        </div>
        <!-- Nút mở popup -->
        <div class="button"><button id="button-select-ck">Tìm theo chuyên khoa</button></div>
        <div class="container-popup">
            <!-- Popup -->
            <div id="popup-ck" class="popup hidden">
                <div class="popup-content">
                    <span class="close-btn">&times;</span>
                    <h3>Tìm theo chuyên khoa</h3>
                    <input type="text" id="search-ck" placeholder="Tìm theo tên">

                    <div id="ck-list" class="ck-list">
                        <?php foreach ($rowCK as $ck) { ?>
                            <div class="khoa_item" data-mack="<?php echo $ck['machuyenkhoa'] ;?>">
                                <?php
                                if (!empty($ck['anh'])) {
                                    $image_data = base64_encode($ck['anh']);
                                    echo '<img src="data:image/jpeg;base64,' . htmlspecialchars($image_data) . '" alt="Ảnh chuyên khoa">';
                                } else {
                                    echo '<img src="default-icon.png" alt="Ảnh mặc định">';
                                }
                                ?>
                                <p><?php echo htmlspecialchars($ck['tenchuyenkhoa']); ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
        <div id="doctor-list" class="grid_container_doc">
                <?php foreach ($rowBS as $bs) { ?>
                    <?php if ($bs['machuyenkhoa']) { //lấy mã chuyên khoa của từng đối tượng bác sĩ để lấy ra chuyên khoa tương ứng
                        $maCKBS = $bs['machuyenkhoa'];
                        $kqCKBS = $chuyenkhoa->TenCK($maCKBS);
                        $TenCKBS = mysqli_fetch_assoc($kqCKBS);
                    } ?>

                    <div class="box-doctor">
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

                        <div class="chucvi-doc">
                            <?php echo htmlspecialchars($bs['chucvi']); ?>
                        </div>

                        <div class="chyenkhoa-doc">
                            <?php echo htmlspecialchars($TenCKBS['tenchuyenkhoa']); ?>
                        </div>
                        <div class="booking-now">
                            <h4><a href="#" onclick="location.replace('')">Đặt lịch ngay</a></h4>
                            <div class="ti-arrow-right"></div>
                        </div>
                    </div>
                <?php }; ?>
        </div>
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
    <!-- <script>
        const btnSelectCK = document.getElementById("button-select-ck");
        const popupCK = document.getElementById("popup-ck");
        const closeBtn = document.querySelector(".close-btn");

        btnSelectCK?.addEventListener("click", () => {
            popupCK?.classList.remove("hidden");
        });

        // 5. Đóng popup khi click dấu X
        closeBtn?.addEventListener("click", () => {
            popupCK?.classList.add("hidden");
        });

        // 6. Tìm kiếm chuyên khoa theo tên
        const searchInput = document.getElementById("search-ck");
        searchInput?.addEventListener("input", function() {
            const keyword = this.value.toLowerCase();
            const items = document.querySelectorAll(".khoa_item");

            items.forEach(item => {
                const name = item.getAttribute("data-name")?.toLowerCase() || "";
                item.style.display = name.includes(keyword) ? "block" : "none";
            });
        });
    </script> -->
</body>

</html>