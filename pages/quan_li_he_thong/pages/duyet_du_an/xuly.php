<?php
// Kiểm tra dữ liệu POST
include_once("../../class/clsquanlyDA.php");
$quanlyDA = new QuanlyDA();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maDA = isset($_POST['maDA']) ? intval($_POST['maDA']) : 0;
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $reason = isset($_POST['reason']) ? trim($_POST['reason']) : null;

    if ($maDA > 0) {
        switch ($action) {
            case 'approve': // Duyệt
                $quanlyDA->capNhatTrangThai($maDA, 1);
                $quanlyDA->ghiNhanThaoTacDuAn($maDA, 'Duyệt', null);
                echo "<script>alert('Duyệt dự án thành công!'); window.location.href='index.php?page=quan_li_du_an';</script>";
                break;

            case 'delete': // Xóa
                $quanlyDA->capNhatTrangThai($maDA, 3);
                $quanlyDA->ghiNhanThaoTacDuAn($maDA, 'Xóa', $reason);
                echo "<script>alert('Xóa dự án thành công!'); window.location.href='index.php?page=quan_li_du_an';</script>";
                break;

            case 'feedback': // Phản hồi
                $quanlyDA->ghiNhanThaoTacDuAn($maDA, 'Phản hồi', $reason);
                echo "<script>alert('Phản hồi thành công!'); history.back();</script>";
                break;

            default:
                echo "<script>alert('Hành động không hợp lệ!'); history.back();</script>";
                break;
        }
    } else {
        echo "<script>alert('Mã dự án không hợp lệ!'); history.back();</script>";
    }
} else {
    echo "<script>alert('Yêu cầu không hợp lệ!'); history.back();</script>";
}
?>
