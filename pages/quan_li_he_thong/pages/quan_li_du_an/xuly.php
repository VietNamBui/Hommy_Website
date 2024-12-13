<?php
include_once('pages/quan_li_he_thong/class/clsquanlyDA.php');
$quanlyDA = new QuanlyDA();

// Kiểm tra nếu đã bấm nút "Chưa duyệt" hay không
$filterChuaDuyet = isset($_GET['chua_duyet']) && $_GET['chua_duyet'] == 'true';

// Lấy tham số tìm kiếm từ URL nếu có
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Lấy trang hiện tại từ URL (mặc định là trang 1 nếu không có tham số)
$page = isset($_GET['pages']) ? (int)$_GET['pages'] : 1;

// Số lượng dự án hiển thị trên mỗi trang
$limit = 10;

// Tính toán offset
$offset = ($page - 1) * $limit;

// Lấy danh sách dự án với phân trang và tìm kiếm
$duan_list = $quanly->danhsachduan($search, $filterChuaDuyet, $limit, $offset);

// Tính tổng số dự án
$totalDuan = $quanly->getTotalDuan($search, $filterChuaDuyet);

// Tính số trang
$totalPages = ceil($totalDuan / $limit);

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $maDA = intval($_GET['maDA']);
    $trangThaiDuyet = intval($_GET['trangThaiDuyet']);
    $reason = isset($_GET['reason']) ? trim($_GET['reason']) : null;

    if ($maDA > 0 && $reason && $trangThaiDuyet !=3) {
        // Cập nhật trạng thái xóa
        $quanlyDA->capNhatTrangThai($maDA, 3);

        // Ghi nhận thao tác vào bảng thaoTacDuAn
        $quanlyDA->ghiNhanThaoTacDuAn($maDA, 'Xóa tạm', $reason);

        echo "<script>alert('Xóa tạm dự án thành công!'); window.location.href='index.php?page=quan_li_du_an';</script>";
    }else if ($maDA > 0 && $reason && $trangThaiDuyet ==3){
        // Cập nhật trạng thái xóa
        $quanlyDA->xoaDuAn($maDA);

        // Ghi nhận thao tác vào bảng thaoTacDuAn
        $quanlyDA->ghiNhanThaoTacDuAn($maDA, 'Xóa', $reason);

        echo "<script>alert('Xóa dự án thành công!'); window.location.href='index.php?page=quan_li_du_an';</script>";
    }
     else {
        echo "<script>alert('Mã dự án hoặc lý do không hợp lệ!'); history.back();</script>";
    }
}
?>