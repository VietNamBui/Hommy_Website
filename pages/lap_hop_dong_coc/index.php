<?php
session_start();
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "hommy_database"; 

// Kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ bảng khachhang
$sql_khachhang = "SELECT maKH, tenKH, soDT, email FROM khachhang";
$result_khachhang = $conn->query($sql_khachhang);

// Lấy dữ liệu từ bảng chuduan
$sql_chuduan = "SELECT maChuDuAn, tenCDA, soDT, email FROM chuduan";
$result_chuduan = $conn->query($sql_chuduan);

// Lấy dữ liệu từ bảng duan
$sql_duan = "SELECT maDA, tenDA, diaChiDA, tienCoc FROM duan";
$result_duan = $conn->query($sql_duan);

// Biến để lưu thông báo
$thongBao = "";

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lưu thông tin hợp đồng vào session
    $_SESSION['hopDongTam'] = [
        'khachhang' => $_POST['khachhang'], // lấy dữ liệu kh
        'chuduan' => $_POST['chuduan'], // lấy dl chủ dự án
        'duan' => $_POST['duan'], // lấy dl dự án
        'ngaydatcoc' => $_POST['ngaydatcoc'], // lấy ngày đặt cọc
        'sotiencoc' => $_POST['tienCoc'], // số tiền cọc
    ];

    // Hiển thị thông báo
    $thongBao = "Tạo hợp đồng thành công!";
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lập Hợp Đồng Cọc</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px 10px;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 600px;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #343a40;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #495057;
        }
        select, input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }
        button:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 15px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
        .back-button {
            margin-top: 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="form-container">
            <h1>Lập Hợp Đồng Cọc</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="khachhang">Khách hàng:</label>
                    <select name="khachhang" id="khachhang" required>
                        <option value="" disabled selected>Chọn khách hàng</option>
                        <?php while ($row = $result_khachhang->fetch_assoc()) { ?>
                            <option value="<?= $row['maKH'] ?>">
                                <?= $row['tenKH'] ?> - <?= $row['email'] ?> - <?= $row['soDT'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="chuduan">Chủ dự án:</label>
                    <select name="chuduan" id="chuduan" required>
                        <option value="" disabled selected>Chọn chủ dự án</option>
                        <?php while ($row = $result_chuduan->fetch_assoc()) { ?>
                            <option value="<?= $row['maChuDuAn'] ?>">
                                <?= $row['tenCDA'] ?> - <?= $row['email'] ?> - <?= $row['soDT'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="duan">Dự án:</label>
                    <select name="duan" id="duan" required>
                        <option value="" disabled selected>Chọn dự án</option>
                        <?php while ($row = $result_duan->fetch_assoc()) { ?>
                            <option value="<?= $row['maDA'] ?>">
                                <?= $row['tenDA'] ?> - <?= $row['diaChiDA'] ?> - <?= number_format($row['tienCoc'], 0, ',', '.') ?> VND
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ngaydatcoc">Ngày đặt cọc:</label>
                    <input type="date" name="ngaydatcoc" id="ngaydatcoc" required>
                </div>
                <div class="form-group">
                    <label for="sotiencoc">Số tiền cọc (VND):</label>
                    <input type="number" name="sotiencoc" id="sotiencoc" min="0" required>
                </div>
                <button type="submit">Tạo Hợp Đồng</button>
                <?php if ($thongBao): ?>
                    <div class="message"><?= $thongBao ?></div>
                <?php endif; ?>
            </form>
        </div>
        <?php if ($thongBao): ?>
            <a href="index.php?page=trangchu" class="back-button">Quay lại</a>
        <?php endif; ?>
    </div>
</body>
</html>
