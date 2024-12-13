<?php
$obj = new database();
// tất cả dự án
if($maloai)
    $sql1="SELECT d.maDA, d.giaThue, d.maLoaiDA, d.hinhAnh, d.tenDA, d.ngayTao
            FROM duan d
            LEFT JOIN chungcu cu ON d.maDA = cu.maDA
            LEFT JOIN nhao n ON d.maDA = n.maDA
            LEFT JOIN phongtro pt ON d.maDA = pt.maDA
            LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
            where maLoaiDA = '$maloai' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'";
else
    $sql1="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao
            FROM duan d 
            LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
            LEFT JOIN nhao n ON d.maDA = n.maDA 
            LEFT JOIN phongtro pt ON d.maDA = pt.maDA
            where d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'";

// dự án đã duyệt
if($maloai)
    $sql2="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
            FROM duan d 
            LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
            LEFT JOIN nhao n ON d.maDA = n.maDA 
            LEFT JOIN phongtro pt ON d.maDA = pt.maDA
            LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
            where maLoaiDA = '$maloai' and trangThaiDuyet = '1' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'"; // 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else
    $sql2="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
            FROM duan d 
            LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
            LEFT JOIN nhao n ON d.maDA = n.maDA 
            LEFT JOIN phongtro pt ON d.maDA = pt.maDA
            LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
            where trangThaiDuyet = '1' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'";
// dự án chưa duyệt 
if($maloai)
$sql3="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
        FROM duan d 
        LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
        LEFT JOIN nhao n ON d.maDA = n.maDA 
        LEFT JOIN phongtro pt ON d.maDA = pt.maDA
        LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
        where maLoaiDA = '$maloai' and trangThaiDuyet = '2' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else
$sql3="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
        FROM duan d 
        LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
        LEFT JOIN nhao n ON d.maDA = n.maDA 
        LEFT JOIN phongtro pt ON d.maDA = pt.maDA
        LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
        where trangThaiDuyet = '2' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'";
// dự án bị từ chối
if($maloai)
$sql4="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
        FROM duan d 
        LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
        LEFT JOIN nhao n ON d.maDA = n.maDA 
        LEFT JOIN phongtro pt ON d.maDA = pt.maDA
        LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
        where maLoaiDA = '$maloai' and trangThaiDuyet = '3' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else
$sql4="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
        FROM duan d 
        LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
        LEFT JOIN nhao n ON d.maDA = n.maDA 
        LEFT JOIN phongtro pt ON d.maDA = pt.maDA
        LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
        where trangThaiDuyet = '3' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'";
// dự án đã duyệt và đã thuê
if($maloai)
$sql5="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
        FROM duan d 
        LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
        LEFT JOIN nhao n ON d.maDA = n.maDA 
        LEFT JOIN phongtro pt ON d.maDA = pt.maDA
        LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
        where maLoaiDA = '$maloai' and trangThaiDuyet = '1' and trangThaiThue ='2' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
        else                                                                       //trangThaiThue 1 là chưa thuê 2 là thuê rồi
$sql5="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
        FROM duan d 
        LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
        LEFT JOIN nhao n ON d.maDA = n.maDA 
        LEFT JOIN phongtro pt ON d.maDA = pt.maDA
        LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
        where trangThaiDuyet = '1' and trangThaiThue ='2' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'";
// dự án đã duyệt và chưa thuê
if($maloai)
$sql6="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
        FROM duan d 
        LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
        LEFT JOIN nhao n ON d.maDA = n.maDA 
        LEFT JOIN phongtro pt ON d.maDA = pt.maDA
        LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
        where maLoaiDA = '$maloai' and trangThaiDuyet = '1' and trangThaiThue ='1' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else                                                                       //trangThaiThue 1 là chưa thuê 2 là thuê rồi
$sql6="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
        FROM duan d 
        LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
        LEFT JOIN nhao n ON d.maDA = n.maDA 
        LEFT JOIN phongtro pt ON d.maDA = pt.maDA
        LEFT JOIN chuduan cdu ON d.maChuDuAn = cdu.maChuDuAn
        where trangThaiDuyet = '1' and trangThaiThue ='1' and d.maChuDuAn = '{$_SESSION["maChuDuAn"]}'";

$sanpham=$obj->xuatdulieu($sql1);
$duan=$obj->xuatdulieu($sql2);
$duan1=$obj->xuatdulieu($sql3);
$duan3=$obj->xuatdulieu($sql4);
$duan4=$obj->xuatdulieu($sql5);
$duan5=$obj->xuatdulieu($sql6);
?>
        <div class="container mt-2">
            <button class="btn btn-success" style="background-color: #198754; color: white; border: none;  border-radius: 0.25rem; white-space: nowrap;">
                <a href="index.php?page=danhsachduan-cda" style="text-decoration: none; color: inherit;">All</a>
            </button>
            <button class="btn btn-success" style="background-color: #198754; color: white; border: none;  border-radius: 0.25rem; white-space: nowrap;">
                <a href="index.php?page=danhsachduan-cda&maloai=1" style="text-decoration: none; color: inherit;">Nhà ở</a>
            </button>
            <button class="btn btn-success" style="background-color: #198754; color: white; border: none;  border-radius: 0.25rem; white-space: nowrap;">
                <a href="index.php?page=danhsachduan-cda&maloai=2" style="text-decoration: none; color: inherit;">Phòng trọ</a>
            </button>
            <button class="btn btn-success" style="background-color: #198754; color: white; border: none;  border-radius: 0.25rem; white-space: nowrap;">
                <a href="index.php?page=danhsachduan-cda&maloai=3" style="text-decoration: none; color: inherit;">Chung cư</a>
            </button>
            
        </div>
    <!-- Lựa chọn -->
    <div class="container mt-5" style="margin-top: 80px;">
        <div class="d-flex justify-content-between" style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #dee2e6;">
        <div id="tab-all" class="text-dark fw-bold" onclick="showTab('all')" style="cursor: pointer; margin: 0 8px;">Tất cả</div>
        <div id="tab-approved" class="text-muted" onclick="showTab('approved')" style="cursor: pointer; margin: 0 8px;">Đã duyệt</div>
        <div id="tab-pending" class="text-muted" onclick="showTab('pending')" style="cursor: pointer; margin: 0 8px;">Chờ duyệt</div>
        <div id="tab-rejected" class="text-muted" onclick="showTab('rejected')" style="cursor: pointer; margin: 0 8px;">Từ chối</div>
        <div id="tab-rented" class="text-muted" onclick="showTab('rented')" style="cursor: pointer; margin: 0 8px;">Đã thuê</div>
        <div id="tab-unrented" class="text-muted" onclick="showTab('unrented')" style="cursor: pointer; margin: 0 8px;">Chưa thuê</div>
    </div>
        <!-- TẤT CẢ -->
        <div id="content-all" class="content-section active-content" style="display: block;">
        <?php
            if($sanpham) {
                for($i = 0; $i < count($sanpham); $i++) {
                    echo '<a href="index.php?page=chitietduan-cda&mada='.$sanpham[$i]["maDA"].'&maloai=' .$sanpham[$i]['maLoaiDA'].'" style="text-decoration: none; color: inherit;">
                            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$sanpham[$i]["hinhAnh"].'" alt="1" style="background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                        <p style="margin-bottom: 5px;">'.$sanpham[$i]["tenDA"].'</p>
                                        <p style="margin-bottom: 5px;">'.number_format($sanpham[$i]["giaThue"]).'   VND</p>
                                        <p style="margin-bottom: 5px;">'.date("d/m/Y H:i", strtotime($sanpham[$i]["ngayTao"])).'</p>
                                    </div>
                                </div>
                            </div>
                        </a>';
                }
            } else {
                echo "Hiện tại chưa có dự án nào được đăng";
            }
        ?>
        </div>

        <!-- CHƯA DUYỆT -->
        <div id="content-approved" class="content-section" style="display: none;">
        <?php
                if($duan)
                {
                    for($i=0;$i<count($duan);$i++) // hien tat ca du lieu ra
                    {
                        echo '<a href="index.php?page=chitietduan-cda&mada='.$duan[$i]["maDA"].'&maloai=' .$duan[$i]['maLoaiDA'].'" style="text-decoration: none; color: inherit;">
                                <div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$duan[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;">'.$duan[$i]["tenDA"].'</p>
                                    <p style="margin-bottom: 5px;">'.number_format($duan[$i]["giaThue"]).'   VND</p>
                                    <p style="margin-bottom: 5px;">'.date("d/m/Y H:i", strtotime($duan[$i]["ngayTao"])).'</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Đã duyệt</div>
                                </div>
                            </div>
                                </a>';
                    }
                }
                else
                    echo "Hiện tại chưa có dự án nào được đăng";
        ?>
        </div>
         <!--ĐÃ DUYỆT -->
        <div id="content-pending" class="content-section" style="display: none;">
        <?php
                if($duan1)
                {
                    for($i=0;$i<count($duan1);$i++) // hien tat ca du lieu ra
                    {
                        echo '<a href="index.php?page=chitietduan-cda&mada='.$duan1[$i]["maDA"].'&maloai=' .$duan1[$i]['maLoaiDA'].'" style="text-decoration: none; color: inherit;">
                                <div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$duan1[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;">'.$duan1[$i]["tenDA"].'</p>
                                    <p style="margin-bottom: 5px;">'.number_format($duan1[$i]["giaThue"]).'   VND</p>
                                    <p style="margin-bottom: 5px;">'.date("d/m/Y H:i", strtotime($duan1[$i]["ngayTao"])).'</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                                </div>
                            </div>
                                </a>';
                    }
                }
                else
                    echo "Hiện tại chưa có dự án nào được đăng";
    ?>
        </div>
        <!-- BỊ TỪ CHỐI -->
        <div id="content-rejected" class="content-section" style="display: none;">
        <?php
                if($duan3)
                {
                    for($i=0;$i<count($duan3);$i++) // hien tat ca du lieu ra
                    {
                        echo '<a href="index.php?page=chitietduan-cda&mada='.$duan3[$i]["maDA"].'&maloai=' .$duan3[$i]['maLoaiDA'].'" style="text-decoration: none; color: inherit;">
                                <div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$duan3[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;">'.$duan3[$i]["tenDA"].'</p>
                                    <p style="margin-bottom: 5px;">'.number_format($duan3[$i]["giaThue"]).'   VND</p>
                                    <p style="margin-bottom: 5px;">'.date("d/m/Y H:i", strtotime($duan3[$i]["ngayTao"])).'</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Bị từ chối</div>
                                </div>
                            </div>
                                </a>';
                    }
                }
                else
                    echo "Hiện tại chưa có dự án nào được đăng";
    ?>
        </div>

        <!-- ĐÃ THUÊ -->
        <div id="content-rented" class="content-section" style="display: none;">
        <?php
                if($duan4)
                {
                    for($i=0;$i<count($duan4);$i++) // hien tat ca du lieu ra
                    {
                        echo '<a href="index.php?page=chitietduan-cda&mada='.$duan4[$i]["maDA"].'&maloai=' .$duan4[$i]['maLoaiDA'].'" style="text-decoration: none; color: inherit;">
                                <div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$duan4[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;">'.$duan4[$i]["tenDA"].'</p>
                                    <p style="margin-bottom: 5px;">'.number_format($duan4[$i]["giaThue"]).'   VND</p>
                                    <p style="margin-bottom: 5px;">'.date("d/m/Y H:i", strtotime($duan4[$i]["ngayTao"])).'</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Đã thuê</div>
                                </div>
                            </div>
                                </a>';
                    }
                }
                else
                    echo "Hiện tại chưa có dự án nào được đăng";
        ?>
        </div>

        <!-- CHƯA THUÊ -->
        <div id="content-unrented" class="content-section" style="display: none;">
        <?php
                if($duan5)
                {
                    for($i=0;$i<count($duan5);$i++) // hien tat ca du lieu ra
                    {
                        echo '<a href="index.php?page=chitietduan-cda&mada='.$duan5[$i]["maDA"].'&maloai=' .$duan5[$i]['maLoaiDA'].'" style="text-decoration: none; color: inherit;">
                                <div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$duan5[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;">'.$duan5[$i]["tenDA"].'</p>
                                    <p style="margin-bottom: 5px;">'.number_format($duan5[$i]["giaThue"]).'   VND</p>
                                    <p style="margin-bottom: 5px;">'.date("d/m/Y H:i", strtotime($duan5[$i]["ngayTao"])).'</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Chưa thuê</div>
                                </div>
                            </div>
                                </a>';
                    }
                }
                else
                    echo "Hiện tại chưa có dự án nào được đăng";
    ?>
        </div>
    </div>
    <script>
    function showTab(tab) {
    // Ẩn tất cả các phần nội dung
    document.querySelectorAll('.content-section').forEach(section => section.style.display = 'none');

    // Đặt lại tất cả các tab về trạng thái mặc định (màu mờ)
    document.querySelectorAll('.d-flex > div').forEach(tabElement => {
        tabElement.classList.replace('fw-bold', 'text-muted');  // Thay 'fw-bold' bằng 'text-muted'
        tabElement.classList.replace('text-dark', 'text-muted'); // Thay 'text-dark' bằng 'text-muted'
    });
    
    // Hiển thị phần nội dung của tab đã chọn
    document.getElementById('content-' + tab).style.display = 'block';

    // Thêm lớp 'fw-bold' và 'text-dark' vào tab đã chọn, và bỏ lớp 'text-muted'
    const activeTab = document.getElementById('tab-' + tab);
    activeTab.classList.add('fw-bold', 'text-dark');   // Thêm các lớp 'fw-bold' và 'text-dark' vào tab
    activeTab.classList.remove('text-muted');         // Xóa lớp 'text-muted' khỏi tab đã chọn
}

</script>

        
        
        
        
