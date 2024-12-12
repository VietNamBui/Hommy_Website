<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "hommy_database");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

<<<<<<< HEAD
=======
// Kết nối bảng `taikhoan` với bảng `nhanvienmoigioi`
$query = "ALTER TABLE `nhanvienmoigioi` 
          ADD CONSTRAINT `fk_nhanvienmoigioi_taikhoan` 
          FOREIGN KEY (`maTK`) REFERENCES `taikhoan`(`maTK`) 
          ON DELETE CASCADE ON UPDATE CASCADE;";

$conn->query($query);
$conn->close();
>>>>>>> a3ac88ff684903df8e0b0a525bf287703ffa0326
?>
<!-- Main Content -->
<main>
        <!-- Section: Banner -->
        <div class="banner">
            <h1>Chào mừng đến với trang cá nhân của tôi!</h1>
        </div>

        <!-- Section: Dịch vụ -->
        <section class="container mt-5">
            <h2 class="text-center mb-4">Dịch vụ của tôi</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="fas fa-home fa-3x mb-3 text-success"></i>
                    <h4>Mua bán bất động sản</h4>
                    <p>Hỗ trợ bạn tìm kiếm và giao dịch bất động sản dễ dàng và nhanh chóng.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-handshake fa-3x mb-3 text-success"></i>
                    <h4>Tư vấn đầu tư</h4>
                    <p>Phân tích và tư vấn các cơ hội đầu tư bất động sản phù hợp với nhu cầu của bạn.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-chart-line fa-3x mb-3 text-success"></i>
                    <h4>Quản lý tài sản</h4>
                    <p>Đảm bảo tài sản của bạn được quản lý chuyên nghiệp và hiệu quả.</p>
                </div>
            </div>
        </section>
    </main>

    
