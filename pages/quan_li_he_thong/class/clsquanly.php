<?php
class Quanly extends Database
{
    // Lấy danh sách khách hàng hoặc thông tin chi tiết của khách hàng
    public function danhsachkhachhang($id = '')
    {
        if ($id)
            $sql = "SELECT * FROM khachhang WHERE maKH = '$id'";
        else
            $sql = 'SELECT * FROM khachhang';
        return $this->xuatdulieu($sql);
    }

    // Xóa khách hàng theo ID
    public function deletekhachhang($id = '')
    {
        $sql = "DELETE FROM khachhang WHERE maKH = '$id'";
        return $this->thucthi($sql);
    }

    // Thêm tài khoản người dùng
    public function themtaikhoan($tenTK, $matKhau, $maGoi, $maLoai)
    {
        $matKhau = md5($matKhau); // Mã hóa mật khẩu
        $sql = "
            INSERT INTO taikhoan (tenTK, matKhau, maGoi, maLoai, ngayTao)
            VALUES ('$tenTK', '$matKhau', '$maGoi', '$maLoai', CURDATE());
        ";
        return $this->thucthi($sql);
    }

    // Kiểm tra đăng nhập người dùng
    public function kiemtradangnhap($email, $matKhau)
    {
        $matKhau = md5($matKhau); // Mã hóa mật khẩu
        $sql = "SELECT maTK FROM taikhoan WHERE email = '$email' AND matKhau = '$matKhau'";
        $result = $this->xuatdulieu($sql);
        if ($result != 0) {
            return $result[0]["maTK"];
        } else {
            return 0;
        }
    }

    // Lấy tên tài khoản từ maTK
    public function tentaikhoan($id)
    {
        $sql = "SELECT tenTK FROM taikhoan WHERE maTK = '$id'";
        $result = $this->xuatdulieu($sql);
        if ($result != 0) {
            return $result[0]["tenTK"];
        } else {
            return 0;
        }
    }

    // Lấy danh sách chủ dự án
    public function danhsachchuduan($id = '')
    {
        if ($id)
            $sql = "SELECT * FROM chuduan WHERE maChuDuAn = '$id'";
        else
            $sql = 'SELECT * FROM chuduan';
        return $this->xuatdulieu($sql);
    }

    // Xóa chủ dự án theo ID
    public function deletechuduan($id = '')
    {
        $sql = "DELETE FROM chuduan WHERE maChuDuAn = '$id'";
        return $this->thucthi($sql);
    }

    // Lấy danh sách các dự án
    public function danhsachduan($id = '', $filterChuaDuyet = '')
    {
        if ($id) {
            // Truy vấn lấy thông tin dự án với tên chủ dự án
            $sql = "SELECT duan.*, chuduan.tenCDA FROM duan 
                    LEFT JOIN chuduan ON duan.maChuDuAn = chuduan.maChuDuAn 
                    WHERE duan.maDA = '$id'";
        } else {
            // Truy vấn lấy thông tin tất cả các dự án với tên chủ dự án
            $sql = "SELECT duan.*, chuduan.tenCDA FROM duan 
                    LEFT JOIN chuduan ON duan.maChuDuAn = chuduan.maChuDuAn";
    
            // Nếu lọc "Chưa duyệt" thì thêm điều kiện lọc vào câu truy vấn
            if ($filterChuaDuyet == true) {
                $sql .= " WHERE duan.trangThaiDuyet = 2"; // Chỉ lấy các dự án có trang thái Chưa duyệt
            }
        }
    
        return $this->xuatdulieu($sql);
    }
    
    

    // Thêm một dự án mới
    public function themduan($tenDA, $diaChiDA, $giaThue, $hoaHong, $ngayTao, $maChuDuAn)
    {
        $sql = "
            INSERT INTO duan (tenDA, diaChiDA, giaThue, hoaHong, ngayTao, maChuDuAn)
            VALUES ('$tenDA', '$diaChiDA', '$giaThue', '$hoaHong', '$ngayTao', '$maChuDuAn');
        ";
        return $this->thucthi($sql);
    }
    public function docTrangThaiDuyet($maDA)
    {
        // Truy vấn lấy trạng thái duyệt của dự án
        $sql = "SELECT trangThaiDuyet FROM duan WHERE maDA = '$maDA'";
        $result = $this->xuatdulieu($sql);
    
        if ($result != 0) {
            // Lấy giá trị trangThaiDuyet
            $trangThai = $result[0]['trangThaiDuyet'];
            
            // Trả về trạng thái duyệt dưới dạng chuỗi
            switch ($trangThai) {
                case 1:
                    return 'Đã duyệt';
                case 2:
                    return 'Chưa duyệt';
                case 3:
                    return 'Bị xóa';
                default:
                    return 'Trạng thái không hợp lệ';
            }
        } else {
            return 'Dự án không tồn tại';
        }
    }
    
}
?>
