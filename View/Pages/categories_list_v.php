<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1">Danh mục sản phẩm</h4>
    <p class="text-muted small mb-0">Quản lý các nhóm sản phẩm hiển thị trên website</p>
  </div>

  <button type="button" class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
    <i class="fas fa-plus me-2"></i> Thêm danh mục
  </button>
</div>

<div class="card-table">
  <div class="p-3 border-bottom d-flex align-items-center bg-white">
    <form method="POST" action="http://localhost/web_qlsp/categories_list/search"
      class="d-flex align-items-center gap-2 w-100"
      style="max-width: 600px;">

      <!-- Input search -->
      <div class="search-wrapper flex-grow-1 position-relative">
        <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
            <path fill-rule="evenodd"
              d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
              clip-rule="evenodd" />
          </svg>
        </div>

        <input type="text"
          name="txtSearch"
          class="form-control"
          style="padding-left: 40px; border-radius: 8px; height: 42px;"
          placeholder="Tìm kiếm danh mục..."
          value="<?php echo isset($data['search']) ? $data['search'] : ''; ?>">
      </div>

      <!-- Button Search -->
      <button type="submit" class="btn btn-primary-custom" name="btnTimkiem">
        <i class="fas fa-search"></i> Tìm
      </button>

      <!-- Button Export Excel -->
      <a href="?export=1" class="btn btn-success">
        <i class="fas fa-file-excel"></i> Xuất Excel
      </a>

    </form>
  </div>


  <div class="table-responsive">
    <table class="table-modern">
      <thead>
        <tr>
          <th width="10%">ID</th>
          <th width="15%">Hình ảnh</th>
          <th width="35%">Tên danh mục</th>
          <th width="25%">Đường dẫn (Slug)</th>
          <th width="15%" class="text-end">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($data['categories_list']) && mysqli_num_rows($data['categories_list']) > 0) {
          foreach ($data['categories_list'] as $c) {
        ?>
            <tr>
              <td class="text-muted">#<?php echo $c['id']; ?></td>
              <td>
                <?php if (!empty($c['thumbnail'])) { ?>
                  <img src="/web_qlsp/Public/Picture/categories/<?php echo $c['thumbnail']; ?>"
                    class="rounded border"
                    style="width: 50px; height: 50px; object-fit: cover;">
                <?php } else { ?>
                  <span class="badge bg-light text-secondary border">No Image</span>
                <?php } ?>
              </td>
              <td class="fw-bold text-dark"><?php echo $c['name']; ?></td>
              <td><span class="badge-slug"><?php echo $c['slug']; ?></span></td>
              <td class="text-end">
                <button class="btn-icon text-primary me-1 btn-edit"
                  data-bs-toggle="modal"
                  data-bs-target="#editCategoryModal"
                  data-id="<?php echo $c['id']; ?>"
                  data-name="<?php echo $c['name']; ?>"
                  data-slug="<?php echo $c['slug']; ?>"
                  data-thumbnail="<?php echo $c['thumbnail']; ?>"
                  title="Chỉnh sửa">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                  </svg>
                </button>

                <a href="http://localhost/web_qlsp/categories_list/delete/<?php echo $c['id']; ?>"
                  class="btn-icon text-danger"
                  onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                  title="Xóa">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                  </svg>
                </a>
              </td>
            </tr>
          <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="5" class="text-center py-5 text-muted">
              Không tìm thấy danh mục nào.
            </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Thêm danh mục mới</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="http://localhost/web_qlsp/categories_list/add">
          <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" class="form-control" required onkeyup="generateSlug(this.value, 'slug')">
          </div>
          <div class="mb-3">
            <label class="form-label">Ảnh đại diện</label>
            <input type="file" name="image" class="form-control" accept="image/*">
          </div>
          <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control bg-light" readonly>
          </div>
          <button type="submit" name="add_category" class="btn btn-dark w-100">Thêm ngay</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Chỉnh sửa danh mục</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="http://localhost/web_qlsp/categories_list/update">
          <input type="hidden" name="id" id="edit_id">
          <input type="hidden" name="old_image" id="edit_old_image">

          <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" id="edit_name" class="form-control" required onkeyup="generateSlug(this.value, 'edit_slug')">
          </div>

          <div class="mb-3">
            <label class="form-label">Ảnh đại diện</label>
            <input type="file" name="image" class="form-control" accept="image/*">

            <div id="preview_area" class="mt-2" style="display:none;">
              <small class="text-muted d-block mb-1">Ảnh hiện tại:</small>
              <img id="edit_preview_img" src="" class="rounded border" width="80">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" id="edit_slug" class="form-control bg-light" readonly>
          </div>
          <button type="submit" name="edit_category" class="btn btn-primary w-100">Lưu thay đổi</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function generateSlug(title, targetId) {
    let slug = title.toLowerCase();
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    document.getElementById(targetId).value = slug;
  }

  // Xử lý khi nhấn nút sửa
  document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', function() {
      const id = this.dataset.id;
      const name = this.dataset.name;
      const slug = this.dataset.slug;
      const thumbnail = this.dataset.thumbnail;

      // Điền dữ liệu vào form
      document.getElementById('edit_id').value = id;
      document.getElementById('edit_name').value = name;
      document.getElementById('edit_slug').value = slug;
      document.getElementById('edit_old_image').value = thumbnail;

      // Hiển thị ảnh hiện tại nếu có
      if (thumbnail) {
        document.getElementById('preview_area').style.display = 'block';
        document.getElementById('edit_preview_img').src = '/web_qlsp/Public/Picture/categories/' + thumbnail;
      } else {
        document.getElementById('preview_area').style.display = 'none';
      }
    });
  });
</script>