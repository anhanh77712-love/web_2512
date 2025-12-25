<?php
class orders extends controllers {
    function Get_data() {
        $this->view('Master', [
            'Page' => 'orders_v'
        ]);
    }
}
