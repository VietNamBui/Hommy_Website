<?php
class QuanlyDA extends Database
{

    // Lấy danh sách chủ dự án
    public function danhsachchuduan($id = '')
    {
        if ($id)
            $sql = "SELECT * FROM chuduan WHERE maChuDuAn = '$id'";
        else
            $sql = 'SELECT * FROM chuduan';
        return $this->xuatdulieu($sql);
    }

    // Lấy danh sách các dự án
    public function danhsachduan($search = '', $filterChuaDuyet = false, $limit = 10, $offset = 0)
    {
        $sql = "SELECT duan.*, chuduan.tenCDA FROM duan 
                LEFT JOIN chuduan ON duan.maChuDuAn = chuduan.maChuDuAn";
        
        $conditions = [];
    
        // Thêm điều kiện tìm kiếm nếu có
        if (!empty($search)) {
            $conditions[] = "(duan.maDA LIKE '%$search%' OR duan.diaChiDA LIKE '%$search%')";
        }
    
        // Thêm điều kiện lọc trạng thái "Chưa duyệt" nếu cần
        if ($filterChuaDuyet) {
            $conditions[] = "duan.trangThaiDuyet = 2"; // Giả sử '2' là trạng thái "Chưa duyệt"
        }
    
        // Nếu có bất kỳ điều kiện nào, thêm vào câu truy vấn
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
    
        // Thêm phần phân trang vào câu SQL
        $sql .= " LIMIT $limit OFFSET $offset";
    
        return $this->xuatdulieu($sql);
    }

    // Thêm phương thức để tính tổng số dự án (sử dụng cho phân trang)
    public function getTotalDuan($search = '', $filterChuaDuyet = false)
    {
        $sql = "SELECT COUNT(*) AS total FROM duan";
        
        $conditions = [];
    
        // Thêm điều kiện tìm kiếm nếu có
        if (!empty($search)) {
            $conditions[] = "(maDA LIKE '%$search%' OR diaChiDA LIKE '%$search%')";
        }
    
        // Thêm điều kiện lọc trạng thái "Chưa duyệt" nếu cần
        if ($filterChuaDuyet) {
            $conditions[] = "trangThaiDuyet = 2";
        }
    
        // Nếu có bất kỳ điều kiện nào, thêm vào câu truy vấn
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
    
        $result = $this->xuatdulieu($sql);
        return isset($result[0]['total']) ? (int)$result[0]['total'] : 0;
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

    // Lấy thông tin chi tiết dự án
    public function layChiTietDuAn($maDA)
    {
        // Lấy thông tin chung từ bảng duan
        $sql = "SELECT duan.*, chuduan.tenCDA
                FROM duan LEFT JOIN chuduan ON duan.maChuDuAn = chuduan.maChuDuAn
                WHERE duan.maDA = '$maDA'";
        $duAn = $this->xuatdulieu($sql);

        if (!$duAn) {
            return null; // Nếu không tìm thấy dự án, trả về null
        }

        $duAn = $duAn[0]; // Lấy thông tin dự án
        $chiTiet = null;

        // Lấy thông tin chi tiết từ bảng liên quan dựa trên maLoaiDA
        switch ($duAn['maLoaiDA']) {
            case 1: // Nhà ở
                $sql = "SELECT maNO, loaiNha, soPhongNgu, soNhaVS, huongCua, phapLy, maDA 
                        FROM nhao 
                        WHERE maDA = '$maDA'";
                $chiTiet = $this->xuatdulieu($sql);
                break;
            case 2: // Phòng trọ
                $sql = "SELECT maPhongTro, noiThat, maDA 
                        FROM phongtro 
                        WHERE maDA = '$maDA'";
                $chiTiet = $this->xuatdulieu($sql);
                break;
            case 3: // Chung cư
                $sql = "SELECT maCC, maCan, soPhongNgu, soNhaVS, phapLy, maDA, block 
                        FROM chungcu 
                        WHERE maDA = '$maDA'";
                $chiTiet = $this->xuatdulieu($sql);
                break;
        }

        // Thêm thông tin chi tiết vào dự án
        $duAn['chiTiet'] = $chiTiet ? $chiTiet[0] : null;
        return $duAn;
    }
    public function ghiNhanThaoTacDuAn($maDA, $loaiThaoTac, $liDo = null)
    {
        $sql = "INSERT INTO thaotacduan (maThaoTac, loai, ngayThucHien, maDA, liDo)
                VALUES (UUID(), '$loaiThaoTac', CURDATE(), '$maDA', '$liDo')";
        return $this->themdulieu($sql);
    } 
    public function capNhatTrangThai($maDA, $trangThai)
    {
        $sql = "UPDATE duan SET trangThaiDuyet = '$trangThai' WHERE maDA = '$maDA'";
        return $this->suadulieu($sql);
    }
    public function layThaoTacDuAn($maDA)
    {
        $sql = "SELECT * FROM ThaoTacDuAn WHERE maDA = '$maDA' ORDER BY ngayThucHien DESC";
        return $this->xuatdulieu($sql);
    }
    public function themDuAn($tenDA, $diaChi, $maChuDuAn, $maLoaiDA, $hoaHong, $tienCoc, $dienTich)
    {
        $sql = "INSERT INTO duan (tenDA, diaChiDA, maChuDuAn, maLoaiDA, hoaHong, tienCoc, dienTich, ngayTao, trangThaiDuyet)
                VALUES ('$tenDA', '$diaChi', '$maChuDuAn', '$maLoaiDA', '$hoaHong', '$tienCoc', '$dienTich', CURDATE(), 2)";
        return $this->themdulieu($sql);
    }
    public function xoaDuAn($maDA)
    {
        $sql = "SELECT maLoaiDA FROM duan WHERE maDA = $maDA";
        $kq= $this->xuatdulieu($sql);
        $loaiDA = $kq[0]['maLoaiDA'];
        switch ($loaiDA) {
            case 1: // Nhà ở
                $table = "nhao";
                break;
            case 2: // Phòng trọ
                $table = "phongtro";
                break;
            case 3: // Chung cư
                $table = "chungcu";
                break;
        }
        $sql = "DELETE FROM duan WHERE maDA = $maDA";
        $this->xoadulieu($sql);
        $sql = "DELETE FROM $table WHERE maDA = $maDA";
        return $this->xoadulieu($sql);
    }
    public function capNhatDuAn($maDA, $tenDA, $diaChi, $hoaHong, $tienCoc, $dienTich, $trangThai)
    {
        $sql = "UPDATE duan 
                SET tenDA = '$tenDA', diaChiDA = '$diaChi', hoaHong = '$hoaHong', 
                    tienCoc = '$tienCoc', dienTich = '$dienTich', trangThaiDuyet = '$trangThai'
                WHERE maDA = '$maDA'";
        return $this->suadulieu($sql);
    }
    public function kiemTraQuyen($maTK, $maDA)
    {
        $sql = "SELECT * FROM duan 
                WHERE maDA = '$maDA' AND EXISTS (
                    SELECT 1 FROM taikhoan WHERE maTK = '$maTK' AND maLoai = 'admin'
                )";
        $result = $this->xuatdulieu($sql);
        return !empty($result);
    }

}
?>
