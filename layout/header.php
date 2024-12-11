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
        
                /* CSS cho các mục bên trong dropdown */
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
                .video-background {
                    position: relative;
                    width: 100%;
                    height: 130vh; /* Chiều cao bằng chiều cao của viewport */
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
                    z-index: -1; /* Đặt video dưới các nội dung khác */
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
                    background-color:   #1b2e00b7;
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
                    color:#c1e98a;
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
                #footer {
                    background-color: #1b2e00;
                    padding: 10px 20px;
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
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="index.php?page=chitiettimkiem">
            <input class="form-control me-2" type="search" placeholder="Nhập từ khóa tìm kiếm" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search">Search</i></button>
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
    </div>
</nav>
    </header>

    </header>   
    



