<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Accounts_model extends Model
{


    public function register($firstname, $lastname, $email, $password)
    {
        $bind = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $password,
        );

        $this->db->table('accounts')->insert($bind);
    }


    public function getUserByEmail($email)
    {
        $result = $this->db->table('accounts')
            ->select('*')
            ->where('email', $email)
            ->get();

        return $result;
    }

}
?>