<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Chọn Time Hẹn Lịch</title>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid">
        <div class="row navbar navbar-expand-lg navbar-light bg-light">
            <div class="col-4">
                <div class="row">
                    <div class="col">
                        <a class="navbar-brand" href="javascript:void(0)">Logo</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <div class="col">
                        <a class="nav-link" href="#">Mua gói</a>
                    </div>
                        
                    <div class="col">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Danh mục
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Option 1</a></li>
                                <li><a class="dropdown-item" href="#">Option 2</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-4">
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
            </div>

            <div class="col-4">
                <div class="row">
                    <div class="col-5">
                        <div class="div"></div>
                    </div>

                    <div class="col-7">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn btn-outline-success">Đăng ký</a>
                            </div>

                            <div class="col">
                                <a href="#" class="btn btn-outline-secondary">Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Giao diện chọn time</h2>
        <div class="row justify-content-center">
            <!-- Chọn ngày -->
            <div class="col-lg-5 col-md-6 mb-4">
                <div class="card p-4 shadow-sm">
                    <h5 class="text-center mb-3">Chọn ngày</h5>
                    <div class="d-flex justify-content-center align-items-center" style="height: 150px; background-color: #f0f4f8; border-radius: 10px;">
                        <input type="date" class="form-control w-75">
                    </div>
                </div>
            </div>

            <!-- Chọn giờ -->
            <div class="col-lg-5 col-md-6 mb-4">
                <div class="card p-4 shadow-sm">
                    <h5 class="text-center mb-3">Chọn giờ</h5>
                    <div class="d-flex justify-content-center align-items-center" style="height: 150px; background-color: #f0f4f8; border-radius: 10px;">
                        <input type="time" class="form-control w-50">
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="button" class="btn btn-primary btn-lg px-5">Đặt lịch</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start mt-2">
        <div class="container py-5">
            <div class="row">
                <!-- Logo -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="rounded-circle bg-secondary d-inline-block p-3 text-white">Logo</div>
                </div>
    
                <!-- Hỗ trợ khách hàng -->
                <div class="col-lg-4 mb-4 mb-lg-0 no-underline">
                    <h6 class="text-uppercase fw-bold">Hỗ trợ khách hàng</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#!" class="text-dark">Trung tâm trợ giúp</a></li>
                        <li><a href="#!" class="text-dark">An toàn mua bán</a></li>
                        <li><a href="#!" class="text-dark">Liên hệ hỗ trợ</a></li>
                    </ul>
                </div>
    
                <!-- Thông tin web -->
                <div class="col-lg-4 mb-4 mb-lg-0 no-underline">
                    <h6 class="text-uppercase fw-bold">Thông tin về web</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#!" class="text-dark">Giới thiệu</a></li>
                        <li><a href="#!" class="text-dark">Quy chế hoạt động</a></li>
                        <li><a href="#!" class="text-dark">Chính sách bảo mật</a></li>
                        <li><a href="#!" class="text-dark">Giải quyết tranh chấp</a></li>
                        <li><a href="#!" class="text-dark">Tuyển dụng</a></li>
                        <li><a href="#!" class="text-dark">Truyền thông</a></li>
                        <li><a href="#!" class="text-dark">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    
        <!-- Social links -->
        <div class="text-center p-3 border-top">
            <span>Copyright!</span>
            <div class="mt-2">
                <a href="#!" class="text-dark me-3"><i class="fab fa-facebook"></i></a>
                <a href="#!" class="text-dark me-3"><i class="fab fa-instagram"></i></a>
                <a href="#!" class="text-dark me-3"><i class="fab fa-twitter"></i></a>
                <a href="#!" class="text-dark"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>

<?php
    

?>