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
            $sql = "SELECT taikhoan.maTK, taikhoan.maLoai, chuduan.maChuDuAn 
                    FROM taikhoan 
                    JOIN chuduan ON taikhoan.maTK = chuduan.maTK
                    WHERE taikhoan.tenTK = ? AND taikhoan.matKhau = ?";
        
            $link = $this->connect();
            
            // Sử dụng prepared statement
            $stmt = $link->prepare($sql);
            $stmt->bind_param("ss", $taikhoan, $matkhau); // 'ss' là kiểu dữ liệu của các tham số (string)
        
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return [
                    'maTK' => $row['maTK'],
                    'maLoai' => $row['maLoai'],
                    'maChuDuAn' => $row['maChuDuAn']
                ];
            } else {
                return 0; // Trả về 0 nếu không có kết quả
            }

        }
        

    }
        
?>