<?php
class import extends controllers {
    private $imp;
    function __construct(){
        $this->imp=$this->model("overview_m");
    }
    function Get_data() {
        $this->view('Master', [
            'Page' => 'import_v'
        ]);
    }
}
