<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            color: #ffffff;
            border: 1px solid #cb0047;
            border-radius: 10px;
            margin: 10px;
            background-color: #cb004763;
            box-shadow: 0px 0px 5px 1px #cb0047, 0px 0px 2px 4px #1b2e00;
            transition: transform 250ms, color 650ms;
        }

        .navbar-nav .nav-link:hover {
            transform: translate(0px) scale(1.1);
            color: rgb(255, 0, 89) !important;
            /* Thêm !important để đảm bảo hiệu lực */
        }

        /* CSS cho các mục bên trong dropdown */
        .dropdown-menu .dropdown-item {
            color: #4f9000;
            /* Màu mặc định cho các mục trong dropdown */
            background-color: #ffffff;
            /* Màu nền cho mục trong dropdown */
            transition: tranform 650ms, background-color 650ms, color 250ms;
        }

        .dropdown-menu .dropdown-item:hover {
            transform: translate(5px) scale(1.1);
            color: rgb(238, 255, 205);
            /* Màu chữ khi trỏ vào mục */
            background-color: #1b2e00;
            /* Màu nền khi trỏ vào mục */
        }

        .video-background {
            position: relative;
            width: 100%;
            height: 100vh;
            /* Chiều cao bằng chiều cao của viewport */
            overflow: hidden;
        }

        .video-background video {
            filter: blur(30px);
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
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
        .login-box input[type="password"] {
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
            <a class="navbar-brand" href="#">
                Logo Hommy
            </a>
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
                            <li><a class="dropdown-item" href="#">Chung cư</a></li>
                            <li><a class="dropdown-item" href="#">Nhà ở</a></li>
                            <li><a class="dropdown-item" href="#">Phòng trọ</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="POST" action="index.php?page=chitiettimkiem">
                    <input class="form-control me-2" type="search" placeholder="Nhập từ khóa tìm kiếm" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=login">Đăng nhập</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=signup">Đăng ký</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="https://storage.googleapis.com/a1aa/image/hb5Nzm6NNdYaPJTIStmWgEycMxfReJur7GbB6Bf5Bd1ypQZnA.jpg" alt="User avatar" width="30" height="30" class="rounded-circle">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>