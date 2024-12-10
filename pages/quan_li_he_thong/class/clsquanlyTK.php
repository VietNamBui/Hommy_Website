<?php
class QuanLyTaiKhoan extends Database
{
    // Thêm tài khoản vào bảng tương ứng với từng loại tài khoản
    public function themTaiKhoan($tenTK, $matKhau, $maLoai, $trangThai, $ten, $soDT, $email, $diaChi, $khuVuc)
    {

        $matKhau = md5($matKhau); // Mã hóa mật khẩu
        $sql = "INSERT INTO taikhoan (tenTK, matKhau, maLoai, ngayTao, trangThai) 
                VALUES (?, ?, ?, CURDATE(), ?)";
        // Sử dụng prepared statement để bảo mật
        $params = array($tenTK, $matKhau, $maLoai, $trangThai);
        // Thực thi câu lệnh
        $result= $this->thucthi($sql, $params);
        // Chọn bảng tương ứng với loại tài khoản
        if ($result){
        switch ($maLoai) {
            case '5':
                $table = 'quantrihethong';
                $name = 'Admin';
                $extra = ', khuVuc';
                $values = ', ?';
                break;
            case '1':
                $table = 'khachhang';
                $name = 'KH';
                break;
            case 'chuduan':
                $table = '2';
                $name = 'ChuDuAn';
                break;
            case '3':
                $table = 'nhanvienmoigioi';
                $name = 'NVMG';
                break;
            case '4':
                $table = 'nhanviendieuhanh';
                $name = 'NVDH';
                break;
            default:
                // Nếu loại tài khoản không hợp lệ, trả về false
                return false;
        }

        // Xây dựng câu truy vấn SQL để thêm tài khoản vào bảng
        $sql = "INSERT INTO $table (ten$name, soDT, email, diaChi$extra) 
                VALUES (?, ?, ?, ?$values)";

        // Sử dụng prepared statement để bảo mật
        $params = array($ten, $soDT, $email, $diaChi);
        if ($maLoai == '5') {
            $params[] = $khuVuc; // Thêm khuVuc nếu loại tài khoản là Admin
        }
        return $this->thucthi($sql, $params);
        }
        return false;

    }

    // Sửa tài khoản
    public function suaTaiKhoan($maTK, $tenTK, $matKhau, $maLoai, $trangThai, $ten, $soDT, $email, $diaChi, $khuVuc)
    {
        $matKhau = md5($matKhau); // Mã hóa mật khẩu
        // Câu lệnh SQL cập nhật tài khoản
        $sql = "UPDATE taikhoan 
                SET tenTK = ?, matKhau = ?, trangThai = ? 
                WHERE maTK = ?";

        // Thực hiện câu lệnh
        $params = array($tenTK, $matKhau, $trangThai, $maTK);
        return $this->thucthi($sql, $params);
        // Chọn bảng tương ứng với loại tài khoản
        switch ($maLoai) {
            case '5':
                $table = 'quantrihethong';
                $name = 'Admin';
                $extra = ', khuVuc = ?';
                break;
            case '1':
                $table = 'khachhang';
                $name = 'KH';
                break;
            case 'chuduan':
                $table = '2';
                $name = 'ChuDuAn';
                break;
            case '3':
                $table = 'nhanvienmoigioi';
                $name = 'NVMG';
                break;
            case '4':
                $table = 'nhanviendieuhanh';
                $name = 'NVDH';
                break;
            default:
                return false;
        }

        // Câu lệnh SQL cập nhật tài khoản
        $sql = "UPDATE $table 
                SET ten$name = ?, soDT = ?, email = ?, diaChi = ?$extra 
                WHERE maTK = $maTK";

        // Thực hiện câu lệnh
        $params = array($ten, $soDT, $email, $diaChi, $khuVuc);
        return $this->thucthi($sql, $params);
    }

    // Xóa tài khoản
    public function xoaTaiKhoan($maTK, $maLoai)
    {
        // Câu lệnh SQL xóa tài khoản
        $sql = "DELETE FROM taikhoan WHERE maTK = $maTK";

        // Thực hiện câu lệnh
        $this->xoadulieu($sql);
        // Chọn bảng tương ứng với loại tài khoản
        switch ($maLoai) {
            case '5':
                $table = 'quantrihethong';
                break;
            case '1':
                $table = 'khachhang';
                break;
            case '2':
                $table = 'chuduan';
                break;
            case '3':
                $table = 'nhanvienmoigioi';
                break;
            case '4':
                $table = 'nhanviendieuhanh';
                break;
            default:
                return false;
        }

        // Câu lệnh SQL xóa tài khoản
        $sql = "DELETE FROM $table WHERE maTK = $maTK";

        // Thực hiện câu lệnh
        return $this->xoadulieu($sql);
    }

    // Lấy danh sách tài khoản
    public function danhSachTaiKhoan($maLoai = '')
    {
        // Nếu có loại tài khoản thì lọc theo loại, nếu không thì lấy tất cả
        if ($maLoai) {
            $sql = "SELECT * FROM taikhoan WHERE maLoai = $maLoai";
        } else {
            $sql = "SELECT * FROM taikhoan";
        }

        // Trả về danh sách tài khoản
        return $this->xuatdulieu($sql);
    }

    // Kiểm tra thông tin đăng nhập
    public function kiemTraDangNhap($tenTK, $matKhau)
    {
        $matKhau = md5($matKhau); // Mã hóa mật khẩu

        // Câu lệnh SQL kiểm tra đăng nhập
        $sql = "SELECT * FROM taikhoan WHERE tenTK = ? AND matKhau = ?";

        // Trả về kết quả
        $params = array($tenTK, $matKhau);
        $result = $this->xuatdulieu($sql, $params);

        if ($result && $result[0]['trangThai'] == 1) { // Kiểm tra tài khoản chưa bị khóa
            return $result[0]; // Trả về thông tin tài khoản
        } elseif ($result && $result[0]['trangThai'] == 0) {
            return "locked"; // Tài khoản đã bị khóa
        } else {
            return 0; // Sai tên đăng nhập hoặc mật khẩu
        }
    }


    // Khóa tài khoản
    public function khoaTaiKhoan($maTK)
    {
        // Câu lệnh SQL khóa tài khoản trong bảng taikhoan
        $sql = "UPDATE taikhoan SET trangThai = 0 WHERE maTK = $maTK";

        // Thực hiện câu lệnh
        return $this->suadulieu($sql);
    }

    // Mở khóa tài khoản
    public function moKhoaTaiKhoan($maTK)
    {
        // Câu lệnh SQL mở khóa tài khoản trong bảng taikhoan
        $sql = "UPDATE taikhoan SET trangThai = 1 WHERE maTK = $maTK";

        return $this->suadulieu($sql);
    }


    // Lấy thông tin chi tiết tài khoản
    public function thongTinTaiKhoan($maTK, $maLoai)
    {
        // Chọn bảng tương ứng với loại tài khoản
        switch ($maLoai) {
            case '5':
                $table = 'quantrihethong';
                break;
            case '1':
                $table = 'khachhang';
                break;
            case '2':
                $table = 'chuduan';
                break;
            case '3':
                $table = 'nhanvienmoigioi';
                break;
            case '4':
                $table = 'nhanviendieuhanh';
                break;
            default:
                return false;
        }

        // Câu lệnh SQL lấy thông tin tài khoản
        $sql = "SELECT * FROM $table WHERE maTK = ?";

        // Trả về thông tin tài khoản
        $params = array($maTK);
        return $this->xuatdulieu($sql, $params);
    }
}
?>
