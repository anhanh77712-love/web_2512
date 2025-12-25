<?php
class collections_m extends connectDB {
    function __construct() {
        parent::__construct();
    }
    function collections_selectAll() {
        $sql = "SELECT * FROM collections ORDER BY id DESC";
        return mysqli_query($this->con, $sql);
    }
    function collections_insert($name, $slug, $thumbnail) {
        $sql = "INSERT INTO collections (name, slug, thumbnail) VALUES ('$name', '$slug', '$thumbnail')";
        return mysqli_query($this->con, $sql);
    }
    function collections_update($id, $name, $slug, $thumbnail) {
        $sql = "UPDATE collections SET name='$name', slug='$slug', thumbnail='$thumbnail' WHERE id=$id";
        return mysqli_query($this->con, $sql);
    }
    function collections_delete($id) {
        $sql = "DELETE FROM collections WHERE id=$id";
        return mysqli_query($this->con, $sql);
    }
    function collections_select($name) {
        $sql = "SELECT * FROM collections WHERE name LIKE '%$name%' ORDER BY id DESC";
        return mysqli_query($this->con, $sql);
    }
}