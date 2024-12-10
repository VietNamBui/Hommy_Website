<?php
    if (isset($_POST['yeuthich'])) {
        $sql_SlmaDA = "SELECT maDuAn FROM danhsachduanyeuthich WHERE MaKH = '" . $_SESSION["maKH"] . "'";
        $SlmaDA = $obj->xuatdulieu($sql_SlmaDA);
    
        // Kiểm tra nếu kết quả trả về là một mảng
        if (is_array($SlmaDA)) {
            $exists = false;
    
            // Duyệt qua các dự án yêu thích
            foreach ($SlmaDA as $row) {
                if ($sanpham[0]['maDA'] == $row['maDuAn']) {
                    echo "<script>alert('Dự án đã tồn tại trong danh sách yêu thích!');</script>";
                    $exists = true;
                    break; // Dừng kiểm tra nếu tìm thấy
                }
            }
    
            // Nếu không tồn tại, thêm mới
            if (!$exists) {
                $sql = "
                INSERT INTO danhsachduanyeuthich (maKH, maDuAn, tenDA, diaChiDA, giaThue, maLoaiDA) 
                VALUES (
                    '{$_SESSION['maKH']}', 
                    '{$sanpham[0]['maDA']}', 
                    '{$sanpham[0]['tenDA']}', 
                    '{$sanpham[0]['diaChiDA']}', 
                    {$sanpham[0]['giaThue']}, 
                    '{$sanpham[0]['maLoaiDA']}'
                );
                ";
    
                $obj->themdulieu($sql);
                echo "<script>alert('Thêm dự án vào danh sách yêu thích thành công!');</script>";
            }
        } else {
            // Nếu danh sách yêu thích trống, thêm mới trực tiếp
            $sql = "
            INSERT INTO danhsachduanyeuthich (maKH, maDuAn, tenDA, diaChiDA, giaThue, maLoaiDA) 
            VALUES (
                '{$_SESSION['maKH']}', 
                '{$sanpham[0]['maDA']}', 
                '{$sanpham[0]['tenDA']}', 
                '{$sanpham[0]['diaChiDA']}', 
                {$sanpham[0]['giaThue']}, 
                '{$sanpham[0]['maLoaiDA']}'
            );
            ";
    
            $obj->themdulieu($sql);
            echo "<script>alert('Thêm dự án vào danh sách yêu thích thành công!');</script>";
        }
    }
    



    if (isset($_POST['henlich'])) {

    }
?>