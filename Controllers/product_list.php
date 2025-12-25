<?php
class product_list extends controllers{
    private $pdlist;
    function __construct(){
        $this->pdlist=$this->model("product_m");
    }
    function Get_data(){
        $this->view('Master',[
            'Page'=>'product_list_v',
            'products_list'=>$this->pdlist->products_select('', ''),
        ]);
    }
    
    function search(){
        if(isset($_POST['btnTimkiem'])){
            $search=$_POST['txtSearch'];
            $this->view('Master',[
                'Page'=>'product_list_v',
                'products_list'=>$this->pdlist->products_select('', $search),
                'search'=>$search
            ]);
        }
    }
    
    function sua($id){
        $this->view('Master',[
            'Page'=>'product_edit_v',
            'item'=>$this->pdlist->products_select($id,''),
            'id'=>$id,
            'categories_list' => $this->pdlist->categories_selectAll(),
            'collections_list' => $this->pdlist->collections_selectAll()
        ]);
    }
    function update(){
        if(isset($_POST['btnLuu'])){
            // Lấy dữ liệu từ form
            $id = $_POST['id'];
            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $collection_id = $_POST['collection_id'];
            $description = $_POST['description'];

            // Validate
            if(empty($name)){
                echo "<script>alert('Tên sản phẩm không được để trống'); window.location.href='/web_qlsp/product_list/sua/$id';</script>";
                return;
            } else if(empty($price)){
                echo "<script>alert('Giá sản phẩm không được để trống'); window.location.href='/web_qlsp/product_list/sua/$id';</script>";
                return;
            } else {
                // Upload ảnh
                $thumbnail = '';
                if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0){
                    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/web_qlsp/Public/Picture/";
                    $file_name = time() . '_' . basename($_FILES["thumbnail"]["name"]);
                    if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_dir . $file_name)){
                        $thumbnail = $file_name;
                    }
                }

                // Cập nhật DB
                $kq = $this->pdlist->products_update($id, $name, $slug, $price, $category_id, $collection_id, $description, $thumbnail);

                if($kq){
                    echo "<script>alert('Cập nhật sản phẩm thành công'); window.location.href='/web_qlsp/product_list';</script>";
                } else {
                    echo "<script>alert('Cập nhật sản phẩm thất bại'); window.location.href='/web_qlsp/product_list/sua/$id';</script>";
                }
            }
        }
    }
    function delete($id){
        $kq = $this->pdlist->products_delete($id);
        if($kq){
            echo "<script>alert('Xóa sản phẩm thành công'); window.location.href='/web_qlsp/product_list';</script>";
        } else {
            echo "<script>alert('Xóa sản phẩm thất bại');</script>";
        }
    }
}