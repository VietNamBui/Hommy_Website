<?php
// Bao gồm class quản lý tài khoản
include_once('pages/quan_li_he_thong/class/clsquanlyTK.php');

// Khởi tạo đối tượng quản lý tài khoản
$qlTaiKhoan = new QuanLyTaiKhoan();

// Xử lý các hành động (nếu có)
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $maTK = isset($_GET['maTK']) ? $_GET['maTK'] : null;
    $maLoai = isset($_GET['maLoai']) ? $_GET['maLoai'] : null;

    if ($maTK) {
        if ($action == 'lock') {
            // Gọi phương thức khóa tài khoản
            $qlTaiKhoan->khoaTaiKhoan($maTK);
        } elseif ($action == 'unlock') {
            // Gọi phương thức mở khóa tài khoản
            $qlTaiKhoan->moKhoaTaiKhoan($maTK);
        } elseif ($action == 'delete') {
            // Gọi phương thức xóa tài khoản
            $qlTaiKhoan->xoaTaiKhoan($maTK, $maLoai);
        }
    }

    // Sau khi thực hiện hành động, chuyển hướng về trang quản lý tài khoản
    header('Location: index.php?page=quan_li_tai_khoan');
    exit();
}

// Xử lý thêm tài khoản
if (isset($_POST["dangKy"])) {
    $tenTK = $_POST['tenTK'];
    $matKhau = $_POST['matKhau']; // Lấy mật khẩu từ form
    $maLoai = $_POST['maLoai'];
    $trangThai = $_POST['trangThai'];
    $ten = $_POST['ten'];
    $soDT = $_POST['soDT'];
    $email = $_POST['email'];
    $diaChi = $_POST['diaChi'];
    $khuVuc = isset($_POST['khuVuc']) ? $_POST['khuVuc'] : '';
    // Gọi phương thức thêm tài khoản
    $qlTaiKhoan->themTaiKhoan($tenTK, $matKhau, $maLoai, $trangThai, $ten, $soDT, $email, $diaChi, $khuVuc);

    // Chuyển hướng về trang quản lý tài khoản
    header("Location: index.php?page=quan_li_tai_khoan");
    exit();
}

// Lấy danh sách tài khoản
$danhSachTaiKhoan = $qlTaiKhoan->danhSachTaiKhoan();
?>