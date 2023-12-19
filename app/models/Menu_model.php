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

    public function deleteMenuItem($menuId)
    {
        // Assuming 'menu' is your table name
        $this->db->table('menu')->where('id', $menuId)->delete();
    }
    public function filterMenuByCategory($categoryFilter)
    {
        // Implement your database query to filter by category
        // Replace 'menu' with your actual menu table name

        $whereCondition = ['category' => $categoryFilter];
        $query = $this->db->table('menu')->where($whereCondition)->get_all();

        return $query;
    }

    public function getUniqueCategories()
    {
        // Assuming 'menu' is your table name
        $categories = $this->db->table('menu')->select('DISTINCT category')->get_all();

        // Extract category values from the result
        $uniqueCategories = array_column($categories, 'category');

        return $uniqueCategories;
    }
}
