<?php
ob_start(); 
session_start();
require_once("class/clsdatabase.php");

if (isset($_SESSION['maLoai'])) {
    switch ($_SESSION['maLoai']) {
        case 2:
            require("layout/header-cda.php");
            break;
        case 3:
        case 4:
        case 5:
            require("pages/quan_li_he_thong/index.php");
            exit(); // Ngăn chặn xử lý thêm
        default:
            require("layout/header.php");
            break;
    }
} else {
    require("layout/header.php");
}

// Xử lý các trang khác
$page = isset($_GET["page"]) ? $_GET["page"] : 'trang_chu';
$page = preg_replace('/[^a-zA-Z0-9-_]/', '', $page); // Lọc ký tự đặc biệt
$cate = isset($_GET["cate"]) ? $_GET["cate"] : null;

if (file_exists("pages/$page/index.php")) {
    include("pages/$page/index.php");
} else {
    echo "Trang không tồn tại!";
}

include("layout/footer.php");
?>
