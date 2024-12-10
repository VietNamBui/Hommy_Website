<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['chon_goi'])) {
            $chon_goi = $_POST['chon_goi'];
            echo "<script>alert('Bạn đã chọn gói VIP{$chon_goi} thành công!');</script>";

            $id_taikhoan = $_SESSION["id_taikhoan"];
            if ($nameGoi = 'VIP1') {
                $sql = "UPDATE taikhoan SET maGoi = '$chon_goi' WHERE maTK = '$id_taikhoan'";
            }
        
            $obj = new database();
            $obj->themdulieu($sql);

        }
    }



    
    
        






?>