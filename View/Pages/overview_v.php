<!-- THỐNG KÊ SỐ LIỆU -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted small mb-1">DOANH THU THÁNG</p>
                    <h4 class="fw-bold mb-0 text-success">
                        <!-- <?php echo number_format($data['monthly_revenue'] ?? 0, 0, ',', '.'); ?>đ -->
                         0đ
                    </h4>
                </div>
                <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success">
                    <i class="fas fa-coins fa-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted small mb-1">ĐƠN HÀNG MỚI</p>
                    <h4 class="fw-bold mb-0 text-primary">
                        <?php echo number_format($data['total_orders'] ?? 0, 0, ',', '.'); ?>
                    </h4>
                </div>
                <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                    <i class="fas fa-shopping-bag fa-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted small mb-1">KHÁCH HÀNG</p>
                    <h4 class="fw-bold mb-0 text-warning">
                        <?php echo number_format($data['total_customers'] ?? 0, 0, ',', '.'); ?>
                    </h4>
                </div>
                <div class="bg-warning bg-opacity-10 p-3 rounded-circle text-warning">
                    <i class="fas fa-users fa-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted small mb-1">SẢN PHẨM</p>
                    <h4 class="fw-bold mb-0 text-danger">
                        <?php echo number_format($data['total_products'] ?? 0, 0, ',', '.'); ?>
                    </h4>
                </div>
                <div class="bg-danger bg-opacity-10 p-3 rounded-circle text-danger">
                    <i class="fas fa-tshirt fa-lg"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BIỂU ĐỒ -->
<div class="row mb-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-bold py-3">
                Biểu đồ doanh thu 7 ngày qua
            </div>
            <div class="card-body">
                <canvas id="revenueChart" height="300"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-bold py-3">
                Trạng thái đơn hàng
            </div>
            <div class="card-body">
                <canvas id="orderStatusChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- BẢNG ĐƠN HÀNG MỚI -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-bold py-3">
        Đơn hàng mới cần xử lý
    </div>
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
