<?php
class overview extends controllers{
    private $ov;
    function __construct(){
        $this->ov=$this->model("overview_m");
    }
    function Get_data(){
        $this->view('Master',[
            'Page'=>'overview_v',
            'total_orders' => $this->ov->countOrders(),
            'total_customers' => $this->ov->countCustomers(),
            'total_products' => $this->ov->countProducts()
            // 'monthly_revenue' => $this->ov->getMonthlyRevenue()
        ]);
    }
}
