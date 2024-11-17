<!-- Tab Menu -->
    <div class="d-flex justify-content-between" style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #dee2e6;">
        <div id="tab-all" class="text-dark fw-bold" onclick="showTab('all')" style="cursor: pointer; margin: 0 8px;">Tất cả (1)</div>
        <div id="tab-approved" class="text-muted" onclick="showTab('approved')" style="cursor: pointer; margin: 0 8px;">Đã duyệt (0)</div>
        <div id="tab-pending" class="text-muted" onclick="showTab('pending')" style="cursor: pointer; margin: 0 8px;">Chờ duyệt (1)</div>
        <div id="tab-rejected" class="text-muted" onclick="showTab('rejected')" style="cursor: pointer; margin: 0 8px;">Từ chối (0)</div>
        <div id="tab-rented" class="text-muted" onclick="showTab('rented')" style="cursor: pointer; margin: 0 8px;">Đã thuê (0)</div>
        <div id="tab-unrented" class="text-muted" onclick="showTab('unrented')" style="cursor: pointer; margin: 0 8px;">Chưa thuê (0)</div>
    </div>

    <!-- Content Sections -->
    <div class="container" style="margin-top: 20px;">
        <!-- All Listings -->
        <div id="content-all" class="content-section active-content" style="display: block;">
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
        </div>

        <!-- Approved Listings -->
        <div id="content-approved" class="content-section" style="display: none;">
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
        </div>
        <!-- pending Listings -->
        <div id="content-pending" class="content-section" style="display: none;">
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
        </div>
        <!-- Rejected Listings -->
        <div id="content-rejected" class="content-section" style="display: none;">
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
        </div>

        <!-- Rented Listings -->
        <div id="content-rented" class="content-section" style="display: none;">
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
        </div>

        <!-- Unrented Listings -->
        <div id="content-unrented" class="content-section" style="display: none;">
            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>            <div class="card" style="padding: 15px; margin-bottom: 15px;">
                <div class="d-flex align-items-center">
                    <img src="/assets/images/Hà nội.jpg" alt="1" style=" background-color: #f8f9fa; width: 200px; height: 150px;">
                    <div style="margin-left: 15px;">
                        <p style="margin-bottom: 5px;">Chung cư Ecomak, mới hoàn thành</p>
                        <p style="margin-bottom: 5px;">15,000,000</p>
                        <p style="margin-bottom: 5px;">22:00 04/01/2020</p>
                    </div>
                    <div class="ms-auto" style="color: #6c757d;">Đang chờ duyệt</div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript for Tab Switching -->
    <script>
        function showTab(tab) {
            // Hide all content sections
            document.querySelectorAll('.content-section').forEach(function(section) {
                section.style.display = 'none';
            });

            // Reset all tab styles to muted
            document.querySelectorAll('.d-flex > div').forEach(function(tabElement) {
                tabElement.classList.remove('fw-bold');
                tabElement.classList.remove('text-dark');
                tabElement.classList.add('text-muted');
            });

            // Show the selected content and style the active tab
            document.getElementById('content-' + tab).style.display = 'block';
            document.getElementById('tab-' + tab).classList.add('fw-bold');
            document.getElementById('tab-' + tab).classList.add('text-dark');
            document.getElementById('tab-' + tab).classList.remove('text-muted');
        }
    </script>
    <!-- Bootstrap JavaScript Bundle (including Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

