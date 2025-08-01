<?php
require_once '/xampp/htdocs/Vien_A/admin/model/database.php';
require_once '/xampp/htdocs/Vien_A/admin/model/chuyenkhoa.php';

class ChuyenkhoaController
{
    public $db;
    public $chuyenkhoa;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->ketnoi();
        $this->chuyenkhoa = new Chuyenkhoa($this->db);
    }
    public function DSCK(){
        $kq = $this->chuyenkhoa->layDSCK();
        require_once '/xampp/htdocs/Vien_A/admin/view/chuyenkhoa/index.php';
    }
    public function DSCKUSER(){
        $kq = $this->chuyenkhoa->layDSCK();
        return $kq;
    }
    
    public function DSCKTheoMa($machuyenkhoa){
        $kq = $this->chuyenkhoa->layDSCKTheoMa($machuyenkhoa);
        return $kq;
    }

    public function themCK($machuyenkhoa, $tenchuyenkhoa){
        $kq = $this->chuyenkhoa->themCK($machuyenkhoa, $tenchuyenkhoa);
        echo "Thêm thành công chuyên khoa";
    }

    public function suaCK($machuyenkhoa,$tenchuyenkhoa){
        $kq = $this->chuyenkhoa->suaCK($machuyenkhoa,$tenchuyenkhoa);
        echo "Sửa thành công chuyên khoa";
    }

    public function xoaCK($machuyenkhoa){
        $kq = $this->chuyenkhoa->xoaCK($machuyenkhoa);
        require_once '/xampp/htdocs/Vien_A/admin/view/chuyenkhoa/index.php';
        echo "Xóa thành công chuyên khoa";
    }
}

?>