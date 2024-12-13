<?php
    class database {
        private function connect() {
            $conn = new mysqli("localhost","root","","hommy_database");
            if ($conn -> connect_errno) {
                echo "ket noi KHONG thong cong";
                exit();
            } else {
                return $conn;
            }
        }

        public function xuatdulieu($sql) {
                $arr = array();
                $link = $this -> connect();
                $result = $link -> query($sql);
                if($result -> num_rows) {
                    while($row = $result -> fetch_assoc())
                        $arr[] = $row;
                    return $arr;
                } else {
                    return 0;
                }
        }

        public function xoadulieu($sql)
        {
            $link=$this->connect();
            if($link->query($sql))
                return 1;
            else
                return 0;
        }
        public function themdulieu($sql)
        {
            $link=$this->connect();
            if($link->query($sql))
                return 1;
            else
                return 0;
        }
        public function themdulieuID($sql)
        {
            $link = $this->connect();
            if ($link->query($sql)) {
                // Nếu chèn thành công, lấy ID của bản ghi mới
                return $link->insert_id;
            } else {
                echo "Lỗi SQL: " . $link->error;  // In ra lỗi nếu có
                return 0;
            }
        }

        public function suadulieu($sql)
        {
            $link=$this->connect();
            if($link->query($sql))
                return 1;
            else
                return 0;
        }
        public function dangnhaptaikhoan($taikhoan, $matkhau) {
            // Chuẩn bị câu SQL sử dụng Prepared Statement để tránh SQL Injection
            $sql = "SELECT 
            tk.maTK,
            tk.maLoai,
            tk.tenTK,
            tk.trangThai,
            nvmg.maNVMG,
            nvmg.tenNVMG,
            nvhd.maNVDH,
            nvhd.tenNVDH,
            kh.maKH,
            kh.tenKH,
            cda.maChuDuAn,
            cda.tenCDA,
            ql.maAdmin,
            ql.tenAdmin
        FROM 
            taikhoan tk
        LEFT JOIN 
            nhanvienmoigioi nvmg ON tk.maTK = nvmg.maTK
        LEFT JOIN 
            nhanviendieuhanh nvhd ON tk.maTK = nvhd.maTK
        LEFT JOIN 
            khachhang kh ON tk.maTK = kh.maTK
        LEFT JOIN 
            chuduan cda ON tk.maTK = cda.maTK
        LEFT JOIN 
            quantrihethong ql ON tk.maTK = ql.maTK
        WHERE 
            tk.tenTK = ? 
            AND tk.matKhau = ?";

        
            // Kết nối cơ sở dữ liệu
            $link = $this->connect();
        
            // Sử dụng prepared statement
            $stmt = $link->prepare($sql); //tách tham số khỏi câu lệnh SQL injection
        
            // Kiểm tra lỗi prepare
            if (!$stmt) {
                die("Lỗi chuẩn bị câu truy vấn: " . $link->error);
            }
        
            // Gán tham số
            $stmt->bind_param("ss", $taikhoan, $matkhau); // 'ss' là kiểu dữ liệu của các tham số (string)
        
            // Thực thi câu truy vấn
            $stmt->execute();
        
            // Lấy kết quả
            $result = $stmt->get_result();
        
            // Xử lý kết quả
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return [
                    'maTK' => $row['maTK'],
                    'maLoai' => $row['maLoai'],
                    'trangThai' => $row['trangThai'],
                    'maNVMG' => $row['maNVMG'] ?? null,
                    'maNVDH' => $row['maNVDH'] ?? null,
                    'maKH' => $row['maKH'] ?? null,
                    'maChuDuAn' => $row['maChuDuAn'] ?? null,
                    'maAdmin' => $row['maAdmin'] ?? null
                ];
                
            } else {
                return 0; // Trả về 0 nếu không có kết quả
            }

        }
        
        

    }
        
?>