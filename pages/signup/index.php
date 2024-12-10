<?php
if (isset($_POST["btDangky"])) {
    $obj = new database(); // Đảm bảo class 'database' đã được include trước đó

    // Lấy dữ liệu từ form
    $taikhoan = $_POST["taikhoan"];
    $matkhau = $_POST["matkhau"];
    $hovaten = $_POST["hovaten"];
    $email = $_POST["email"];
    $diachi = $_POST["diachi"];
    $sodienthoai = $_POST["sdt"];
    $loaitk = $_POST["loaitk"];
    $ngayTao = date("Y-m-d H:i:s");

    // Kiểm tra xem tên tài khoản đã tồn tại trong bảng taikhoan chưa
    $sqlkttk = "SELECT COUNT(*) AS count FROM taikhoan WHERE tenTK = '$taikhoan'";
    $kt = $obj->xuatdulieu($sqlkttk); // Sử dụng hàm xuatdulieu đã có trong class
    if ($kt && $kt[0]['count'] > 0) {
        // Tên tài khoản đã tồn tại
        echo "<script type='text/javascript'>alert('Tên tài khoản đã tồn tại, vui lòng chọn tên khác.');</script>";
    }else {
        // Tên tài khoản chưa tồn tại, thực hiện đăng ký
        $sqlthemtk = "INSERT INTO taikhoan (tenTK, matKhau, maLoai, ngayTao) VALUES ('$taikhoan', '$matkhau', '$loaitk','$ngayTao')";
        $themtk = $obj->themdulieuID($sqlthemtk);
        if($themtk){
            if($loaitk=='1'){
                $sqlthemkh = "INSERT INTO khachhang (tenKH,soDT,email,diaChi,maTK) VALUES ('$hovaten','$sodienthoai','$email','$diachi','$themtk')";
                
                if($obj->themdulieu($sqlthemkh)){
                    echo "<script type='text/javascript'>alert('Thêm tài khoản thành công');</script>";
                }else{
                    echo "<script type='text/javascript'>alert('Thêm tài khoản thất bại');</script>";
                }
            }else{
                if($loaitk=='2'){
                    $sqlthemcda = "INSERT INTO chuduan (tenCDA,soDT,email,diaChi,maTK) VALUES ('$hovaten','$sodienthoai','$email','$diachi','$themtk')";
                    
                    if($obj->themdulieu($sqlthemcda)){
                        echo "<script type='text/javascript'>alert('Thêm tài khoản thành công');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Thêm tài khoản thất bại');</script>";
                    }
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
            <h2 style="text-align: center; font-size: 35px;">ĐĂNG ký</h2>
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


