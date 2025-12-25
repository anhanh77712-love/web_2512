<?php
class product_add extends controllers
{
    private $prd_add;
    function __construct()
    {
        $this->prd_add = $this->model("product_m");
    }
    function Get_data()
    {
        $this->view('Master', [
            'Page' => 'product_add_v',
            'categories_list' => $this->prd_add->categories_selectAll(),
            'collections_list' => $this->prd_add->collections_selectAll()
        ]);
    }
    function Add()
    {
        if (isset($_POST['btnLuu'])) {

            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $collection_id = $_POST['collection_id'];
            $description = $_POST['description'];

            // Validate
            if (empty($name)) {
                echo "<script>alert('Tên sản phẩm không được để trống');</script>";
            } else if (empty($price)) {
                echo "<script>alert('Giá sản phẩm không được để trống');</script>";
            } else {

                // Upload ảnh
                $thumbnail = '';
                if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
                    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/web_qlsp/Public/Picture/";
                    $file_name = time() . '_' . basename($_FILES["thumbnail"]["name"]);
                    if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_dir . $file_name)) {
                        $thumbnail = $file_name;
                    }
                }

                // Insert DB
                $kq = $this->prd_add->products_insert($name, $slug, $price, $category_id, $collection_id, $description, $thumbnail
                );

                if ($kq) {
                    echo "<script>alert('Thêm sản phẩm thành công'); window.location.href='product_list.php';</script>";
                } else {
                    echo "<script>alert('Thêm sản phẩm thất bại');</script>";
                }
            }
        }
    }
}
