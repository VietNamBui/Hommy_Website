<?php
if (!class_exists('Database')) {
    class DatabaseQL
    {
        private $conn;

        // Kết nối cơ sở dữ liệu
        private function connect()
        {
            $this->conn = new mysqli("127.0.0.1", "root", "", "hommy_database");
            $this->conn->set_charset("utf8mb4");

            if ($this->conn->connect_errno) {
                die("Kết nối cơ sở dữ liệu thất bại: " . $this->conn->connect_error);
            }

            return $this->conn;
        }

        // Đóng kết nối cơ sở dữ liệu
        private function close()
        {
            if ($this->conn) {
                $this->conn->close();
            }
        }

        // Lấy dữ liệu với câu lệnh SQL
        public function xuatdulieu($sql, $params = array())
        {
            $arr = array();
            $link = $this->connect();

            // Sử dụng prepared statement
            if ($stmt = $link->prepare($sql)) {
                // Gắn các tham số nếu có
                if (!empty($params)) {
                    $types = str_repeat('s', count($params)); // Giả sử tất cả tham số là kiểu chuỗi
                    // Thay thế spread operator bằng call_user_func_array
                    call_user_func_array(array($stmt, 'bind_param'), array_merge(array($types), $params));
                }

                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $arr[] = $row;
                    }
                    $stmt->close();
                    $this->close();
                    return $arr;
                } else {
                    $stmt->close();
                    $this->close();
                    return 0;
                }
            } else {
                $this->close();
                return 0;
            }
        }

        // Thực thi câu lệnh SQL (INSERT, UPDATE, DELETE)
        public function thucthi($sql, $params = array())
        {
            try {
                $link = $this->connect();
                // Chuẩn bị câu truy vấn
                $stmt = $link->prepare($sql);
                if (!$stmt) {
                    throw new Exception("Chuẩn bị câu lệnh thất bại: " . $link->error);
                }
        
                // Gắn các tham số nếu có
                if (!empty($params)) {
                    $types = str_repeat('s', count($params)); // Giả sử tất cả tham số là kiểu chuỗi
                    $stmt->bind_param($types, ...$params);
                }
        
                // Thực thi câu truy vấn
                if (!$stmt->execute()) {
                    throw new Exception("Thực thi thất bại: " . $stmt->error);
                }
        
                $stmt->close();
                $this->close();
                return true; // Thành công
            } catch (Exception $e) {
                // Ghi lỗi vào log nếu cần
                error_log($e->getMessage());
                $this->close();
                return false; // Thất bại
            }
        }
    }        
}
?>
