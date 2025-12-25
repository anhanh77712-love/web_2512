
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị Coolmate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/web_qlsp/Public/Css/admin_style.css">
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        COOLMATE<span style="color:#2f5acf">.ME</span>
    </div>
    
    <a href="http://localhost/web_qlsp/overview" class="<?= $current_page == 'index.php' ? 'active' : '' ?>">
        <i class="fas fa-home"></i> Tổng quan
    </a>
    
    <a href="http://localhost/web_qlsp/product_list" class="<?= $current_page == 'product_list.php' || $current_page == 'product_add.php' ? 'active' : '' ?>">
        <i class="fas fa-tshirt"></i> Sản phẩm
    </a>
    
    <a href="http://localhost/web_qlsp/categories_list" class="<?= $current_page == 'categories_list.php' ? 'active' : '' ?>">
            <i class="fas fa-list"></i> Danh mục
        </a>

    <a href="http://localhost/web_qlsp/import" class="<?= $current_page == 'import.php' ? 'active' : '' ?>">
            <i class="fas fa-file-import"></i> Nhập liệu (CSV)
        </a>

    <a href="http://localhost/web_qlsp/orders" class="<?= $current_page == 'orders.php' ? 'active' : '' ?>">
        <i class="fas fa-shopping-bag"></i> Đơn hàng
    </a>
    
    <a href="http://localhost/web_qlsp/users" class="<?= $current_page == 'users.php' ? 'active' : '' ?>">
        <i class="fas fa-users"></i> Khách hàng
    </a>

    <a href="http://localhost/web_qlsp/collections" class="<?= $current_page == 'collections.php' ? 'active' : '' ?>">
    <i class="fas fa-layer-group"></i> Bộ sưu tập
</a>

<a href="http://localhost/web_qlsp/vouchers" class="<?= $current_page == 'vouchers.php' ? 'active' : '' ?>">
    <i class="fas fa-ticket-alt"></i> Mã giảm giá
</a>


<a class="nav-link" href="http://localhost/web_qlsp/banners">
    <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
    Quản lý Banner
</a>
<a class="nav-link" href="http://localhost/web_qlsp/campaigns">
    <div class="sb-nav-link-icon"><i class="fas fa-fire"></i></div>
    Quản lý Campaign
</a>

    <div style="position: absolute; bottom: 20px; width: 100%;">
        <a href="/web_qlsp/login/logout" class="text-danger">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
    </div>
</div>
<div class="page">
    <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">
                Quản lí hệ thống
            </h4>
            <div class="d-flex align-items-center">
                <div class="me-3 text-end">
                    <span class="d-block fw-bold">Admin</span>
                    <small class="text-muted">Administrator</small>
                </div>
                <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff" class="rounded-circle" width="40">
            </div>
        </div>
                <?php
                    include_once "./MVC/View/Pages/".$data['Page'].".php";
                ?>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>