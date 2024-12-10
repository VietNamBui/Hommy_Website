<?php
$obj = new database();
// tất cả dự án
if($mada)
    $sql1="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao
    FROM duan d 
    LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
    LEFT JOIN nhao n ON d.maDA = n.maDA 
    LEFT JOIN phongtro pt ON d.maDA = pt.maDA
    where maLoaiDA = '$mada' ";
else
    $sql1="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao
    FROM duan d 
    LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
    LEFT JOIN nhao n ON d.maDA = n.maDA 
    LEFT JOIN phongtro pt ON d.maDA = pt.maDA";
// dự án đã duyệt
if($mada)
    $sql2="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
    FROM duan d 
    LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
    LEFT JOIN nhao n ON d.maDA = n.maDA 
    LEFT JOIN phongtro pt ON d.maDA = pt.maDA
    where maLoaiDA = '$mada' and trangThaiDuyet = '1'"; // 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else
    $sql2="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
    FROM duan d 
    LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
    LEFT JOIN nhao n ON d.maDA = n.maDA 
    LEFT JOIN phongtro pt ON d.maDA = pt.maDA
    where trangThaiDuyet = '1'";
// dự án chưa duyệt 
if($mada)
$sql3="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where maLoaiDA = '$mada' and trangThaiDuyet = '2'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else
$sql3="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where trangThaiDuyet = '2'";
// dự án bị từ chối
if($mada)
$sql4="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where maLoaiDA = '$mada' and trangThaiDuyet = '3'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else
$sql4="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where trangThaiDuyet = '3'";
// dự án đã duyệt và đã thuê
if($mada)
$sql5="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where maLoaiDA = '$mada' and trangThaiDuyet = '1' and trangThaiThue ='2'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else                                                                       //trangThaiThue 1 là chưa thuê 2 là thuê rồi
$sql5="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where trangThaiDuyet = '1' and trangThaiThue ='2'";
// dự án đã duyệt và chưa thuê
if($mada)
$sql6="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where maLoaiDA = '$mada' and trangThaiDuyet = '1' and trangThaiThue ='1'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else                                                                       //trangThaiThue 1 là chưa thuê 2 là thuê rồi
$sql6="SELECT d.maDA,d.giaThue,maLoaiDA,hinhAnh,tenDA,ngayTao 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where trangThaiDuyet = '1' and trangThaiThue ='1'";

$sanpham=$obj->xuatdulieu($sql1);
$duan=$obj->xuatdulieu($sql2);
$duan1=$obj->xuatdulieu($sql3);
$duan3=$obj->xuatdulieu($sql4);
$duan4=$obj->xuatdulieu($sql5);
$duan5=$obj->xuatdulieu($sql6);
?>

    <!-- Content Sections -->
    <div class="container" style="margin-top: 80px;">
        <div class="d-flex justify-content-between" style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #dee2e6;">
        <div id="tab-all" class="text-dark fw-bold" onclick="showTab('all')" style="cursor: pointer; margin: 0 8px;">Tất cả</div>
        <div id="tab-approved" class="text-muted" onclick="showTab('approved')" style="cursor: pointer; margin: 0 8px;">Đã duyệt</div>
        <div id="tab-pending" class="text-muted" onclick="showTab('pending')" style="cursor: pointer; margin: 0 8px;">Chờ duyệt</div>
        <div id="tab-rejected" class="text-muted" onclick="showTab('rejected')" style="cursor: pointer; margin: 0 8px;">Từ chối</div>
        <div id="tab-rented" class="text-muted" onclick="showTab('rented')" style="cursor: pointer; margin: 0 8px;">Đã thuê</div>
        <div id="tab-unrented" class="text-muted" onclick="showTab('unrented')" style="cursor: pointer; margin: 0 8px;">Chưa thuê</div>
    </div>
        <!-- All Listings -->
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

        <!-- Approved Listings -->
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
         <!--Pending Listings -->
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
        <!-- Rejected Listings -->
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

        <!-- Rented Listings -->
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

        <!-- Unrented Listings -->
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
    <!-- JavaScript for Tab Switching -->
    <script>
        function showTab(tab) {
            // Hide all content sections
            document.querySelectorAll('.content-section').forEach(function(section) {
                section.style.display = 'none';
            });

            // Reset all tab styles to muted
            document.querySelectorAll('.d-flex > div').forEach(function(tabElement) {
                tabElement.classList.remove('fw-bold');
                tabElement.classList.remove('text-dark');
                tabElement.classList.add('text-muted');
            });

            // Show the selected content and style the active tab
            document.getElementById('content-' + tab).style.display = 'block';
            document.getElementById('tab-' + tab).classList.add('fw-bold');
            document.getElementById('tab-' + tab).classList.add('text-dark');
            document.getElementById('tab-' + tab).classList.remove('text-muted');
        }
    </script>
        
        
        
        
