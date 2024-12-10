<?php
$obj = new database();
if (isset($_POST["btdangtin"])) {    
    $tenDA = $_POST["tieude"];
    $diaChiDA = $_POST["soNha"] . ', ' . $_POST["tenDuong"] . ', ' . $_POST["phuongXa"] . ', ' . $_POST["quanHuyen"] . ', ' . $_POST["tinhTP"];
    $giaThue = $_POST["giaThue"];
    $hoaHong = $_POST["hoaHong"];
    $ngayTao = date("Y-m-d H:i:s");
    $maChuDuAn = $_SESSION["maChuDuAn"];
    $tienCoc = $_POST["tienCoc"];
    $tinhTP = $_POST["tinhTP"];
    $quanHuyen = $_POST["quanHuyen"];
    $phuongXa = $_POST["phuongXa"];
    $soNha = $_POST["soNha"];
    $block = $_POST["block"];
    $tenDuong = $_POST["tenDuong"];
    $dienTich = $_POST["dienTich"];
    $maCan = $_POST["maCan"];
    $soPN = $_POST["soPN"];
    $soNhaVS = $_POST["soNhaVS"];
    $phapLy = $_POST["phapLy"];

    // upload ảnh
    $filenamenew = rand(111, 999) . "_" . $_FILES["hinhanh"]["name"];
    if($_FILES["hinhanh"]["name"]){
        if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "assets/video/" . $filenamenew)) {
            //nêu upload thành công thì sẽ insert trước vào dự án và insert vào bảng chung cư sau
            $sqlDuan = "INSERT INTO duan(tenDA, diaChiDA, giaThue, hoaHong, ngayTao, ngayXacThuc, maChuDuAn, tienCoc, maLoaiDA, hinhAnh,trangThaiDuyet,trangThaiThue,dienTich) 
                        VALUES ('$tenDA', '$diaChiDA', '$giaThue', '$hoaHong', '$ngayTao', '$ngayTao', '$maChuDuAn', '$tienCoc', '3', '$filenamenew','2','1','$dienTich')";

            // Thêm vào bảng dự án và lấy khóa c của bảng dự án làm khóa ngoại cho bảng chung cư
            if ($maDA = $obj->themdulieuID($sqlDuan)) { // Get the ID of the newly added project
                // Insert into `chungcu`
                $sqlChungcu = "insert into chungcu(maCan, soPhongNgu, soNhaVS, phapLy, maDA, block) 
                            VALUES ('$maCan', '$soPN', '$soNhaVS', '$phapLy', '$maDA', '$block')";

                // Execute the query for `chungcu`
                if ($obj->themdulieu($sqlChungcu)) {
                    echo "<script type='text/javascript'>alert('Thêm dự án và chung cư thành công!');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Thêm chung cư thất bại!');</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Thêm dự án thất bại!');</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Upload ảnh dự án thất bại!');</script>";
        }
    }else{
            echo "<script type='text/javascript'>alert('Vui lòng upload ảnh dự án');</script>";
    }
}

//include("pages/dangtin-cda/xuly.php");
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
                        <div  class="form-section" >
                                        <div class="mb-3 mt-3" >
                                            <label for="tieude">Tiêu đề đăng tin:</label>
                                            <input type="text" class="form-control" id="tieude" placeholder="Tiêu đề đăng tin" name="tieude" required>
                                        </div>
                                        <h5>Thông tin địa chỉ</h5>
                                        <div class="mb-3">
                                            <label for="tinhTP">Tỉnh/Thành phố:</label>
                                            <select class="form-select" id="tinhTP" name="tinhTP" required>
                                                <option value="" disabled selected>Tỉnh/Thành phố</option>
                                                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                                <option value="Bình Dương">Bình Dương</option>
                                                <option value="Hà Nội">Hà Nội</option>
                                            </select>

                                        </div>
                                        <div class="mb-3">
                                            <label for="quanHuyen">Quận/Huyện:</label>
                                            <select class="form-select" id="quanHuyen" name="quanHuyen" required>
                                                <option value="" disabled selected>Quận/Huyện</option>
                                                <option value="Quận 1">Quận 1</option>
                                                <option value="Quận 2">Quận 2</option>
                                                <option value="Quận 3">Quận 3</option>
                                                <option value="Quận 4">Quận 4</option>
                                                <option value="Quận 5">Quận 5</option>
                                                <option value="Quận 6">Quận 6</option>
                                                <option value="Quận 7">Quận 7</option>
                                                <option value="Quận Phú Nhuận">Quận Phú Nhuận</option>
                                                <option value="Quận Tân Phú">Quận Tân Phú</option>
                                                <option value="Quận Gò Vấp">Quận Gò Vấp</option>
                                                <option value="Quận Bình Thạnh">Quận Bình Thạnh</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phuongXa">Phường/Xã:</label>
                                            <select class="form-select" id="phuongXa" name="phuongXa" required>
                                                <option value="" disabled selected>Phường/Xã</option>
                                                <option value="Phường 1">Phường 1</option>
                                                <option value="Phường 2">Phường 2</option>
                                                <option value="Phường 3">Phường 3</option>
                                                <option value="Phường 4">Phường 4</option>
                                                <option value="Phường 5">Phường 5</option>
                                                <option value="Phường 6">Phường 6</option>
                                                <option value="Phường 7">Phường 7</option>
                                                <option value="Phường 8">Phường 8</option>
                                                <option value="Phường 9">Phường 9</option>
                                                <option value="Phường 10">Phường 10</option>
                                                <option value="Phường 12">Phường 12</option>
                                            </select>
                                        <div class="mb-3 mt-3">
                                            <label for="soNha">Số nhà:</label>
                                            <input type="text" class="form-control" id="soNha" placeholder="Số nhà" name="soNha" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="tenDuong">Tên đường:</label>
                                            <input type="text" class="form-control" id="tenDuong" placeholder="Tên đường" name="tenDuong" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="maCan">Mã căn:</label>
                                            <input type="text" class="form-control" id="maCan" placeholder="Mã căn" name="maCan" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="block">Block:</label>
                                            <input type="text" class="form-control" id="block" placeholder="Block" name="block" required>
                                        </div>
                                        <h5>Thông tin chi tiết bất động sản</h5>
                                        <div class="mb-3 mt-3">
                                            <label for="dienTich">Diện tích:</label>
                                            <input type="text" class="form-control" id="dienTich" placeholder="Diện tích" name="dienTich" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="soPN">Số phòng ngủ:</label>
                                            <input type="text" class="form-control" id="soPN" placeholder="Số phòng ngủ" name="soPN" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="soNhaVS">Số nhà vệ sinh:</label>
                                            <input type="text" class="form-control" id="soNhaVS" placeholder="Số nhà vệ sinh" name="soNhaVS" required>
                                        </div>
                                        <h5>Thông tin khác</h5>
                                        <div class="mb-3">
                                            <label for="phapLy">Giấy tờ pháp lý:</label>
                                            <select class="form-select" id="phapLy" name="phapLy" required>
                                                <option value="" disabled selected>Giấy tờ pháp lý</option>
                                                <option value="Sổ đỏ">Sổ đỏ</option>
                                                <option value="Sổ hồng">Sổ hồng</option>
                                                <option value="Giấy chứng nhận quyền sử dụng đất">Giấy chứng nhận quyền sử dụng đất</option>
                                                <option value="Giấy phép xây dựng">Giấy phép xây dựng</option>
                                                <option value="Hợp đồng mua bán">Hợp đồng mua bán</option>
                                                <option value="Giấy chứng nhận quyền sở hữu nhà">Giấy chứng nhận quyền sở hữu nhà</option>
                                            </select>
                                        </div>
                                        <h5>Thông tin cho thuê</h5>
                                        <div class="mb-3 mt-3">
                                            <label for="tienCoc">Tiền cọc:</label>
                                            <input type="number" class="form-control" id="tienCoc" placeholder="Tiền cọc" name="tienCoc" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="giaThue">Tiền thuê:</label>
                                            <input type="number" class="form-control" id="giaThue" placeholder="Tiền thuê" name="giaThue" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="hoaHong">Phí hoa hồng:</label>
                                            <select class="form-select" id="hoaHong" name="hoaHong" required>
                                                <option value="" disabled selected>Phí hoa hồng</option>
                                                <option value="30%">30%</option>
                                                <option value="40%">40%</option>
                                                <option value="50%">50%</option>
                                            </select>
                                        </div>
                            </div>
                            <!-- Buttons -->
                            <button type="submit" class="btn btn-primary mt-3" name="btdangtin">Đăng tin</button>
                            <button type="reset" class="btn btn-danger mt-3" name="reset">Hủy bỏ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
