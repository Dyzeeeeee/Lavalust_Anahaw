<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Menu_model extends Model
{
    public function getMenu()
    {
        return $this->db->table('menu')->get_all();
    }
}
