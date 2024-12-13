<title>Duyệt Dự Án</title>
<body>
<?php
include_once("pages/quan_li_he_thong/class/clsquanlyDA.php");

// Khởi tạo đối tượng quản lý dự án
$quanlyDA = new QuanlyDA();

// Xử lý form nếu có dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maDA = isset($_POST['maDA']) ? intval($_POST['maDA']) : 0;
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $reason = isset($_POST['reason']) ? trim($_POST['reason']) : null;

    if ($maDA > 0) {
        switch ($action) {
            case 'approve': // Duyệt
                $quanlyDA->capNhatTrangThai($maDA, 1);
                $quanlyDA->ghiNhanThaoTacDuAn($maDA, 'Duyệt', null);
                echo "<script>alert('Duyệt dự án thành công!'); window.location.href='index.php?page=quan_li_du_an';</script>";
                break;

            case 'delete': // Xóa
                $quanlyDA->capNhatTrangThai($maDA, 3);
                $quanlyDA->ghiNhanThaoTacDuAn($maDA, 'Xóa', $reason);
                echo "<script>alert('Xóa dự án thành công!'); window.location.href='index.php?page=quan_li_du_an';</script>";
                break;

            case 'feedback': // Phản hồi
                $quanlyDA->ghiNhanThaoTacDuAn($maDA, 'Phản hồi', $reason);
                echo "<script>alert('Phản hồi thành công!'); history.back();</script>";
                break;

            default:
                echo "<script>alert('Hành động không hợp lệ!'); history.back();</script>";
                break;
        }
    } else {
        echo "<script>alert('Mã dự án không hợp lệ!'); history.back();</script>";
    }
}

// Lấy maDA từ URL
$maDA = isset($_GET['maDA']) ? intval($_GET['maDA']) : 0;

// Kiểm tra nếu maDA hợp lệ
if ($maDA > 0) {
    // Lấy thông tin chi tiết dự án
    $duAn = $quanlyDA->layChiTietDuAn($maDA);

    if ($duAn) {
        $chiTiet = $duAn['chiTiet'];
        ?>
        <div class="container">
            <h3 class="text-center">DUYỆT DỰ ÁN</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="project-images">
                        <?php
                        $images = explode(',', $duAn['hinhAnh']); // Giả sử các hình ảnh được lưu cách nhau bằng dấu phẩy
                        foreach ($images as $image) {
                            echo '<img src="assets/video/' . htmlspecialchars(trim($image)) . '" alt="Ảnh" class="img-thumbnail">';
                        }
                        ?>
                    </div>
                    <h2><p class="mt-3"><?php echo htmlspecialchars($duAn['tenDA']); ?></p></h2>
                </div>
                <div class="col-md-6 details">
                    <h5>THÔNG TIN CHI TIẾT</h5>
                    <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($duAn['diaChiDA']); ?></p>
                    <p><strong>Tên chủ:</strong> <?php echo htmlspecialchars($duAn['tenCDA']); ?></p>
                    <p><strong>Loại:</strong> <?php echo $duAn['maLoaiDA'] == 1 ? 'Nhà ở' : ($duAn['maLoaiDA'] == 2 ? 'Phòng trọ' : 'Chung cư'); ?></p>
                    <p><strong>Ngày tạo:</strong> <?php echo htmlspecialchars($duAn['ngayTao']); ?></p>
                    <p><strong>Trạng thái:</strong> <?php echo $quanlyDA->docTrangThaiDuyet($maDA); ?></p>
                    <p><strong>Hoa hồng:</strong> <?php echo htmlspecialchars($duAn['hoaHong']); ?></p>
                    <p><strong>Tiền cọc:</strong> <?php echo htmlspecialchars($duAn['tienCoc']); ?></p>
                    <p><strong>Diện tích:</strong> <?php echo htmlspecialchars($duAn['dienTich']); ?></p>
                    <?php
                    if ($chiTiet) {
                        switch ($duAn['maLoaiDA']) {
                            case 1: // Nhà ở
                                echo '<p><strong>Loại nhà:</strong> ' . htmlspecialchars($chiTiet['loaiNha']) . '</p>';
                                echo '<p><strong>Số phòng ngủ:</strong> ' . htmlspecialchars($chiTiet['soPhongNgu']) . '</p>';
                                echo '<p><strong>Số nhà vệ sinh:</strong> ' . htmlspecialchars($chiTiet['soNhaVS']) . '</p>';
                                echo '<p><strong>Hướng cửa:</strong> ' . htmlspecialchars($chiTiet['huongCua']) . '</p>';
                                echo '<p><strong>Pháp lý:</strong> ' . htmlspecialchars($chiTiet['phapLy']) . '</p>';
                                break;
                            case 2: // Phòng trọ
                                echo '<p><strong>Nội thất:</strong> ' . htmlspecialchars($chiTiet['noiThat']). '</p>';
                                break;
                            case 3: // Chung cư
                                echo '<p><strong>Mã căn:</strong> ' . htmlspecialchars($chiTiet['maCan']) . '</p>';
                                echo '<p><strong>Số phòng ngủ:</strong> ' . htmlspecialchars($chiTiet['soPhongNgu']) . '</p>';
                                echo '<p><strong>Số nhà vệ sinh:</strong> ' . htmlspecialchars($chiTiet['soNhaVS']) . '</p>';
                                echo '<p><strong>Pháp lý:</strong> ' . htmlspecialchars($chiTiet['phapLy']) . '</p>';
                                echo '<p><strong>Block:</strong> ' . htmlspecialchars($chiTiet['block']) . '</p>';
                                break;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="actions text-center mt-4">
                <form method="POST">
                    <input type="hidden" name="maDA" value="<?php echo $maDA; ?>">
                    <input type="hidden" name="action" id="action">
                    <textarea name="reason" id="reason" style="display: none;"></textarea>
                    <button type="button" class="btn btn-primary" onclick="submitAction('approve')">Duyệt</button>
                    <button type="button" class="btn btn-secondary" onclick="promptReason('feedback')">Phản hồi</button>
                    <button type="button" class="btn btn-danger" onclick="promptReason('delete')">Xóa</button>
                </form>
            </div>
        </div>
        <script>
            function submitAction(action) {
                document.getElementById('action').value = action;
                document.getElementById('reason').style.display = 'none'; // Không cần lý do
                document.querySelector('form').submit();
            }

            function promptReason(action) {
                const reason = prompt("Vui lòng nhập lý do:");
                if (reason) {
                    document.getElementById('action').value = action;
                    document.getElementById('reason').value = reason;
                    document.querySelector('form').submit();
                }
            }
        </script>
        <?php
    } else {
        echo '<div class="container text-center"><h3>Không tìm thấy thông tin dự án</h3></div>';
    }
} else {
    echo '<div class="container text-center"><h3>Mã dự án không hợp lệ</h3></div>';
}
?>
</body>