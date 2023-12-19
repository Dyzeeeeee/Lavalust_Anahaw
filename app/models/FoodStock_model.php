<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class FoodStock_model extends Model
{
    public function getFoodStocks()
    {
        return $this->db->table('food_stocks')->get_all();
    }

    public function updateFoodStock($foodStockId, $updateData)
    {
        // Assuming 'food_stocks' is your table name
        $this->db->table('food_stocks')->where('id', $foodStockId)->update($updateData);
    }

    public function getFoodStockById($foodStockId)
    {
        // Assuming 'food_stocks' is your table name
        return $this->db->table('food_stocks')->where('id', $foodStockId)->get()->row();
    }

    public function addFoodStock($data)
    {
        // Insert into the 'food_stocks' table
        $this->db->table('food_stocks')->insert($data);
    }

    public function deleteFoodStock($foodStockId)
    {
        // Assuming 'food_stocks' is your table name
        $this->db->table('food_stocks')->where('id', $foodStockId)->delete();
    }
}
