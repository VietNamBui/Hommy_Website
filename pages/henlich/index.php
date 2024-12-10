<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Chọn Time Hẹn Lịch</title>
</head>

<body>
    <!-- Navbar -->
    <div class="container-fluid bg-light py-2">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-md-4 d-flex align-items-center">
                <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <!-- Search -->
            <div class="col-md-4">
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
            </div>

            <!-- User actions -->
            <div class="col-md-4 d-flex justify-content-end">
                <a href="#" class="btn btn-outline-success me-2">Đăng ký</a>
                <a href="#" class="btn btn-outline-secondary">Đăng nhập</a>
            </div>
        </div>
    </div>

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
                $sqlgioketthuc = "SELECT gioKetThuc FROM lichlamviec WHERE STT = '$stt'";
                
                // Lấy kết quả
                $ngay = $obj->xuatdulieu($sqlngay);
                $giobatdau = $obj->xuatdulieu($sqlgiobatdau);
                $gioketthuc = $obj->xuatdulieu($sqlgioketthuc);

                $ngayDangKy = $ngay[0]["ngayDangKy"];
                $thoiGianDienRa = $giobatdau[0]["gioBatDau"] . ' - ' . $gioketthuc[0]["gioKetThuc"];

                
                // Câu lệnh SQL
                $sqlinsert = "INSERT INTO cuochen (ngayDienRa, thoiGianDienRa) 
                              VALUES ('$ngayDangKy', '$thoiGianDienRa')";
                $obj->themdulieu($sqlinsert);
                echo "<script>alert('Bạn đã hẹn lịch thành công!');</script>";
            }
        ?>

    </div>
</body>
</html>
