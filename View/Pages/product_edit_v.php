<?php
if (isset($data['item']) && mysqli_num_rows($data['item']) > 0) {
    $sanpham = mysqli_fetch_assoc($data['item']);
?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">
                    Chỉnh sửa sản phẩm #<?= $sanpham['id'] ?>
                </div>
                <div class="card-body">
                    <form action="http://localhost/web_qlsp/product_list/update" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $sanpham['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tên sản phẩm</label>
                            <input type="text" id="name" class="form-control" name="name"
                                value="<?php echo $sanpham['name']; ?>"
                                onkeyup="generateSlug(this.value)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Slug</label>
                            <input type="text" id="slug" class="form-control bg-light" name="slug"
                                value="<?php echo $sanpham['slug']; ?>" readonly>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Giá bán</label>
                                <input type="number" class="form-control" value="<?php echo $sanpham['base_price']; ?>" name="price">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Ảnh đại diện</label>
                                <input type="file" class="form-control" name="thumbnail">
                                <img src="/web_qlsp/Public/Picture/<?= $sanpham['thumbnail'] ?>" width="80" class="mt-2 rounded border">
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
                                            $selected = ($row['id'] == $sanpham['category_id']) ? 'selected' : '';
                                    ?>
                                            <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>>
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
                                            $selected = ($row['id'] == $sanpham['collection_id']) ? 'selected' : '';
                                    ?>
                                            <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>>
                                                <?php echo $row['name']; ?>
                                            </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- MÔ TẢ + AI -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label fw-bold mb-0">Mô tả chi tiết</label>
                                <button type="button" class="btn-ai-gemini" disabled>
                                    <i class="fas fa-wand-magic-sparkles"></i> Dùng AI Viết Hộ
                                </button>
                            </div>
                            <textarea class="form-control" rows="6" name="description"><?php echo $sanpham['description']; ?>

                        </textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" name="btnLuu" class="btn btn-primary">
                                Lưu thay đổi
                            </button>
                            <button type="button" class="btn btn-secondary">
                                Hủy
                            </button>
                        </div>
                    <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

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