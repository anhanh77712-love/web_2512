<?php
class app
{       
    protected $controller = "Home";
    protected $action = "Get_data";
    protected $params = [];
    function __construct()
    {
        $arr = $this->processURL();
        //Xử lý controller
        if ($arr != null) {
            // Kiểm tra trong folder Customer trước
            if (file_exists('./MVC/Controllers/Customer/' . $arr[0] . '.php')) {
                include_once './MVC/Core/controllers_customer.php';
                include_once './MVC/Controllers/Customer/' . $arr[0] . '.php';
                $this->controller = $arr[0];
                unset($arr[0]);
            }
            // Nếu không có trong Customer thì tìm trong Controllers chính
            elseif (file_exists('./MVC/Controllers/' . $arr[0] . '.php')) {
                include_once './MVC/Controllers/' . $arr[0] . '.php';
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        } else {
            // Default controller
            include_once './MVC/Controllers/' . $this->controller . '.php';
        }
        
        $this->controller = new $this->controller;
        //Xử lý action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
                unset($arr[1]);
            }
        }
        //Xử lý param
        $this->params = $arr ? array_values($arr) : [];
        //Tạo biến có 3 tham số
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
    function processURL()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url']), FILTER_DEFAULT));
        }
    }
}
