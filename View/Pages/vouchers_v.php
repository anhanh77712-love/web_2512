<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Quản lý Mã giảm giá</h4>
    <button type="button" class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addVoucherModal">
        <i class="fas fa-plus me-2"></i> Thêm Voucher
    </button>
</div>

<div class="bg-white rounded-3 shadow-sm overflow-hidden">
    <table class="table table-custom mb-0 align-middle">
        <thead>
            <tr>
                <th>Mã Code</th>
                <th>Loại giảm</th>
                <th>Giá trị</th>
                <th>Đơn tối thiểu</th>
                <th>Đã dùng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($data['vouchers_list']) && mysqli_num_rows($data['vouchers_list']) > 0) {
                foreach ($data['vouchers_list'] as $v) {
            ?>
                    <tr>
                        <td>
                            <span class="badge bg-dark fs-6"><?php echo $v['code']; ?></span>
                        </td>
                        <td>
                            <?php echo ($v['discount_type'] == 'percent') ? 'Theo %' : 'Trừ tiền'; ?>
                        </td>
                        <td class="fw-bold text-success">
                            <?php
                            echo ($v['discount_type'] == 'percent')
                                ? $v['discount_value'] . '%'
                                : number_format($v['discount_value']) . 'đ';
                            ?>
                        </td>
                        <td><?php echo number_format($v['min_order_value']); ?>đ</td>
                        <td><?php echo $v['used_count']; ?> lần</td>
                        <td>
                            <a href="http://localhost/web_qlsp/vouchers/delete/<?php echo $v['id']; ?>"
                                class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Xóa voucher này?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        Chưa có voucher nào.
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<!-- ADD MODAL -->
<div class="modal fade" id="addVoucherModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Tạo mã giảm giá mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/web_qlsp/vouchers/add">
                    <div class="mb-3">
                        <label class="form-label">Mã Code</label>
                        <input type="text" class="form-control" placeholder="VD: SALE50" style="text-transform: uppercase;" name="code">
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Loại giảm</label>
                            <select class="form-select" name="type">
                                <option value="amount">Trừ tiền mặt (VNĐ)</option>
                                <option value="percent">Trừ theo %</option>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Giá trị giảm</label>
                            <input type="number" class="form-control" placeholder="50" name="value">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Áp dụng cho đơn từ (VNĐ)</label>
                        <input type="number" class="form-control" value="0" name="min_order">
                    </div>

                    <button type="submit" class="btn btn-success w-100" name="btnAddVoucher">
                        Tạo mã
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>