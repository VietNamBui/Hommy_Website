    <!-- Main content -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Giao diện chọn time</h2>
        <div class="row justify-content-center">
            <!-- Chọn ngày -->
             <?php
             if(!isset($_POST['chongio'])) {
                $obj = new quanly();
                $options = $obj->selectngaylamviecnv();
                echo '
                                <div class="col-lg-5 col-md-6 mb-4">
                <div class="card p-4 shadow-sm">
                    <h5 class="text-center mb-3">Chọn ngày</h5>
                    <form action="" method="POST" class="d-flex flex-column align-items-center">
                        <select name="STTchonngay" class="form-select mb-3" required>
                            <option value="">Chọn ngày</option>
                            '.$options.'
                        </select>
                        <button type="submit" name="chonngay" value="1" class="btn btn-primary">Chọn ngày</button>
                    </form>
                </div>
                </div>


                ';

             }



            ?>


            <!-- Chọn giờ -->
            <?php
            if (isset($_POST['chonngay'])) {
                $obj = new quanly();
                $options = $obj->selectgiolamviecnv($_POST['STTchonngay']);
                echo '
                <div class="col-lg-5 col-md-6 mb-4">
                    <div class="card p-4 shadow-sm">
                        <h5 class="text-center mb-3">Chọn giờ</h5>
                        <form action="" method="POST" class="d-flex flex-column align-items-center">
                            <input type="hidden" name="STTchonngay" value="' .$_POST['STTchonngay']. '">
                            <select name="idcty" class="form-select mb-3" required>
                                <option value="">Chọn giờ</option>
                                ' . $options . '
                            </select>
                            <button type="submit" name="chongio" value="' .$_POST['STTchonngay']. '" class="btn btn-primary">Chọn giờ</button>
                        </form>
                    </div>
                </div>';
            }
            ?>
        </div>

        <!-- Nút Đặt lịch -->
        <?php
        if (isset($_POST['chongio'])) {
            echo '
                <form action="" method="POST">
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg px-5" name="datlich" value="' .$_POST['chongio']. '">Đặt lịch</button>
        </div>
    </form>';
        }
        ?>

        <?php
            if (isset($_POST['datlich'])) {
                $obj = new database();
                
                // Lấy dữ liệu từ POST
                $stt = $_POST['datlich'];

                // Truy vấn lấy thông tin ngày, giờ
                $sqlngay = "SELECT ngayDangKy FROM lichlamviec WHERE STT = '$stt'";
                $sqlgiobatdau = "SELECT gioBatDau FROM lichlamviec WHERE STT = '$stt'";
                
                // Lấy kết quả
                $ngay = $obj->xuatdulieu($sqlngay);
                $giobatdau = $obj->xuatdulieu($sqlgiobatdau);

                $ngayDangKy = $ngay[0]["ngayDangKy"];
                $thoiGianDienRa = $giobatdau[0]["gioBatDau"];

                
                // Câu lệnh SQL
                $sqlinsert = "INSERT INTO cuochen (ngayDienRa, thoiGian) 
                              VALUES ('$ngayDangKy', '$thoiGianDienRa')";
                $obj->themdulieu($sqlinsert);
                echo "<script>alert('Bạn đã hẹn lịch thành công!');</script>";
            }
        ?>

    </div>

