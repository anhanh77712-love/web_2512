<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Coolmate Clone' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/web_qlsp/Public/Css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body>

<!-- ===== TOP BAR ===== -->
<div class="top-bar text-center">
    <div class="container d-flex justify-content-between">
        <div>
            <a href="#" class="text-secondary text-decoration-none me-3">VỀ COOLMATE</a>
            <a href="#" class="text-secondary text-decoration-none">CXP</a>
        </div>
    </div>
</div>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="http://localhost/web_qlsp/home">
        COOLMATE<span style="color:#2f5acf">.ME</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-primary" href="#">NEW</a></li>

        <!-- MENU NAM với Mega Menu -->
        <li class="nav-item has-mega-menu">
            <a class="nav-link" href="/web_qlsp/products?category=nam">NAM 
                <i class="fas fa-chevron-down ms-1" style="font-size: 10px;"></i>
            </a>
            
            <div class="dropdown-menu mega-menu">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-2">
                            <a href="/web_qlsp/products" class="mega-title text-primary">TẤT CẢ SẢN PHẨM <i class="fas fa-arrow-right"></i></a>
                            <ul class="mega-list mt-3">
                                <li><a href="/web_qlsp/products?filter=new" class="fw-bold text-primary">Sản phẩm mới</a></li>
                                <li><a href="/web_qlsp/products?filter=bestseller" class="fw-bold">Bán chạy nhất</a></li>
                                <div class="my-2 border-bottom"></div>
                                <li><a href="/web_qlsp/products?collection=ecc">ECC Collection</a></li>
                                <li><a href="/web_qlsp/products?collection=excool">Excool Collection</a></li>
                                <li><a href="/web_qlsp/products?collection=seamless">Seamless</a></li>
                                <li><a href="/web_qlsp/products?collection=promax">Promax</a></li>
                                <li><a href="/web_qlsp/products?collection=thu-dong">Đồ Thu Đông</a></li>
                            </ul>
                        </div>

                        <div class="col-md-2">
                            <a href="/web_qlsp/products?category=ao-nam" class="mega-title">ÁO NAM <i class="fas fa-arrow-right"></i></a>
                            <ul class="mega-list">
                                <li><a href="/web_qlsp/products?sub=ao-tanktop">Áo Tanktop</a></li>
                                <li><a href="/web_qlsp/products?sub=ao-thun">Áo Thun</a></li>
                                <li><a href="/web_qlsp/products?sub=ao-the-thao">Áo Thể Thao</a></li>
                                <li><a href="/web_qlsp/products?sub=ao-polo">Áo Polo</a></li>
                                <li><a href="/web_qlsp/products?sub=ao-so-mi">Áo Sơ Mi</a></li>
                                <li><a href="/web_qlsp/products?sub=ao-dai-tay">Áo Dài Tay</a></li>
                                <li><a href="/web_qlsp/products?sub=ao-sweater">Áo Sweater</a></li>
                                <li><a href="/web_qlsp/products?sub=ao-khoac">Áo Khoác</a></li>
                            </ul>
                        </div>

                        <div class="col-md-2">
                            <a href="/web_qlsp/products?category=quan-nam" class="mega-title">QUẦN NAM <i class="fas fa-arrow-right"></i></a>
                            <ul class="mega-list">
                                <li><a href="/web_qlsp/products?sub=quan-short">Quần Short</a></li>
                                <li><a href="/web_qlsp/products?sub=quan-jogger">Quần Jogger</a></li>
                                <li><a href="/web_qlsp/products?sub=quan-the-thao">Quần Thể Thao</a></li>
                                <li><a href="/web_qlsp/products?sub=quan-dai">Quần Dài</a></li>
                                <li><a href="/web_qlsp/products?sub=quan-pants">Quần Pants</a></li>
                                <li><a href="/web_qlsp/products?sub=quan-jeans">Quần Jeans</a></li>
                                <li><a href="/web_qlsp/products?sub=quan-kaki">Quần Kaki</a></li>
                                <li><a href="/web_qlsp/products?sub=quan-boi">Quần Bơi</a></li>
                            </ul>
                        </div>
                        
                        <div class="col-md-2">
                            <a href="/web_qlsp/products?category=quan-lot-nam" class="mega-title">QUẦN LÓT NAM <i class="fas fa-arrow-right"></i></a>
                            <ul class="mega-list mb-4">
                                <li><a href="/web_qlsp/products?sub=brief">Brief (Tam giác)</a></li>
                                <li><a href="/web_qlsp/products?sub=trunk">Trunk (Boxer)</a></li>
                                <li><a href="/web_qlsp/products?sub=boxer-brief">Boxer Brief (Boxer dài)</a></li>
                            </ul>

                            <a href="/web_qlsp/products?category=phu-kien" class="mega-title">PHỤ KIỆN <i class="fas fa-arrow-right"></i></a>
                            <ul class="mega-list">
                                <li><a href="/web_qlsp/products?category=phu-kien">Tất cả phụ kiện</a><br><small class="text-muted">(Tất, mũ, túi...)</small></li>
                            </ul>
                        </div>


                    </div>
                    
                    <div class="row mt-4 pt-3 border-top bg-light p-3 rounded">
                        <div class="col-12 d-flex gap-4 justify-content-start text-uppercase fw-bold text-secondary" style="font-size: 13px;">
                            <span class="text-muted fw-normal">THEO NHU CẦU</span>
                            <a href="/web_qlsp/products?need=do-lot" class="text-dark">ĐỒ LÓT</a>
                            <a href="/web_qlsp/products?need=the-thao" class="text-dark">ĐỒ THỂ THAO</a>
                            <a href="/web_qlsp/products?need=hang-ngay" class="text-dark">MẶC HÀNG NGÀY</a>
                            <a href="/web_qlsp/products?need=thu-dong" class="text-dark">ĐỒ THU ĐÔNG</a>
                        </div>
                    </div>

                </div>
            </div>
        </li>

        <!-- Menu động từ DB -->
        <?php 
        if(isset($data['menu_categories']) && mysqli_num_rows($data['menu_categories']) > 0) {
            mysqli_data_seek($data['menu_categories'], 0);
            while($cat = mysqli_fetch_assoc($data['menu_categories'])) { 
        ?>
            <li class="nav-item">
                <a class="nav-link" href="/web_qlsp/products?category=<?php echo urlencode($cat['slug']); ?>">
                    <?php echo mb_strtoupper($cat['name'], 'UTF-8'); ?>
                </a>
            </li>
        <?php 
            } 
        }
        ?>

        <li class="nav-item"><a class="nav-link red-sale" href="/web_qlsp/products?sale=1">SALE</a></li>
      </ul>
    </div>

    <div class="d-flex align-items-center">
        <form class="search-form d-none d-lg-block me-3">
            <input type="text" class="search-input" placeholder="Tìm kiếm sản phẩm...">
            <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
        </form>

        <div class="me-3">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="dropdown">
                    <a href="#" class="text-dark dropdown-toggle text-decoration-none d-flex align-items-center" id="userMenu" data-bs-toggle="dropdown">
                        <i class="fas fa-user-check fs-5"></i> 
                        <span class="ms-2 small fw-bold">
                            <?php echo $_SESSION['user_name']; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                            <li><a class="dropdown-item text-danger fw-bold" href="/web_qlsp/overview">Quản trị hệ thống</a></li>
                            <li><hr class="dropdown-divider"></li>
                        <?php endif; ?>
                        
                        <li><a class="dropdown-item" href="/web_qlsp/profile">Hồ sơ cá nhân</a></li>
                        <li><a class="dropdown-item" href="/web_qlsp/orders">Đơn hàng của tôi</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/web_qlsp/login/logout">Đăng xuất</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="auth-links small">
                    <a href="#" class="text-dark text-decoration-none fw-bold btnok" data-bs-toggle="modal" data-bs-target="#loginModal" >Đăng nhập</a>
                    <span class="mx-1 text-muted">/</span>
                    <a href="#" class="text-dark text-decoration-none fw-bold btnok" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng ký</a>
                </div>
            <?php endif; ?>
        </div>

        <a href="/web_qlsp/cart" class="text-dark fs-5 position-relative">
            <i class="fas fa-shopping-bag"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                0
            </span>
        </a>
    </div>


  </div>
</nav>

<!-- ===== CONTENT ===== -->
<main class="container my-4">
    <?php
        // Nội dung view con sẽ được nhúng tại đây
       include_once "./MVC/View/Customer/".$data['Page'].".php";
    ?>
</main>

<!-- ===== FOOTER ===== -->
<footer class="mt-5">
    <div class="container">
        <div class="row border-bottom border-secondary pb-4 mb-4 align-items-center">
            <div class="col-md-6">
                <h4 class="fw-bold mb-2">COOLMATE lắng nghe bạn!</h4>
                <p class="text-secondary">Chúng tôi luôn trân trọng và mong đợi nhận được mọi ý kiến đóng góp từ khách hàng.</p>
                <a href="#" class="btn-white-outline">ĐÓNG GÓP Ý KIẾN</a>
            </div>
            <div class="col-md-6 text-md-end footer-contact mt-3 mt-md-0">
                <div class="d-flex justify-content-end align-items-center mb-2">
                    <i class="fas fa-phone-alt"></i>
                    <div class="text-start">
                        <span class="d-block text-secondary" style="font-size: 12px;">Hotline</span>
                        <span class="fw-bold">1900.272737</span>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <i class="fas fa-envelope"></i>
                    <div class="text-start">
                        <span class="d-block text-secondary" style="font-size: 12px;">Email</span>
                        <span class="fw-bold">Cool@coolmate.me</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h5>COOLCLUB</h5>
                <ul>
                    <li><a href="#">Đăng ký thành viên</a></li>
                    <li><a href="#">Ưu đãi & Đặc quyền</a></li>
                    <li><a href="#">Tài khoản</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>CHÍNH SÁCH</h5>
                <ul>
                    <li><a href="#">Chính sách đổi trả 60 ngày</a></li>
                    <li><a href="#">Chính sách khuyến mãi</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Chính sách giao hàng</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>CHĂM SÓC KHÁCH HÀNG</h5>
                <ul>
                    <li><a href="#">Trải nghiệm mua sắm 100% hài lòng</a></li>
                    <li><a href="#">Hỏi đáp - FAQs</a></li>
                </ul>
                <h5 class="mt-4">KIẾN THỨC MẶC ĐẸP</h5>
                <ul>
                    <li><a href="#">Hướng dẫn chọn size</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>ĐỊA CHỈ LIÊN HỆ</h5>
                <p class="text-secondary small">
                    <u>Văn phòng Hà Nội:</u> Tầng 3-4, Tòa nhà BMM, Km2, Đường Phùng Hưng, Phường Phúc La, Quận Hà Đông, TP Hà Nội
                </p>
                <p class="text-secondary small">
                    <u>Văn phòng TP.HCM:</u> Lô C3, đường D2, KCN Cát Lái, Thạnh Mỹ Lợi, TP. Thủ Đức, TP. Hồ Chí Minh
                </p>
            </div>
        </div>

        <div class="row mt-5 pt-3 border-top border-secondary">
            <div class="col-md-6">
                <p class="small text-secondary">@ CÔNG TY TNHH FASTECH ASIA<br>Mã số doanh nghiệp: 0108617038.</p>
            </div>
            <div class="col-md-6 text-end">
                <i class="fab fa-facebook fa-2x mx-2"></i>
                <i class="fab fa-instagram fa-2x mx-2"></i>
                <i class="fab fa-tiktok fa-2x mx-2"></i>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4"> 
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">ĐĂNG NHẬP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/web_qlsp/login/login" method="POST">
                   <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required 
                         value="<?php echo isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" required 
                        value="<?php echo isset($_COOKIE['user_password']) ? $_COOKIE['user_password'] : ''; ?>">
                    </div>

                    <div class="mb-4 form-check">
                       <input type="checkbox" class="form-check-input" id="remember" name="remember"
                            <?php echo isset($_COOKIE['user_email']) ? 'checked' : ''; ?>>
                        <label class="form-check-label small" for="remember">Ghi nhớ đăng nhập</label>
                    </div>

                    <button type="submit" name="btn_login" class="btn btn-dark w-100 mb-3">Đăng nhập</button>
                </form>

                <div class="text-center" >
                    <p class="small text-muted">Chưa có tài khoản? <a href="register_v.php" class="text-dark fw-bold text-decoration-none" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng ký ngay</a></p>
                    <hr class="my-3">
                    <button type="button" class="btn btn-link text-secondary small text-decoration-none" data-bs-dismiss="modal">
                        <i class="fas fa-arrow-left me-1"></i> Tiếp tục mua sắm
                    </button>
                </div>
            </div>
        </div>
        </div>
</div>
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered"> 
        <div class="modal-content p-2">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body px-4 pb-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">ĐĂNG KÝ TÀI KHOẢN</h2>
                    <p class="text-muted">Trở thành thành viên để nhận nhiều ưu đãi</p>
                </div>

                <form action="/web_qlsp/register/do_register" method="POST">
                    
                    <input type="hidden" name="role" value="0"> <input type="hidden" name="points" value="0"> <input type="hidden" name="google_id" value=""> <input type="hidden" name="avatar" value="default-avatar.png"> <div class="section-title" style="font-size: 1.1rem; font-weight: 700; margin-bottom: 15px; border-bottom: 2px solid #eee;">Thông tin cá nhân</div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label small fw-bold">HỌ VÀ TÊN</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Nhập họ và tên của bạn" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">EMAIL</label>
                            <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">SỐ ĐIỆN THOẠI</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Số điện thoại của bạn" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label small fw-bold">MẬT KHẨU</label>
                            <input type="password" name="password" class="form-control" placeholder="Tối thiểu 6 ký tự" required>
                        </div>
                    </div>

                    <div class="section-title mt-3" style="font-size: 1.1rem; font-weight: 700; margin-bottom: 15px; border-bottom: 2px solid #eee;">Địa chỉ nhận hàng</div>
                    <div class="row">
                       <div class="col-md-4 mb-3">
                            <label class="form-label small fw-bold">TỈNH / THÀNH</label>
                            <select name="province_code" class="form-select" id="province" required>
                                <option value="">Chọn Tỉnh/Thành</option>
                                <?php
                                // Kiểm tra chính xác biến được truyền từ Controller
                                if (isset($data['provinces']) && $data['provinces'] !== false) {
                                    // Đảm bảo con trỏ kết quả ở vị trí đầu tiên
                                    mysqli_data_seek($data['provinces'], 0); 
                                    while ($row = mysqli_fetch_assoc($data['provinces'])) {
                                        echo '<option value="' . $row['code'] . '">' . $row['name'] . '</option>';
                                    }
                                } else {
                                    echo '<option value="">Lỗi: Không tìm thấy dữ liệu tỉnh</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label small fw-bold">QUẬN / HUYỆN</label>
                            <select name="district_code" class="form-select" id="district" required>
                                <option value="">Chọn Quận/Huyện</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label small fw-bold">PHƯỜNG / XÃ</label>
                            <select name="ward_code" class="form-select" id="ward" required>
                                <option value="">Chọn Phường/Xã</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label small fw-bold">ĐỊA CHỈ CHI TIẾT</label>
                            <input type="text" name="address_detail" class="form-control" placeholder="Số nhà, tên đường...">
                        </div>
                    </div>

                    <div class="form-check mb-4 mt-3">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label small" for="terms">
                            Tôi đồng ý với các <a href="#" class="text-dark fw-bold">điều khoản dịch vụ</a>.
                        </label>
                    </div>

                    <button type="submit" name="btn_register" class="btn btn-dark w-100 py-3 fw-bold">ĐĂNG KÝ NGAY</button>
                </form>

                <div class="text-center mt-4">
                    <p class="small">Đã có tài khoản? 
                        <a href="#" class="text-dark fw-bold text-decoration-none" data-bs-toggle="modal" data-bs-target="#loginModal">Đăng nhập</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // 1. Khi chọn Tỉnh
    $('#province').change(function() {
        var p_code = $(this).val();
        if(p_code != "") {
            $.ajax({
                url: "/web_qlsp/home/get_districts/" + p_code,
                method: "GET",
                success: function(data) {
                    $('#district').html(data); // Đổ dữ liệu vào ô Huyện
                    $('#ward').html('<option value="">Chọn Phường/Xã</option>'); // Reset ô Xã
                }
            });
        }
    });

    // 2. Khi chọn Huyện
    $('#district').change(function() {
        var d_code = $(this).val();
        if(d_code != "") {
            $.ajax({
                url: "/web_qlsp/home/get_wards/" + d_code,
                method: "GET",
                success: function(data) {
                    $('#ward').html(data); // Đổ dữ liệu vào ô Xã
                }
            });
        }
    });
});
</script>