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

    public function service()
    {
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData
        ];
        $this->call->view('website/service', $data);
    }

    public function event()
    {
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData
        ];
        $this->call->view('website/event', $data);
    }

    public function menu()
    {
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData
        ];
        $this->call->view('website/menu', $data);
    }

    public function book()
    {
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData
        ];
        $this->call->view('website/book', $data);
    }

    public function blog()
    {
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData
        ];
        $this->call->view('website/blog', $data);
    }
    public function team()
    {
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData
        ];
        $this->call->view('website/team', $data);
    }

    public function testimonial()
    {
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData
        ];
        $this->call->view('website/testimonial', $data);
    }
}
