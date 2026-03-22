<?php
class SanPham {
    public $conn; // Khai báo phương thức

class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy danh sách sản phẩm
        try{
            $sql = 'SELECT * FROM san_phams';

    public function getAllSanPham()
    {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            ';
            $stmt = $this->conn->prepare($sql);


            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
