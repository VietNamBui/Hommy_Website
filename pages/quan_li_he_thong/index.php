<?php
// Đảm bảo session đang được khởi tạo
session_start();

// Kiểm tra quyền truy cập
if (!isset($_SESSION['maLoai']) || $_SESSION['maLoai'] != 5) {
    // Chuyển hướng về index.php ở tầng đầu tiên
    header("Location:index.php"); // Sửa đường dẫn đúng
    exit();
} else {
    // Include các file cần thiết
    require_once("pages/quan_li_he_thong/class/clsdb.php");
    require_once("pages/quan_li_he_thong/layout/header.php");

    $page = isset($_GET["page"]) ? $_GET["page"] : 'trangchu';
    $page = preg_replace('/[^a-zA-Z0-9-_]/', '', $page); // Lọc ký tự đặc biệt
    $cate = isset($_GET["cate"]) ? $_GET["cate"] : null;

    if (file_exists("pages/quan_li_he_thong/pages/$page/index.php")) {
        include("pages/quan_li_he_thong/pages/$page/index.php");
    } else {
        echo "Trang không tồn tại!";
    }
    include("pages/quan_li_he_thong/layout/footer.php");
}
?>
