<?php
class users extends controllers {
    private $user;
    function __construct() {
        $this->user = $this->model('users_m');
    }
    function Get_data() {
        $this->view('Master', [
            'Page' => 'users_v',
            'users_list' => $this->user->users_selectAll()
        ]);
    }
    
    function delete($id) {
        $kq = $this->user->users_delete($id);
        if($kq) {
            echo "<script>alert('Xóa khách hàng thành công'); window.location.href='/web_qlsp/users';</script>";
        } else {
            echo "<script>alert('Xóa khách hàng thất bại'); window.location.href='/web_qlsp/users';</script>";
        }
    }
}
