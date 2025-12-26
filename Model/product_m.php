<?php
class product_m extends connectDB {
    function __construct() {
        parent::__construct();
    }
    function categories_selectAll() {
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        return mysqli_query($this->con, $sql);
    }
    function collections_selectAll() {
        $sql = "SELECT * FROM collections ORDER BY id DESC";
        return mysqli_query($this->con, $sql);
    }
    // function products_insert($name, $slug, $price, $category_id, $collection_id, $description, $thumbnail) {
    //     $sql = "INSERT INTO products (name, slug, base_price, category_id, collection_id, description, thumbnail) 
    //             VALUES ('$name', '$slug', $price, $category_id, $collection_id, '$description', '$thumbnail')";
    //     return mysqli_query($this->con, $sql);
    // }
    function products_insert($name, $slug, $price, $category_id, $collection_id, $description, $thumbnail) {
        // 1. Làm sạch chuỗi để tránh lỗi dấu nháy (như lỗi 'Chất liệu vải...' bạn gặp)
        $name = mysqli_real_escape_string($this->con, $name);
        $slug = mysqli_real_escape_string($this->con, $slug);
        $description = mysqli_real_escape_string($this->con, $description);
        $thumbnail = mysqli_real_escape_string($this->con, $thumbnail);

        // 2. Xử lý giá trị số (ép kiểu để tránh lỗi nếu dữ liệu trống)
        $price = !empty($price) ? $price : 0;
        $category_id = !empty($category_id) ? (int)$category_id : "NULL";
        
        // Nếu collection_id trống thì gán giá trị NULL trong SQL
        $collection_id = !empty($collection_id) ? (int)$collection_id : "NULL";

        // 3. Viết lại câu lệnh SQL
        // Lưu ý: $price, $category_id, $collection_id không để trong dấu nháy đơn nếu là số
        $sql = "INSERT INTO products (name, slug, base_price, category_id, collection_id, description, thumbnail) 
                VALUES ('$name', '$slug', $price, $category_id, $collection_id, '$description', '$thumbnail')";

        return mysqli_query($this->con, $sql);
    }
    function products_select($id, $name) {
        $sql = "SELECT p.*, c.name as category_name 
                        FROM products p 
                        LEFT JOIN categories c ON p.category_id = c.id 
                        WHERE p.id LIKE '%$id%' AND p.name LIKE '%$name%'
                        ORDER BY p.id DESC";
        return mysqli_query($this->con, $sql);
    }
    function products_update($id, $name, $slug, $price, $category_id, $collection_id, $description, $thumbnail) {
        $sql = "UPDATE products 
                SET name='$name', slug='$slug', base_price=$price, category_id=$category_id, 
                    collection_id=$collection_id, description='$description', thumbnail='$thumbnail' 
                WHERE id=$id";
        return mysqli_query($this->con, $sql);
    }
    function products_delete($id) {
        $sql = "DELETE FROM products WHERE id=$id";
        return mysqli_query($this->con, $sql);
    }
}