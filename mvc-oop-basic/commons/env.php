<?php



// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS
// Đường dẫn vào phần client

// Dường dẫn vào phần admin
define('BASE_URL'       , 'http://localhost/giaydep-levano/mvc-oop-basic/');

// Dường dẫn vào phần admin
define('BASE_URL_ADMIN'       , 'http://localhost/giaydep-levano/mvc-oop-basic/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'giaydep-levano');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
