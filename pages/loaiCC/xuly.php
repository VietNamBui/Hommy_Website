<?php
if (isset($_POST["btdangtin"])) {
    // Check if 'loaiduan' is set in the POST array
    if (isset($_POST["loaiduan"])) {
        $loaiduan = $_POST["loaiduan"];
        
        if ($loaiduan == "2") {
            // Xử lý khi "Phòng trọ" được chọn
            if (isset($_POST["btThem"])) {
                // Lấy dữ liệu từ form để thêm vào bảng `duan`
                $tenDA = $_POST["tieude"];
                $diaChiDA = $_POST["soNha"] . ', ' . $_POST["tenDuong"] . ', ' . $_POST["phuongXa"] . ', ' . $_POST["quanHuyen"] . ', ' . $_POST["tinhTP"];
                $giaThue = $_POST["giaThue"];
                $hoaHong = $_POST["hoaHong"];
                $ngayTao = getdate();
                $maChuDuAn = $_SESSION["maChuDuAn"];
                $tienCoc = $_POST["tienCoc"];

                // SQL để thêm thông tin vào bảng `duan`
                $sqlDuan = "INSERT INTO duan (tenDA, diaChiDA, giaThue, hoaHong, ngayTao, maChuDuAn, tienCoc, maLoaiDuAn) 
                            VALUES ('$tenDA', '$diaChiDA', '$giaThue', '$hoaHong', '$ngayTao', '$maChuDuAn', '$tienCoc', $loaiduan)";

                // Giả sử bạn có phương thức $obj->themDuan để thực thi SQL
                if ($obj->themduan($sqlDuan)) {
                    // Lấy ID của dự án vừa thêm
                    $maDA = $obj->getLastInsertedID(); // Hàm lấy ID của dòng vừa thêm vào

                    echo "Thêm dự án thành công! Mã dự án: $maDA";

                    // Sau khi thêm dự án thành công, ta tiếp tục thêm phòng trọ
                    // Lấy dữ liệu từ form để thêm vào bảng `phongtro`
                    $tinhTP = $_POST["tinhTP"];
                    $quanHuyen = $_POST["quanHuyen"];
                    $phuongXa = $_POST["phuongXa"];
                    $sonha = $_POST["soNha"];
                    $tenduong = $_POST["tenDuong"];
                    $dientich = $_POST["dienTich"];
                    $noiThat = $_POST["noiThat"];

                    // Upload ảnh phòng trọ
                    $filename_new = rand(111, 999) . "_" . $_FILES["hinhanh"]["name"];
                    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "assets/video/" . $filename_new)) {
                        // SQL để thêm thông tin vào bảng `phongtro`
                        $sqlPhongTro = "INSERT INTO phongtro (tinhTP, quanHuyen, phuongXa, soNha, tenDuong, dienTich, noiThat, maDA, hinhAnh) 
                                        VALUES ('$tinhTP', '$quanHuyen', '$phuongXa', '$soNha', '$tenDuong', '$dienTich', '$noiThat', '$maDA', '$filename_new')";
                        
                        // Thực thi SQL để thêm phòng trọ
                        if ($obj->themduan($sqlPhongTro)) {
                            echo "Thêm phòng trọ thành công!";
                        } else {
                            echo "Thêm phòng trọ thất bại!";
                        }
                    } else {
                        echo "Upload ảnh phòng trọ thất bại!";
                    }
                } else {
                    echo "Thêm dự án thất bại!";
                }
            }
        }
    } else {
        echo "Vui lòng chọn loại dự án!";
    }
}
?>
