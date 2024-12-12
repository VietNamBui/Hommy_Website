<?php
// Kết nối với class quanly
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('pages/quan_li_he_thong/class/clsquanlyDA.php');
$quanly = new QuanlyDA();

// Kiểm tra nếu đã bấm nút "Chưa duyệt" hay không
$filterChuaDuyet = isset($_GET['chua_duyet']) && $_GET['chua_duyet'] == 'true';

// Lấy tham số tìm kiếm từ URL nếu có
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Lấy trang hiện tại từ URL (mặc định là trang 1 nếu không có tham số)
$page = isset($_GET['pages']) ? (int)$_GET['pages'] : 1;

// Số lượng dự án hiển thị trên mỗi trang
$limit = 10;

// Tính toán offset
$offset = ($page - 1) * $limit;

// Lấy danh sách dự án với phân trang và tìm kiếm
$duan_list = $quanly->danhsachduan($search, $filterChuaDuyet, $limit, $offset);

// Tính tổng số dự án
$totalDuan = $quanly->getTotalDuan($search, $filterChuaDuyet);

// Tính số trang
$totalPages = ceil($totalDuan / $limit);
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
                    <input type="text" class="form-control" placeholder="Nhập mã, địa chỉ" id="searchInput" value="<?= htmlspecialchars($search); ?>">
                    <button class="btn btn-outline-secondary" onclick="searchProjects()"><i class="fas fa-search"></i></button>
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

        <!-- Hiển thị danh sách dự án -->
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
                            // Xác định loại dự án dựa trên maLoaiDA
                            $loaiDA = '';
                            switch ($duan['maLoaiDA']) {
                                case 1:
                                    $loaiDA = 'Nhà ở';
                                    break;
                                case 2:
                                    $loaiDA = 'Phòng trọ';
                                    break;
                                case 3:
                                    $loaiDA = 'Chung cư';
                                    break;
                                default:
                                    $loaiDA = 'Không xác định';
                                    break;
                            }

                            // Gọi hàm docTrangThaiDuyet để lấy trạng thái duyệt
                            $trangThai = $quanly->docTrangThaiDuyet($duan['maDA']);
                            
                            echo "<tr class='" . ($trangThai == 'Chưa duyệt' && $filterChuaDuyet ? 'highlight' : '') . "'>";
                            echo "<td>" . htmlspecialchars($duan['maDA']) . "</td>";
                            echo "<td>" . htmlspecialchars($loaiDA) . "</td>";  
                            echo "<td>" . htmlspecialchars($duan['diaChiDA']) . "</td>";
                            echo "<td>" . htmlspecialchars($duan['tenCDA']) . "</td>";  // Hiển thị tên chủ dự án
                            echo "<td>" . htmlspecialchars($trangThai) . "</td>";  // Hiển thị trạng thái duyệt
                            echo "<td>" . htmlspecialchars($duan['giaThue']) . "</td>";
                            echo "<td>";
                            
                            // Kiểm tra nếu trạng thái duyệt bằng 2 thì hiển thị nút "Duyệt"
                            if ($trangThai == 'Chưa duyệt') {
                                echo '<button class="btn btn-success btn-sm" onclick="window.location.href=\'index.php?page=duyet_du_an&maDA=' . $duan['maDA'] . '\';">Duyệt</button> ';
                            }

                            echo "<button class='btn btn-warning btn-sm'>Sửa</button> ";
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

        <!-- Phân trang -->
        <div class="pagination-container mt-3">
            <nav>
                <ul class="pagination">
                    <!-- Nút quay lại trang trước -->
                    <li class="page-item <?= $page <= 1 ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=quan_li_du_an&pages=<?= $page - 1; ?>&chua_duyet=<?= $filterChuaDuyet ? 'true' : 'false'; ?>&search=<?= urlencode($search); ?>"><i class="fas fa-angle-left"></i></a>
                    </li>

                    <!-- Hiển thị các trang -->
                    <?php 
                        // Hiển thị tối đa 5 trang, bao gồm trang hiện tại và 2 trang trước/sau
                        $range = 2; // Số trang mỗi bên của trang hiện tại
                        $start = max(1, $page - $range);
                        $end = min($totalPages, $page + $range);

                        if ($start > 1) {
                            echo '<li class="page-item"><a class="page-link" href="?page=quan_li_du_an&pages=1&chua_duyet=' . ($filterChuaDuyet ? 'true' : 'false') . '&search=' . urlencode($search) . '">1</a></li>';
                            if ($start > 2) {
                                echo '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
                            }
                        }

                        for ($i = $start; $i <= $end; $i++):
                    ?>
                        <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=quan_li_du_an&pages=<?= $i; ?>&chua_duyet=<?= $filterChuaDuyet ? 'true' : 'false'; ?>&search=<?= urlencode($search); ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php
                        if ($end < $totalPages) {
                            if ($end < $totalPages - 1) {
                                echo '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>';
                            }
                            echo '<li class="page-item"><a class="page-link" href="?page=quan_li_duan&pages=' . $totalPages . '&chua_duyet=' . ($filterChuaDuyet ? 'true' : 'false') . '&search=' . urlencode($search) . '">' . $totalPages . '</a></li>';
                        }
                    ?>

                    <!-- Nút quay lại trang sau -->
                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=quan_li_duan&pages=<?= $page + 1; ?>&chua_duyet=<?= $filterChuaDuyet ? 'true' : 'false'; ?>&search=<?= urlencode($search); ?>"><i class="fas fa-angle-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>

<script>
function toggleChuaDuyet() {
    var currentUrl = new URL(window.location.href);
    if (currentUrl.searchParams.get('chua_duyet') === 'true') {
        currentUrl.searchParams.delete('chua_duyet'); // Xóa tham số nếu đã có
    } else {
        currentUrl.searchParams.set('chua_duyet', 'true'); // Thêm tham số nếu chưa có
    }
    window.location.href = currentUrl.href;
}

function searchProjects() {
    var searchInput = document.getElementById('searchInput').value;
    var currentUrl = new URL(window.location.href);
    
    if (searchInput) {
        currentUrl.searchParams.set('search', searchInput); // Thêm tham số tìm kiếm vào URL
    } else {
        currentUrl.searchParams.delete('search'); // Xóa tham số tìm kiếm nếu ô tìm kiếm trống
    }

    // Khi thực hiện tìm kiếm, chuyển đến trang 1
    currentUrl.searchParams.set('pages', 1);

    window.location.href = currentUrl.href; // Tải lại trang với tham số tìm kiếm mới
}
</script>
