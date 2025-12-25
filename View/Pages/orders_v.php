<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Danh sách Đơn hàng</h4>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead class="bg-light">
                <tr>
                    <th>Mã đơn</th>
                    <th>Khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row mẫu -->
                <tr>
                    <td>#1001</td>
                    <td>
                        <div class="fw-bold">Nguyễn Văn A</div>
                        <small class="text-muted">0123456789</small>
                    </td>
                    <td>20/12/2025 14:30</td>
                    <td class="fw-bold text-danger">350.000đ</td>
                    <td>
                        <span class="badge bg-warning text-dark">Pending</span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-dark" disabled>
                            Xem chi tiết
                        </button>
                    </td>
                </tr>

                <!-- Empty -->
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        Chưa có đơn hàng nào.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
