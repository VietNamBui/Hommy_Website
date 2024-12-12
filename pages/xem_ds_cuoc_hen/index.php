<?php
$obj = new database();
$trangThaiHanhDong = []; // Mảng lưu trạng thái hành động (tạm thời)
$ngayDaChon = ""; // Biến lưu ngày đã lọc

if (isset($_POST['ngayLoc'])) {
    // Lấy ngày đã chọn từ form
    $ngayDaChon = $_POST['ngayLoc'];

    // Truy vấn danh sách các cuộc hẹn theo ngày
    $sql = "SELECT 
                ch.maCuocHen, 
                ch.ngayDienRa, 
                ch.thoiGian,
                kh.tenKH, 
                da.tenDA,
                da.diaChiDA,
                kh.soDT
            FROM 
                cuochen ch
            JOIN 
                khachhang kh ON ch.maKH = kh.maKH
            JOIN 
                duan da ON ch.maDA = da.maDA
            WHERE
                ch.ngayDienRa = '{$ngayDaChon}'";
    $duan = $obj->xuatdulieu($sql);
    $isCapNhat = false; // Biến xác định trạng thái
} elseif (isset($_POST['hanhDong'])) {
    // Cập nhật trạng thái từ hành động
    $trangThaiHanhDong = $_POST['hanhDong'];
    $ngayDaChon = $_POST['ngayDaChon']; // Lấy ngày đã chọn từ input ẩn

    // Truy vấn lại danh sách để hiển thị theo ngày đã chọn
    $sql = "SELECT 
                ch.maCuocHen, 
                ch.ngayDienRa, 
                ch.thoiGian,
                kh.tenKH, 
                da.tenDA,
                da.diaChiDA,
                kh.soDT
            FROM 
                cuochen ch
            JOIN 
                khachhang kh ON ch.maKH = kh.maKH
            JOIN 
                duan da ON ch.maDA = da.maDA
            WHERE
                ch.ngayDienRa = '{$ngayDaChon}'";
    $duan = $obj->xuatdulieu($sql);
    $isCapNhat = true; // Hiển thị trạng thái sau khi cập nhật
} else {
    $duan = []; // Không có dữ liệu ban đầu
    $isCapNhat = false;
}
?>
<div class="container">
    <h2 class="mt-4">Danh sách các cuộc hẹn</h2>
    <div class="row mt-4">
        <div class="col-3"><h4>Lọc theo ngày:</h4></div>
        <div class="col-9 mt-2">
            <form action="" method="POST" class="d-flex align-items-center gap-2">
                <input type="date" class="form-control" style="max-width: 150px;" name="ngayLoc" value="<?= $ngayDaChon ?>">
                <button type="submit" class="btn btn-primary btn-block">Lọc</button>
            </form>
        </div>
    </div>

    <form action="" method="POST">
        <input type="hidden" name="ngayDaChon" value="<?= $ngayDaChon ?>">
        <table class="table table-bordered table-striped table-hover mt-4">
            <thead class="table-primary">
                <tr>
                    <th>STT</th>
                    <th>Ngày</th>
                    <th>Địa chỉ</th>
                    <th>Giờ</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <?php if ($isCapNhat) { echo '<th>Trạng thái</th>'; } ?>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($duan) {
                    for ($i = 0; $i < count($duan); $i++) {
                        $maCuocHen = $duan[$i]['maCuocHen'];
                        $trangThai = isset($trangThaiHanhDong[$maCuocHen]) && $trangThaiHanhDong[$maCuocHen] == "1" 
                            ? "Đã nhận" 
                            : "Chưa nhận";

                        echo '<tr>
                                <td>' . ($i + 1) . '</td>
                                <td>' . $duan[$i]['ngayDienRa'] . '</td>
                                <td>' . $duan[$i]['diaChiDA'] . '</td>
                                <td>' . $duan[$i]['thoiGian'] . '</td>
                                <td>' . $duan[$i]['tenKH'] . '</td>
                                <td>' . $duan[$i]['soDT'] . '</td>';
                        if ($isCapNhat) {
                            echo '<td>' . $trangThai . '</td>';
                        }
                        echo '<td>
                                    <select name="hanhDong[' . $maCuocHen . ']" class="form-control">
                                        <option value="1" ' . (isset($trangThaiHanhDong[$maCuocHen]) && $trangThaiHanhDong[$maCuocHen] == "1" ? "selected" : "") . '>Nhận</option>
                                        <option value="0" ' . (isset($trangThaiHanhDong[$maCuocHen]) && $trangThaiHanhDong[$maCuocHen] == "0" ? "selected" : "") . '>Không nhận</option>
                                    </select>
                                </td>
                            </tr>';
                    }
                } else {
                    echo '<tr><td colspan="8" class="text-center">Hiện tại chưa có lịch hẹn nào</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success btn-block">Cập nhật trạng thái</button>

        <a href="index.php?page=trangchu-nvmg" class="back-button">Quay lại</a>
    </form>
</div>
