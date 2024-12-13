<?php
// Bao gồm class Database
include_once('pages/quan_li_he_thong/class/clsdb.php'); // Đảm bảo đã bao gồm file clsdb.php

// Lấy maTK từ cookie (nếu có)
$maTK = isset($_COOKIE['maTK']) ? $_COOKIE['maTK'] : null;

$tenAdmin = "Khách";  // Mặc định là "Khách" nếu không có maTK

// Nếu maTK tồn tại trong cookie, thực hiện truy vấn để lấy tenAdmin
if (isset($maTK)) {
    // Tạo đối tượng Database và truy vấn để lấy tenAdmin
    $db = new Database();
    // Thực hiện truy vấn để lấy tenAdmin từ cơ sở dữ liệu
    $sql = "SELECT tenAdmin FROM quantrihethong WHERE maTK = $maTK";
    $params = array($maTK); // Tham số truyền vào câu lệnh SQL
    // Gọi phương thức xuatdulieu để lấy dữ liệu
    $result = $db->xuatdulieu($sql);

    // Kiểm tra kết quả trả về
    if ($result) {
        $tenAdmin = $result[0]['tenAdmin'];  // Lấy tên tài khoản từ kết quả truy vấn
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="pages/quan_li_he_thong/assets/css/style.css?v=1">
</head>
<body>
    <div class="container-fluid bg-dark text-white py-3">
        <div class="container d-flex justify-content-center align-items-center position-relative">
            <div class="header-logo d-flex align-items-center position-absolute start-0">
                <a href="index.php?page=trangchu"><img src="assets/video/HommyHommy.jpg" alt="Logo" class="me-2" style="height: 40px;"> </a>
            </div>
            <h2 class="mb-0 text-center">Xin chào, Quản lý <i><?php echo htmlspecialchars($tenAdmin); ?></i></h2>
            <!-- Nút đăng xuất -->
            <button class="btn btn-light position-absolute end-0" onclick="window.location.href='index.php?page=logout';">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
            </button>
        </div>
    </div>
</body>
</html>
