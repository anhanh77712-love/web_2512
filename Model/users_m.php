<?php
class users_m extends connectDB {
    function __construct() {
        parent::__construct();
    }
    function users_selectAll() {
        $sql = "SELECT * FROM users WHERE role != 'admin' ORDER BY id ASC";
        return mysqli_query($this->con, $sql);
    }
    
    function users_delete($id) {
        $sql = "DELETE FROM users WHERE id=$id";
        return mysqli_query($this->con, $sql);
    }
     public function users_insert_default($full_name, $email, $phone, $password, $google_id, $avatar, $province, $district, $ward, $address) {
        // Câu lệnh SQL này hoàn toàn không có cột 'role' và 'points'
        $sql = "INSERT INTO users (full_name, email, phone, password, google_id, avatar, province_code, district_code, ward_code, address_detail) 
                VALUES ('$full_name', '$email', '$phone', '$password', '$google_id', '$avatar', '$province', '$district', '$ward', '$address')";
        
        return mysqli_query($this->con, $sql);
    }
    function users_checkLogin($email) {
        // Truy vấn lấy thông tin người dùng theo email
        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result); // Trả về mảng thông tin người dùng hoặc null
    }
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result);
    }

}