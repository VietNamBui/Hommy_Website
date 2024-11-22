<?php
$obj = new database();
if (isset($_POST["btdangtin"])) {
    // Check if 'loaiduan' is set in the POST array    
                    $tenDA = $_POST["tieude"];
                     $diaChiDA = $_POST["soNha"] . ', ' . $_POST["tenDuong"] . ', ' . $_POST["phuongXa"] . ', ' . $_POST["quanHuyen"] . ', ' . $_POST["tinhTP"];
                     $giaThue = $_POST["giaThue"];
                     $hoaHong = $_POST["hoaHong"];
                     $ngayTao = date("Y-m-d H:i:s");
                     $maChuDuAn = $_SESSION["maChuDuAn"];
                     $tienCoc = $_POST["tienCoc"];
    
                     // SQL để thêm thông tin vào bảng `duan`
                     $sqlDuan = "insert into  duan(tenDA, diaChiDA, giaThue, hoaHong, ngayTao,ngayXacThuc,maChuDuAn, tienCoc, maLoaiDA) 
                                 values ('$tenDA', '$diaChiDA', '$giaThue', '$hoaHong', '$ngayTao','$ngayTao','$maChuDuAn', '$tienCoc', '3')";	
                     // Giả sử bạn có phương thức $obj->themDuan để thực thi SQL
                     if ($maDA = $obj->themdulieuID($sqlDuan)) // Lấy ID của dự án vừa thêm
                     {
                        // Sau khi thêm dự án thành công, ta tiếp tục thêm phòng trọ
                        // Lấy dữ liệu từ form để thêm vào bảng `phongtro`
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
                    
                         // Upload ảnh chung cư
                        $filenamenew = rand(111, 999) . "_" . $_FILES["hinhanh"]["name"];
                        if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "assets/video/".$filenamenew)) {
                              //SQL để thêm thông tin vào bảng `phongtro`
                               $sqlChungcu = "insert into chungcu(tinhTP, quanHuyen, phuongXa, dienTich, maCan,soPhongNgu, soNhaVS, phapLy, maDA, block, soNha, hinhAnh, tenDuong) 
                                                        values ('$tinhTP', '$quanHuyen', '$phuongXa', '$dienTich','$maCan' ,'$soPN', '$soNhaVS', '$phapLy', '$maDA','$block','$soNha', '$filenamenew', '$tenDuong')";
            
                              //Thực thi SQL để thêm chung cư
                             if ($obj->themdulieu($sqlChungcu)) {
                                 echo "<script type='text/javascript'>alert('Thêm chung cư thành công!');</script>";
                             } else {
                                 echo "<script type='text/javascript'>alert('Thêm chung cư thất bại!');</script>";
                             }
                             } else {
                                 echo "<script type='text/javascript'>alert('Upload ảnh chung cư thất bại!');</script>";
                             }
                             } else {
                                 echo "<script type='text/javascript'>alert('Thêm dự án thất bại!');</script>";
                             }
}
//include("pages/dangtin-cda/xuly.php");
echo $maDA;
echo "Tỉnh/Thành phố: " . $tinhTP . "<br>";
echo "Quận/Huyện: " . $quanHuyen . "<br>";
echo "Phường/Xã: " . $phuongXa . "<br>";
echo "Số nhà: " . $soNha . "<br>";
echo "Block: " . $block . "<br>";
echo "Tên đường: " . $tenDuong . "<br>";
echo "Diện tích: " . $dienTich . "<br>";
echo "Mã căn: " . $maCan . "<br>";
echo "Số phòng ngủ: " . $soPN . "<br>";
echo "Số nhà vệ sinh: " . $soNhaVS . "<br>";
echo "Giấy tờ pháp lý: " . $phapLy . "<br>";
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
                                            <input type="text" class="form-control" id="tieude" placeholder="Tiêu đề đăng tin" name="tieude">
                                        </div>
                                        <h5>Thông tin địa chỉ</h5>
                                        <div class="mb-3">
                                            <label for="tinhTP">Tỉnh/Thành phố:</label>
                                            <select class="form-select" id="tinhTP" name="tinhTP">
                                                <option>Tỉnh/Thành phố</option>
                                                <option>Hồ Chí Minh</option>
                                                <option>Bình Dương</option>
                                                <option>Hà Nội</option>
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="quanHuyen">Quận/Huyện:</label>
                                            <select class="form-select" id="quanHuyen" name="quanHuyen">
                                                <option>Quận/Huyện</option>
                                                <option>Quận 1</option>
                                                <option>Quận 2</option>
                                                <option>Quận 3</option>
                                                <option>Quận 4</option>
                                                <option>Quận 5</option>
                                                <option>Quận 6</option>
                                                <option>Quận 1</option>
                                                <option>Quận 2</option>
                                                <option>Quận 7</option>
                                                <option>Quận Phú Nhuận</option>
                                                <option>Quận Tân Phú</option>
                                                <option>Quận Gò Vấp</option>
                                                <option>Quận Bình Thạnh</option>
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phuongXa">Phường/Xã:</label>
                                            <select class="form-select" id="phuongXa" name="phuongXa">
                                                <option>Phường/Xã</option>
                                                <option>Phường 1</option>
                                                <option>Phường 2</option>
                                                <option>Phường 3</option>
                                                <option>Phường 4</option>
                                                <option>Phường 5</option>
                                                <option>Phường 6</option>
                                                <option>Phường 1</option>
                                                <option>Phường 2</option>
                                                <option>Phường 7</option>
                                                <option>Phường 8</option>
                                                <option>Phường 9</option>
                                                <option>Phường 10</option>
                                                <option>Phường 12</option>
                                              </select>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="soNha">Số nhà:</label>
                                            <input type="text" class="form-control" id="soNha" placeholder="Số nhà" name="soNha">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="tenDuong">Tên đường:</label>
                                            <input type="text" class="form-control" id="tenDuong" placeholder="Tên đường" name="tenDuong">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="maCan">Mã căn:</label>
                                            <input type="text" class="form-control" id="maCan" placeholder="Mã căn" name="maCan">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="block">Block:</label>
                                            <input type="text" class="form-control" id="block" placeholder="Block" name="block">
                                        </div>
                                        <h5>Thông tin chi tiết bất động sản</h5>
                                        <div class="mb-3 mt-3">
                                            <label for="dienTich">Diện tích:</label>
                                            <input type="text" class="form-control" id="dienTich" placeholder="Diện tích" name="dienTich">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="soPN">Số phòng ngủ:</label>
                                            <input type="text" class="form-control" id="soPN" placeholder="Số phòng ngủ" name="soPN">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="soNhaVS">Số nhà vệ sinh:</label>
                                            <input type="text" class="form-control" id="soNhaVS" placeholder="Số nhà vệ sinh" name="soNhaVS">
                                        </div>
                                        <h5>Thông tin khác</h5>
                                        <div class="mb-3">
                                            <label for="phapLy">Giấy tờ pháp lý:</label>
                                            <select class="form-select" id="phapLy" name="phapLy">
                                                <option>Giấy tờ pháp lý</option>
                                              </select>
                                        </div>
                                        <h5>Thông tin cho thuê</h5>
                                        <div class="mb-3 mt-3">
                                            <label for="tienCoc">Tiền cọc:</label>
                                            <input type="number" class="form-control" id="tienCoc" placeholder="Tiền cọc" name="tienCoc">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="giaThue">Tiền thuê:</label>
                                            <input type="number" class="form-control" id="giaThue" placeholder="Tiền thuê" name="giaThue">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="hoaHong">Phí hoa hồng:</label>
                                            <select class="form-select" id="hoaHong" name="hoaHong">
                                                <option>Phí hoa hồng</option>
                                                <option>30%</option>
                                                <option>40%</option>
                                                <option>50%</option>
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
