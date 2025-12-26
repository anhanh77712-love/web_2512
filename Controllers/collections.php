<?php
class collections extends controllers {
    private $collec;
    function __construct() {
        $this->collec = $this->model("collections_m");
    }
    function Get_data() {
        $this->view('Master', [
            'Page' => 'collections_v',
            'collections_list' => $this->collec->collections_selectAll()
        ]);
    }
    function add() {
        if (isset($_POST['add_collection'])) {
            $name = $_POST['name'];
            $slug = $_POST['slug'];

            // Validate
            if (empty($name)) {
                echo "<script>alert('Tên bộ sưu tập không được để trống'); window.location.href='/web_qlsp/collections';</script>";
                return;
            } else {
                $thumbnail = '';
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/web_qlsp/Public/Picture/collections/";
                    $file_name = time() . '_' . basename($_FILES["image"]["name"]);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $file_name)) {
                        $thumbnail = $file_name;
                    }
                }
                // Insert DB
                $kq = $this->collec->collections_insert($name, $slug, $thumbnail);

                if ($kq) {
                    echo "<script>alert('Thêm bộ sưu tập thành công'); window.location.href='/web_qlsp/collections';</script>";
                } else {
                    echo "<script>alert('Thêm bộ sưu tập thất bại'); window.location.href='/web_qlsp/collections';</script>";
                }
            }
        }
    }
    function update() {
        if (isset($_POST['edit_collection'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $old_image = $_POST['old_image'];

            // Validate
            if (empty($name)) {
                echo "<script>alert('Tên bộ sưu tập không được để trống'); window.location.href='/web_qlsp/collections';</script>";
                return;
            } else {
                // Xử lý upload ảnh mới
                $thumbnail = $old_image; // Giữ ảnh cũ
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/web_qlsp/Public/Picture/collections/";
                    $file_name = time() . '_' . basename($_FILES["image"]["name"]);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $file_name)) {
                        $thumbnail = $file_name;
                    }
                }
                // Update DB
                $kq = $this->collec->collections_update($id, $name, $slug, $thumbnail);

                if ($kq) {
                    echo "<script>alert('Cập nhật bộ sưu tập thành công'); window.location.href='/web_qlsp/collections';</script>";
                } else {
                    echo "<script>alert('Cập nhật bộ sưu tập thất bại'); window.location.href='/web_qlsp/collections';</script>";
                }
            }
        }
    }
    function delete($id) {
        $kq = $this->collec->collections_delete($id);
        if ($kq) {
            echo "<script>alert('Xóa bộ sưu tập thành công'); window.location.href='/web_qlsp/collections';</script>";
        } else {
            echo "<script>alert('Xóa bộ sưu tập thất bại'); window.location.href='/web_qlsp/collections';</script>";
        }
    }
    function search() {
        if (isset($_POST['btnTimkiem'])) {
            $search = $_POST['txtSearch'];
            $this->view('Master', [
                'Page' => 'collections_v',
                'collections_list' => $this->collec->collections_select($search),
                'search' => $search
            ]);
        }
         else if(isset($_POST['btnXuat'])){
        $objExcel = new PHPExcel();
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('Bo_Suu_Tap');

        // 1. Tạo tiêu đề cột dựa trên bảng collections
        $rowCount = 1;
        $sheet->setCellValue('A'.$rowCount, 'ID');
        $sheet->setCellValue('B'.$rowCount, 'TÊN BỘ SƯU TẬP');
        $sheet->setCellValue('C'.$rowCount, 'SLUG');
        $sheet->setCellValue('D'.$rowCount, 'HÌNH ẢNH');
        $sheet->setCellValue('E'.$rowCount, 'TRẠNG THÁI');
        $sheet->setCellValue('F'.$rowCount, 'HIỆN TRANG CHỦ');
        
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);

        // 2. Lấy dữ liệu từ hàm collections_select($name) trong Model
        $name = $_POST['txtSearch'] ?? ''; 
        $data = $this->collec->collections_select($name); 

        if($data){
            while($row = mysqli_fetch_array($data)){
                $rowCount++;
                $sheet->setCellValue('A'.$rowCount, $row['id']);
                $sheet->setCellValue('B'.$rowCount, $row['name']);
                $sheet->setCellValue('C'.$rowCount, $row['slug']);
                $sheet->setCellValue('D'.$rowCount, $row['thumbnail']);
                $sheet->setCellValue('E'.$rowCount, ($row['status'] == 1 ? 'Bật' : 'Tắt'));
                $sheet->setCellValue('F'.$rowCount, ($row['show_home'] == 1 ? 'Có' : 'Không'));
            }
        }

        foreach(range('A','F') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // 3. Xuất file
        $filename = "Bo_Suu_Tap_" . time() . ".xlsx";
        if (ob_get_length()) ob_end_clean();

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
    }
}