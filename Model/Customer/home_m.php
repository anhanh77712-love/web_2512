<?php
class home_m extends connectDB {
    function __construct() {
        parent::__construct();
    }
    
    function categories_selectAll() {
        $sql = "SELECT * FROM categories ORDER BY id ASC";
        return mysqli_query($this->con, $sql);
    }
    
    function banners_getActive() {
        $sql = "SELECT * FROM banners WHERE status=1 ORDER BY display_order ASC";
        return mysqli_query($this->con, $sql);
    }
    
    function sections_getActive() {
        $sql = "SELECT * FROM home_sections WHERE status=1 ORDER BY display_order ASC";
        return mysqli_query($this->con, $sql);
    }
    
    function products_getByCollection($collection_id, $limit = 4) {
        $sql = "SELECT * FROM products WHERE collection_id=$collection_id LIMIT $limit";
        return mysqli_query($this->con, $sql);
    }
    
    function collection_getSlug($collection_id) {
        $sql = "SELECT slug FROM collections WHERE id=$collection_id";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row ? $row['slug'] : '';
    }
}