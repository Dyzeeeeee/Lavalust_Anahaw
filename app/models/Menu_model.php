<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Menu_model extends Model
{
    public function getMenu()
    {
        return $this->db->table('menu')->get_all();
    }

    public function updateMenuItem($menuId, $updateData)
    {
        // Assuming 'menu' is your table name
        $this->db->table('menu')->where('id', $menuId)->update($updateData);
    }

    public function getMenuItemById($menuId)
    {
        // Assuming 'menu' is your table name
        return $this->db->table('menu')->where('id', $menuId)->get()->row();
    }

    public function addMenuItem($data)
    {
        // Insert into the 'menu' table
        $this->db->table('menu')->insert($data);
    }

}
