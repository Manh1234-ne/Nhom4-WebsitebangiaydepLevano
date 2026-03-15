<?php

class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy danh sách sản phẩm kèm danh mục
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams
                    INNER JOIN danh_mucs 
                    ON san_phams.danh_muc_id = danh_mucs.id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Lấy danh sách sản phẩm đơn giản
    public function getAllProduct()
    {
        try {
            $sql = 'SELECT * FROM san_phams';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}