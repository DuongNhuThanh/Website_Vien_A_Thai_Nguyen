<?php
require_once '/xampp/htdocs/Vien_A/admin/model/database.php';
require_once '/xampp/htdocs/Vien_A/admin/model/dichvu.php';

class DichvuController
{
    public $db;
    public $dichvu;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->ketnoi();
        $this->dichvu = new Dichvu($this->db);
    }
    public function DSDV(){
        $kq = $this->dichvu->layDSDV();
        require_once "/xampp/htdocs/Vien_A/admin/view/dichvu/index.php";
    }
    public function DSDVUSER(){
        $kq = $this->dichvu->layDSDV();
        return $kq;
    }

    public function DSDVTheoMa($madichvu){
        $kq = $this->dichvu->layDSDVTheoMa($madichvu);
        return $kq;
    }
    public function DSDVTheoChuyenKhoa($machuyenkhoa){
        $kq = $this->dichvu->layDVTheoMaCK($machuyenkhoa);
        return $kq;
    }

    public function themDV($madichvu,$tendichvu,$mota,$chiphi,$chuyenkhoa){
        $kq = $this->dichvu->themDV($madichvu,$tendichvu,$mota,$chiphi,$chuyenkhoa);
        echo "Thêm dịch vụ thành công";
    }

    public function suaDV($madichvu,$tendichvu,$mota,$chiphi,$chuyenkhoa){
        $kq = $this->dichvu->suaDV($madichvu,$tendichvu,$mota,$chiphi,$chuyenkhoa);
        echo "Sửa dịch vụ thành công";
    }

    public function xoaDV($madichvu){
        $kq = $this->dichvu->xoaDV($madichvu);
        echo "Xóa dịch vụ thành công";
    }
}

?>