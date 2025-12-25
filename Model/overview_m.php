<?php
class overview_m extends connectDB
{
    function __construct(){
        parent::__construct();
    }
    
      // Đếm tổng số đơn hàng
    function countOrders() {
        $sql = "SELECT COUNT(*) as total FROM orders";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
    
    // Đếm tổng số khách hàng (không tính admin)
    function countCustomers() {
        $sql = "SELECT COUNT(*) as total FROM users WHERE role != 'admin'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
    
    // Đếm tổng số sản phẩm
    function countProducts() {
        $sql = "SELECT COUNT(*) as total FROM products";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
    
    // Tính tổng doanh thu tháng này
    // function getMonthlyRevenue() {
    //     $sql = "SELECT SUM(total_amount) as revenue FROM orders 
    //             WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) 
    //             AND YEAR(created_at) = YEAR(CURRENT_DATE())
    //             AND status = 'completed'";
    //     $result = mysqli_query($this->con, $sql);
    //     $row = mysqli_fetch_assoc($result);
    //     return $row['revenue'] ?? 0;
    // }
}
?>