<?php
    $obj = new database();
    $sql = "SELECT * FROM duan d LEFT JOIN phongtro pt ON d.maDA = pt.maDA WHERE d.maDA = '$mada'";
    $sanpham=$obj->xuatdulieu($sql);    
    if($sanpham){
        //Lấy địa chỉ đầy đủ từ cơ sở dữ liệu
        // Giả sử địa chỉ có định dạng: "Số 12, Đường Nguyễn Trãi, Phường 5, Quận Gò Vấp, TP.Hồ Chí Minh"
        $parts = explode(',', $sanpham[0]['diaChiDA']);
        
        // Gán vào các biến tương ứng
        $soNha1 = trim($parts[0]); // "Số 12"
        $tenDuong1 = trim($parts[1]); // "Đường Nguyễn Trãi"
        $phuongXa1 = trim($parts[2]); // "Phường 5"
        $quanHuyen1 = trim($parts[3]); // "Quận Gò Vấp"
        $tinhTP1 = trim($parts[4]); // "TP.Hồ Chí Minh"
        }

        if (isset($_POST["btsua"])) {
            // Lấy thông tin từ form
            $maDA = $mada; // ID của dự án cần sửa
            $tenDA = $_POST["tieude"];
            $diaChiDA = $_POST["soNha"] . ', ' . $_POST["tenDuong"] . ', ' . $_POST["phuongXa"] . ', ' . $_POST["quanHuyen"] . ', ' . $_POST["tinhTP"];
            $giaThue = $_POST["giaThue"];
            $hoaHong = $_POST["hoaHong"];
            $tienCoc = $_POST["tienCoc"];
            $dienTich = $_POST["dienTich"];
            $noiThat = $_POST["noiThat"];
            $hinhAnh = ""; // Khởi tạo để lưu tên file ảnh mới nếu có
        
            // Nếu có file ảnh được tải lên
            if ($_FILES["hinhanh"]["name"]) {
                $filenamenew = rand(111, 999) . "_" . $_FILES["hinhanh"]["name"];
                if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "assets/video/" . $filenamenew)) {
                    $hinhAnh = $filenamenew;
                } else {
                    echo "<script type='text/javascript'>alert('Upload ảnh dự án thất bại!');</script>";
                    exit;
                }
            }
        
            // Cập nhật thông tin bảng `duan`
            $sqlDuan = "UPDATE duan 
                        SET tenDA = '$tenDA', 
                            diaChiDA = '$diaChiDA', 
                            giaThue = '$giaThue', 
                            hoaHong = '$hoaHong', 
                            tienCoc = '$tienCoc', 
                            dienTich = '$dienTich'" .
                ($hinhAnh ? ", hinhAnh = '$hinhAnh'" : "") . // Chỉ cập nhật ảnh nếu có file mới
                "           WHERE maDA = '$mada'";
        
            if ($obj->suadulieu($sqlDuan)) {
                // Nếu sửa bảng `duan` thành công, tiếp tục sửa bảng `phongtro`
                $sqlPhongTro = "UPDATE phongtro 
                                SET noiThat = '$noiThat' 
                                WHERE maDA = '$mada'";
            if ($obj->suadulieu($sqlPhongTro)) {
                echo "<script>
                    alert('Cập nhật dự án và phòng trọ thành công!');
                    window.location.href = window.location.href; // Reload lại chính trang hiện tại
                </script>";
            } else {
                    echo "<script type='text/javascript'>alert('Cập nhật phòng trọ thất bại!');</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Cập nhật dự án thất bại!');</script>";
            }
        }
    ?>
<div class="container mt-4">
                <div class="row">
                    <div class="col">
                        <div class="container bg-light rounded-3" style="min-height: 800px;">
                        <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Hình ảnh và Video sản phẩm -->
                                    <div class="col-4 mt-3 mb-3">
                                        <h5 class="text-center">Hình ảnh và Video sản phẩm</h5>
                                        <label class="custum-file-upload" for="file" style="display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed #6c757d; padding: 2rem; border-radius: 10px; cursor: pointer; width: 100%; height: 250px; transition: background-color 0.3s;">
                                            <div class="icon" style="display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 60px; height: 60px; fill: #6c757d;">
                                                    <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <span style="font-weight: 500; color: #495057; text-align: center;">Thêm hình ảnh và video BDS</span>
                                            <input type="file" name="hinhanh" id="file" style="display: none;">
                                        </label>
                                    </div>

                                    <!-- Thông tin đăng tin -->
                                    <div class="col-8 mt-3 mb-3">
                                        <div class="form-section">
                                            <div class="mb-3 mt-3">
                                                <label for="tieude">Tiêu đề đăng tin:</label>
                                                <input type="text" class="form-control" id="tieude" value="<?=$sanpham[0]['tenDA']?>" placeholder="Tiêu đề đăng tin" name="tieude">
                                            </div>
                                            <h5>Thông tin địa chỉ</h5>
                                            <div class="mb-3">
                                                <label for="tinhTP">Tỉnh/Thành phố:</label>
                                                <select class="form-select" id="tinhTP" name="tinhTP">
                                                    <option <?= (!isset($tinhTP1) || $tinhTP1 == "Tỉnh/Thành phố") ? "selected" : "" ?>>Tỉnh/Thành phố</option>
                                                    <option <?= (isset($tinhTP1) && $tinhTP1 == "Hồ Chí Minh") ? "selected" : "" ?>>Hồ Chí Minh</option>
                                                </select>

                                            </div>
                                            <div class="mb-3">
                                                <label for="quanHuyen">Quận/Huyện:</label>
                                                <select class="form-select" id="quanHuyen" name="quanHuyen">
                                                <option <?= (!isset($quanHuyen1) || $quanHuyen1 == "Quận/Huyện") ? "selected" : "" ?>>Quận/Huyện</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận 1") ? "selected" : "" ?>>Quận 1</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận 2") ? "selected" : "" ?>>Quận 2</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận 3") ? "selected" : "" ?>>Quận 3</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận 4") ? "selected" : "" ?>>Quận 4</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận 5") ? "selected" : "" ?>>Quận 5</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận 6") ? "selected" : "" ?>>Quận 6</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận 7") ? "selected" : "" ?>>Quận 7</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận 8") ? "selected" : "" ?>>Quận 8</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận 10") ? "selected" : "" ?>>Quận 10</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận Phú Nhuận") ? "selected" : "" ?>>Quận Phú Nhuận</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận Tân Phú") ? "selected" : "" ?>>Quận Tân Phú</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận Gò Vấp") ? "selected" : "" ?>>Quận Gò Vấp</option>
                                                    <option <?= (isset($quanHuyen1) && $quanHuyen1 == "Quận Bình Thạnh") ? "selected" : "" ?>>Quận Bình Thạnh</option>
                                                </select>

                                            </div>
                                            <div class="mb-3">
                                                <label for="phuongXa">Phường/Xã:</label>
                                                <select class="form-select" id="phuongXa" name="phuongXa">
                                                    <option <?= (!isset($phuongXa1) || $phuongXa1 == "Phường/Xã") ? "selected" : "" ?>>Phường/Xã</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 1") ? "selected" : "" ?>>Phường 1</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 2") ? "selected" : "" ?>>Phường 2</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 3") ? "selected" : "" ?>>Phường 3</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 4") ? "selected" : "" ?>>Phường 4</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 5") ? "selected" : "" ?>>Phường 5</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 6") ? "selected" : "" ?>>Phường 6</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 7") ? "selected" : "" ?>>Phường 7</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 8") ? "selected" : "" ?>>Phường 8</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 9") ? "selected" : "" ?>>Phường 9</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 10") ? "selected" : "" ?>>Phường 10</option>
                                                    <option <?= (isset($phuongXa1) && $phuongXa1 == "Phường 12") ? "selected" : "" ?>>Phường 12</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="sonha">Số nhà:</label>
                                                <input type="text" class="form-control" id="soNha" value="<?=$soNha1?>" placeholder="Số nhà" name="soNha">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="tenduong">Tên đường:</label>
                                                <input type="text" class="form-control" id="tenDuong" value="<?=$tenDuong1?>" placeholder="Tên đường" name="tenDuong">
                                            </div>
                                            <h5>Thông tin chi tiết bất động sản</h5>
                                            <div class="mb-3 mt-3">
                                                <label for="dientich">Diện tích:</label>
                                                <input type="text" class="form-control" id="dienTich" value="<?=$sanpham[0]['dienTich']?>" placeholder="Diện tích" name="dienTich">
                                            </div>
                                            <div class="mb-3">
                                                <label for="noiThat">Thông tin nội thất:</label>
                                                <select class="form-select" id="noiThat" name="noiThat">
                                                    <option <?= (!isset($sanpham[0]['noiThat']) || $sanpham[0]['noiThat'] == "Thông tin nội thất") ? "selected" : "" ?>>Thông tin nội thất</option>
                                                    <option <?= (isset($sanpham[0]['noiThat']) && $sanpham[0]['noiThat'] == "Đầy đủ nội thất") ? "selected" : "" ?>>Đầy đủ nội thất</option>
                                                    <option <?= (isset($sanpham[0]['noiThat']) && $sanpham[0]['noiThat'] == "Phòng trống") ? "selected" : "" ?>>Phòng trống</option>
                                                </select>

                                            </div>
                                            <h5>Thông tin cho thuê</h5>
                                            <div class="mb-3 mt-3">
                                                <label for="tienCoc">Tiền cọc:</label>
                                                <input type="number" class="form-control" id="tiencoc" value="<?=$sanpham[0]['tienCoc']?>" placeholder="Tiền cọc" name="tienCoc">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="giaThue">Tiền thuê:</label> 
                                                <input type="number" class="form-control" id="giaThue" value="<?=$sanpham[0]['giaThue']?>" placeholder="Tiền thuê" name="giaThue">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="hoaHong">Phí hoa hồng:</label>
                                                <select class="form-select" id="hoaHong" name="hoaHong">
                                                    <option <?= (!isset($sanpham[0]['hoaHong']) || $sanpham[0]['hoaHong'] == "Phí hoa hồng") ? "selected" : "" ?>>Phí hoa hồng</option>
                                                    <option <?= (isset($sanpham[0]['hoaHong']) && $sanpham[0]['hoaHong'] == "30%") ? "selected" : "" ?>>30%</option>
                                                    <option <?= (isset($sanpham[0]['hoaHong']) && $sanpham[0]['hoaHong'] == "40%") ? "selected" : "" ?>>40%</option>
                                                    <option <?= (isset($sanpham[0]['hoaHong']) && $sanpham[0]['hoaHong'] == "50%") ? "selected" : "" ?>>50%</option>
                                                </select>

                                            </div>
                                        </div>
                                        <!-- Buttons -->
                                        <button type="submit" class="btn btn-primary mt-3" name="btsua">Sửa</button>
                                        <button type="reset" class="btn btn-danger mt-3" name="reset">Hủy bỏ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
