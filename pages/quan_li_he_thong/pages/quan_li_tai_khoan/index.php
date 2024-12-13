<?php
// Bao gồm class quản lý tài khoản
include_once('pages/quan_li_he_thong/class/clsquanlyTK.php');

// Khởi tạo đối tượng quản lý tài khoản
$qlTaiKhoan = new QuanLyTaiKhoan();

// Lấy danh sách tài khoản
$danhSachTaiKhoan = $qlTaiKhoan->danhSachTaiKhoan();
include('pages/quan_li_he_thong/pages/quan_li_tai_khoan/xuly.php');
?>
<title>Quản Lý Tài Khoản</title>
<body>
<div class="container mt-4">
    <h2 class="text-center mb-4">Quản Lý Tài Khoản</h2>
    
    <!-- Nút thêm tài khoản -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addAccountModal">
        Thêm Tài Khoản
    </button>
    
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
                                <a href="?page=quan_li_tai_khoan&action=lock&maTK=<?= $taiKhoan['maTK']; ?>" class="btn btn-warning btn-sm">Khóa</a>
                            <?php else : ?>
                                <a href="?page=quan_li_tai_khoan&action=unlock&maTK=<?= $taiKhoan['maTK']; ?>" class="btn btn-success btn-sm">Mở khóa</a>
                            <?php endif; ?>
                            <a href="?page=quan_li_tai_khoan&action=delete&maTK=<?= $taiKhoan['maTK']; ?>&maLoai=<?= $taiKhoan['maLoai']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?');">Xóa</a>
                            <a href="?page=sua_tai_khoan&action=edit&maTK=<?= $taiKhoan['maTK']; ?>&maLoai=<?= $taiKhoan['maLoai']; ?>" class="btn btn-primary btn-sm" >Sửa</a>
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

<!-- Modal Form Thêm Tài Khoản -->
<div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccountModalLabel">Thêm Tài Khoản Mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php?page=quan_li_tai_khoan" method="POST">
                <div class="modal-body">
                    <!-- Tên tài khoản -->
                    <div class="mb-3">
                        <label for="tenTK" class="form-label">Tên Tài Khoản</label>
                        <input type="text" class="form-control" id="tenTK" name="tenTK" required>
                    </div>
                    <!-- Mật khẩu -->
                    <div class="mb-3">
                        <label for="matKhau" class="form-label">Mật Khẩu</label>
                        <input type="password" class="form-control" id="matKhau" name="matKhau" required>
                    </div>
                    <!-- Loại tài khoản -->
                    <div class="mb-3">
                        <label for="maLoai" class="form-label">Loại Tài Khoản</label>
                        <select class="form-select" id="maLoai" name="maLoai" required>
                            <option value="">Chọn loại tài khoản</option>
                            <option value="1">Khách Hàng</option>
                            <option value="2">Chủ Dự Án</option>
                            <option value="3">Nhân Viên Môi Giới</option>
                            <option value="4">Nhân Viên Điều Hành</option>
                            <option value="5">Quản Trị Hệ Thống</option>
                        </select>
                    </div>
                    <!-- Trạng thái -->
                    <div class="mb-3">
                        <label for="trangThai" class="form-label">Trạng Thái</label>
                        <select class="form-select" id="trangThai" name="trangThai" required>
                            <option value="1">Hoạt động</option>
                            <option value="0">Đã khóa</option>
                        </select>
                    </div>
                    <!-- Tên người dùng -->
                    <div class="mb-3">
                        <label for="ten" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="ten" name="ten" required>
                    </div>
                    <!-- Số điện thoại -->
                    <div class="mb-3">
                        <label for="soDT" class="form-label">Số Điện Thoại</label>
                        <input type="tel" class="form-control" id="soDT" name="soDT" required>
                    </div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <!-- Địa chỉ -->
                    <div class="mb-3">
                        <label for="diaChi" class="form-label">Địa Chỉ</label>
                        <input type="text" class="form-control" id="diaChi" name="diaChi" required>
                    </div>
                    <!-- Khu vực (chỉ hiển thị cho quản trị viên) -->
                    <div class="mb-3 d-none" id="khuVucField">
                        <label for="khuVuc" class="form-label">Khu Vực</label>
                        <select class="form-select" id="khuVuc" name="khuVuc">
                            <option value="">Chọn khu vực</option>
                            <option value="Bắc">Bắc</option>
                            <option value="Trung">Trung</option>
                            <option value="Nam">Nam</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" name="taoTK">Lưu Tài Khoản</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
document.getElementById('maLoai').addEventListener('change', function () {
    const khuVucField = document.getElementById('khuVucField');
    if (this.value === '5') {
        khuVucField.classList.remove('d-none');
    } else {
        khuVucField.classList.add('d-none');
    }
});

</script>