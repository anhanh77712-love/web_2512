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
    function products_insert($name, $slug, $price, $category_id, $collection_id, $description, $thumbnail) {
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