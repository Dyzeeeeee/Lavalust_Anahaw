<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Account_controller extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->call->model('Accounts_model');
    }
}
