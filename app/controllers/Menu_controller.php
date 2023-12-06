<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Menu_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('Menu_model');
    }

    // public function index()
    // {
    //     $data = [
    //         'menu' => $this->Menu_model->getMenu()
    //     ];
    //     $this->call->view('website/index', $data);
    // }
}
