<?php
    $obj = new database();
    include("pages/quanlydanhsachyeuthich/xuly.php");
?>
<div class="container mt-5">
    <!-- Title -->
    <h1 class="text-center mb-4">Các dự án yêu thích của tôi</h1>

    <!-- Real Estate List -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Bất động sản yêu thích</h5>
        </div>
        <form method="post">
            <ul class="list-group list-group-flush">
                <!-- Example Real Estate Item -->
                <?php
                $duan = $obj->xuatdulieu("select * from danhsachduanyeuthich");

                if ($duan) {
                    for ($i = 0; $i < count($duan); $i++) {
                        echo
                        '<li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="mb-1">' . $duan[$i]["tenDA"] . '</h5>
                                        <p class="mb-1 text-muted">123 Green Avenue, New York, NY</p>
                                        <p class="mb-1"><strong>Price:</strong>' . $duan[$i]["giaThue"] . '</p>
                                    </div>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm(\'Ban co chac muon xoa sp nay khong?\')" type="submit" name="btXoa" value="'.$duan[$i]["maDuAn"].'">Remove</button>
                                </div>
                            </li>';
                    }
                } else {
                    echo '<h1 style="text-align: center;">Hiện tại chưa có dự án yêu thích nào!</h1>';
                }
                ?>
            </ul>
        </form>
    </div>
</div>