<?php
require_once '/xampp/htdocs/Vien_A/admin/model/database.php';
require_once '/xampp/htdocs/Vien_A/admin/model/phieukham.php';

class PhieukhamController
{
    public $db;
    public $phieukham;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->ketnoi();
        $this->phieukham = new Phieukham($this->db);
    }
    public function DSPK(){
        $kq = $this->phieukham->layDSPK();
        require_once "/xampp/htdocs/Vien_A/admin/view/phieukham/index.php";
    }

    public function themPK($maphieu,$thoigian,$hoten,$email,$sdt,$chuyenkhoa,$bacsi,$dichvu,$mota){
        $kq = $this->phieukham->themPK($maphieu,$thoigian,$hoten,$email,$sdt,$chuyenkhoa,$bacsi,$dichvu,$mota);
        echo "<script>
        alert('Cảm ơn bạn đã gửi thông tin!');
        window.location.href = '/Vien_A/index.php'; 
        </script>";
    }

    public function xoaPK($maphieu){
        $kq = $this->phieukham->xoaPK($maphieu);
        echo "Xóa phiếu thành công";
    }
}

?>