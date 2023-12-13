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
        $userData = $this->session->userdata();

        $data = [
            'menu' => $this->Menu_model->getMenu(),
            'user' => $userData
        ];
        $this->call->view('admin/dashboard', $data);
    }



    public function menu()
    {
        // Get all menu items with category names using a SQL join
        $userData = $this->session->userdata();

        $data = [
            'menu' => $this->Menu_model->getMenu(),
            'user' => $userData
        ];

        $this->call->view('admin/menu', $data);
    }
}
