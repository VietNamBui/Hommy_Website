<?php
// Đảm bảo không có ký tự hoặc khoảng trắng trước thẻ PHP

if (isset($_POST["btDangnhap"])) {
    $obj = new database(); // Đảm bảo class 'database' đã được include trước đó
    $taikhoan = $_POST["taikhoan"];
    $matkhau = $_POST["matkhau"];

    // Gọi hàm đăng nhập
    $result = $obj->dangnhaptaikhoan($taikhoan, md5($matkhau));

    if ($result) {
        // Kiểm tra trạng thái tài khoản
        if ($result['trangThai'] == 0) { // Kiểm tra trạng thái là 0 (bị khóa)
            echo "<script type='text/javascript'>alert('Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.');</script>";
        }
        if ($result['trangThai'] == 1) { // Trạng thái tài khoản bình thường
            // Lưu thông tin vào session với đúng tên trường
            $_SESSION["dangnhap"] = $result['maTK'];  // maTK
            $_SESSION["maLoai"] = $result['maLoai'];  // maLoai
            $_SESSION["maNVMG"] = $result['maNVMG'] ?? null;  // maNVMG
            $_SESSION["maNVDH"] = $result['maNVDH'] ?? null; // maNVDH
            $_SESSION["maKH"] = $result['maKH'] ?? null;            // maKH
            $_SESSION["maChuDuAn"] = $result['maChuDuAn'] ?? null;        // maChuDuAn
            $_SESSION["maAdmin"] = $result['maAdmin'] ?? null;            // maAdmin
            $_SESSION["id_taikhoan"] = $result['maTK'];
            // Điều hướng dựa trên loại tài khoản
            switch ($_SESSION["maLoai"]) {
                case '5': // Loại tài khoản là Quản Lý Hệ Thống
                    header("Location: index.php?page=trangchu");
                    setcookie("maTK", $result['maTK'], time() + (10 * 24 * 60 * 60), "/"); // Lưu maTK vào cookie
                    break;
                case '4': // Loại tài khoản là Nhân Viên Điều Hành
                    header("Location: index.php?page=trang_chu");
                    break;
                case '2': // Loại tài khoản là Chủ Dự Án
                    header("Location: index.php?page=trangchu-cda");
                    break;
                case '3': // Loại tài khoản là Nhân Viên Môi Giới
                    header("Location: index.php?page=trangchu-nvmg");
                    break;
                case '1': // Loại tài khoản là Khách Hàng
                    header("Location: index.php?page=trangchu");
                    break;
                default:
                    // Xử lý trường hợp không xác định
                    echo "<script type='text/javascript'>alert('Loại tài khoản không hợp lệ');</script>";
                    break;
            }
            exit(); // Kết thúc xử lý sau khi điều hướng
        }
    } else {
        // Hiển thị thông báo lỗi nếu đăng nhập thất bại
        echo "<script type='text/javascript'>alert('Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin.');</script>";
    }
}
?>

<div class="video-background">
    <video autoplay loop muted playsinline>
        <source src="assets/video/login-bg.mp4" type="video/mp4">
        Trình duyệt của bạn không hỗ trợ video.
    </video>
    <div class="login-box" style="margin-top:7%">
        <h2 style="text-align: center; font-size: 35px;">ĐĂNG NHẬP</h2>
        <form action="#" method="POST">
            <input type="text" name="taikhoan" placeholder="Tài khoản" required>
            <input type="password" name="matkhau" placeholder="Mật khẩu" required>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label text-light" for="rememberMe">Nhớ đăng nhập này</label>
                </div>
                <a href="#" class="footer-links">Quên mật khẩu?</a>
            </div>
            <input type="submit" class="btn-submit" style="color: green;" value="Đăng nhập" id="btn-dangNhap" name="btDangnhap">
        </form>
        <p class="mt-3 footer-links" style="text-align:center;">
            <a href="index.php?page=signup" style="text-decoration: none;"> Tạo tài khoản</a>
        </p>
    </div>
</div>
