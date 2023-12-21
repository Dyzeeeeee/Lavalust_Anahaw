<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Admin_controller extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->call->model('Menu_model');
        $this->call->model('Order_model');
        $this->call->model('FoodStock_model');
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
        $uniqueCategories = $this->Menu_model->getUniqueCategories();


        $data = [
            'menu' => $this->Menu_model->getMenu(),
            'user' => $userData,
            'uniqueCategories' => $uniqueCategories,
        ];

        $this->call->view('admin/menu', $data);
    }

    public function food_stocks()
    {
        // Get all menu items with category names using a SQL join
        $userData = $this->session->userdata();

        $data = [
            'foodStocks' => $this->FoodStock_model->getFoodStocks(),
            'user' => $userData
        ];

        $this->call->view('admin/inventory/food_stocks', $data);
    }

    public function session()
    {
        // Get all menu items with category names using a SQL join
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData,
            'menu' => $this->Menu_model->getMenu(),
        ];

        $this->call->view('admin/POS/session', $data);
    }

    public function payment()
    {
        // Get all menu items with category names using a SQL join
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData,
            'menu' => $this->Menu_model->getMenu(),
        ];

        $this->call->view('admin/POS/payment', $data);
    }



    public function validated($currentRouteId)
    {
        // Get all menu items with category names using a SQL join
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData,
            'menu' => $this->Menu_model->getMenu(),
            'orders' => $this->Order_model->getOrders(),
            'currentRouteId' => $currentRouteId
        ];

        $this->call->view('admin/POS/validated', $data);
    }
}
