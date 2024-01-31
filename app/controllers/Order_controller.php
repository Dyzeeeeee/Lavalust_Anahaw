<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');


require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Order_controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->call->model('Order_model');
        $this->call->model('OrderItem_model');
    }
    public function validateOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate form data (add your validation logic)

            $itemNames = $_POST['itemNames'];
            $itemQuantities = $_POST['itemQuantities'];
            $itemTotalPrices = $_POST['itemTotalPrices'];
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
                for ($i = 0; $i < count($itemNames); $i++) {
                    $this->OrderItem_model->addOrderItem(
                        $orderId,
                        $itemNames[$i],
                        $itemQuantities[$i],
                        $itemTotalPrices[$i]
                    );
                }
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

    public function print()
    {
        $userData = $this->session->userdata();

        $data = [
            'user' => $userData,
            'orders' => $this->Order_model->getOrders(),
            'order_items' => $this->OrderItem_model->getOrderItems(),
        ];
    }


    public function download($orderId)
    {

        require_once 'vendor/autoload.php';

        
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Load HTML content for the PDF
        // $html = $this->call->view('admin/pos/receipt', null, true);
        // var_dump($html);
        ob_start();
        include $_SERVER['DOCUMENT_ROOT'] . '/lavalust/lavalust_anahaw1/app/views/admin/pos/receipt.php';
        $html = ob_get_clean();

        $dompdf->loadHtml($html);

        // Set paper size (A4)
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first pass to get the total pages)
        $dompdf->render();

        // Output to browser
        $dompdf->stream('order-' . $orderId . '-receipt.pdf', array('Attachment' => 1));

        
    }
}
