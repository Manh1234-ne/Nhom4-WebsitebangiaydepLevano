<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS
<<<<<<< HEAD

define('BASE_URL'       , 'http://localhost/mvc-oop-basic/');
=======
// Đường dẫn vào phần client
define('BASE_URL'       , 'http://localhost/giaydep-levano/mvc-oop-basic/mvc-oop-basic/');

// Dường dẫn vào phần admin
define('BASE_URL_ADMIN'       , 'http://localhost/giaydep-levano/mvc-oop-basic/mvc-oop-basic/admin/');
>>>>>>> main

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
<<<<<<< HEAD
define('DB_NAME'    , 'db');  // Tên database
=======
define('DB_NAME'    , 'giaydep-levano');  // Tên database
>>>>>>> main

define('PATH_ROOT'    , __DIR__ . '/../');
