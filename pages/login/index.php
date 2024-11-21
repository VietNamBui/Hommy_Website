<?php
// Đảm bảo không có ký tự hoặc khoảng trắng trước thẻ PHP

if (isset($_POST["btDangnhap"])) {
    $obj = new database(); // Đảm bảo class 'database' đã được include trước đó
    $taikhoan = $_POST["taikhoan"];
    $matkhau = $_POST["matkhau"];

    // Gọi hàm đăng nhập
    $result = $obj->dangnhaptaikhoan($taikhoan, $matkhau);

    if ($result) {
        $_SESSION["dangnhap"] = $result['maTK'];
        $_SESSION["maLoai"] = $result['maLoai'];
        $_SESSION["maChuDuAn"] = $result['maChuDuAn'];
        if(isset($_SESSION["maLoai"])==2){
        header("Location: index.php?page=trang_chu");
    }
        exit(); // Thêm exit để dừng xử lý
    } else {    
        // Hiển thị thông báo lỗi
        echo "Đăng nhập không thành công";
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
                <input type="email" name="taikhoan" placeholder="taikhoan" required>
                <input type="password" name="matkhau" placeholder="matkhau" required>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Nhớ đăng nhập này</label>
                    </div>
                    <a href="#" class="footer-links">Quên mật khẩu?</a>
                </div>
                <input type="submit" class="btn-submit" style="color: orangered;" value="Đăng nhập" id="btn-dangNhap" name="btDangnhap">
            </form>
            <p class="mt-3 footer-links" style="text-align:center;">
                <a href="#" style="text-decoration: none;"> Tạo tài khoản</a>
            </p>
        </div>
    </div>
