<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Menu_model extends Model
{
    public function getMenuWithCategories()
    {
        // Perform a SQL join to get menu items with category names
        return $this->db->raw("
            SELECT menu_item.*, menu_category.name as category_name
            FROM menu_item
            LEFT JOIN menu_category ON menu_item.category_id = menu_category.id
        ");
    }
}
