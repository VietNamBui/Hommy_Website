    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="container bg-light rounded-3" style="min-height: 800px;">
                    <div class="row">
                        <div class="col-4 mt-3 mb-3">
                            <h5 class="text-center">Hình ảnh và Video sản phẩm</h5>
                            <label class="custum-file-upload" for="file" style="display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed #6c757d; padding: 2rem; border-radius: 10px; cursor: pointer; width: 100%; height: 250px; transition: background-color 0.3s;">
                                <div class="icon" style="display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 60px; height: 60px; fill: #6c757d;">
                                        <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span style="font-weight: 500; color: #495057; text-align: center;">Thêm hình ảnh và video BDS</span>
                                <input type="file" id="file" style="display: none;">
                            </label>
                        </div>
                        <div class="col-8 mt-3 mb-3">
                            <form action="">
                                <select class="form-select" id="categorySelect">
                                    <option value="">Danh Mục Đăng Tin *</option>
                                    <option value="phongtro">Phòng trọ</option>
                                    <option value="nhao">Nhà ở</option>
                                    <option value="chungcu">Chung cư</option>
                                </select>
                            </form>
                            <form action="">
                                <div id="phongtroForm" class="form-section" style="display:none;">
                                        <div class="mb-3 mt-3" >
                                            <label for="tieude">Tiêu đề đăng tin:</label>
                                            <input type="email" class="form-control" id="tieude" placeholder="Tiêu đề đăng tin" name="tieude">
                                        </div>
                                        <h5>Thông tin địa chỉ</h5>
                                        <div class="mb-3">
                                            <label for="province/city">Tỉnh/Thành phố:</label>
                                            <select class="form-select" id="province/city" name="province/city">
                                                <option>Tỉnh/Thành phố</option>
                                                <option>Hồ Chí Minh</option>
                                                <option>Bình Dương</option>
                                                <option>Hà Nội</option>
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="district">Quận/Huyện:</label>
                                            <select class="form-select" id="district" name="district">
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
                                            <label for="Wistrict">Phường/Xã:</label>
                                            <select class="form-select" id="Wistrict" name="Wistrict">
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
                                            <label for="Sonha">Số nhà:</label>
                                            <input type="text" class="form-control" id="Sonha" placeholder="Số nhà" name="Sonha">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="tenduong">Tên đường:</label>
                                            <input type="text" class="form-control" id="tenduong" placeholder="Tên đường" name="tenduong">
                                        </div>
                                        <h5>Thông tin chi tiết bất động sản</h5>
                                        <div class="mb-3 mt-3">
                                            <label for="dientich">Diện tích:</label>
                                            <input type="text" class="form-control" id="dientich" placeholder="Diện tích" name="dientich">
                                        </div>
                                        <div class="mb-3">
                                            <label for="furniture">Thông tin nội thất:</label>
                                            <select class="form-select" id="furniture" name="furniture">
                                                <option>Thông tin nội thất</option>
                                                <option>Đầy đủ nội thất</option>
                                                <option>Phòng trống</option>
                                              </select>
                                        </div>
                                        <h5>Thông tin cho thuê</h5>
                                        <div class="mb-3 mt-3">
                                            <label for="tiencoc">Tiền cọc:</label>
                                            <input type="number" class="form-control" id="tiencoc" placeholder="Tiền cọc" name="tiencoc">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="tienthue">Tiền thuê:</label>
                                            <input type="number" class="form-control" id="tienthue" placeholder="Tiền thuê" name="tienthue">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="commision">Phí hoa hồng:</label>
                                            <select class="form-select" id="commision" name="commision">
                                                <option>Phí hoa hồng</option>
                                                <option>30%</option>
                                                <option>40%</option>
                                                <option>50%</option>
                                              </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button> <button type="reset" class="btn btn-primary">Cancel</button>
                                    </div>
                                    <div id="nhaoForm" class="form-section" style="display:none;">
                                        <div class="mb-3 mt-3" >
                                            <label for="tieude">Tiêu đề đăng tin:</label>
                                            <input type="email" class="form-control" id="tieude" placeholder="Tiêu đề đăng tin" name="tieude">
                                        </div>
                                        <h5>Thông tin địa chỉ</h5>
                                        <div class="mb-3">
                                            <label for="province/city">Tỉnh/Thành phố:</label>
                                            <select class="form-select" id="province/city" name="province/city">
                                                <option>Tỉnh/Thành phố</option>
                                                <option>Hồ Chí Minh</option>
                                                <option>Bình Dương</option>
                                                <option>Hà Nội</option>
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="district">Quận/Huyện:</label>
                                            <select class="form-select" id="district" name="district">
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
                                            <label for="Wistrict">Phường/Xã:</label>
                                            <select class="form-select" id="Wistrict" name="Wistrict">
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
                                            <label for="Sonha">Số nhà:</label>
                                            <input type="text" class="form-control" id="Sonha" placeholder="Số nhà" name="Sonha">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="tenduong">Tên đường:</label>
                                            <input type="text" class="form-control" id="tenduong" placeholder="Tên đường" name="tenduong">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="macan">Mã căn:</label>
                                            <input type="text" class="form-control" id="macan" placeholder="Mã căn" name="macan">
                                        </div>
                                        <h5>Thông tin chi tiết bất động sản</h5>
                                        <div class="mb-3 mt-3">
                                            <label for="dientich">Diện tích:</label>
                                            <input type="text" class="form-control" id="dientich" placeholder="Diện tích" name="dientich">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Loainho">Loại nhà ở:</label>
                                            <select class="form-select" id="Loainho" name="Loainho">
                                                <option>Loại nhà ở</option>
                                                <option>Nhà cấp 4</option>
                                                <option>Biệt thự</option>
                                              </select>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="sophongngu">Số phòng ngủ:</label>
                                            <input type="text" class="form-control" id="sophong" placeholder="Số phòng ngủ" name="sophong">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="sonhvs">Số nhà vệ sinh:</label>
                                            <input type="text" class="form-control" id="sonhvs" placeholder="Số nhà vệ sinh" name="sonhvs">
                                        </div>
                                        <div class="mb-3">
                                            <label for="huongcua">Hướng cửa chính:</label>
                                            <select class="form-select" id="huongcua" name="huongcua">
                                                <option>Hướng cửa chính</option>
                                                <option>Đông</option>
                                                <option>Tây</option>
                                                <option>Nam</option>
                                                <option>Bắc</option>
                                              </select>
                                        </div>
                                        <h5>Thông tin khác</h5>
                                        <div class="mb-3">
                                            <label for="giaytopl">Giấy tờ pháp lý:</label>
                                            <select class="form-select" id="giaytopl" name="giaytopl">
                                                <option>Giấy tờ pháp lý</option>
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tinhtrang">Tình trang:</label>
                                            <select class="form-select" id="tinhtrang" name="tinhtrang">
                                                <option>Tình trang</option>
                                              </select>
                                        </div>
                                        <h5>Thông tin cho thuê</h5>
                                        <div class="mb-3 mt-3">
                                            <label for="tiencoc">Tiền cọc:</label>
                                            <input type="number" class="form-control" id="tiencoc" placeholder="Tiền cọc" name="tiencoc">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="tienthue">Tiền thuê:</label>
                                            <input type="number" class="form-control" id="tienthue" placeholder="Tiền thuê" name="tienthue">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="commision">Phí hoa hồng:</label>
                                            <select class="form-select" id="commision" name="commision">
                                                <option>Phí hoa hồng</option>
                                                <option>30%</option>
                                                <option>40%</option>
                                                <option>50%</option>
                                              </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button> <button type="reset" class="btn btn-primary">Cancel</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
            </div>
            <script>
    document.getElementById("categorySelect").addEventListener("change", function() {
        // Ẩn tất cả các form
        document.querySelectorAll('.form-section').forEach(function(section) {
            section.style.display = 'none';
        });
        
        // Hiển thị form tương ứng
        var selectedValue = this.value;
        if (selectedValue) {
            document.getElementById(selectedValue + 'Form').style.display = 'block';
        }
    });
</script>
