<?php

require_once 'models/SanPham.php';
class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;

    public $modelGioHang;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
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
    function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            // ✅ nếu login thành công (trả về array)
            if (is_array($user)) {
                $_SESSION['user_client'] = $user;

                header("Location: " . BASE_URL);
                exit();
            }
            // ❌ nếu sai (trả về string lỗi)
            else {
                $_SESSION['error'] = $user; // đảm bảo là string

                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=login');
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
            $so_luong = $_POST['so_luong'];

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
            //Thêm thông tin vào db
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
            //  header("Location: " . BASE_URL . '?act=trangchu');

            //Lấy thông tin giỏ hàng của người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

            //Lưu sản phẩm vào chi tiết đơn hàng
            if ($donhang) {
                //Lấy ra toàn bộ sản phẩm trong giỏ hàng
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

                //Thêm từng sản phẩm từ giỏ hàng vào bảng chi tiết đơn hàng 
                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham']; //Ưu tiên đơn giá sẽ lây giá khuyến mãi

                    $this->modelDonHang->addChiTietDonHang(
                        $donhang, //ID đơn hàng
                        $item['san_pham_id'], //ID sản phẩm
                        $donGia, //Đơn giá
                        $item['so_luong'], //Số lượng
                        $donGia * $item['so_luong'] //Thành tiền
                    );
                }

                //Sau khi thêm xong thì phải tiến hành xóa sản phẩm trong giỏ hàng
                // Xóa toàn bộ sản phẩm trong chi tiết giỏ hàng
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);

                //Xóa thông tin giỏ hàng người dùng
                $this->modelGioHang->clearGioHang($tai_khoan_id);

                //Chuyển hướng về trang lịch sử mua hàng   
                header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
                exit();
            } else {
                echo "Đặt hàng thất bại. Vui lòng thử lại.";
            }
        }
    }



    public function lichSuMuaHang(){
        
    }
    public function chiTietMuaHang(){

    }
    public function huyDonHang(){

    }
}
