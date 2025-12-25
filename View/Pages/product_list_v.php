<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Quản lý sản phẩm</h3>

</div>

<!-- Search + Button -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <!-- Search + Buttons -->
    <form method="POST"
          action="http://localhost/web_qlsp/product_list/search"
          class="d-flex align-items-center gap-2 w-75">

        <div class="search-wrapper flex-grow-1">
            <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M16 11a5 5 0 11-10 0 5 5 0 0110 0z" />
            </svg>
            <input type="text"
                   name="txtSearch"
                   class="form-control form-search"
                   placeholder="Tìm kiếm sản phẩm..."
                   value="<?php echo isset($data['search']) ? $data['search'] : ''; ?>">
        </div>

        <!-- Button Search -->
        <button type="submit" class="btn btn-primary-custom" name="btnTimkiem">
            <i class="fas fa-search"></i> Tìm
        </button>

        <!-- Button Export Excel -->
        <a href="http://localhost/web_qlsp/product_list/export"
           class="btn btn-success">
            <i class="fas fa-file-excel"></i> Xuất Excel
        </a>
    </form>

    <!-- Add product -->
    <a href="http://localhost/web_qlsp/product_add" class="btn-primary-custom">
        <i class="fas fa-plus"></i> Thêm sản phẩm
    </a>
</div>


<!-- Table -->
<div class="card-table">
    <table class="table-modern">
        <thead>
            <tr>
                <th width="5%">ID</th>
                    <th width="10%">Ảnh</th>
                    <th width="30%">Tên sản phẩm</th>
                    <th width="15%">Giá gốc</th>
                    <th width="10%">Lượt xem</th> <!-- New Column -->
                    <th width="15%">Danh mục</th>
                    <th width="15%" class="text-end">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($data['products_list']) && mysqli_num_rows($data['products_list']) > 0) {
                foreach ($data['products_list'] as $p) {
            ?>
                    <tr>
                        <td class="text-muted">#<?php echo $p['id']; ?></td>
                        <td>
                            <img src="/web_qlsp/Public/Picture/<?php echo $p['thumbnail']; ?>"
                                width="50" height="50"
                                style="object-fit: cover; border-radius: 4px; border: 1px solid #eee;">
                        </td>
                        <td>
                            <div class="fw-bold text-dark"><?php echo $p['name']; ?></div>
                            <small class="text-muted"><?php echo $p['slug']; ?></small>
                        </td>
                        <td class="fw-bold"><?php echo number_format($p['base_price']); ?>đ</td>

                        <!-- View count -->
                        <td>
                            <div class="d-flex align-items-center text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16" class="me-1">
                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                </svg>
                                <?php echo number_format($p['views']); ?>
                            </div>
                        </td>

                        <td>
                            <span class="badge bg-light text-dark border">
                                <?php echo $p['category_name']; ?>
                            </span>
                        </td>

                        <td class="text-end">
                            <a href="http://localhost/web_qlsp/product_list/sua/<?php echo $p['id']; ?>" class="btn-icon text-primary me-1" title="Sửa">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                </svg>
                            </a>

                            <a href="http://localhost/web_qlsp/product_list/delete/<?php echo $p['id']; ?>"
                                class="btn-icon text-danger"
                                onclick="return confirm('Bạn chắc chắn muốn xóa?')"
                                title="Xóa">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a href="product_variants.php?id=<?php echo $p['id']; ?>"
                                class="btn-icon text-dark"
                                title="Biến thể">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                    <path d="M16.555 5.412a8.028 8.028 0 0 0-3.503-2.81 14.899 14.899 0 0 1 1.663 4.472 8.547 8.547 0 0 0 1.84-1.662ZM13.326 7.825a13.43 13.43 0 0 0-2.413-5.773 8.087 8.087 0 0 0-1.826 0 13.43 13.43 0 0 0-2.413 5.773A8.473 8.473 0 0 0 10 8.5c1.18 0 2.304-.24 3.326-.675ZM6.514 9.376A9.98 9.98 0 0 0 10 10c1.226 0 2.4-.22 3.486-.624a13.54 13.54 0 0 1-.351 3.759A13.54 13.54 0 0 1 10 13.5c-1.079 0-2.128-.127-3.134-.366a13.538 13.538 0 0 1-.352-3.758ZM5.285 7.074a14.9 14.9 0 0 1 1.663-4.471 8.028 8.028 0 0 0-3.503 2.81c.529.638 1.149 1.199 1.84 1.66ZM17.334 6.798a7.973 7.973 0 0 1 .614 4.115 13.47 13.47 0 0 1-3.178 1.72 15.093 15.093 0 0 0 .174-3.939 10.043 10.043 0 0 0 2.39-1.896ZM2.666 6.798a10.042 10.042 0 0 0 2.39 1.896 15.196 15.196 0 0 0 .174 3.94 13.472 13.472 0 0 1-3.178-1.72 7.973 7.973 0 0 1 .615-4.115ZM10 15c.898 0 1.778-.079 2.633-.23a13.473 13.473 0 0 1-1.72 3.178 8.099 8.099 0 0 1-1.826 0 13.47 13.47 0 0 1-1.72-3.178c.855.151 1.735.23 2.633.23ZM14.357 14.357a14.912 14.912 0 0 1-1.305 3.04 8.027 8.027 0 0 0 4.345-4.345c-.953.542-1.971.981-3.04 1.305ZM6.948 17.397a8.027 8.027 0 0 1-4.345-4.345c.953.542 1.971.981 3.04 1.305a14.912 14.912 0 0 0 1.305 3.04Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        Không tìm thấy sản phẩm nào.
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>