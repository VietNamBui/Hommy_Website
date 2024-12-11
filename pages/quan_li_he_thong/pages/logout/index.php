<?php
session_destroy();
// Xóa cookie 'maTK'
setcookie('maTK', '', time() - 3600, '/'); // Đặt thời gian hết hạn về 1 giờ trước

// Kiểm tra và thông báo
if (!isset($_COOKIE['maTK'])) {
    echo "Cookie đã được xóa thành công.";
} else {
    echo "Không thể xóa cookie.";
}
header("Location: index.php");
exit();
?>