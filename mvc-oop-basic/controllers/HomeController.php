<?php

require_once 'models/SanPham.php';
class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;

    public $modelGioHang;
    public $modelDonHang;

    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
        $this->modelSanPham = new SanPham($this->conn);
        $this->modelTaiKhoan = new TaiKhoan($this->conn);
        $this->modelGioHang = new GioHang($this->conn);
        $this->modelDonHang = new DonHang($this->conn);
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $chiTietGioHang = $this->getMiniCart();
        require_once './views/home.php';
    }

    public function gioiThieu()
    {
        require_once './views/gioiThieu.php';
    }

    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);

        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
    function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }
    public function logout()
    {
        unset($_SESSION['user_client']);
        header("Location: " . BASE_URL . '?act=login');
        exit();
    }
    function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if (is_array($user)) {
                $_SESSION['user_client'] = $user;

                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user; // đảm bảo là string

                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    function formSignup()
    {

        require_once './views/auth/formSingup.php';
        deleteSessionError();
        exit();
    }
    public function postSignup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten = $_POST['ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];

            // kiểm tra dữ liệu rỗng
            if (empty($ten) || empty($email) || empty($password) || empty($confirm_password)) {
                $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin";
                header("Location: " . BASE_URL . "?act=signup");
                exit();
            }

            // kiểm tra mật khẩu
            if ($password != $confirm_password) {
                $_SESSION['error'] = "Mật khẩu không trùng khớp";
                header("Location: " . BASE_URL . "?act=signup");
                exit();
            }

            // kiểm tra email tồn tại
            $checkEmail = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);

            if ($checkEmail) {
                $_SESSION['error'] = "Email đã tồn tại";
                header("Location: " . BASE_URL . "?act=signup");
                exit();
            }

            // mã hóa mật khẩu
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            // thêm tài khoản
            $insert = $this->modelTaiKhoan->insertTaiKhoan(
                $ten,
                $email,
                $hashPassword,
                $ngay_sinh,
                $so_dien_thoai,
                $dia_chi
            );

            if ($insert) {
                $_SESSION['success'] = "Đăng ký thành công, hãy đăng nhập";
                header("Location: " . BASE_URL . "?act=login");
                exit();
            } else {
                $_SESSION['error'] = "Đăng ký thất bại";
                header("Location: " . BASE_URL . "?act=signup");
                exit();
            }
        }
    }
    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_SESSION['user_client']))
                $user = $_SESSION['user_client'];            //Lấy dữ liệu giỏ hàng của người dùng 
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = (int)$_POST['so_luong'];

            $checkSanPham = false;
            foreach ($chiTietGioHang as $detail) {
                if ($detail['san_pham_id'] == $san_pham_id) {
                    $newSoluong = $detail['so_luong'] + $so_luong;
                    $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoluong);
                    $checkSanPham = true;
                    break;
                }
            }
            if (!$checkSanPham) {
                $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
            }
            header("Location: " . BASE_URL . '?act=gio-hang');
        } else {
        }
    }

    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $_SESSION['user_client'];

            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
            }

            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            require_once './views/gioHang.php';
        } else {
            header("Location: " . BASE_URL . '?act=login');
            exit();
        }
    }

    public function capNhatGioHang()
    {
        if (!isset($_SESSION['user_client'])) {
            header("Location: " . BASE_URL . '?act=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_SESSION['user_client'];
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

            if ($gioHang && isset($_POST['so_luong']) && is_array($_POST['so_luong'])) {
                foreach ($_POST['so_luong'] as $san_pham_id => $so_luong) {
                    $so_luong = (int)$so_luong;
                    if ($so_luong > 0) {
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $so_luong);
                    }
                }
            }
        }

        header("Location: " . BASE_URL . '?act=gio-hang');
        exit();
    }

    public function xoaGioHang()
    {
        if (!isset($_SESSION['user_client'])) {
            header("Location: " . BASE_URL . '?act=login');
            exit();
        }

        $user = $_SESSION['user_client'];
        $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

        if (!$gioHang) {
            header("Location: " . BASE_URL . '?act=gio-hang');
            exit();
        }

        $sanPhamId = $_GET['id_san_pham'] ?? null;
        if ($sanPhamId) {
            $this->modelGioHang->deleteDetailGioHangItem($gioHang['id'], $sanPhamId);
        }

        header("Location: " . BASE_URL . '?act=gio-hang');
        exit();
    }

    public function thanhToan()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $_SESSION['user_client'];

            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
            }

            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            require_once './views/thanhToan.php';
        } else {
            header("Location: " . BASE_URL . '?act=login');
            exit();
        }
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'] ?? null;

            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;
            $ma_don_hang = 'DH-' . rand(1000, 9999);

            $user = $_SESSION['user_client'];
            $tai_khoan_id = $user['id'];

            // Lấy ra sản phẩm trong giỏ hàng hiện tại
            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($tai_khoan_id);
                $gioHang = ['id' => $gioHangId];
            }
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            if (empty($chiTietGioHang)) {
                echo "Giỏ hàng trống. Vui lòng chọn sản phẩm trước khi đặt hàng.";
                exit();
            }

            try {
                $this->conn->beginTransaction();

                // Kiểm tra tồn kho
                foreach ($chiTietGioHang as $item) {
                    $stock = $this->modelSanPham->getStock($item['san_pham_id']);
                    if ($item['so_luong'] > $stock) {
                        throw new Exception("Sản phẩm {$item['ten_san_pham']} chỉ còn {$stock} trong kho.");
                    }
                }

                // Thêm đơn hàng mới
                $donhang = $this->modelDonHang->addDonHang(
                    $tai_khoan_id,
                    $ten_nguoi_nhan,
                    $email_nguoi_nhan,
                    $sdt_nguoi_nhan,
                    $dia_chi_nguoi_nhan,
                    $ghi_chu,
                    $tong_tien,
                    $phuong_thuc_thanh_toan_id,
                    $ngay_dat,
                    $trang_thai_id,
                    $ma_don_hang
                );

                if (!$donhang) {
                    throw new Exception('Không thể tạo đơn hàng.');
                }

                // Lưu từng sản phẩm vào chi tiết đơn hàng và giảm tồn kho
                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                    $this->modelDonHang->addChiTietDonHang(
                        $donhang,
                        $item['san_pham_id'],
                        $donGia,
                        $item['so_luong'],
                        $donGia * $item['so_luong']
                    );

                    $this->modelSanPham->changeStock($item['san_pham_id'], -$item['so_luong']);
                }

                // Xóa chi tiết giỏ hàng sau khi đặt hàng thành công
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);

                $this->conn->commit();

                header("Location: " . BASE_URL . '?act=lich_su_mua_hang');
                exit();
            } catch (Exception $e) {
                $this->conn->rollBack();
                echo "Đặt hàng thất bại: " . $e->getMessage();
                exit();
            }
        }
    }



    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            // Lấy ra thông tin tài khoản đăng nhập
            $user = $_SESSION['user_client'];
            $tai_khoan_id = $user['id'];

            // Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaIDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');


            // Lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');


            // Lấy ra danh sách tất cả trạng thái của tài khoản
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            require_once "./views/lichSuMuaHang.php";
        } else {
            var_dump("Ban chua dang nhap");
            die;
        }
    }
    public function chiTietMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            // Lấy ra thông tin tài khoản đăng nhập
            $user = $_SESSION['user_client'];
            $tai_khoan_id = $user['id'];

            // Lấy id đơn hàng truyền từ URL
            $donHangId = $_GET['id'];


            // Lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaIDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');


            // Lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // Lấy ra thông tin đơn hàng theo ID
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            // Lấy thông tin sản phẩm của đơn hàng trong bảng chi tiết đơn hàng
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);


            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền truy cập đơn hàng này.";
                exit;
            }

            require_once './views/chiTietMuaHang.php';
        } else {
            var_dump("Ban chua dang nhap");
            die;
        }
    }
    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $_SESSION['user_client'];
            $tai_khoan_id = $user['id'];
            $donHangId = $_GET['id'];
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền hủy đơn hàng này";
                exit;
            }
            if ($donHang['trang_thai_id'] != 1) {
                echo "Chỉ đơn hàng ở trạng thái 'Chưa xác nhận' mới có thể hủy";
                exit;
            }

            try {
                $this->conn->beginTransaction();

                $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);
                foreach ($chiTietDonHang as $item) {
                    $this->modelSanPham->changeStock($item['san_pham_id'], $item['so_luong']);
                }

                $this->modelDonHang->updateTrangThaiDonHang($donHangId, 11);

                $this->conn->commit();
                header("Location: " . BASE_URL . '?act=lich_su_mua_hang');
                exit();
            } catch (Exception $e) {
                $this->conn->rollBack();
                echo "Hủy đơn hàng thất bại: " . $e->getMessage();
                exit();
            }
        } else {
            var_dump("Ban chua dang nhap");
            die;
        }
    }

    public function Products()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once './views/SanPham.php'; // file shop bạn gửi
    }


    public function lienHe()
    {
        require_once './views/lienHe.php';
    }

    public function dashboard()
    {
        require_once './views/dashboard.php';
    }

    public function thongTinCaNhan()
    {
        if (!isset($_SESSION['user_client'])) {
            header("Location: " . BASE_URL . '?act=login');
            exit;
        }

        $email = $_SESSION['user_client']['email'];

        $user = $this->modelTaiKhoan->getUserByEmail($email);

        require_once './views/thongtin.php';
    }

    public function updateProfile()
    {
        if (!isset($_SESSION['user_client'])) {
            header("Location: " . BASE_URL . '?act=login');
            exit;
        }

        $email = $_SESSION['user_client']['email'];

        // Lấy dữ liệu
        $ho_ten = $_POST['ho_ten'] ?? '';
        $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
        $dia_chi = $_POST['dia_chi'] ?? '';

        // Validate đơn giản
        if (empty($ho_ten)) {
            $_SESSION['error'] = "Họ tên không được để trống";
            header("Location: " . BASE_URL . '?act=thong-tin-ca-nhan');
            exit;
        }

        $data = [
            'ho_ten' => $ho_ten,
            'so_dien_thoai' => $so_dien_thoai,
            'dia_chi' => $dia_chi,
            'email' => $email
        ];

        $this->modelTaiKhoan->updateUser($data);

        $_SESSION['success'] = "Cập nhật thành công";

        header("Location: " . BASE_URL . '?act=thong-tin-ca-nhan');
    }
    public function getMiniCart()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $_SESSION['user_client'];

            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

            if ($gioHang) {
                return $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
        }
        return [];
    }
    public function postBinhLuan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!isset($_SESSION['user_client'])) {
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }

            $san_pham_id = $_POST['san_pham_id'];
            $noi_dung = trim($_POST['noi_dung']);

            if (empty($noi_dung)) {

                $_SESSION['error'] = ['Nội dung bình luận không được để trống'];

                header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }

            $tai_khoan_id = $_SESSION['user_client']['id'];

            $this->modelSanPham->addBinhLuan(
                $san_pham_id,
                $tai_khoan_id,
                $noi_dung
            );

            header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }
}
