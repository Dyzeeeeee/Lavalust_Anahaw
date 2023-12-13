<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Menu_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('Menu_model');
    }

    public function index()
    {
    }


    public function edit($menuId)
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate form data (add your validation logic)

            // Example: Assume you have input fields 'name', 'description', 'price', 'quantity', 'category'
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $category = $_POST['category'];

            // Update the menu item in the database
            $updateData = [
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'quantity' => $quantity,
                'category' => $category,
            ];

            // Update the menu item using the Menu_model
            $this->Menu_model->updateMenuItem($menuId, $updateData);

            // Redirect back to the menu page after editing
            redirect('/admin/menu');
        } else {
            // If not a POST request, show the edit form

            // Fetch the menu item to be edited
            $menuItem = $this->Menu_model->getMenuItemById($menuId);

            // Pass the menu item data to the view
            $data = ['menuItem' => $menuItem];
            $this->call->view('menu/edit', $data);
            redirect('/admin/menu');
            // var_dump('nani');

        }
    }

    public function add()
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate form data (add your validation logic)

            // Example: Assume you have input fields 'addName', 'addDescription', 'addPrice', 'addQuantity', 'addCategory'
            $name = $_POST['addName'];
            $description = $_POST['addDescription'];
            $price = $_POST['addPrice'];
            $quantity = $_POST['addQuantity'];
            $category = $_POST['addCategory'];

            // Insert the new menu item into the database
            $addData = [
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'quantity' => $quantity,
                'category' => $category,
            ];

            // Insert the menu item using the Menu_model
            $this->Menu_model->addMenuItem($addData);

            // Redirect back to the menu page after adding
            redirect('/admin/menu');
        } else {
            // If not a POST request, show the add form
            $this->call->view('menu/add');
        }
    }
}
