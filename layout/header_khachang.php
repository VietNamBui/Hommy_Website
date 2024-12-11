<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/muagoithanhvien.css">
    <title>Hommy - Bạn của mọi Nhà</title>
    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #1b2e00;
            padding: 10px 20px;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #c1e98a;
            /* Màu nhấn từ logo */
            border: 1px solid transparent;
            border-radius: 10px;
            margin: 0 10px;
            padding: 8px 15px;
            background-color: #ffffff10;
            /* Màu nền trong suốt */
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffffff;
            /* Màu sáng hơn khi hover */
            background-color: #c1e98a;
            /* Màu nền khi hover */
            border-color: #c1e98a;
        }

        /* CSS cho các mục bên trong dropdown */
        .dropdown-menu {
            background-color: #1b2e00;
            /* Màu nền dropdown */
        }

        .dropdown-menu .dropdown-item {
            color: #c1e98a;
            /* Màu chữ trong dropdown */
            transition: all 0.3s ease;
        }

        .dropdown-menu .dropdown-item:hover {
            color: #ffffff;
            /* Màu sáng hơn khi hover */
            background-color: #c1e98a;
            /* Màu nền khi hover */
        }

        .video-background {
            position: relative;
            width: 100%;
            height: 130vh;
            /* Chiều cao bằng chiều cao của viewport */
            overflow: hidden;
        }

        .video-background video {
            filter: blur(30px);
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 200%;
            transform: translate(-50%, -50%);
            z-index: -1;
            /* Đặt video dưới các nội dung khác */
        }


        .form-inline {
            flex-grow: 1;
            display: flex;
            align-items: center;
        }

        .form-inline input {
            width: 100%;
        }

        .form-inline button {
            margin-left: 10px;
        }

        .login-box {
            background-color: #1b2e00b7;
            border: 5px solid #e3e3e3;
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            margin: 80px auto;
            box-shadow: 0px 0px 50px 1px rgb(0, 0, 0);
        }

        .login-box h2 {
            font-size: 24px;
            color: #c1e98a;
            margin-bottom: 20px;
        }

        .login-box input[type="email"],
        .login-box input[type="password"],
        .login-box input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-box input[type="checkbox"] {
            margin-right: 5px;
        }

        .login-box .btn-submit {
            background-color: #ffffff;
            border-color: #cdd0d0;
            padding: 10px 20px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .login-box .btn-submit:hover {
            background-color: #83bff7;
        }

        .no-underline a {
            text-decoration: none;
            color: inherit;
        }

        .no-underline a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="logo">
                <a href="index.php?page=trangchu"><img class="rounded-1" src="assets/video/HommyHommy.jpg" alt="Logo" style="width: 70px;height: 70px;"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=muagoithanhvien">Mua gói</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?page=chitiettimkiem&danhmuc=3">Chung cư</a></li>
                            <li><a class="dropdown-item" href="index.php?page=chitiettimkiem&danhmuc=1">Nhà ở</a></li>
                            <li><a class="dropdown-item" href="index.php?page=chitiettimkiem&danhmuc=2">Phòng trọ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quanlydanhsachyeuthich">Danh sách yêu thích</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="POST" action="index.php?page=chitiettimkiem">
                    <input class="form-control me-2" type="search" placeholder="Nhập từ khóa tìm kiếm" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search">Search</i></button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            $obj = new database();
                            $maTK = $_SESSION["id_taikhoan"];
                            $sql_maGoi = "Select maGoi from taikhoan where maTK = '$maTK'";
                            $result = $obj->xuatdulieu($sql_maGoi);
                            $maGoi = $result[0]['maGoi'];
                            if ($maGoi == 1 || $maGoi == 2 || $maGoi == 3) {
                                echo
                                '
                                <div class="avatar-container position-relative d-inline-block">
                                    <img src="https://storage.googleapis.com/a1aa/image/hb5Nzm6NNdYaPJTIStmWgEycMxfReJur7GbB6Bf5Bd1ypQZnA.jpg" 
                                        alt="User avatar" 
                                        width="50" 
                                        height="50" 
                                        class="rounded-circle border border-warning vip-avatar">
                                    <span class="vip-badge position-absolute top-100 start-50 translate-middle badge bg-warning text-dark px-2 py-1">
                                        VIP
                                    </span>
                                </div>
                                <style>
                                    .vip-avatar {
                                        box-shadow: 0 0 10px rgba(255, 223, 0, 0.7); /* Hiệu ứng ánh sáng vàng */
                                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                                    }

                                    .vip-avatar:hover {
                                        transform: scale(1.1); /* Phóng to khi hover */
                                        box-shadow: 0 0 20px rgba(255, 223, 0, 1); /* Ánh sáng mạnh hơn */
                                    }

                                    .vip-badge {
                                        font-size: 0.8rem;
                                        border-radius: 0.5rem;
                                        animation: pulse 1.5s infinite;
                                    }

                                    /* Hiệu ứng nhấp nháy */
                                    @keyframes pulse {
                                        0%, 100% {
                                            box-shadow: 0 0 10px rgba(255, 223, 0, 0.5);
                                        }
                                        50% {
                                            box-shadow: 0 0 20px rgba(255, 223, 0, 1);
                                        }
                                    }
                                </style>
                                    ';
                            } else {
                                echo '<img src="https://storage.googleapis.com/a1aa/image/hb5Nzm6NNdYaPJTIStmWgEycMxfReJur7GbB6Bf5Bd1ypQZnA.jpg" alt="User avatar" width="30" height="30" class="rounded-circle">';
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="index.php?page=profile">Hồ sơ cá nhân</a></li>
                            <li><a class="dropdown-item" href="index.php?page=settings">Cài đặt</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="index.php?page=logout">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>