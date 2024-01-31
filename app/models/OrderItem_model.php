<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class OrderItem_model extends Model
{

    public function addOrderItem($orderId, $itemName, $quantity, $price)
    {
        $data = [
            'order_id' => $orderId,
            'menu_item' => $itemName,
            'quantity' => $quantity,
            'total_price' => $price,
        ];
        var_dump($data);
        // Insert the order item into the order_items table
        $this->db->table('order_items')->insert( $data);
    }

    public function getOrderItems()
    {
        return $this->db->table('order_items')->get_all();
    }
}
