<?php
// Kết nối với class quanly
include("pages/quan_li_he_thong/class/clsquanly.php");
$quanly = new Quanly();
// Kiểm tra nếu đã bấm nút "Chưa duyệt" hay không
$filterChuaDuyet = isset($_GET['chua_duyet']) && $_GET['chua_duyet'] == 'true';

// Lấy danh sách dự án, nếu filterChuaDuyet là true thì chỉ lấy dự án có trạng thái Chưa duyệt (trangThaiDuyet = 2)
$duan_list = $quanly->danhsachduan('', $filterChuaDuyet);
?>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-dark" style="font-style: italic;">DỰ ÁN</h4>
            <div class="toolbar">
            <button class="btn btn-outline-secondary" onclick="toggleChuaDuyet()">
                <?php echo $filterChuaDuyet ? "Hiển thị tất cả" : "Chưa duyệt"; ?>
            </button>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nhập mã, địa chỉ">
                    <button class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Bộ lọc <i class="fas fa-filter"></i>
                    </button>
                    <ul class="dropdown-menu p-3" aria-labelledby="filterDropdown">
                        <li><div class="form-check"><input class="form-check-input" type="checkbox" id="filter1"><label class="form-check-label" for="filter1">Tất cả</label></div></li>
                        <li><div class="form-check"><input class="form-check-input" type="checkbox" id="filter2"><label class="form-check-label" for="filter2">Chung cư</label></div></li>
                        <li><div class="form-check"><input class="form-check-input" type="checkbox" id="filter3"><label class="form-check-label" for="filter3">Nhà</label></div></li>
                        <li><div class="form-check"><input class="form-check-input" type="checkbox" id="filter4"><label class="form-check-label" for="filter4">Trọ</label></div></li>
                        <li><div class="form-check"><input class="form-check-input" type="checkbox" id="filter5"><label class="form-check-label" for="filter5">Chưa duyệt</label></div></li>
                        <li><div class="form-check"><input class="form-check-input" type="checkbox" id="filter6"><label class="form-check-label" for="filter6">Đã duyệt</label></div></li>
                    </ul>
                </div>
                <button class="btn btn-outline-secondary">Thêm mới</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Loại</th>
                        <th>Địa chỉ</th>
                        <th>Tên chủ</th>
                        <th>Trạng thái</th>
                        <th>Giá thuê trung bình</th>
                        <th>Thao tác</th>
                        <th>Ảnh bìa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Kiểm tra xem $duan_list có phải là mảng và không rỗng không
                    if (is_array($duan_list) && !empty($duan_list)) {
                        // Duyệt qua các dự án và hiển thị dữ liệu vào bảng
                        foreach ($duan_list as $duan) {
                            // Determine the type of the project (maLoaiDA)
                            $loaiDA = '';
                            if ($duan['maLoaiDA'] == 1) {
                                $loaiDA = 'Nhà ở';
                            } elseif ($duan['maLoaiDA'] == 2) {
                                $loaiDA = 'Phòng trọ';
                            } elseif ($duan['maLoaiDA'] == 3) {
                                $loaiDA = 'Chung cư';
                            }

                            // Gọi hàm docTrangThaiDuyet để lấy trạng thái duyệt
                            $trangThai = $quanly->docTrangThaiDuyet($duan['maDA']);
                            
                            echo "<tr class='" . ($trangThai == 'Chưa duyệt' && $filterChuaDuyet ? 'highlight' : '') . "'>";
                            echo "<td>" . $duan['maDA'] . "</td>";
                            echo "<td>" . $loaiDA . "</td>";  // Hiển thị loại dự án
                            echo "<td>" . $duan['diaChiDA'] . "</td>";
                            echo "<td>" . $duan['tenCDA'] . "</td>";  // Hiển thị tên chủ dự án
                            echo "<td>" . $trangThai . "</td>";  // Hiển thị trạng thái duyệt
                            echo "<td>" . $duan['giaThue'] . "</td>";
                            echo "<td>";
                            echo "<button class='btn btn-success btn-sm'>Duyệt</button>";
                            echo "<button class='btn btn-warning btn-sm'>Sửa</button>";
                            echo "<button class='btn btn-danger btn-sm'>Xóa</button>";
                            echo "</td>";
                            echo "<td><button class='btn btn-light btn-sm'>Hình ảnh</button></td>";
                            echo "</tr>";
                        }                            
                    } else {
                        // Nếu không có dữ liệu, hiển thị thông báo
                        echo "<tr><td colspan='8'>Không có dữ liệu dự án nào.</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="pagination-container mt-3">
            <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</body>

<script>
// JavaScript xử lý lọc dự án "Chưa duyệt" và hiển thị lại tất cả
function toggleChuaDuyet() {
    var currentUrl = new URL(window.location.href);
    if (currentUrl.searchParams.get('chua_duyet') === 'true') {
        currentUrl.searchParams.delete('chua_duyet'); // Xóa tham số nếu đã có
    } else {
        currentUrl.searchParams.set('chua_duyet', 'true'); // Thêm tham số nếu chưa có
    }
    window.location.href = currentUrl.href;
}
</script>

