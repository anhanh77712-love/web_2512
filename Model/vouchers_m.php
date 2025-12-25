<?php
class vouchers_m extends connectDB {
    function __construct() {
        parent::__construct();
    }
    function vouchers_selectAll() {
        $sql = "SELECT * FROM vouchers ORDER BY id DESC";
        return mysqli_query($this->con, $sql);
    }
    function vouchers_insert($code, $discount_type, $discount_value, $min_order_value) {
        $sql = "INSERT INTO vouchers (code, discount_type, discount_value, min_order_value) 
                VALUES ('$code', '$discount_type', $discount_value, $min_order_value)";
        return mysqli_query($this->con, $sql);
    }
    function vouchers_delete($id) {
        $sql = "DELETE FROM vouchers WHERE id=$id";
        return mysqli_query($this->con, $sql);
    }
}