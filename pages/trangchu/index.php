<div class="container">

<div class="row pt-5" style="height: 500px;">
    <div class="col d-flex align-items-center justify-content-center">
        <div class="p-4 bg-light rounded shadow border w-75">
            <div class="d-flex justify-content-around">
                <button class="btn btn-outline-primary fw-bold">Gợi ý</button>
                <button class="btn btn-primary m-1">Gần bạn</button>
                <button class="btn btn-primary m-1">Yêu thích nhất</button>
                <button class="btn btn-primary m-1">Mới nhất</button>
            </div>
        </div>
    </div>

    <div class="col">
        <div id="demo" class="carousel slide rounded shadow-lg overflow-hidden" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
        
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/img_trangchu_khachhang/Los_Angeles_Skyline.jpg" alt="Los Angeles" class="d-block w-100 img-fluid" style="height: 400px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img_trangchu_khachhang/Chicago_River_ferry_b.jpg" alt="Chicago" class="d-block w-100 img-fluid" style="height: 400px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img_trangchu_khachhang/newnycguidemain.jpeg" alt="New York" class="d-block w-100 img-fluid" style="height: 400px; object-fit: cover;">
                </div>
            </div>
        
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="mt-2 p-4 bg-light rounded shadow-sm">
            <h3 class="text-center mb-4" style="font-weight: 600; color: #333;">Bất động sản theo khu vực</h3>
            <div class="row">
                <!-- Main Large Card -->
                <div class="col-lg-6 col-12 mb-3">
                    <div class="card border-0 shadow-sm" style="width: 100%; border-radius: 10px; overflow: hidden;">
                        <img class="card-img-top" src="./assets/img_trangchu_khachhang/thanh-pho-thu-duc-tp-ho-chi-minh.jpg" alt="Card image" style="height: 335px; object-fit: cover;">
                        <div class="card-img-overlay d-flex flex-column justify-content-end p-3" style="background: rgba(0, 0, 0, 0.5);">
                            <h5 class="text-light" style="font-size: 1.8em; font-weight: 600;">TP.Hồ Chí Minh</h5>
                            <h6 class="text-light" style="font-size: 1.4em;">1,900 dự án</h6>
                        </div>
                    </div>  
                </div>
                <!-- Smaller Cards -->
                <div class="col-lg-6 col-12">
                    <div class="row g-3">
                        <div class="col-md-6 col-12">
                            <div class="card border-0 shadow-sm" style="border-radius: 10px; overflow: hidden;">
                                <img class="card-img-top" src="./assets/img_trangchu_khachhang/binh-duong.jpg" alt="Card image" style="height: 160px; object-fit: cover;">
                                <div class="card-img-overlay d-flex flex-column justify-content-end p-2" style="background: rgba(0, 0, 0, 0.5);">
                                    <h5 class="text-light">Bình Dương</h5>
                                    <h6 class="text-light">1,900 dự án</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card border-0 shadow-sm" style="border-radius: 10px; overflow: hidden;">
                                <img class="card-img-top" src="./assets/img_trangchu_khachhang/cau-rong-da-nang.jpg" alt="Card image" style="height: 160px; object-fit: cover;">
                                <div class="card-img-overlay d-flex flex-column justify-content-end p-2" style="background: rgba(0, 0, 0, 0.5);">
                                    <h5 class="text-light">Đà Nẵng</h5>
                                    <h6 class="text-light">1,900 dự án</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card border-0 shadow-sm" style="border-radius: 10px; overflow: hidden;">
                                <img class="card-img-top" src="./assets/img_trangchu_khachhang/vungtau.jpg" alt="Card image" style="height: 160px; object-fit: cover;">
                                <div class="card-img-overlay d-flex flex-column justify-content-end p-2" style="background: rgba(0, 0, 0, 0.5);">
                                    <h5 class="text-light">Vũng Tàu</h5>
                                    <h6 class="text-light">1,900 dự án</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card border-0 shadow-sm" style="border-radius: 10px; overflow: hidden;">
                                <img class="card-img-top" src="./assets/img_trangchu_khachhang/ha-noi.jpg" alt="Card image" style="height: 160px; object-fit: cover;">
                                <div class="card-img-overlay d-flex flex-column justify-content-end p-2" style="background: rgba(0, 0, 0, 0.5);">
                                    <h5 class="text-light">Hà Nội</h5>
                                    <h6 class="text-light">1,900 dự án</h6>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="mt-2 p-2 bg-light rounded">
            <h3 class="text-center">Gợi ý sản phẩm</h3>
            <div class="btn-group-l text-center mt-4">
                <button type="button" class="btn btn-dark">Chung cư</button>
                <button type="button" class="btn btn-dark">Nhà ở</button>
                <button type="button" class="btn btn-dark">Phòng trọ</button>
            </div>

            <!-- Carousel Section -->
            <div id="projectsCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- Repeat the following block for each new carousel slide -->
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Vinhomes Central Park</h5>
                                        <p class="image-price" style="margin-top: 5px;">1,900,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Empire City</h5>
                                        <p class="image-price" style="margin-top: 5px;">1,900,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Vinhomes Central Park</h5>
                                        <p class="image-price" style="margin-top: 5px;">1,900,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Vinhomes Central Park</h5>
                                        <p class="image-price" style="margin-top: 5px;">1,900,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Vinhomes Central Park</h5>
                                        <p class="image-price" style="margin-top: 5px;">1,900,000 VND</p>
                                    </div>
                                </div>
                            </div><div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Vinhomes Central Park</h5>
                                        <p class="image-price" style="margin-top: 5px;">1,900,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End of repeat block -->
                        </div>
                    </div>
                    
                    <!-- Add more carousel-item blocks here for more slides -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Masteri Thảo Điền</h5>
                                        <p class="image-price" style="margin-top: 5px;">900,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Ecopark (Hưng Yên)</h5>
                                        <p class="image-price" style="margin-top: 5px;">18,000,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Vinhomes Central Park</h5>
                                        <p class="image-price" style="margin-top: 5px;">1,900,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Vinhomes Central Park</h5>
                                        <p class="image-price" style="margin-top: 5px;">1,900,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Vinhomes Central Park</h5>
                                        <p class="image-price" style="margin-top: 5px;">1,900,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 400px; border: 2px solid #ddd; margin: 5px; border-radius: 8px;">
                                    <img class="card-img-top" src="./assets/images/OIP.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="image-title" style="margin-top: 5px;">Vinhomes Central Park</h5>
                                        <p class="image-price" style="margin-top: 5px;">1,900,000 VND</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev" style="padding: 10px;">
                    <span class="carousel-control-prev-icon" aria-hidden="true" 
                        style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; width: 50px; height: 50px;"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next" style="padding: 10px;">
                    <span class="carousel-control-next-icon" aria-hidden="true" 
                        style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; width: 50px; height: 50px;"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
