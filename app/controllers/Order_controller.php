<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Order_controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->call->model('Order_model');
    }

    
}
