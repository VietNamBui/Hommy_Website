<?php
if (isset($_POST["btDangky"])) {
    $obj = new database(); // Đảm bảo class 'database' đã được include trước đó

    // Lấy dữ liệu từ form
    $taikhoan = $_POST["taikhoan"];
    $matkhau = md5($_POST["matkhau"]);
    $hovaten = $_POST["hovaten"];
    $email = $_POST["email"];
    $diachi = $_POST["diachi"];
    $sodienthoai = $_POST["sdt"];
    $loaitk = $_POST["loaitk"];
    $ngayTao = date("Y-m-d H:i:s");

    // Kiểm tra trùng tên tài khoản
    $sqlkttk = "SELECT COUNT(*) AS count FROM taikhoan WHERE tenTK = '$taikhoan'";
    $ktTk = $obj->xuatdulieu($sqlkttk);

    // Kiểm tra trùng email và số điện thoại ở các bảng (khachhang và chuduan)
    $sqlktemail = "
        SELECT COUNT(*) AS count FROM khachhang WHERE email = '$email'
        UNION ALL
        SELECT COUNT(*) AS count FROM chuduan WHERE email = '$email'";
    $sqlktsdt = "
        SELECT COUNT(*) AS count FROM khachhang WHERE soDT = '$sodienthoai'
        UNION ALL
        SELECT COUNT(*) AS count FROM chuduan WHERE soDT = '$sodienthoai'";

    $ktEmail = $obj->xuatdulieu($sqlktemail);
    $ktSdt = $obj->xuatdulieu($sqlktsdt);

    // Kiểm tra kết quả
    if ($ktTk && $ktTk[0]['count'] > 0) {
        echo "<script type='text/javascript'>alert('Tên tài khoản đã tồn tại, vui lòng chọn tên khác.');</script>";
    } elseif ($ktEmail && array_sum(array_column($ktEmail, 'count')) > 0) {
        echo "<script type='text/javascript'>alert('Email đã tồn tại, vui lòng sử dụng email khác.');</script>";
    } elseif ($ktSdt && array_sum(array_column($ktSdt, 'count')) > 0) {
        echo "<script type='text/javascript'>alert('Số điện thoại đã tồn tại, vui lòng sử dụng số khác.');</script>";
    } else {
        // Thực hiện thêm tài khoản
        $sqlthemtk = "INSERT INTO taikhoan (tenTK, matKhau, maLoai, ngayTao) VALUES ('$taikhoan', '$matkhau', '$loaitk','$ngayTao')";
        $themtk = $obj->themdulieuID($sqlthemtk);

        if ($themtk) {
            if ($loaitk == '1') { // Khách hàng
                $sqlthemkh = "INSERT INTO khachhang (tenKH,soDT,email,diaChi,maTK) VALUES ('$hovaten','$sodienthoai','$email','$diachi','$themtk')";
                if ($obj->themdulieu($sqlthemkh)) {
                    echo "<script type='text/javascript'>alert('Thêm tài khoản thành công');</script>";
                    header("Location:index.php?page=login");
                } else {
                    echo "<script type='text/javascript'>alert('Thêm tài khoản thất bại');</script>";
                }
            } elseif ($loaitk == '2') { // Chủ dự án
                $sqlthemcda = "INSERT INTO chuduan (tenCDA,soDT,email,diaChi,maTK) VALUES ('$hovaten','$sodienthoai','$email','$diachi','$themtk')";
                if ($obj->themdulieu($sqlthemcda)) {
                    echo "<script type='text/javascript'>alert('Thêm tài khoản thành công');</script>";
                    header("Location:index.php?page=login");
                } else {
                    echo "<script type='text/javascript'>alert('Thêm tài khoản thất bại');</script>";
                }
            }
        }
    }
}
?>


<div class="video-background">
        <video autoplay loop muted playsinline>
            <source src="assets/video/login-bg.mp4" type="video/mp4">
            Trình duyệt của bạn không hỗ trợ video.
        </video>
        <div class="login-box" style="margin-top:7%">
            <h2 style="text-align: center; font-size: 35px;">ĐĂNG KÝ</h2>
            <form action="#" method="POST">
                <input type="text" name="taikhoan" placeholder="Tên tài khoản" required>
                <input type="password" name="matkhau" placeholder="Mật khẩu" required>
                <input type="text" name="hovaten" placeholder="Họ và tên" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="sdt" placeholder="Số điện thoại" required>
                <input type="text" name="diachi" placeholder="Địa chỉ" required>
                <select class="form-select" id="loaitk" name="loaitk" required>
                        <option value="" disabled selected>Loại đối tượng</option>
                        <option value="1">Khách hàng</option>
                        <option value="2">Chủ dự án</option>
                </select>                                
                <input type="submit" class="btn-submit mt-4" style="color: green;" value="Đăng ký" id="btn-dangKy" name="btDangky">
            </form>
            <p class="mt-3 footer-links" style="text-align:center;">
                <a href="index.php?page=login" style="text-decoration: none;"> Bạn đã có tài khoản?</a>
            </p>
        </div>
    </div>


