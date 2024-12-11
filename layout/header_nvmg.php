<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Header Hommy</title>
    <style>
        /* header
        /* Reset mặc định */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Header chính */
        .navbar {
            background-color: #1b2e00; /* Tông màu chính từ logo */
            padding: 15px 20px;
        }

        .navbar-brand img {
            height: 50px; /* Chiều cao logo */
        }

        .navbar-nav .nav-link {
            color: #c1e98a; /* Màu nhấn từ logo */
            border: 1px solid transparent;
            border-radius: 10px;
            margin: 0 10px;
            padding: 8px 15px;
            background-color: #ffffff10; /* Màu nền trong suốt */
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffffff; /* Màu sáng hơn khi hover */
            background-color: #c1e98a; /* Màu nền khi hover */
            border-color: #c1e98a;
        }

        .dropdown-menu {
            background-color: #1b2e00; /* Màu nền dropdown */
        }

        .dropdown-menu .dropdown-item {
            color: #c1e98a; /* Màu chữ trong dropdown */
            transition: all 0.3s ease;
        }

        .dropdown-menu .dropdown-item:hover {
            color: #ffffff; /* Màu sáng hơn khi hover */
            background-color: #c1e98a; /* Màu nền khi hover */
        }

        .navbar-toggler-icon {
            background-color: #c1e98a; /* Màu cho biểu tượng menu (mobile) */
        }

        .rounded-circle {
            border: 2px solid #c1e98a; /* Đường viền của avatar */
        }
        /* banner*/
        .banner {
            background-image: url('assets/video/banner.jpg'); /* Thay thế bằng đường dẫn ảnh nền */
            background-size: cover;
            background-position: center;
            height: 300px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .banner .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .banner h1 {
            position: relative;
            color: #fff;
            z-index: 2;
            font-size: 2.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="assets/video/HommyHommy.jpg" alt="Hommy Logo" style="width: 70px;height: 70;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Các nút bên trái -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=trangchu-nvmg">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=">Đăng tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=danhsachduan-cda">Quản lý dự án</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=xemlichhen-cda">Xem lịch hẹn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=baocaokinhdoanh-cda">Xem báo cáo kinh doanh</a>
                </li>
            </ul>
            <!-- Avatar người dùng và dropdown menu -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://storage.googleapis.com/a1aa/image/hb5Nzm6NNdYaPJTIStmWgEycMxfReJur7GbB6Bf5Bd1ypQZnA.jpg" alt="User avatar" width="30" height="30" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="index.php?page=profile">Hồ sơ cá nhân</a></li>
                        <li><a class="dropdown-item" href="index.php?page=settings">Cài đặt</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?page=logout">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
