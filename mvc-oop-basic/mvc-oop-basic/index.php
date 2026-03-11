<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> main

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/Student.php';
<<<<<<< HEAD
=======
require_once './models/SanPham.php';
>>>>>>> main

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
<<<<<<< HEAD
    // Trang chủ
    
};
=======
    // Route
    '/' => (new HomeController())->home(), // trường hợp đặc biệt

    'trangchu' => (new HomeController())->trangChu(),
    // BASE_URL/?act=trangchu

    'danh-sach-san-pham' => (new HomeController())->danhSachSanPham(),
    // BASE_URL/?act=danh-sach-san-pham
};
>>>>>>> main
