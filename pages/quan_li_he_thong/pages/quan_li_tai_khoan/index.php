<?php
// Bao gồm class quản lý tài khoản
include_once('pages/quan_li_he_thong/class/clsquanlyTK.php');

// Khởi tạo đối tượng quản lý tài khoản
$qlTaiKhoan = new QuanLyTaiKhoan();

// Xử lý các hành động (nếu có)
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $maTK = isset($_GET['maTK']) ? $_GET['maTK'] : null;

    if ($maTK) {
        if ($action == 'lock') {
            $qlTaiKhoan->khoaTaiKhoan($maTK);
        } elseif ($action == 'unlock') {
            $qlTaiKhoan->moKhoaTaiKhoan($maTK);
        } elseif ($action == 'delete') {
            $qlTaiKhoan->xoaTaiKhoan($maTK);
        }
    }

    // Reload trang sau khi xử lý
    header("Location: quan_ly_tai_khoan.php");
    exit();
}

// Lấy danh sách tài khoản
$danhSachTaiKhoan = $qlTaiKhoan->danhSachTaiKhoan();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Quản Lý Tài Khoản</title>
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center mb-4">Quản Lý Tài Khoản</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Mã Tài Khoản</th>
                <th>Tên Tài Khoản</th>
                <th>Loại Tài Khoản</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
            </thead>
            <tbody>
            <?php if (is_array($danhSachTaiKhoan) && !empty($danhSachTaiKhoan)) : ?>
                <?php foreach ($danhSachTaiKhoan as $taiKhoan) : ?>
                    <tr>
                        <td><?= $taiKhoan['maTK']; ?></td>
                        <td><?= $taiKhoan['tenTK']; ?></td>
                        <td>
                            <?php
                            switch ($taiKhoan['maLoai']) {
                                case 1:
                                    echo "Khách Hàng";
                                    break;
                                case 2:
                                    echo "Chủ Dự Án";
                                    break;
                                case 3:
                                    echo "Nhân Viên Môi Giới";
                                    break;
                                case 4:
                                    echo "Nhân Viên Điều Hành";
                                    break;
                                case 5:
                                    echo "Quản Trị Hệ Thống";
                                    break;
                                default:
                                    echo "Không xác định";
                                    break;
                            }
                            ?>
                        </td>
                        <td>
                            <?= $taiKhoan['trangThai'] == 1 ? 'Hoạt động' : 'Đã khóa'; ?>
                        </td>
                        <td>
                            <?php if ($taiKhoan['trangThai'] == 1) : ?>
                                <a href="?action=lock&maTK=<?= $taiKhoan['maTK']; ?>" class="btn btn-warning btn-sm">Khóa</a>
                            <?php else : ?>
                                <a href="?action=unlock&maTK=<?= $taiKhoan['maTK']; ?>" class="btn btn-success btn-sm">Mở khóa</a>
                            <?php endif; ?>
                            <a href="?action=delete&maTK=<?= $taiKhoan['maTK']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?');">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">Không có tài khoản nào!</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
