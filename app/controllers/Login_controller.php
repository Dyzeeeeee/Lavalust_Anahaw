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

                    // Store user data in session
                    $userData = array(
                        'firstName'  => $user['firstName'],
                        'id'  => $user['id'],
                        'email'     => $user['email'],
                        'lastName'     => $user['lastName'],
                        'role'     => $user['role'],
                        'logged_in' => TRUE
                    );

                    // Output session data for debugging
                    $this->session->set_userdata($userData);

                    if ($userData['role'] == 'user') {
                        redirect('/');
                    } else if ($userData['role'] == 'admin') {
                        redirect('/admin');
                    }

                    // redirect('/');
                } else {
                    echo "Invalid email or password";
                }
            }
        }
    }

    public function logout()
    {
        // Destroy the user session
        $this->session->sess_destroy();

        // Redirect to the login page or any other page you prefer
        redirect('/login');
    }
}
