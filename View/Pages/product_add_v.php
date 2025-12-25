<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Thêm sản phẩm mới</h4>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="http://localhost/web_qlsp/product_add/Add" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" name="name"
                            onkeyup="generateSlug(this.value)"
                            placeholder="VD: Áo Thun Coolmate...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Slug (Đường dẫn tĩnh)</label>
                        <input type="text" id="slug" class="form-control bg-light" readonly name="slug"
                            placeholder="VD: ao-thun-coolmate...">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Giá bán (VNĐ)</label>
                            <input type="number" class="form-control" placeholder="150000" name="price">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Ảnh đại diện</label>
                            <input type="file" class="form-control" accept="image/*" name="thumbnail">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Danh mục</label>
                            <select class="form-select" name="category_id">
                                <option value="" disabled selected>-- Chọn danh mục --</option>
                                <?php
                                if (isset($data['categories_list']) && mysqli_num_rows($data['categories_list']) > 0) {
                                    while ($row = mysqli_fetch_assoc($data['categories_list'])) {
                                ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Bộ sưu tập</label>
                            <select class="form-select" name="collection_id">
                                <option value="" disabled selected>-- Chọn bộ sưu tập --</option>
                                <?php
                                if (isset($data['collections_list']) && mysqli_num_rows($data['collections_list']) > 0) {
                                    while ($row = mysqli_fetch_assoc($data['collections_list'])) {
                                ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- MÔ TẢ + NÚT AI -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold mb-0">Mô tả chi tiết</label>
                            <button type="button" class="btn-ai-gemini" disabled>
                                <i class="fas fa-wand-magic-sparkles"></i> Dùng AI Viết Hộ
                            </button>
                        </div>
                        <textarea class="form-control" rows="6" name="description"
                            placeholder="Mô tả sản phẩm sẽ hiển thị ở đây..."></textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-custom" name="btnLuu">
                            Lưu sản phẩm
                        </button>
                        <button type="button" class="btn btn-light border">
                            Hủy
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script tạo Slug demo -->
<script>
    function generateSlug(title) {
        let slug = title.toLowerCase();
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        slug = slug.replace(/[^a-z0-9\s-]/g, '');
        slug = slug.replace(/\s+/g, '-').replace(/-+/g, '-');
        document.getElementById('slug').value = slug;
    }
</script>