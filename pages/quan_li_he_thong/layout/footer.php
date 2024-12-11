<?php
// Kết nối với database
include_once("pages/quan_li_he_thong/class/clsdb.php");
$db = new Database();

// Lấy số lượng tài khoản hiện có
$taiKhoanHienCo = $db->xuatdulieu("SELECT COUNT(*) AS soLuong FROM taikhoan")[0]['soLuong'];

// Lấy số lượng tài khoản đã khóa
$taiKhoanDaKhoa = $db->xuatdulieu("SELECT COUNT(*) AS soLuong FROM taikhoan WHERE trangThai = '0'")[0]['soLuong'];

// Lấy số lượng dự án khu vực
$duAnKhuVuc = $db->xuatdulieu("SELECT COUNT(*) AS soLuong FROM duan")[0]['soLuong'];

// Lấy số lượng tài khoản nhân viên
$nhanVien = $db->xuatdulieu("SELECT COUNT(*) AS soLuong FROM taikhoan WHERE maLoai IN (3, 4)")[0]['soLuong']; // Giả sử mã loại 3, 4, 5 là nhân viên
?>

<div class="mt-5 bg-white text-center p-4 rounded shadow-sm">
    <p class="mb-2"><strong>Tài khoản hiện có:</strong> <?php echo $taiKhoanHienCo; ?></p>
    <p class="mb-2"><strong>Tài khoản đã khóa:</strong> <?php echo $taiKhoanDaKhoa; ?></p>
    <p class="mb-2"><strong>Dự án khu vực:</strong> <?php echo $duAnKhuVuc; ?></p>
    <p><strong>Tài khoản nhân viên hiện tại:</strong> <?php echo $nhanVien; ?></p>
</div>
