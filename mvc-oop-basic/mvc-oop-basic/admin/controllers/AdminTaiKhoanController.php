<?php

class AdminTaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
    }

    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';
    }

    public function postAddQuanTri()
    {
        //Kiểm xem dữ liệu có được submit lên hay không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Lấy ra dữ liệu 
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            //Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }

            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            $_SESSION['error'] = $errors;
            //Nếu không có lỗi thì thực hiện thêm mới
            if (empty($errors)) {
                //Nếu có lỗi thì tiến hành thêm danh mục
               
                //đặt password mặc định
                $password = password_hash('123@123ab' , PASSWORD_BCRYPT);

                $chuc_vu_id = 1;
                
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten,$email,$password,$chuc_vu_id);

                header('location: ' . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                //Trả về form và lỗi
                $_SESSION['flash'] = true;

                header('location: ' . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        
        }
    }

    
}