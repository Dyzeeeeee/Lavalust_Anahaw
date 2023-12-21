<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');


class Order_controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->call->model('Order_model');
    }
    public function validateOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate form data (add your validation logic)

            // Example: Assume you have input fields 'addName', 'addDescription', 'addPrice', 'addQuantity', 'addCategory'
            $totalPrice = $_POST['totalPrice'];

            // Insert the new menu item into the database
            $data = [
                'total_order_price' => $totalPrice,
            ];

            // Insert the menu item using the Menu_model
            $this->Order_model->addOrder($data);

            // Get the last inserted order ID
            $result = $this->db->table('orders')->select_max('id')->get();

            // Check if the result is not empty and has the key 'MAX(id)'
            if (!empty($result) && isset($result['MAX(id)'])) {
                // Extract the highest order ID from the result
                $orderId = $result['MAX(id)'];

                // Output the highest order ID
                // var_dump($orderId);

                // Redirect to the validated page with the latest order ID
                redirect("/admin/pos/validated/" . $orderId);
            } else {
                // Handle the case where no order is found or 'MAX(id)' key is not present
                echo "No valid order ID found.";
            }
        } else {
            // If not a POST request, show the add form
            $this->call->view('admin/POS/payment');
        }
    }
}
