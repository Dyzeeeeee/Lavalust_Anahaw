<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Register_controller extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->call->model('Accounts_model');
    }

    public function index()
    {
        // $data = [
        //     'menu' => $this->Menu_model->getMenu()
        // ];

        $this->call->view('register');
    }

    public function register()
    {

        $firstname = $this->io->post('firstname');
        $lastname = $this->io->post('lastname');
        $email = $this->io->post('email');
        $password = $this->io->post('password');

        // Hash the password using bcrypt
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $this->Accounts_model->register($firstname, $lastname, $email, $hashedPassword);
        redirect('/');
    }
}
?>