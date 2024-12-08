<?php
$obj = new database();
if ($maloai == "1") { // nha o
    $sql = "SELECT d.maDA, tenDA, d.giaThue, diaChiDA, tienCoc, dienTich, maLoaiDA, hinhAnh, tenDA, ngayTao, ngayXacThuc, 
                    trangThaiDuyet, trangThaiThue, hoaHong, loaiNha, huongCua, n.soNhaVS, n.soPhongNgu, n.phapLy, 
                    cd.tenCDA
                FROM duan d
                LEFT JOIN chungcu cu ON d.maDA = cu.maDA
                LEFT JOIN nhao n ON d.maDA = n.maDA
                LEFT JOIN phongtro pt ON d.maDA = pt.maDA
                LEFT JOIN chuduan cd ON d.maChuDuan = cd.maChuDuan
                WHERE d.maDA = '$mada'";
} else {
    if ($maloai == "2") { // nha o
        $sql = "SELECT d.maDA, tenDA, d.giaThue, diaChiDA, tienCoc, dienTich, maLoaiDA, hinhAnh, tenDA, ngayTao, ngayXacThuc, 
                        trangThaiDuyet, trangThaiThue, hoaHong,noiThat,cd.tenCDA
                    FROM duan d
                    LEFT JOIN chungcu cu ON d.maDA = cu.maDA
                    LEFT JOIN nhao n ON d.maDA = n.maDA
                    LEFT JOIN phongtro pt ON d.maDA = pt.maDA
                    LEFT JOIN chuduan cd ON d.maChuDuan = cd.maChuDuan
                    WHERE d.maDA = '$mada'";
    } else {
        $sql = "SELECT d.maDA, tenDA, d.giaThue, diaChiDA, tienCoc, dienTich, maLoaiDA, hinhAnh, tenDA, ngayTao, ngayXacThuc, 
                                        trangThaiDuyet, trangThaiThue, hoaHong, loaiNha, huongCua, cu.soNhaVS, cu.soPhongNgu, cu.phapLy,block,maCan, 
                                        cd.tenCDA
                                FROM duan d
                                LEFT JOIN chungcu cu ON d.maDA = cu.maDA
                                LEFT JOIN nhao n ON d.maDA = n.maDA
                                LEFT JOIN phongtro pt ON d.maDA = pt.maDA
                                LEFT JOIN chuduan cd ON d.maChuDuan = cd.maChuDuan
                                WHERE d.maDA = '$mada'";
    }
}
$sanpham = $obj->xuatdulieu($sql);
?>
<div class="container mt-4">
    <?php
    if ($sanpham) {
        if ($maloai == "1") {
            echo '<div class="row">
                        <div class="col-md-8">
                        <div id="propertyCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="d-block w-100" style="width: 500px; height: 500px; border: 2px solid #ddd; border-radius: 8px;" alt="Property Image 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="d-block w-100" style="width: 500px; height: 500px; border: 2px solid #ddd; border-radius: 8px;" alt="Property Image 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="d-block w-100" style="width: 500px; height: 500px; border: 2px solid #ddd; border-radius: 8px;" alt="Property Image 3">
                                </div>
                            </div>
                            <!-- Carousel Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev" style="width: 1px; height: 570px;">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 50%; padding: 20px;"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next" style="width: 1px; height: 570px;">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 50%; padding: 20px;"></span>
                                <span class="visually-hidden">Next</span>
                            </button>                    
                        </div>

                        <div class="d-flex justify-content-around mb-3">
                            <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="1" style="margin: 5px; border-radius: 8px;">
                            <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="2" style="margin: 5px; border-radius: 8px;">
                            <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="3" style="margin: 5px; border-radius: 8px;">
                            <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="4" style="margin: 5px; border-radius: 8px;">
                        </div>

                        <!-- Property Description and Price -->
                        <h4>' . $sanpham[0]["tenDA"] . '</h4>
                        <div class="d-flex align-items-center mb-3">
                            <span style="color: red; font-weight: bold; font-size: 1.5em; margin-right: 15px;">' . number_format($sanpham[0]["giaThue"]) . '   VND</span>
                        </div>

                        <!-- Location and Update Info -->
                        <p style="color: gray; font-size: 0.9em;">
                            <i class="fas fa-map-marker-alt"></i> ' . $sanpham[0]["diaChiDA"] . '<br>
                        </p>

                        <!-- Property Attributes Section -->
                        <h6 class="mt-4">Đặc điểm bất động sản</h6>
                        <div style="margin-top: 10px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                <span><i class="fas fa-ruler-combined"></i> Diện tích</span>
                                <span>' . $sanpham[0]["dienTich"] . ' m²</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                <span><i class="fas fa-bed"></i> Số phòng ngủ</span>
                                <span>' . $sanpham[0]["soPhongNgu"] . ' phòng</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                <span><i class="fas fa-bath"></i> Số phòng vệ sinh</span>
                                <span>' . $sanpham[0]["soNhaVS"] . ' phòng</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                <span><i class="fas fa-file-alt"></i> Giấy tờ pháp lý</span>
                                <span>' . $sanpham[0]["phapLy"] . '</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                <span><i class="fas fa-layer-group"></i> Loại nhà</span>
                                <span>' . $sanpham[0]["loaiNha"] . '</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                                <span><i class="fas fa-file-alt"></i> Tiền cọc</span>
                                <span>' . number_format($sanpham[0]["tienCoc"]) . '   VND</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                                <span><i class="fas fa-file-alt"></i>Ngày đăng</span>
                                <span>' . date("d/m/Y H:i", strtotime($sanpham[0]["ngayTao"])) . '</span>
                            </div>

                            </div>
                            <h6 class="mt-4">Mô tả chi tiết</h6>
                            <div style="margin-top: 10px;">
                                <p>XÓT 1CĂN *** KHU CÁN BỘ CĂN CỨ 26 - CHỢ CÁN CỨ K26 - KHU HIẾM NHÀ BÁN - HẺM XE TẢI TRÁNH LẠI CÓ VỈA HÈ - GRA ÔTÔ TRONG NHÀ - CHỦ NHÀ VỪA Ở VỪA KINH DOANH XÂY TÂM HUYẾT. 4TẦNG - NGANG HƠN 5 DÀI 17 - 5 PN - 4WC - 2 BẾP - SÂN THƯỢNG TRƯỚC SAU. NHÀ CHỦ Ở Kĩ ĐANG KINH DOANH NHÀ RẤT MỚI . Vị Trí : Lê Thị Hồng - Nguyễn Oanh - Lê Đức Thọ - Phan Văn Trị - Dương Quảng Hàm - Phạm văn Đồng. Giáp Bình Thạnh. Lợi thế chợ căn cứ kinh doanh sầm uất.</p>
                            </div>
                        </div>';
        } else {
            if ($maloai == "2") {
                echo '<div class="row">
                                    <div class="col-md-8">
                                    <div id="propertyCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="d-block w-100" style="width: 500px; height: 500px; border: 2px solid #ddd; border-radius: 8px;" alt="Property Image 1">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="d-block w-100" style="width: 500px; height: 500px; border: 2px solid #ddd; border-radius: 8px;" alt="Property Image 2">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="d-block w-100" style="width: 500px; height: 500px; border: 2px solid #ddd; border-radius: 8px;" alt="Property Image 3">
                                            </div>
                                        </div>
                                        <!-- Carousel Controls -->
                                        <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev" style="width: 1px; height: 570px;">
                                            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 50%; padding: 20px;"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next" style="width: 1px; height: 570px;">
                                            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 50%; padding: 20px;"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>                    
                                    </div>
            
                                    <div class="d-flex justify-content-around mb-3">
                                        <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="1" style="margin: 5px; border-radius: 8px;">
                                        <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="2" style="margin: 5px; border-radius: 8px;">
                                        <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="3" style="margin: 5px; border-radius: 8px;">
                                        <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="4" style="margin: 5px; border-radius: 8px;">
                                    </div>
            
                                    <!-- Property Description and Price -->
                                    <h4>' . $sanpham[0]["tenDA"] . '</h4>
                                    <div class="d-flex align-items-center mb-3">
                                        <span style="color: red; font-weight: bold; font-size: 1.5em; margin-right: 15px;">' . number_format($sanpham[0]["giaThue"]) . '   VND</span>
                                    </div>
            
                                    <!-- Location and Update Info -->
                                    <p style="color: gray; font-size: 0.9em;">
                                        <i class="fas fa-map-marker-alt"></i> ' . $sanpham[0]["diaChiDA"] . '<br>
                                    </p>
            
                                    <!-- Property Attributes Section -->
                                    <h6 class="mt-4">Đặc điểm bất động sản</h6>
                                    <div style="margin-top: 10px;">
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                            <span><i class="fas fa-ruler-combined"></i> Diện tích</span>
                                            <span>' . $sanpham[0]["dienTich"] . ' m²</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                            <span><i class="fas fa-ruler-combined"></i> Nội thất</span>
                                            <span>' . $sanpham[0]["noiThat"] . '</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                                            <span><i class="fas fa-file-alt"></i> Tiền cọc</span>
                                            <span>' . number_format($sanpham[0]["tienCoc"]) . '   VND</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                                            <span><i class="fas fa-file-alt"></i>Ngày đăng</span>
                                            <span>' . date("d/m/Y H:i", strtotime($sanpham[0]["ngayTao"])) . '</span>
                                        </div>
            
                                        </div>
                                        <h6 class="mt-4">Mô tả chi tiết</h6>
                                        <div style="margin-top: 10px;">
                                            <p>XÓT 1CĂN *** KHU CÁN BỘ CĂN CỨ 26 - CHỢ CÁN CỨ K26 - KHU HIẾM NHÀ BÁN - HẺM XE TẢI TRÁNH LẠI CÓ VỈA HÈ - GRA ÔTÔ TRONG NHÀ - CHỦ NHÀ VỪA Ở VỪA KINH DOANH XÂY TÂM HUYẾT. 4TẦNG - NGANG HƠN 5 DÀI 17 - 5 PN - 4WC - 2 BẾP - SÂN THƯỢNG TRƯỚC SAU. NHÀ CHỦ Ở Kĩ ĐANG KINH DOANH NHÀ RẤT MỚI . Vị Trí : Lê Thị Hồng - Nguyễn Oanh - Lê Đức Thọ - Phan Văn Trị - Dương Quảng Hàm - Phạm văn Đồng. Giáp Bình Thạnh. Lợi thế chợ căn cứ kinh doanh sầm uất.</p>
                                        </div>
                                    </div>';
            } else {
                echo '<div class="row">
                                    <div class="col-md-8">
                                    <div id="propertyCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="d-block w-100" style="width: 500px; height: 500px; border: 2px solid #ddd; border-radius: 8px;" alt="Property Image 1">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="d-block w-100" style="width: 500px; height: 500px; border: 2px solid #ddd; border-radius: 8px;" alt="Property Image 2">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="d-block w-100" style="width: 500px; height: 500px; border: 2px solid #ddd; border-radius: 8px;" alt="Property Image 3">
                                            </div>
                                        </div>
                                        <!-- Carousel Controls -->
                                        <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev" style="width: 1px; height: 570px;">
                                            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 50%; padding: 20px;"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next" style="width: 1px; height: 570px;">
                                            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 50%; padding: 20px;"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>                    
                                    </div>
            
                                    <div class="d-flex justify-content-around mb-3">
                                        <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="1" style="margin: 5px; border-radius: 8px;">
                                        <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="2" style="margin: 5px; border-radius: 8px;">
                                        <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="3" style="margin: 5px; border-radius: 8px;">
                                        <img src="assets/video/' . $sanpham[0]["hinhAnh"] . '" class="img" width="200" alt="4" style="margin: 5px; border-radius: 8px;">
                                    </div>
            
                                    <!-- Property Description and Price -->
                                    <h4>' . $sanpham[0]["tenDA"] . '</h4>
                                    <div class="d-flex align-items-center mb-3">
                                        <span style="color: red; font-weight: bold; font-size: 1.5em; margin-right: 15px;">' . number_format($sanpham[0]["giaThue"]) . '   VND</span>
                                    </div>
            
                                    <!-- Location and Update Info -->
                                    <p style="color: gray; font-size: 0.9em;">
                                        <i class="fas fa-map-marker-alt"></i> ' . $sanpham[0]["diaChiDA"] . '<br>
                                    </p>
            
                                    <!-- Property Attributes Section -->
                                    <h6 class="mt-4">Đặc điểm bất động sản</h6>
                                    <div style="margin-top: 10px;">
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                            <span><i class="fas fa-ruler-combined"></i> Diện tích</span>
                                            <span>' . $sanpham[0]["dienTich"] . ' m²</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                            <span><i class="fas fa-layer-group"></i> Block</span>
                                            <span>' . $sanpham[0]["block"] . '</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                            <span><i class="fas fa-layer-group"></i> Mã căn</span>
                                            <span>' . $sanpham[0]["maCan"] . '</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                            <span><i class="fas fa-bed"></i> Số phòng ngủ</span>
                                            <span>' . $sanpham[0]["soPhongNgu"] . ' phòng</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                            <span><i class="fas fa-bath"></i> Số phòng vệ sinh</span>
                                            <span>' . $sanpham[0]["soNhaVS"] . ' phòng</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                            <span><i class="fas fa-file-alt"></i> Giấy tờ pháp lý</span>
                                            <span>' . $sanpham[0]["phapLy"] . '</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                                            <span><i class="fas fa-file-alt"></i> Tiền cọc</span>
                                            <span>' . number_format($sanpham[0]["tienCoc"]) . '   VND</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                                            <span><i class="fas fa-file-alt"></i>Ngày đăng</span>
                                            <span>' . date("d/m/Y H:i", strtotime($sanpham[0]["ngayTao"])) . '</span>
                                        </div>
            
                                        </div>
                                        <h6 class="mt-4">Mô tả chi tiết</h6>
                                        <div style="margin-top: 10px;">
                                            <p>XÓT 1CĂN *** KHU CÁN BỘ CĂN CỨ 26 - CHỢ CÁN CỨ K26 - KHU HIẾM NHÀ BÁN - HẺM XE TẢI TRÁNH LẠI CÓ VỈA HÈ - GRA ÔTÔ TRONG NHÀ - CHỦ NHÀ VỪA Ở VỪA KINH DOANH XÂY TÂM HUYẾT. 4TẦNG - NGANG HƠN 5 DÀI 17 - 5 PN - 4WC - 2 BẾP - SÂN THƯỢNG TRƯỚC SAU. NHÀ CHỦ Ở Kĩ ĐANG KINH DOANH NHÀ RẤT MỚI . Vị Trí : Lê Thị Hồng - Nguyễn Oanh - Lê Đức Thọ - Phan Văn Trị - Dương Quảng Hàm - Phạm văn Đồng. Giáp Bình Thạnh. Lợi thế chợ căn cứ kinh doanh sầm uất.</p>
                                        </div>
                                    </div>';
            }
        }
    } else {
        echo 'Dự án không tồn tại';
    }
    ?>
    <!-- Agent Information -->
    <div class="col-md-4">
        <div style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; text-align: center;">
            <img src="assets/video/<?php echo $sanpham[0]["hinhAnh"]; ?>" alt="Agent Image" style="border-radius: 50%; width: 80px; height: 80px;">
            <h5 class="mt-2"><?php echo $sanpham[0]["tenCDA"]; ?></h5>
            <p style="color: gray;">Nhà môi giới</p>
            <div class="status-info" style="margin-bottom: 10px;">
                <p class="text-muted" style="color: #6c757d; margin: 0;">Trạng thái dự án:</p>
                <?php
                if ($sanpham[0]["trangThaiDuyet"] == '1') {
                    echo '<span class="badge bg-success me-1" style="background-color: #198754; color: white; padding: 0.5em 0.75em; border-radius: 0.5rem;">Đã duyệt</span>';
                } else {
                    if ($sanpham[0]["trangThaiDuyet"] == '2') {
                        echo '<span class="badge bg-warning text-dark me-1" style="background-color: #ffc107; color: #212529; padding: 0.5em 0.75em; border-radius: 0.5rem;">Chưa duyệt</span>';
                    } else {
                        echo '<span class="badge bg-danger text-dark me-1" style="background-color: #ffc107; color: #212529; padding: 0.5em 0.75em; border-radius: 0.5rem;">Từ chối</span>';
                    }
                }
                ?>

                <?php
                if ($sanpham[0]["trangThaiThue"] == '1') {
                    echo '<span class="badge bg-danger me-1" style="background-color: #dc3545; color: white; padding: 0.5em 0.75em; border-radius: 0.5rem;">Chưa thuê</span>';
                } else {
                    echo '<span class="badge bg-success me-1" style="background-color: #198754; color: white; padding: 0.5em 0.75em; border-radius: 0.5rem;">Đã thuê</span>';
                }
                ?>
            </div>

            <!-- Contact Buttons -->
            <div class="contact-buttons mt-2" style="margin-top: 0.5em;">
                <button class="btn btn-danger" style="background-color: #fc011a; color: white; border: none; padding: 0.5em 1em; border-radius: 0.25rem;">Hẹn lịch</button>
                <form action="" method="POST">
                    <button class="btn btn-info" style="background-color: #000101; color: white; border: none; padding: 0.5em 1em; border-radius: 0.25rem;" type="submit" name="yeuthich">Yêu thích</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>