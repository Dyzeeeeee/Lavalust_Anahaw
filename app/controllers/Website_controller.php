<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Website_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('Menu_model');
    }

    public function index()
    {
        $userData = $this->session->userdata();

        $data = [
            'menu' => $this->Menu_model->getMenu(),
            'user' => $userData
        ];
        $this->call->view('website/index', $data);
    }

    public function about()
    {
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData
        ];
        $this->call->view('website/about', $data);
    }
}
