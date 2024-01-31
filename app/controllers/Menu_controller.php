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
            $category = $_POST['addCategory'];

            // Insert the new menu item into the database
            $addData = [
                'name' => $name,
                'description' => $description,
                'price' => $price,
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
    public function delete($menuId)
    {
        // Check if the request method is POST to avoid accidental deletion
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform the delete operation using the Menu_model
            $this->Menu_model->deleteMenuItem($menuId);

            // Redirect back to the menu page after deletion
            redirect('/admin/menu');
        } else {
            // If not a POST request, show the confirmation page

            // Fetch the menu item to be deleted
            $menuItem = $this->Menu_model->getMenuItemById($menuId);

            // Pass the menu item data to the view
            $data = ['menuItem' => $menuItem];
            $this->call->view('menu/delete_confirmation', $data);
        }
    }
    // Assuming you're using CodeIgniter or similar framework

    public function filterMenu()
    {
        $uniqueCategories = $this->Menu_model->getUniqueCategories();

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filterButton'])) {
            // Get the filter parameters
            $categoryFilter = $this->io->post('categoryFilter');

            // Check if the category filter is empty ("All")
            if (empty($categoryFilter)) {
                // Retrieve all menu items
                $filteredMenu = $this->Menu_model->getMenu();
            } else {
                // Implement your filtering logic (replace with your actual logic)
                $filteredMenu = $this->Menu_model->filterMenuByCategory($categoryFilter);
            }

            $userData = $this->session->userdata();

            // Pass the filtered menu to your view
            $data = [
                'menu' => $filteredMenu,
                'user' => $userData,
                'uniqueCategories' => $uniqueCategories,

            ];
            // Load your view with the filtered data
            $this->call->view('admin/menu', $data);
        } else {
            // Handle non-POST request (optional)
            redirect('/admin/menu'); // Redirect to the menu page if not a POST request
        }
    }
}
