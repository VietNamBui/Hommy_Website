<?php
class QuanLyTaiKhoan extends database
{
    // Thêm tài khoản vào bảng tương ứng với từng loại tài khoản
    public function themTaiKhoan($tenTK, $matKhau, $maLoai, $trangThai, $ten, $soDT, $email, $diaChi, $khuVuc = null)
    {
        $matKhau = md5($matKhau); // Mã hóa mật khẩu

        // Câu lệnh SQL thêm vào bảng `taikhoan`
        $sqlTaiKhoan = "INSERT INTO taikhoan (tenTK, matKhau, maLoai, ngayTao, trangThai) 
                        VALUES ('$tenTK', '$matKhau', '$maLoai', CURDATE(), '$trangThai')";

        // Thêm vào bảng `taikhoan`
        $maTK=$this->themdulieuID($sqlTaiKhoan);

        // Lấy `maTK` vừa được thêm
        // Chọn bảng tương ứng với loại tài khoản
        switch ($maLoai) {
            case '5': // Quản trị hệ thống
                $table = 'quantrihethong';
                $extraFields = ", khuVuc";
                $extraValues = ", '$khuVuc'";
                $name = 'Admin';
                break;
            case '1': // Khách hàng
                $table = 'khachhang';
                $name = 'KH';
                break;
            case '2': // Chủ dự án
                $table = 'chuduan';
                $name = 'CDA';
                break;
            case '3': // Nhân viên môi giới
                $table = 'nhanvienmoigioi';
                $name = 'NVMG';
                break;
            case '4': // Nhân viên điều hành
                $table = 'nhanviendieuhanh';
                $name = 'NVDH';
                break;
            default:
                return false; // Loại tài khoản không hợp lệ
        }

        // Câu lệnh SQL thêm vào bảng tương ứng
        $sqlLoaiTaiKhoan = "INSERT INTO $table (maTK, ten$name, soDT, email, diaChi $extraFields) 
                            VALUES ('$maTK', '$ten', '$soDT', '$email', '$diaChi' $extraValues)";

        return $this->themdulieu($sqlLoaiTaiKhoan);
    }

    // Sửa tài khoản
    public function suaTaiKhoan($maTK, $tenTK, $matKhau, $maLoai, $trangThai, $ten, $soDT, $email, $diaChi, $khuVuc = null)
    {
        $matKhauQuery = $matKhau ? "matKhau = '" . md5($matKhau) . "'," : ""; // Chỉ cập nhật mật khẩu nếu có

        // Câu lệnh SQL cập nhật bảng `taikhoan`
        $sqlTaiKhoan = "UPDATE taikhoan 
                        SET tenTK = '$tenTK', $matKhauQuery trangThai = '$trangThai', maLoai = $maLoai 
                        WHERE maTK = '$maTK'";

        if (!$this->suadulieu($sqlTaiKhoan)) {
            return false; // Nếu cập nhật thất bại
        }

        // Chọn bảng tương ứng với loại tài khoản
        switch ($maLoai) {
            case '5': // Quản trị hệ thống
                $table = 'quantrihethong';
                $name = 'Admin';
                $extraQuery = $khuVuc ? ", khuVuc = '$khuVuc'" : "";
                break;
            case '1': // Khách hàng
                $table = 'khachhang';
                $name = 'KH';
                break;
            case '2': // Chủ dự án
                $table = 'chuduan';
                $name = 'CDA';
                break;
            case '3': // Nhân viên môi giới
                $table = 'nhanvienmoigioi';
                $name = 'NVMG';
                break;
            case '4': // Nhân viên điều hành
                $table = 'nhanviendieuhanh';
                $name = 'NVDH';
                break;
            default:
                return false;
        }

        // Câu lệnh SQL cập nhật bảng tương ứng
        $sqlLoaiTaiKhoan = "UPDATE $table 
                            SET ten$name = '$ten', soDT = '$soDT', email = '$email', diaChi = '$diaChi' $extraQuery 
                            WHERE maTK = '$maTK'";

        return $this->suadulieu($sqlLoaiTaiKhoan);
    }

    // Xóa tài khoản
    public function xoaTaiKhoan($maTK, $maLoai)
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

        // Xóa dữ liệu trong bảng chi tiết
        $sqlLoaiTaiKhoan = "DELETE FROM $table WHERE maTK = '$maTK'";
        if (!$this->xoadulieu($sqlLoaiTaiKhoan)) {
            return false;
        }

        // Xóa tài khoản trong bảng `taikhoan`
        $sqlTaiKhoan = "DELETE FROM taikhoan WHERE maTK = '$maTK'";
        return $this->xoadulieu($sqlTaiKhoan);
    }

    // Lấy danh sách tài khoản
    public function danhSachTaiKhoan($maLoai = '')
    {
        $sql = $maLoai ? "SELECT * FROM taikhoan WHERE maLoai = '$maLoai'" : "SELECT * FROM taikhoan";
        return $this->xuatdulieu($sql);
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
        $sql = "SELECT taikhoan.*, $table.* FROM $table 
        LEFT JOIN taikhoan ON $table.maTK = taikhoan.maTK 
        WHERE taikhoan.maTK = $maTK";
        return $this->xuatdulieu($sql);
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


}
?>
