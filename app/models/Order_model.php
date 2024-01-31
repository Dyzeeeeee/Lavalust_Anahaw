<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Order_model extends Model
{


    public function addOrder($data)
    {
        // Insert into the 'menu' table
        $this->db->table('orders')->insert($data);
    }

    public function getOrders()
    {
        return $this->db->table('orders')->get_all();
    }

    public function getLastInsertedOrderId()
    {
        // Retrieve the highest order ID
        $this->db->table('orders')->select_max('id')->get();

    }

    public function getOrder()
    {
        return $this->db->table('orders')->get_all();
    }
}
