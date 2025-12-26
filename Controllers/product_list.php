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
        // PHẦN XUẤT EXCEL
    else if(isset($_POST['btn-success'])){
        // Không cần require lại nếu đã có trong bridge.php
        // Kiểm tra xem class đã tồn tại chưa để tránh lỗi trắng trang
        if (!class_exists('PHPExcel')) {
            die("Lỗi: Thư viện PHPExcel chưa được nạp. Hãy kiểm tra lại file bridge.php");
        }

        $objExcel = new PHPExcel();
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('Data_Products');

        // 1. Tiêu đề các cột (Khớp 100% với database của bạn)
        $rowCount = 1;
        $columns = [
            'A'=>'ID', 'B'=>'Category ID', 'C'=>'Collection ID', 'D'=>'Tên sản phẩm',
            'E'=>'Slug', 'F'=>'Mô tả', 'G'=>'Giá gốc', 'H'=>'Giới tính',
            'I'=>'Ảnh (Thumbnail)', 'J'=>'Lượt xem', 'K'=>'Ngày tạo'
        ];

        foreach($columns as $col => $title) {
            $sheet->setCellValue($col.$rowCount, $title);
            $sheet->getStyle($col.$rowCount)->getFont()->setBold(true);
        }

        // 2. Lấy dữ liệu từ hàm tìm kiếm
        $keyword = $_POST['txtSearch'] ?? ''; 
        $data = $this->pdlist->products_select('',$keyword); 

        if($data){
            while($row = mysqli_fetch_array($data)){
                $rowCount++;
                $sheet->setCellValue('A'.$rowCount, $row['id']);
                $sheet->setCellValue('B'.$rowCount, $row['category_id']);
                $sheet->setCellValue('C'.$rowCount, $row['collection_id']);
                $sheet->setCellValue('D'.$rowCount, $row['name']);
                $sheet->setCellValue('E'.$rowCount, $row['slug']);
                $sheet->setCellValue('F'.$rowCount, $row['description']);
                $sheet->setCellValue('G'.$rowCount, $row['base_price']);
                $sheet->setCellValue('H'.$rowCount, $row['gender']);
                $sheet->setCellValue('I'.$rowCount, $row['thumbnail']);
                $sheet->setCellValue('J'.$rowCount, $row['views']);
                $sheet->setCellValue('K'.$rowCount, $row['created_at']);
            }
        }

        // Tự động căn chỉnh độ rộng cột
        foreach(range('A','K') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // 3. Xuất file và dọn dẹp bộ nhớ đệm
        $filename = "Export_Full_Products_" . time() . ".xlsx";
        
        // Xóa bộ nhớ đệm để tránh lỗi file Excel bị hỏng
        if (ob_get_length()) {
            ob_end_clean();
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
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
        
        // Nhúng thư viện SweetAlert2 nếu trang của bạn chưa có
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>'; // Nếu cần

        if($kq){
            echo "
            <script>
                $(document).ready(function(){
                    Swal.fire({
                        title: 'Đã xóa!',
                        text: 'Sản phẩm đã được xóa thành công.',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = '/web_qlsp/product_list';
                    });
                });
            </script>";
        } else {
            echo "
            <script>
                $(document).ready(function(){
                    Swal.fire({
                        title: 'Lỗi!',
                        text: 'Không thể xóa sản phẩm này.',
                        icon: 'error'
                    }).then(() => {
                        window.history.back();
                    });
                });
            </script>";
        }
    }
}