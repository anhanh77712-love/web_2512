<?php
class vouchers extends controllers {
    private $vouchers;
    function __construct() {
        $this->vouchers = $this->model('vouchers_m');
    }
    function Get_data() {
        $this->view('Master', [
            'Page' => 'vouchers_v',
            'vouchers_list' => $this->vouchers->vouchers_selectAll()
        ]);
    }
    function add() {
        if (isset($_POST['btnAddVoucher'])) {
            $code = $_POST['code'];
            $discount_type = $_POST['type'];
            $discount_value = $_POST['value'];
            $min_order_value = $_POST['min_order'];

            // Validate
            if (empty($code)) {
                echo "<script>alert('Mã voucher không được để trống'); window.location.href='/web_qlsp/vouchers';</script>";
                return;
            } else {
                // Insert DB
                $kq = $this->vouchers->vouchers_insert($code, $discount_type, $discount_value, $min_order_value);

                if ($kq) {
                    echo "<script>alert('Thêm voucher thành công'); window.location.href='/web_qlsp/vouchers';</script>";
                } else {
                    echo "<script>alert('Thêm voucher thất bại'); window.location.href='/web_qlsp/vouchers';</script>";
                }
            }
        }
    }
    function delete($id) {
        $kq = $this->vouchers->vouchers_delete($id);
        if ($kq) {
            echo "<script>alert('Xóa voucher thành công'); window.location.href='/web_qlsp/vouchers';</script>";
        } else {
            echo "<script>alert('Xóa voucher thất bại'); window.location.href='/web_qlsp/vouchers';</script>";
        }
    }
}
