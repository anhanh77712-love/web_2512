<?php
class register extends controllers {
    private $userModel;

    function __construct() {
        // Khởi tạo Model xử lý người dùng
        $this->userModel = $this->model("users_m");
    }

    // Hàm xử lý dữ liệu từ Modal gửi lên
   
    function do_register() {
    if (isset($_POST['btn_register'])) {
        // Lấy dữ liệu từ Form
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        
        $province_code = $_POST['province_code'];
        $district_code = $_POST['district_code'];
        $ward_code = $_POST['ward_code'];
        $address_detail = $_POST['address_detail'];

        $google_id = $_POST['google_id'] ?? "";
        $avatar = $_POST['avatar'] ?? "default.png";

        // Gọi hàm insert mới (bỏ qua role và points)
        $kq = $this->userModel->users_insert_default(
            $full_name, $email, $phone, $password, 
            $google_id, $avatar, 
            $province_code, $district_code, $ward_code, $address_detail
        );

        if ($kq) {
            echo " <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script> 
            <script> window.onload = function() 
            { Swal.fire(
             { title: 'Thành công!', text: 'Đăng ký tài khoản thành công.', icon: 'success', confirmButtonText: 'OK', confirmButtonColor: '#3085d6' }).then((result) => { if (result.isConfirmed) { window.location.href = '/web_qlsp/home'; } }); }; </script>";


        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            
            <script> window.onload = function() 
            { Swal.fire( { title: 'Lỗi!', text: 'Đăng ký tài khoản thất bại. Vui lòng thử lại.', icon: 'error', confirmButtonText: 'OK', confirmButtonColor: '#d33' }).then((result) => { if (result.isConfirmed) { window.location.href = '/web_qlsp/home'; } }); }; </script>";
            die(); 
        }
    }
}
}
?>