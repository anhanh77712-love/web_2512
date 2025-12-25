<?php
class home extends controllers_customer {
    private $home;
    private $menu_categories;
    private $provinces_model;
    
    function __construct() {
        $this->home = $this->model('home_m');
        $this->menu_categories = $this->model('master_customer_m');
        $this->provinces_model = $this->model('provinces_m');

    }

    function Get_data() {
         $list_provinces = $this->provinces_model->provinces_selectAll();
        $this->view('Master_customer', [
            'Page' => 'home_v',
            'menu_categories' => $this->menu_categories->categories_selectAll(),
            'banners' => $this->home->banners_getActive(),
            'sections' => $this->home->sections_getActive(),
            'home_model' => $this->home,
            'provinces' => $list_provinces
        ]);
    }
    // Hàm lấy Quận/Huyện cho Ajax
    function get_districts($p_code) {
        $districts = $this->provinces_model->districts_selectByProvince($p_code);
        echo '<option value="">Chọn Quận/Huyện</option>';
        while ($row = mysqli_fetch_assoc($districts)) {
            echo "<option value='".$row['code']."'>".$row['name']."</option>";
        }
    }

    // Hàm lấy Phường/Xã cho Ajax
    function get_wards($d_code) {
        $wards = $this->provinces_model->wards_selectByDistrict($d_code);
        echo '<option value="">Chọn Phường/Xã</option>';
        while ($row = mysqli_fetch_assoc($wards)) {
            echo "<option value='".$row['code']."'>".$row['name']."</option>";
        }
    }
}