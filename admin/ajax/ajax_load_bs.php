<?php
// Cấu hình phản hồi JSON và hiển thị lỗi
header('Content-Type: application/json; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Import controller
require_once '/xampp/htdocs/Vien_A/admin/controler/BacsiController.php';
// require_once '/xampp/htdocs/Vien_A/admin/controler/ChuyenkhoaController.php';


// Lấy dữ liệu POST
$machuyenkhoa = $_POST['machuyenkhoa'] ?? null;

// Kiểm tra dữ liệu đầu vào
if (!$machuyenkhoa) {
    http_response_code(400);
    echo json_encode([
        "error" => "Thiếu mã chuyên khoa."
    ]);
    exit;
}

// Khởi tạo controller và truy vấn dữ liệu
$bacsiCtrl = new BacsiController();
// $chuyenkhoaCtrl = new ChuyenkhoaController();

$kqBS = $bacsiCtrl->DSBSCK($machuyenkhoa);

// Kiểm tra kết quả truy vấn
if (!$kqBS) {
    http_response_code(500);
    echo json_encode([
        "error" => "Không thể truy vấn dữ liệu bác sĩ từ CSDL."
    ]);
    exit;
}

// Xử lý dữ liệu bác sĩ
$dsBS = [];
while ($bs = mysqli_fetch_assoc($kqBS)) {
    // if(isset($bs['machuyenkhoa'])){
    //     $ck = $chuyenkhoaCtrl->TenCK($bs['machuyenkhoa']);
    //     $bs['machuyenkhoa'] = $ck['tenchuyenkhoa'] ?? '';
    // }
    $dsBS[] = [
        "avartar"       => !empty($bs['avartar']) ? base64_encode($bs['avartar']) : null,
        "tenbacsi"      => $bs['tenbacsi'] ?? '',
        "chucvi"        => $bs['chucvi'] ?? '',
    ];
}

// Kiểm tra danh sách rỗng
if (empty($dsBS)) {
    http_response_code(404);
    echo json_encode([
        "error" => "Không tìm thấy bác sĩ cho chuyên khoa này."
    ]);
    exit;
}

// Trả về dữ liệu JSON
echo json_encode([
    "bacsi" => $dsBS
]);
