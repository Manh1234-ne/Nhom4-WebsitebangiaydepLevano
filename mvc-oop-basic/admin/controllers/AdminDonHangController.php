<?php
class AdminDonHangController
{
    public $modelDonHang;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './views/donhang/listDonHang.php';
    }
    public function detailDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        // lấy thông tin đơn hàng ở bảng don_hangs
        $don_hang = $this->modelDonHang->getDetailDonHang($don_hang_id);

        // lấy danh sách sản phẩm của đơn hàng ở bảng chi_tiet_don_hangs
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
        require_once './views/donhang/detailDonHang.php';
    }
}
