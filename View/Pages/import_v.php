<div class="row">
    <div class="col-12 mb-4">
        <h4 class="fw-bold">Nhập dữ liệu từ Excel (CSV)</h4>
        <p class="text-muted">
            Lưu ý: File phải được lưu dưới định dạng <b>.csv (UTF-8)</b>
        </p>
    </div>

    <!-- IMPORT DANH MỤC -->
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white fw-bold">
                1. NHẬP DANH MỤC
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Chọn file CSV Danh mục</label>
                        <input type="file" class="form-control">
                    </div>

                    <div class="alert alert-light border">
                        <small>
                            <strong>Cấu trúc file mẫu:</strong><br>
                            Cột A: Tên danh mục (Ví dụ: Áo Thun)<br>
                            <em>(Slug sẽ được hệ thống tự tạo)</em>
                        </small>
                    </div>

                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-upload"></i> Upload Danh mục
                    </button>

                    <a href="#" class="btn btn-outline-secondary btn-sm float-end">
                        Tải file mẫu
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- IMPORT SẢN PHẨM -->
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white fw-bold">
                2. NHẬP SẢN PHẨM
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Chọn file CSV Sản phẩm</label>
                        <input type="file" class="form-control">
                    </div>

                    <div class="alert alert-light border">
                        <small>
                            <strong>Cấu trúc cột:</strong><br>
                            Tên SP, Giá, Tên Danh Mục, Tên BST, Mô tả, Tên file ảnh<br>
                            <em>(Tên Danh mục phải khớp với danh mục đã nhập)</em>
                        </small>
                    </div>

                    <button type="button" class="btn btn-success">
                        <i class="fas fa-upload"></i> Upload Sản phẩm
                    </button>

                    <a href="#" class="btn btn-outline-secondary btn-sm float-end">
                        Tải file mẫu
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
