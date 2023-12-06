<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Email_model extends Model
{
    public function getSentEmails()
    {
        return $this->db->table('email')->get_all();
    }
    public function addSentEmail()
    {

    }
}
