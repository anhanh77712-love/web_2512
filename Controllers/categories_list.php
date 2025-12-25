<?php
class categories_list extends controllers{
    private $ctlist;
    function __construct(){
        $this->ctlist=$this->model("categories_m");
    }
    function Get_data(){
        $this->view('Master',[
            'Page'=>'categories_list_v',
            'categories_list'=>$this->ctlist->categories_selectAll()
        ]);
    }
    function add(){
        if(isset($_POST['add_category'])){
            $name = $_POST['name'];
            $slug = $_POST['slug'];

            // Validate
            if(empty($name)){
                echo "<script>alert('Tên danh mục không được để trống'); window.location.href='/web_qlsp/categories_list';</script>";
                return;
            } else {
                $thumbnail = '';
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/web_qlsp/Public/Picture/categories/";
                    $file_name = time() . '_' . basename($_FILES["image"]["name"]);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $file_name)) {
                        $thumbnail = $file_name;
                    }
                }
                // Insert DB
                $kq = $this->ctlist->categories_insert($name, $slug, $thumbnail);

                if($kq){
                    echo "<script>alert('Thêm danh mục thành công'); window.location.href='/web_qlsp/categories_list';</script>";
                } else {
                    echo "<script>alert('Thêm danh mục thất bại'); window.location.href='/web_qlsp/categories_list';</script>";
                }
            }
        }
    }
    function update(){
        if(isset($_POST['edit_category'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $old_image = $_POST['old_image'];

            // Validate
            if(empty($name)){
                echo "<script>alert('Tên danh mục không được để trống'); window.location.href='/web_qlsp/categories_list';</script>";
                return;
            } else {
                // Xử lý upload ảnh mới
                $thumbnail = $old_image; // Giữ ảnh cũ
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/web_qlsp/Public/Picture/categories/";
                    $file_name = time() . '_' . basename($_FILES["image"]["name"]);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $file_name)) {
                        $thumbnail = $file_name;
                        // Xóa ảnh cũ nếu có
                        if(!empty($old_image) && file_exists($target_dir . $old_image)){
                            unlink($target_dir . $old_image);
                        }
                    }
                }

                // Update DB
                $kq = $this->ctlist->categories_update($id, $name, $slug, $thumbnail);

                if($kq){
                    echo "<script>alert('Cập nhật danh mục thành công'); window.location.href='/web_qlsp/categories_list';</script>";
                } else {
                    echo "<script>alert('Cập nhật danh mục thất bại'); window.location.href='/web_qlsp/categories_list';</script>";
                }
            }
        }
    }
    function delete($id){
        $kq = $this->ctlist->categories_delete($id);
        if($kq){
            echo "<script>alert('Xóa danh mục thành công'); window.location.href='/web_qlsp/categories_list';</script>";
        } else {
            echo "<script>alert('Xóa danh mục thất bại'); window.location.href='/web_qlsp/categories_list';</script>";
        }
    }
    function search(){
        if(isset($_POST['btnTimkiem'])){
            $search=$_POST['txtSearch'];
            $this->view('Master',[
                'Page'=>'categories_list_v',
                'categories_list'=>$this->ctlist->categories_select($search),
                'search'=>$search
            ]);
        }
    }
}