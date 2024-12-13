<?php
// Xử lý sửa tài khoản
if (isset($_POST['suaTaiKhoan'])) {
    $maTK = $_POST['maTK'];
    $tenTK = $_POST['tenTK'];
    $matKhau = $_POST['matKhau'];
    $maLoai = $_POST['maLoai'];
    $trangThai = $_POST['trangThai'];
    $ten = $_POST['ten'];
    $soDT = $_POST['soDT'];
    $email = $_POST['email'];
    $diaChi = $_POST['diaChi'];
    $khuVuc = isset($_POST['khuVuc']) ? $_POST['khuVuc'] : '';

    $qlTaiKhoan->suaTaiKhoan($maTK, $tenTK, $matKhau, $maLoai, $trangThai, $ten, $soDT, $email, $diaChi, $khuVuc);
    // Sau khi thực hiện hành động, chuyển hướng về trang quản lý tài khoản
    echo "<script>alert('Sửa tài khoản thành công!$khuVuc'); window.location.href='index.php?page=quan_li_tai_khoan';</script>";

}
?>