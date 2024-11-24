<div class="membership-container">
    <h1 class="mb-5">Chi Tiết Gói Thành Viên</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="row g-4">
            <!-- Gói VIP1 -->
            <div class="col-md-4">
                <div class="package-card p-4">
                    <div class="package-icon"><i class="bi bi-star-fill"></i></div>
                    <div class="package-title">Gói VIP1</div>
                    <div class="package-price">₫199,000 / tháng</div>
                    <ul class="package-features">
                        <li>Truy cập không giới hạn</li>
                        <li>Ưu đãi đặc biệt hàng tháng</li>
                        <li>Hỗ trợ 24/7</li>
                    </ul>
                    <button type="submit" name="chon_goi" value="1" class="btn btn-primary select-btn">Chọn Gói</button>
                </div>
            </div>

            <!-- Gói VIP2 -->
            <div class="col-md-4">
                <div class="package-card p-4">
                    <div class="package-icon"><i class="bi bi-gem"></i></div>
                    <div class="package-title">Gói VIP2</div>
                    <div class="package-price">₫399,000 / tháng</div>
                    <ul class="package-features">
                        <li>Truy cập không giới hạn</li>
                        <li>Ưu đãi đặc biệt hàng tuần</li>
                        <li>Hỗ trợ ưu tiên 24/7</li>
                        <li>Tặng quà sinh nhật</li>
                    </ul>
                    <button type="submit" name="chon_goi" value="2" class="btn btn-success select-btn">Chọn Gói</button>
                </div>
            </div>

            <!-- Gói VIP3 -->
            <div class="col-md-4">
                <div class="package-card p-4">
                    <div class="package-icon"><i class="bi bi-trophy-fill"></i></div>
                    <div class="package-title">Gói VIP3</div>
                    <div class="package-price">₫599,000 / tháng</div>
                    <ul class="package-features">
                        <li>Truy cập không giới hạn</li>
                        <li>Ưu đãi đặc biệt hàng ngày</li>
                        <li>Hỗ trợ VIP 24/7</li>
                        <li>Tặng quà sinh nhật & kỷ niệm</li>
                        <li>Tham gia sự kiện đặc biệt</li>
                    </ul>
                    <button type="submit" name="chon_goi" value="3" class="btn btn-warning select-btn">Chọn Gói</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
    include("pages/muagoithanhvien/xuly_muagoithanhvien.php");
?> 

<!-- Pop-up -->
<div id="popup-success" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <button class="popup-close" id="close-popup">&times;</button>
        <p style="margin:10px;">Chúc mừng! Bạn đã mua gói thành công! 🏆</p>
        <p id="countdown"></p>
    </div>
</div>


    

<script>
const selectButtons = document.querySelectorAll('.select-btn');
const popup = document.getElementById('popup-success');
const closePopup = document.getElementById('close-popup');
const countdown = document.getElementById('countdown');
let countdownTimer;

// Mở pop-up và bắt đầu đếm ngược
selectButtons.forEach(button => {
    button.addEventListener('click', (e) => {
        popup.style.display = 'flex'; // Hiển thị pop-up

        let timeLeft = 5; // Thời gian đếm ngược (giây)
        countdown.textContent = `Cửa sổ sẽ tự động gửi sau ${timeLeft} giây.`;

        // Bắt đầu đếm ngược
        const countdownTimer = setInterval(() => {
            timeLeft -= 1;
            countdown.textContent = `Cửa sổ sẽ tự động gửi sau ${timeLeft} giây.`;

            if (timeLeft <= 0) {
                clearInterval(countdownTimer); // Dừng đếm ngược
                popup.style.display = 'none'; // Tắt pop-up
                
                // Gửi form thủ công
                const form = e.target.closest('form'); // Lấy form chứa nút được click
                if (form) {
                    form.submit();
                }
            }
        }, 1000);
    });
});

// Đóng pop-up khi nhấn nút X
closePopup.addEventListener('click', () => {
    popup.style.display = 'none'; // Ẩn pop-up
    clearInterval(countdownTimer); // Dừng đếm ngược
});

// Đóng pop-up khi nhấn bên ngoài
popup.addEventListener('click', (e) => {
    if (e.target === popup) {
        popup.style.display = 'none';
        clearInterval(countdownTimer);
    }
});



</script>

