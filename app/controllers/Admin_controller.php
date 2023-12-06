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
        // Get all menu items with category names using a SQL join
        $menuItems = $this->Menu_model->getMenuWithCategories();
    
        $data = [
            'menuItems' => $menuItems,
        ];
    
        $this->call->view('admin/menu', $data);
    }

  
    
}
