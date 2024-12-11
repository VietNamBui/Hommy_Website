<?php
$obj = new database();
$danhmuc = $_GET['danhmuc'];
$search = $_POST["search"];

if(isset($_GET['danhmuc'])) {
    $sql = "SELECT maDA, maLoaiDA, hinhAnh, tenDA, giaThue, ngayTao
    FROM duan
    WHERE tenDA LIKE '%" . $danhmuc . "%'";
} else {
    $sql = "SELECT maDA, maLoaiDA, hinhAnh, tenDA, giaThue, ngayTao
        FROM duan
        WHERE tenDA LIKE '%" . $search . "%'";
}

$sanpham = $obj->xuatdulieu($sql);

?>

<div class="container" style="margin-top: 80px;">
    <div id="content-all" class="content-section active-content">
        <?php
        if ($sanpham) {
            echo '<div class="list-group">';
            for ($i = 0; $i < count($sanpham); $i++) {
                echo '
                <a href="index.php?page=chitietduan&mada=' . $sanpham[$i]["maDA"] . '&maloai=' . $sanpham[$i]['maLoaiDA'] . '" class="list-group-item list-group-item-action" style="padding: 20px;">
                    <div class="d-flex align-items-center">
                        <img src="assets/video/' . $sanpham[$i]["hinhAnh"] . '" alt="Hình ảnh dự án" style="object-fit: cover; width: 200px; height: 150px; margin-right: 20px; border-radius: 10px;">
                        <div>
                            <h4 class="mb-2" style="font-size: 18px; font-weight: bold;">' . $sanpham[$i]["tenDA"] . '</h4>
                            <p class="mb-2 text-success" style="font-size: 16px; font-weight: bold;">' . number_format($sanpham[$i]["giaThue"]) . ' VND</p>
                            <small class="text-muted" style="font-size: 14px;">Ngày tạo: ' . date("d/m/Y H:i", strtotime($sanpham[$i]["ngayTao"])) . '</small>
                        </div>
                    </div>
                </a>';
            }
            echo '</div>';
        } else {
            echo '<div class="alert alert-warning" role="alert">Không tìm thấy sản phẩm!</div>';
        }
        ?>
    </div>
</div>
