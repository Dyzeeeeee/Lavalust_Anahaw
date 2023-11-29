<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Login_controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->call->model('Accounts_model');
    }
    public function index()
    {
        $this->call->view('login');
    }

    public function login()
    {
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('email')
                ->required()
                ->valid_email()
                ->name('password')
                ->required();

            if ($this->form_validation->run()) {
                $email = $this->io->post('email');
                $password = $this->io->post('password');

                $user = $this->Accounts_model->getUserByEmail($email);

                if (!empty($user) && password_verify($password, $user['password'])) {
                    // Password is correct, perform login
                    // You might want to set user sessions or perform any other authentication logic
                    redirect('/'); // Redirect to the dashboard or any other authenticated page
                } else {
                    echo "Invalid email or password";
                }
            }
        }
    }
}
?>