<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminBaoCaoThongKeController.php';
require_once './controllers/AdminTaiKhoanController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
// require_once './models/AdminSanPham.php';
require_once './models/AdminTaiKhoan.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    '/' => (new AdminBaoCaoThongKeController())->home(),
    // Route
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    // 'san-pham' => (new AdminSanPhamController())->index()

    // route quản lí tài khoản
       //Quản lí tài khoản quản trị
       'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->danhSachQuanTri(),
        'form-them-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
        'them-quan-tri' => (new AdminTaiKhoanController())->postAddQuanTri(),
        'form-sua-quan-tri' => (new AdminTaiKhoanController())->formEditQuanTri(),
        'sua-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),

        // route reset password tài khoản
        'reset-password' => (new AdminTaiKhoanController())->resetPassword(),

        //Quản lí tài khoản khách hàng
        'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())->danhSachKhachHang(),
        'form-sua-khach-hang' => (new AdminTaiKhoanController())->formEditKhachHang(),
        'sua-khach-hang' => (new AdminTaiKhoanController())->postEditKhachHang(),
        'chi-tiet-khach-hang' => (new AdminTaiKhoanController())->detailKhachHang(),
};
