<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class FoodStock_controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->call->model('FoodStock_model');
    }

    public function index()
    {
        // Fetch all food stocks from the database

    }

    public function edit($foodStockId)
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate form data (add your validation logic)

            // Example: Assume you have input fields 'ingredient_name', 'quantity', 'unit_of_measurement', 'purchase_date', 'expiration_date', 'supplier_name'
            $ingredientName = $_POST['ingredientName'];
            $quantity = $_POST['quantity'];
            $unitOfMeasurement = $_POST['unitOfMeasurement'];
            $purchaseDate = $_POST['purchaseDate'];
            $expirationDate = $_POST['expirationDate'];
            $supplierName = $_POST['supplierName'];

            // Update the food stock in the database
            $updateData = [
                'ingredient_name' => $ingredientName,
                'quantity' => $quantity,
                'unit_of_measurement' => $unitOfMeasurement,
                'purchase_date' => $purchaseDate,
                'expiration_date' => $expirationDate,
                'supplier_name' => $supplierName,
            ];

            // Update the food stock using the FoodStock_model
            $this->FoodStock_model->updateFoodStock($foodStockId, $updateData);

            // Redirect back to the food stocks page after editing
            redirect('/admin/inventory/food-stocks');
        } else {
            // If not a POST request, show the edit form

            // Fetch the food stock to be edited
            $foodStock = $this->FoodStock_model->getFoodStockById($foodStockId);

            // Pass the food stock data to the view
            $data = ['foodStock' => $foodStock];
            $this->call->view('/admin/food-stocks/edit', $data);
        }
    }

    public function add()
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate form data (add your validation logic)

            // Example: Assume you have input fields 'ingredient_name', 'quantity', 'unit_of_measurement', 'purchase_date', 'expiration_date', 'supplier_name'
            $ingredientName = $_POST['ingredientName'];
            $quantity = $_POST['quantity'];
            $unitOfMeasurement = $_POST['unitOfMeasurement'];
            $purchaseDate = $_POST['purchaseDate'];
            $expirationDate = $_POST['expirationDate'];
            $supplierName = $_POST['supplierName'];

            // Insert the new food stock into the database
            $addData = [
                'ingredient_name' => $ingredientName,
                'quantity' => $quantity,
                'unit_of_measurement' => $unitOfMeasurement,
                'purchase_date' => $purchaseDate,
                'expiration_date' => $expirationDate,
                'supplier_name' => $supplierName,
            ];

            // Insert the food stock using the FoodStock_model
            $this->FoodStock_model->addFoodStock($addData);

            // Redirect back to the food stocks page after adding
            redirect('/admin/inventory/food-stocks');
        } else {
            // If not a POST request, show the add form
            $this->call->view('/admin/inventory/food-stocks/add');
        }
    }

    public function delete($foodStockId)
    {
        // Check if the request method is POST to avoid accidental deletion
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform the delete operation using the FoodStock_model
            $this->FoodStock_model->deleteFoodStock($foodStockId);

            // Redirect back to the food stocks page after deletion
            redirect('/admin/inventory/food-stocks');
        } else {
            // If not a POST request, show the confirmation page

            // Fetch the food stock to be deleted
            $foodStock = $this->FoodStock_model->getFoodStockById($foodStockId);

            // Pass the food stock data to the view
            $data = ['foodStock' => $foodStock];
            $this->call->view('food-stocks/delete_confirmation', $data);
        }
    }
}
