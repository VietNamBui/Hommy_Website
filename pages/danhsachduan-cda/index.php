<?php
$obj = new database();
if($cate)
    $sql1="SELECT * 
    FROM duan d 
    LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
    LEFT JOIN nhao n ON d.maDA = n.maDA 
    LEFT JOIN phongtro pt ON d.maDA = pt.maDA
    where maLoaiDA = '$cate' ";
else
    $sql1="SELECT * 
    FROM duan d 
    LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
    LEFT JOIN nhao n ON d.maDA = n.maDA 
    LEFT JOIN phongtro pt ON d.maDA = pt.maDA";

if($cate)
    $sql2="SELECT * 
    FROM duan d 
    LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
    LEFT JOIN nhao n ON d.maDA = n.maDA 
    LEFT JOIN phongtro pt ON d.maDA = pt.maDA
    where maLoaiDA = '$cate' and trangThaiDuyet = '1'"; // 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else
    $sql2="SELECT * 
    FROM duan d 
    LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
    LEFT JOIN nhao n ON d.maDA = n.maDA 
    LEFT JOIN phongtro pt ON d.maDA = pt.maDA
    where trangThaiDuyet = '1'";

if($cate)
$sql3="SELECT * 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where maLoaiDA = '$cate' and trangThaiDuyet = '2'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else
$sql3="SELECT * 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where trangThaiDuyet = '2'";

if($cate)
$sql4="SELECT * 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where maLoaiDA = '$cate' and trangThaiDuyet = '3'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else
$sql4="SELECT * 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where trangThaiDuyet = '3'";

if($cate)
$sql5="SELECT * 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where maLoaiDA = '$cate' and trangThaiDuyet = '1' and trangThaiThue ='2'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else                                                                       //trangThaiThue 1 là chưa thuê 2 là thuê rồi
$sql5="SELECT * 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where trangThaiDuyet = '1' and trangThaiThue ='2'";

if($cate)
$sql6="SELECT * 
FROM duan d 
LEFT JOIN chungcu cu ON d.maDA = cu.maDA 
LEFT JOIN nhao n ON d.maDA = n.maDA 
LEFT JOIN phongtro pt ON d.maDA = pt.maDA
where maLoaiDA = '$cate' and trangThaiDuyet = '1' and trangThaiThue ='1'"; //trangThaiDuyet 1 là đã duyệt, 2 là chưa duyệt, 3 là từ chối.
else                                                                       //trangThaiThue 1 là chưa thuê 2 là thuê rồi
$sql6="SELECT * 
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
        <div id="tab-all" class="text-dark fw-bold" onclick="showTab('all')" style="cursor: pointer; margin: 0 8px;">Tất cả (1)</div>
        <div id="tab-approved" class="text-muted" onclick="showTab('approved')" style="cursor: pointer; margin: 0 8px;">Đã duyệt (0)</div>
        <div id="tab-pending" class="text-muted" onclick="showTab('pending')" style="cursor: pointer; margin: 0 8px;">Chờ duyệt (1)</div>
        <div id="tab-rejected" class="text-muted" onclick="showTab('rejected')" style="cursor: pointer; margin: 0 8px;">Từ chối (0)</div>
        <div id="tab-rented" class="text-muted" onclick="showTab('rented')" style="cursor: pointer; margin: 0 8px;">Đã thuê (0)</div>
        <div id="tab-unrented" class="text-muted" onclick="showTab('unrented')" style="cursor: pointer; margin: 0 8px;">Chưa thuê (0)</div>
    </div>
        <!-- All Listings -->
        <div id="content-all" class="content-section active-content" style="display: block;">
            <?php
                if($sanpham)
                {
                    for($i=0;$i<count($sanpham);$i++) // hien tat ca du lieu ra
                    {
                        echo '<div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$sanpham[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;"><a href="index.php?page=chitietduan-cda&cate='.$sanpham[$i]["maDA"].'">'.$sanpham[$i]["tenDA"].'</a></p>
                                    <p style="margin-bottom: 5px;">'.number_format($sanpham[$i]["giaThue"]).'</p>
                                    <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                                </div>
                            </div>';
                    }
                }
                else
                    echo "Hien tai chua co san pham nao";
            ?>
        </div>

        <!-- Approved Listings -->
        <div id="content-approved" class="content-section" style="display: none;">
        <?php
                if($duan)
                {
                    for($i=0;$i<count($duan);$i++) // hien tat ca du lieu ra
                    {
                        echo '<div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$duan[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;"><a href="index.php?page=chitietduan-cda&cate='.$duan[$i]["maDA"].'">'.$duan[$i]["tenDA"].'</a></p>
                                    <p style="margin-bottom: 5px;">'.number_format($duan[$i]["giaThue"]).'</p>
                                    <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                                </div>
                            </div>';
                    }
                }
                else
                    echo "Hien tai chua co san pham nao";
            ?>
        </div>
         <!--Pending Listings -->
        <div id="content-pending" class="content-section" style="display: none;">
        <?php
                if($duan1)
                {
                    for($i=0;$i<count($duan1);$i++) // hien tat ca du lieu ra
                    {
                        echo '<div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$duan1[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;"><a href="index.php?page=chitietduan-cda&cate='.$duan1[$i]["maDA"].'">'.$duan1[$i]["tenDA"].'</a></p>
                                    <p style="margin-bottom: 5px;">'.number_format($duan1[$i]["giaThue"]).'</p>
                                    <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                                </div>
                            </div>';
                    }
                }
                else
                    echo "Hien tai chua co san pham nao";
            ?>
        </div>
        <!-- Rejected Listings -->
        <div id="content-rejected" class="content-section" style="display: none;">
        <?php
                if($duan3)
                {
                    for($i=0;$i<count($duan3);$i++) // hien tat ca du lieu ra
                    {
                        echo '<div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$duan3[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;"><a href="index.php?page=chitietduan-cda&cate='.$duan3[$i]["maDA"].'">'.$duan3[$i]["tenDA"].'</a></p>
                                    <p style="margin-bottom: 5px;">'.number_format($duan3[$i]["giaThue"]).'</p>
                                    <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                                </div>
                            </div>';
                    }
                }
                else
                    echo "Hien tai chua co san pham nao";
            ?>
        </div>

        <!-- Rented Listings -->
        <div id="content-rented" class="content-section" style="display: none;">
        <?php
                if($duan4)
                {
                    for($i=0;$i<count($duan4);$i++) // hien tat ca du lieu ra
                    {
                        echo '<div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$duan4[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;"><a href="index.php?page=chitietduan-cda&cate='.$duan4[$i]["maDA"].'">'.$duan4[$i]["tenDA"].'</a></p>
                                    <p style="margin-bottom: 5px;">'.number_format($duan4[$i]["giaThue"]).'</p>
                                    <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                                </div>
                            </div>';
                    }
                }
                else
                    echo "Hien tai chua co san pham nao";
            ?>
        </div>

        <!-- Unrented Listings -->
        <div id="content-unrented" class="content-section" style="display: none;">
        <?php
                if($duan5)
                {
                    for($i=0;$i<count($duan5);$i++) // hien tat ca du lieu ra
                    {
                        echo '<div class="card" style="padding: 15px; margin-bottom: 15px;">
                                <div class="d-flex align-items-center">
                                    <img src="assets/video/'.$duan5[$i]["hinhAnh"].'" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                                    <div style="margin-left: 15px;">
                                    <p style="margin-bottom: 5px;"><a href="index.php?page=chitietduan-cda&cate='.$duan5[$i]["maDA"].'">'.$duan5[$i]["tenDA"].'</a></p>
                                    <p style="margin-bottom: 5px;">'.number_format($duan5[$i]["giaThue"]).'</p>
                                    <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                                </div>
                                <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                                </div>
                            </div>';
                    }
                }
                else
                    echo "Hien tai chua co san pham nao";
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
    <!-- Bootstrap JavaScript Bundle (including Popper) -->


