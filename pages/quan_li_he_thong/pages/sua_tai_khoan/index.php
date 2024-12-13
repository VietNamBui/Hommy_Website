<?php
// Bao gồm class quản lý tài khoản
include_once('pages/quan_li_he_thong/class/clsquanlyTK.php');

// Khởi tạo đối tượng quản lý tài khoản
$qlTaiKhoan = new QuanLyTaiKhoan();
include_once('pages/quan_li_he_thong/pages/sua_tai_khoan/xuly.php');
// Lấy mã tài khoản từ URL
if (isset($_GET['maTK']) && is_numeric($_GET['maTK'])) {
    $maTK = $_GET['maTK'];

    // Lấy thông tin tài khoản cần sửa
    $taiKhoan = $qlTaiKhoan->thongTinTaiKhoan($maTK, $_GET['maLoai']);
    $taiKhoan = $taiKhoan[0];
    switch ($_GET['maLoai']) {
        case '5':
            $ten = 'tenAdmin';
            break;
        case '1':
            $ten = 'tenKH';
            break;
        case '2':
            $ten = 'tenCDA';
            break;
        case '3':
            $ten = 'tenNVNG';
            break;
        case '4':
            $ten = 'tenNVDH';
            break;
        default:
            return false;
    }
}
?>
<title>Sửa Tài Khoản</title>
<body>
<div class="container mt-4">
    <h2 class="text-center mb-4">Sửa Tài Khoản</h2>
    <form method="POST">
        <input type="hidden" name="maTK" value="<?= htmlspecialchars($taiKhoan['maTK']); ?>">
        <div class="mb-3">
            <label for="tenTK" class="form-label">Tên Tài Khoản</label>
            <input type="text" class="form-control" id="tenTK" name="tenTK" value="<?= htmlspecialchars($taiKhoan['tenTK']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="matKhau" class="form-label">Mật Khẩu (Nhập mới nếu muốn đổi)</label>
            <input type="password" class="form-control" id="matKhau" name="matKhau">
        </div>
        <div class="mb-3">
            <label for="maLoai" class="form-label">Loại Tài Khoản</label>
            <select class="form-select" id="maLoai" name="maLoai" required>
                <option value="1" <?= $taiKhoan['maLoai'] == 1 ? 'selected' : ''; ?>>Khách Hàng</option>
                <option value="2" <?= $taiKhoan['maLoai'] == 2 ? 'selected' : ''; ?>>Chủ Dự Án</option>
                <option value="3" <?= $taiKhoan['maLoai'] == 3 ? 'selected' : ''; ?>>Nhân Viên Môi Giới</option>
                <option value="4" <?= $taiKhoan['maLoai'] == 4 ? 'selected' : ''; ?>>Nhân Viên Điều Hành</option>
                <option value="5" <?= $taiKhoan['maLoai'] == 5 ? 'selected' : ''; ?>>Quản Trị Hệ Thống</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="trangThai" class="form-label">Trạng Thái</label>
            <select class="form-select" id="trangThai" name="trangThai" required>
                <option value="1" <?= $taiKhoan['trangThai'] == 1 ? 'selected' : ''; ?>>Hoạt động</option>
                <option value="0" <?= $taiKhoan['trangThai'] == 0 ? 'selected' : ''; ?>>Đã khóa</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ten" class="form-label">Tên</label>
            <input type="text" class="form-control" id="ten" name="ten" value="<?= htmlspecialchars($taiKhoan[$ten]); ?>" required>
        </div>
        <div class="mb-3">
            <label for="soDT" class="form-label">Số Điện Thoại</label>
            <input type="tel" class="form-control" id="soDT" name="soDT" value="<?= htmlspecialchars($taiKhoan['soDT']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($taiKhoan['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="diaChi" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control" id="diaChi" name="diaChi" value="<?= htmlspecialchars($taiKhoan['diaChi']); ?>" required>
        </div>
        <?php if ($taiKhoan['maLoai'] == 5) : ?>
            <div class="mb-3">
                <label for="khuVuc" class="form-label">Khu Vực</label>
                <input type="text" class="form-control" id="khuVuc" name="khuVuc" value="<?= htmlspecialchars($taiKhoan['khuVuc']); ?>">
            </div>
        <?php endif; ?>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="suaTaiKhoan">Lưu Thay Đổi</button>
            <a href="index.php?page=quan_li_tai_khoan" class="btn btn-secondary">Hủy</a>
        </div>
    </form>
</div>
</body>
</html>
