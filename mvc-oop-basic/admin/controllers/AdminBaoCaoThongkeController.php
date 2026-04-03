<?php
class AdminBaoCaoThongKeController
{
    public $modelSanPham;
    public $modelDonHang;
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDonHang = new AdminDonHang();
        $this->modelTaiKhoan = new AdminTaiKhoan();
    }

    public function home()
    {
        $sanPhams = $this->modelSanPham->getAllSanPham();
        $donHangs = $this->modelDonHang->getAllDonhang();
        $khachHangs = $this->modelTaiKhoan->getAllTaiKhoan(2);

        $sanPhams = is_array($sanPhams) ? $sanPhams : [];
        $donHangs = is_array($donHangs) ? $donHangs : [];
        $khachHangs = is_array($khachHangs) ? $khachHangs : [];

        $tongDoanhThu = 0;
        $donHoanThanh = 0;
        foreach ($donHangs as $donHang) {
            $tongDoanhThu += (float)($donHang['tong_tien'] ?? 0);
            if ((int)($donHang['trang_thai_id'] ?? 0) >= 9) {
                $donHoanThanh++;
            }
        }

        $tongDonHang = count($donHangs);
        $tiLeChotDon = $tongDonHang > 0 ? round(($donHoanThanh / $tongDonHang) * 100, 1) : 0;
        $tiLeKhachHang = $tongDonHang > 0 ? round((count($khachHangs) / $tongDonHang) * 100, 1) : 0;

        $topSanPham = $this->modelSanPham->getSanPhamDoanhThuCaoNhat();
        $topSanPham = is_array($topSanPham) ? $topSanPham : [];

        $currentYear = (int)date('Y');
        $doanhThuNamNayRaw = $this->modelDonHang->getDoanhThuTheoThangNam($currentYear);
        $doanhThuNamTruocRaw = $this->modelDonHang->getDoanhThuTheoThangNam($currentYear - 1);

        $doanhThuNamNay = array_fill(1, 12, 0);
        $doanhThuNamTruoc = array_fill(1, 12, 0);

        if ($doanhThuNamNayRaw) {
            foreach ($doanhThuNamNayRaw as $row) {
                $doanhThuNamNay[$row['thang']] = (float)$row['doanh_thu'];
            }
        }
        if ($doanhThuNamTruocRaw) {
            foreach ($doanhThuNamTruocRaw as $row) {
                $doanhThuNamTruoc[$row['thang']] = (float)$row['doanh_thu'];
            }
        }

        require_once './views/home.php';
    }
}