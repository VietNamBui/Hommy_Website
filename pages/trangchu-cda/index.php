<?php
$obj = new database();
// tất cả dự án
if($mada)
    $sql1 = "SELECT d.maDA, d.giaThue, maLoaiDA, hinhAnh, tenDA, ngayTao, diaChiDA,dienTich
             FROM duan d 
             LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
             LEFT JOIN nhao n ON d.maDA = n.maDA 
             LEFT JOIN phongtro pt ON d.maDA = pt.maDA
             WHERE maLoaiDA = '$mada'
             LIMIT 6"; // Chỉ lấy 3 kết quả
else
    $sql1 = "SELECT d.maDA, d.giaThue, maLoaiDA, hinhAnh, tenDA, ngayTao, diaChiDA,dienTich
             FROM duan d 
             LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
             LEFT JOIN nhao n ON d.maDA = n.maDA 
             LEFT JOIN phongtro pt ON d.maDA = pt.maDA
             LIMIT 6"; // Chỉ lấy 3 kết quả
$duan=$obj->xuatdulieu($sql1);

?>
<div class="container">
<div class="banner">
        <div class="overlay"></div>
        <h1>Trang web bất động sản uy tín, chất lượng số 1 việt nam</h1>
    </div>
<section class="py-5">
        <div class="container">
            <h3 class="text-success">Những điều bạn cần biết</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="assets/video/banner.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Vì sao chung cư hết khan hiếm nhưng ngày càng đắt?</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="assets/video/banner.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Masterise Homes triển khai tháp cao tầng đầu tiên tại The Global City</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="assets/video/banner.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Cuối năm, dòng tiền bất động sản tiếp tục đổ về chung cư?</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="assets/video/banner.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Bộ Xây dựng: Phát triển đô thị phải 'quan tâm mức sống người dân'</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="text-primary text-center">Danh sách một số bất động sản của bạn</h3>
            <div class="row">
                <!-- Card 1 -->
                <?php
                echo '<div class="row row-cols-1 row-cols-md-3 g-4">'; // Thêm div bọc toàn bộ để tạo lưới Bootstrap
                for ($i = 0; $i < count($duan); $i++) {
                    echo '<div class="col"> <!-- Dùng col để đảm bảo card sắp xếp ngang -->
                            <a class="card h-100 text-decoration-none text-dark" href="index.php?page=chitietduan-cda&mada=' . $duan[$i]["maDA"] . '&maloai=' . $duan[$i]['maLoaiDA'] . '">
                                <div class="card border-0 shadow">
                                    <img class="card-img-top" src="assets/video/' . $duan[$i]["hinhAnh"] . '" alt="1" style="background-color: #f8f9fa; height:250px;">
                                    <div class="card-body">
                                        <p class="text-dark fw-bold">' . $duan[$i]["tenDA"] . '</p>
                                        <p class="text-muted"> <i class="fas fa-map-marker-alt"></i><i>.</i> '. $duan[$i]["diaChiDA"] . '</p>
                                        <div class="d-flex justify-content-between mt-5">
                                            <span class="text-danger fw-bold">' . number_format($duan[$i]["giaThue"]) . ' VND</span>
                                            <span>' . $duan[$i]["dienTich"] . ' m²</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>';
                }
                echo '</div>';
                ?>

            </div>
        </div>
    </section>
</div>

        