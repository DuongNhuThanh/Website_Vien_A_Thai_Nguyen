<?php
require_once '/xampp/htdocs/Vien_A/admin/controler/BacsiController.php';
require_once '/xampp/htdocs/Vien_A/admin/controler/DichvuController.php';

$machuyenkhoa = $_POST['machuyenkhoa'];

$bacsiCtrl = new BacsiController();
$dichvuCtrl = new DichvuController();//tạo đối tượng trong lớp

$kqBS = $bacsiCtrl->DSBSTheoChuyenKhoa($machuyenkhoa);//lấy tên bác sĩ theo chuyên khoa
$kqDV = $dichvuCtrl->DSDVTheoChuyenKhoa($machuyenkhoa);

$dsBS = [];//tạo mảng bác sĩ
$dsDV = [];

if ($kqBS) {//đọc toàn bộ kq gán vào mảng ở cột tenbacsi
  while ($bs = mysqli_fetch_assoc($kqBS)) {
    $dsBS[] = [
      "tenbacsi" => $bs['tenbacsi'],
    ];
  }
}

if ($kqDV) {
  while ($dv = mysqli_fetch_assoc($kqDV)) {
    $dsDV[] = [
      "tendichvu" => $dv['tendichvu']
    ];
  }
}
/* echo
- Dùng để in ra kết quả cho trình duyệt hoặc JavaScript nhận được.
- Trong AJAX, echo chính là cách để gửi dữ liệu phản hồi về cho client.

["bacsi" => $dsBS, "dichvu" => $dsDV]
- Đây là một mảng kết hợp gồm 2 phần:
- "bacsi": chứa danh sách bác sĩ (mảng $dsBS)
- "dichvu": chứa danh sách dịch vụ (mảng $dsDV)*/
echo json_encode([ 
  "bacsi" => $dsBS,
  "dichvu" => $dsDV
]);