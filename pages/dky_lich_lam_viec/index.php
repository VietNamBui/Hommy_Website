<?php
// Kết nối cơ sở dữ liệu
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hommy_database';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Tính toán tuần hiện tại và tuần sau
$currentWeek = date("W"); // Tuần hiện tại
$nextWeek = $currentWeek + 1; // Tuần sau
$currentYear = date("Y"); // Năm hiện tại

// Xử lý ranh giới năm
if ($nextWeek > 52) {
    $nextWeek = 1;
    $currentYear += 1;
}

// Khởi tạo biến mặc định
$error = "";
$success = "";
$showSchedule = false; // Biến kiểm tra có hiển thị lịch làm việc hay không
$canRegister = false;  // Biến kiểm tra tuần có thể đăng ký

// Kiểm tra tuần được chọn từ yêu cầu GET (nếu không chọn, mặc định là tuần sau)
$selectedWeek = isset($_GET['week']) ? (int)$_GET['week'] : $nextWeek;

// Kiểm tra tuần hợp lệ
if ($selectedWeek === $nextWeek) {
    $canRegister = true; // Cho phép đăng ký tuần sau
} else {
    $error = "Chỉ được phép đăng ký lịch làm việc cho tuần sau.";
    $canRegister = false;
}

// Xử lý khi người dùng nhấn "Đăng ký"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $canRegister) {
    $daysMap = [
        'Monday' => 'Thứ hai',
        'Tuesday' => 'Thứ ba',
        'Wenesday' => 'Thứ tư',
        'Thurday' => 'Thứ năm',
        'Friday' => 'Thứ sáu',
        'Saturday' => 'Thứ bảy'
    ];

    $selectedSlots = [];
    $invalidDays = []; // Lưu các ngày chưa chọn đủ khung giờ

    foreach ($daysMap as $name => $day) {
        if (isset($_POST[$name]) && !empty($_POST[$name])) {
            $selectedSlots[$day] = htmlspecialchars($_POST[$name]); // Lưu khung giờ đã chọn
        } else {
            $invalidDays[] = $day; // Ngày không chọn giờ
        }
    }

    // Nếu có bất kỳ ngày nào không chọn giờ
    if (!empty($invalidDays)) {
        $error = "Bạn chưa chọn khung giờ cho các ngày: " . implode(", ", $invalidDays) . ". Vui lòng chọn lại!";
    } else {
        // Xóa dữ liệu cũ của tuần sau
        try {
            $stmt = $pdo->prepare("
                DELETE FROM LichLamViec
                WHERE WEEK(ngayDangKy, 1) = :week AND YEAR(ngayDangKy) = :year
            ");
            $stmt->execute([
                ':week' => $nextWeek,
                ':year' => $currentYear
            ]);

            // Lưu lịch làm việc mới vào cơ sở dữ liệu
            $stmt = $pdo->prepare("
                INSERT INTO LichLamViec (maNhanVienMoiGioi, ngayDangKy, gioBatDau, gioKetThuc)
                VALUES (:maNhanVienMoiGioi, :ngayDangKy, :gioBatDau, :gioKetThuc)
            ");

            foreach ($selectedSlots as $day => $slot) {
                $date = date('Y-m-d', strtotime("next week + " . (array_search($day, array_values($daysMap))) . " days"));
                $timeParts = explode(' - ', $slot);
                $stmt->execute([
                    ':maNhanVienMoiGioi' => null, // Thay đổi nếu có mã nhân viên
                    ':ngayDangKy' => $date,
                    ':gioBatDau' => $timeParts[0] . ":00",
                    ':gioKetThuc' => $timeParts[1] . ":00"
                ]);
            }
            $success = "Đăng ký lịch làm việc tuần $selectedWeek thành công!";
            $showSchedule = true; // Bật hiển thị lịch làm việc sau khi đăng ký thành công
        } catch (PDOException $e) {
            $error = "Lỗi khi lưu dữ liệu: " . $e->getMessage();
        }
    }
}

// Lấy lịch làm việc đã đăng ký để hiển thị
$registeredSchedules = [];
if ($showSchedule) {
    try {
        $stmt = $pdo->query("
            SELECT 
                ngayDangKy, 
                DATE_FORMAT(gioBatDau, '%H:%i') AS gioBatDau, 
                DATE_FORMAT(gioKetThuc, '%H:%i') AS gioKetThuc
            FROM LichLamViec
            WHERE WEEK(ngayDangKy, 1) = $selectedWeek
            ORDER BY ngayDangKy, gioBatDau
        ");
        $registeredSchedules = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $error = "Lỗi khi truy vấn dữ liệu: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký lịch làm việc</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .week-navigation {
            margin-bottom: 20px;
        }
        .day {
            margin-bottom: 20px;
        }
        .week-button {
            margin: 5px;
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .week-button:disabled {
            background-color: #ccc;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Đăng ký lịch làm việc tuần </h1>

        <!-- Điều hướng chọn tuần -->
        <div class="week-navigation">
            <form action="index.php" method="GET">
                <button type="submit" name="week" value="<?= $nextWeek ?>" class="week-button" <?= $selectedWeek === $nextWeek ? 'disabled' : '' ?>>
                    Tuần sau (Tuần <?= $nextWeek ?>)
                </button>
            </form>
        </div>

        <!-- Hiển thị lỗi -->
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>

        <!-- Phần form đăng ký -->
        <?php if ($canRegister): ?>
            <form method="POST">
                <?php
                $daysMap = [
                    'Monday' => 'Thứ hai',
                    'Tuesday' => 'Thứ ba',
                    'Wenesday' => 'Thứ tư',
                    'Thurday' => 'Thứ năm',
                    'Friday' => 'Thứ sáu',
                    'Saturday' => 'Thứ bảy'
                ];
                foreach ($daysMap as $name => $day):
                ?>
                    <div class="day">
                        <label for="<?= $name ?>"><?= $day ?>:</label>
                        <select name="<?= $name ?>" id="<?= $name ?>">
                            <option value="">-- Chọn khung giờ --</option>
                            <option value="8:00 - 12:00">Sáng: 8:00 - 12:00</option>
                            <option value="13:00 - 17:00">Chiều: 13:00 - 17:00</option>
                            <option value="8:00 - 17:00">Cả ngày: 8:00 - 17:00</option>
                        </select>
                    </div>
                <?php endforeach; ?>
                <button type="submit">Đăng ký</button>
            </form>
        <?php endif; ?>

        <!-- Hiển thị lịch làm việc -->
        <?php if ($showSchedule && !empty($registeredSchedules)): ?>
    <?php
    $daysInVietnamese = [
        'Monday' => 'Thứ hai',
        'Tuesday' => 'Thứ ba',
        'Wednesday' => 'Thứ tư',
        'Thursday' => 'Thứ năm',
        'Friday' => 'Thứ sáu',
        'Saturday' => 'Thứ bảy',
        'Sunday' => 'Chủ nhật'
    ];
    ?>
    <h2>Lịch làm việc của bạn:</h2>
    <table>
        <thead>
            <tr>
                <th>Ngày</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registeredSchedules as $schedule): ?>
                <?php 
                $dayOfWeek = $daysInVietnamese[date('l', strtotime($schedule['ngayDangKy']))]; 
                ?>
                <tr>
                    <td><?= date('d/m/Y', strtotime($schedule['ngayDangKy'])) . " ($dayOfWeek)" ?></td>
                    <td><?= $schedule['gioBatDau'] . " - " . $schedule['gioKetThuc'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?page=trangchu-nvmg" class="back-button">Quay lại</a>
<?php endif; ?>
    </div>
</body>
</html>
