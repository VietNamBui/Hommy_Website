<?php
class QuanLyTaiKhoan extends database
{
    // Thêm tài khoản
    public function themTaiKhoan($tenTK, $matKhau, $maLoai, $trangThai = 1)
    {
        $matKhau = md5($matKhau); // Mã hóa mật khẩu
        $sql = "INSERT INTO taikhoan (tenTK, matKhau, maLoai, trangThai) 
                VALUES ('$tenTK', '$matKhau', '$maLoai', '$trangThai')";
        return $this->themdulieu($sql);
    }

    // Sửa tài khoản
    public function suaTaiKhoan($maTK, $tenTK, $matKhau, $maLoai, $trangThai)
    {
        $matKhau = md5($matKhau); // Mã hóa mật khẩu
        $sql = "UPDATE taikhoan 
                SET tenTK = '$tenTK', matKhau = '$matKhau', maLoai = '$maLoai', trangThai = '$trangThai' 
                WHERE maTK = '$maTK'";
        return $this->suadulieu($sql);
    }

    // Xóa tài khoản
    public function xoaTaiKhoan($maTK)
    {
        $sql = "DELETE FROM taikhoan WHERE maTK = '$maTK'";
        return $this->xoadulieu($sql);
    }

    // Lấy danh sách tài khoản
    public function danhSachTaiKhoan($maLoai = '')
    {
        if ($maLoai) {
            $sql = "SELECT * FROM taikhoan WHERE maLoai = '$maLoai'";
        } else {
            $sql = "SELECT * FROM taikhoan";
        }
        return $this->xuatdulieu($sql);
    }

    // Kiểm tra thông tin đăng nhập
    public function kiemTraDangNhap($tenTK, $matKhau)
    {
        $matKhau = md5($matKhau); // Mã hóa mật khẩu
        $sql = "SELECT * FROM taikhoan WHERE tenTK = '$tenTK' AND matKhau = '$matKhau'";
        $result = $this->xuatdulieu($sql);

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
        $sql = "UPDATE taikhoan SET trangThai = 0 WHERE maTK = '$maTK'";
        return $this->suadulieu($sql);
    }

    // Mở khóa tài khoản
    public function moKhoaTaiKhoan($maTK)
    {
        $sql = "UPDATE taikhoan SET trangThai = 1 WHERE maTK = '$maTK'";
        return $this->suadulieu($sql);
    }

    // Lấy thông tin chi tiết tài khoản
    public function thongTinTaiKhoan($maTK)
    {
        $sql = "SELECT * FROM taikhoan WHERE maTK = '$maTK'";
        return $this->xuatdulieu($sql);
    }
}
