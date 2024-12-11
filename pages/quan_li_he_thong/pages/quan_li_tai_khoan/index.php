<?php
// Bao gồm class quản lý tài khoản
include_once('pages/quan_li_he_thong/class/clsquanlyTK.php');

// Khởi tạo đối tượng quản lý tài khoản
$qlTaiKhoan = new QuanLyTaiKhoan();

// Lấy danh sách tài khoản
$danhSachTaiKhoan = $qlTaiKhoan->danhSachTaiKhoan();
include_once('pages/quan_li_he_thong/pages/quan_li_tai_khoan/xuly.php');
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
      </div>
      <form action="pages/quan_li_he_thong/pages/quan_li_tai_khoan/xuly.php" method="POST">
        <div class="modal-body">
            <!-- Tên tài khoản -->
            <div class="form-group">
                <label for="tenTK">Tên Tài Khoản</label>
                <input type="text" class="form-control" id="tenTK" name="tenTK" required>
            </div>
            <!-- Mật khẩu -->
            <div class="form-group">
                <label for="matKhau">Mật khẩu</label>
                <input type="password" class="form-control" id="matKhau" name="matKhau" required>
            </div>
            <!-- Loại tài khoản -->
            <div class="form-group">
                <label for="maLoai">Loại Tài Khoản</label>
                <select class="form-control" id="maLoai" name="maLoai" required onchange="toggleFields(this.value)">
                    <option value="">Chọn loại tài khoản</option>
                    <option value="1">Khách Hàng</option>
                    <option value="2">Chủ Dự Án</option>
                    <option value="3">Nhân Viên Môi Giới</option>
                    <option value="4">Nhân Viên Điều Hành</option>
                    <option value="5">Quản Trị Hệ Thống</option>
                </select>
            </div>
            <!-- Trạng thái tài khoản -->
            <div class="form-group">
                <label for="trangThai">Trạng Thái</label>
                <select class="form-control" id="trangThai" name="trangThai" required>
                    <option value="1">Hoạt động</option>
                    <option value="0">Đã khóa</option>
                </select>
            </div>
            <!-- Thông tin tùy chỉnh cho từng loại tài khoản -->
            <div id="khachHangFields" style="display: none;">
                <div class="form-group">
                    <label for="ten">Tên khách hàng</label>
                    <input type="text" class="form-control" id="ten" name="ten" required>
                </div>
                
                <div class="form-group">
                    <label for="soDT">Số Điện Thoại</label>
                    <input type="tel" class="form-control" id="soDT" name="soDT" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="diaChi">Địa chỉ</label>
                    <input type="text" class="form-control" id="diaChi" name="diaChi" required>
                </div>
            </div>
            <div id="chuDuAnFields" style="display: none;">
            <div class="form-group">
                    <label for="ten">Tên chủ dự án</label>
                    <input type="text" class="form-control" id="ten" name="ten" required>
                </div>
                
                <div class="form-group">
                    <label for="soDT">Số Điện Thoại</label>
                    <input type="tel" class="form-control" id="soDT" name="soDT" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="diaChi">Địa chỉ</label>
                    <input type="text" class="form-control" id="diaChi" name="diaChi" required>
                </div>
            </div>
            <div id="nhanVienMoiGioiFields" style="display: none;">
            <div class="form-group">
                    <label for="ten">Tên nhân viên môi giới</label>
                    <input type="text" class="form-control" id="ten" name="ten" required>
                </div>
                
                <div class="form-group">
                    <label for="soDT">Số Điện Thoại</label>
                    <input type="tel" class="form-control" id="soDT" name="soDT" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="diaChi">Địa chỉ</label>
                    <input type="text" class="form-control" id="diaChi" name="diaChi" required>
                </div>
            </div>
            <div id="nhanVienDieuHanhFields" style="display: none;">
            <div class="form-group">
                    <label for="ten">Tên nhân viên điều hành</label>
                    <input type="text" class="form-control" id="ten" name="ten" required>
                </div>
                
                <div class="form-group">
                    <label for="soDT">Số Điện Thoại</label>
                    <input type="tel" class="form-control" id="soDT" name="soDT" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="diaChi">Địa chỉ</label>
                    <input type="text" class="form-control" id="diaChi" name="diaChi" required>
                </div>
            </div>
            <div id="quanTriHeThongFields" style="display: none;">
            <div class="form-group">
                    <label for="ten">Tên quản trị viên</label>
                    <input type="text" class="form-control" id="ten" name="ten" required>
                </div>
                
                <div class="form-group">
                    <label for="soDT">Số Điện Thoại</label>
                    <input type="tel" class="form-control" id="soDT" name="soDT" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="diaChi">Địa chỉ</label>
                    <input type="text" class="form-control" id="diaChi" name="diaChi" required>
                </div>
                <div class="form-group">
                    <label for="khuVuc">Khu vực</label>
                    <select class="form-control" id="khuVuc" name="khuVuc" required>
                        <option value="">Chọn khu vực</option>
                        <option value="Đông">Đông</option>
                        <option value="Đông Nam">Đông Nam</option>
                        <option value="Tây Bắc">Tây Bắc</option>
                        <option value="Tây Nam">Tây Nam</option>
                        <option value="Bắc">Bắc</option>
                        <option value="Nam">Nam</option>
                        <option value="Tây">Tây</option>
                        <option value="Đông Bắc">Đông Bắc</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Lưu Tài Khoản</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    // Hàm để hiển thị các trường tùy chỉnh cho từng loại tài khoản
    function toggleFields(maLoai) {
        // Ẩn tất cả các trường
        document.getElementById('khachHangFields').style.display = 'none';
        document.getElementById('chuDuAnFields').style.display = 'none';
        document.getElementById('nhanVienMoiGioiFields').style.display = 'none';
        document.getElementById('nhanVienDieuHanhFields').style.display = 'none';
        document.getElementById('quanTriHeThongFields').style.display = 'none';

        // Hiển thị trường tương ứng với loại tài khoản
        if (maLoai == 1) {
            document.getElementById('khachHangFields').style.display = 'block';
        } else if (maLoai == 2) {
            document.getElementById('chuDuAnFields').style.display = 'block';
        } else if (maLoai == 3) {
            document.getElementById('nhanVienMoiGioiFields').style.display = 'block';
        } else if (maLoai == 4) {
            document.getElementById('nhanVienDieuHanhFields').style.display = 'block';
        } else if (maLoai == 5) {
            document.getElementById('quanTriHeThongFields').style.display = 'block';
        }
    }
    // Lấy đối tượng modal và form từ DOM
    const modal = document.getElementById('addAccountModal');
    const form = document.getElementById('modalForm');

    // Xử lý form khi gửi
    form.onsubmit = function(event) {
        event.preventDefault();  // Ngừng hành động mặc định (submit form)

        // Xử lý dữ liệu tại đây, ví dụ:
        alert("Dữ liệu đã được gửi!");

        // Đóng modal sau khi gửi form
        modal.style.display = "none";  // Hoặc dùng 'modal.hide()' nếu bạn dùng Bootstrap
    }

    // Nếu bạn muốn modal tự động mở khi trang load:
    document.getElementById('addAccountModal').addEventListener('shown.bs.modal', function () {
        // Khi modal hiển thị, có thể thực hiện hành động nào đó
    });
</script>