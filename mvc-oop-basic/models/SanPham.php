<?php

class SanPham
{
    public $conn;

    public function __construct($conn = null)
    {
        $this->conn = $conn ?: connectDB();
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



    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getListAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';


            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung)
    {
        $sql = "INSERT INTO binh_luans
            (san_pham_id,tai_khoan_id,noi_dung,ngay_dang)
            VALUES (?,?,?,NOW())";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $san_pham_id,
            $tai_khoan_id,
            $noi_dung
        ]);
    }


    // lấy bình luận theo sản phẩm
    public function getBinhLuanFromSanPham($id)
    {
        $sql = "SELECT bl.*, tk.ho_ten, tk.anh_dai_dien
            FROM binh_luans bl
            JOIN tai_khoans tk
            ON bl.tai_khoan_id = tk.id
            WHERE bl.san_pham_id = ?
            ORDER BY bl.id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetchAll();
    }
    public function getListSanPhamDanhMuc($danh_muc_id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.danh_muc_id = ' . $danh_muc_id;
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getStock($id)
    {
        try {
            $sql = 'SELECT so_luong FROM san_phams WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return (int)$stmt->fetchColumn();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return 0;
        }
    }

    public function changeStock($id, $delta)
    {
        try {
            $sql = 'UPDATE san_phams SET so_luong = so_luong + :delta WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':delta' => $delta,
                ':id' => $id,
            ]);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
}
