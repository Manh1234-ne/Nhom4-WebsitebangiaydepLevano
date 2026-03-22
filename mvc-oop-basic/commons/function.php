<?php

// Kết nối CSDL qua PDO
function connectDB() {
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

// Upload file
function uploadFile($file, $folderUpload){
    $pathStorage = $folderUpload . time() . $file['name'];

    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;

    if(move_uploaded_file($from, $to)){
        return $pathStorage;
    }
    return null;
}

// Xóa file
function deleteFile($file){
    $pathDelete = PATH_ROOT . $file;
    if(file_exists($pathDelete)){
        unlink($pathDelete);
    }
}

// Xóa session sau khi load trang
function deleteSessionError(){
    if(isset($_SESSION['flash'])){
        unset($_SESSION['flash']);
        unset($_SESSION['error']);
        // session_unset();
        // session_destroy();
    }
}

// Upload album ảnh
function uploadFileAlbum($file, $folderUpload, $key){
    $pathStorage = $folderUpload . time() . $file['name'][$key];

    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;

    if(move_uploaded_file($from, $to)){
        return $pathStorage;
    }
    return null;
}

// Format ngày
function formatDate($date){
    if (empty($date) || $date === null) return '';
    $ts = strtotime($date);
    if ($ts === false) return '';
    return date("d-m-Y", $ts);
}

// Kiểm tra đăng nhập admin
function checkLoginAdmin(){
    if (!isset($_SESSION['user_admin'])) {
        header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        exit();
    }
}

// Format giá
function formatPrice($price){
    return number_format($price, 0, ',', '.');
}