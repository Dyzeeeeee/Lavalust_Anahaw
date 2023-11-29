<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Admin_controller extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->call->model('Menu_model');
    }

    public function dashboard()
    {

        $this->call->view('admin/dashboard');
    }

    public function menu()
    {
        $data = [
            'menu' => $this->Menu_model->getMenu()
        ];

        $this->call->view('admin/menu', $data);
    }
}
?>