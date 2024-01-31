<?php include __DIR__ . '/../include/head.php' ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include __DIR__ . '/../include/navbar.php' ?>
        <?php include __DIR__ . '/../include/sidebar.php' ?>

        <div class="content-wrapper">
            <section class="content-header bg-yellow mb-2">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Session</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="row">
                <!-- Left Side: Menu -->
                <div class="col-7 pl-4">
                    <div class="row">
                        <?php foreach ($menu as $mi) : ?>
                            <div class="col-md-4 col-lg-3">
                                <div class="card">
                                    <div class="d-flex justify-content-end">
                                        <a href="#" class="btn btn-success" onclick="addItem( '<?= $mi['name'] ?>', <?= $mi['price'] ?>)">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $mi['name'] ?></h5>
                                        <p class="card-text">Price: <?= $mi['price'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <!-- Right Side: Selected Items -->
                <div class="col-5 selected bg-white pr-4">
                    <div class="list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>SubTotal</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="selectedItemsTableBody">
                                <!-- Existing selected items will be displayed here -->
                            </tbody>
                        </table>
                    </div>

                    <div class="bg-grey" style="background-color: grey">
                        <p><b>Total: <span id="totalPrice">0.00</span></b></p>

                        <div class="actions bg-white justify-content-end text-end row p-2">
                            <a href="<?= site_url('/admin/pos/payment') ?>">
                                <button type="button" class="btn btn-success">
                                    Payment <i class="fas fa-angle-right"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- ... (your existing HTML) ... -->
<!-- ... (your existing HTML) ... -->

<script>
    // Load the items from local storage on page load
    document.addEventListener("DOMContentLoaded", function() {
        loadItemsFromLocalStorage();
    });

    function addItem(name, price) {
        var selectedItemsTableBody = document.getElementById('selectedItemsTableBody');
        var totalPriceElement = document.getElementById('totalPrice');

        // Check if the item is already in the list
        var existingItem = findExistingItem(name);

        if (existingItem) {
            // If the item exists, update its quantity and total price
            existingItem.quantity++;
            existingItem.totalPrice += parseFloat(price);
            existingItem.element.cells[1].innerText = existingItem.quantity;
            existingItem.element.cells[2].innerText = 'Php ' + existingItem.totalPrice.toFixed(2);
        } else {
            // If the item is not in the list, add a new table row
            var newRow = selectedItemsTableBody.insertRow();
            newRow.innerHTML = `<td>${name}</td><td>1</td><td>Php ${price.toFixed(2)}</td><td>
            <button class="btn btn-secondary btn-sm" onclick="reduceQuantity('${name}', ${price})">
                <i class="fas fa-minus"></i>
            </button>
            <button class="btn btn-danger btn-sm" onclick="removeItem('${name}', ${price})">
                <i class="fas fa-times"></i>
            </button>
        </td>`;
        }

        // Update the total price
        var totalPrice = calculateTotalPrice();
        totalPriceElement.innerText = 'Php ' + totalPrice.toFixed(2);

        // Save items to local storage
        saveItemsToLocalStorage();
    }

    function reduceQuantity(name, price) {
        var existingItem = findExistingItem(name);
        var totalPriceElement = document.getElementById('totalPrice'); // Add this line

        if (existingItem && existingItem.quantity > 1) {
            existingItem.quantity--;
            existingItem.totalPrice -= parseFloat(price);
            existingItem.element.cells[1].innerText = existingItem.quantity;
            existingItem.element.cells[2].innerText = 'Php ' + existingItem.totalPrice.toFixed(2);

            // Update the total price
            var totalPrice = calculateTotalPrice();
            totalPriceElement.innerText = 'Php ' + totalPrice.toFixed(2);

            // Save items to local storage
            saveItemsToLocalStorage();
        }
    }

    function removeItem(name, price) {
        var existingItem = findExistingItem(name);
        var totalPriceElement = document.getElementById('totalPrice'); // Add this line

        if (existingItem) {
            // Remove the row from the table
            existingItem.element.remove();

            // Update the total price
            var totalPrice = calculateTotalPrice();
            totalPriceElement.innerText = 'Php ' + totalPrice.toFixed(2);

            // Save items to local storage
            saveItemsToLocalStorage();
        }
    }

    function findExistingItem(name) {
        var selectedItemsTableBody = document.getElementById('selectedItemsTableBody').rows;

        for (var i = 0; i < selectedItemsTableBody.length; i++) {
            var item = selectedItemsTableBody[i];
            var itemName = item.cells[0].innerText; // Extract the item name

            if (itemName === name) {
                // If the item already exists, return its details
                return {
                    element: item,
                    quantity: parseInt(item.cells[1].innerText),
                    totalPrice: parseFloat(item.cells[2].innerText.split('Php ')[1])
                };
            }
        }

        // If the item is not found, return null
        return null;
    }

    function calculateTotalPrice() {
        var selectedItemsTableBody = document.getElementById('selectedItemsTableBody').rows;
        var totalPrice = 0;

        for (var i = 0; i < selectedItemsTableBody.length; i++) {
            var item = selectedItemsTableBody[i];
            var itemPrice = parseFloat(item.cells[2].innerText.split('Php ')[1]);
            totalPrice += itemPrice;
        }

        return totalPrice;
    }

    function saveItemsToLocalStorage() {
        var selectedItemsTableBody = document.getElementById('selectedItemsTableBody');
        var items = [];

        // Iterate through rows to get item details
        for (var i = 0; i < selectedItemsTableBody.rows.length; i++) {
            var row = selectedItemsTableBody.rows[i];
            var itemName = row.cells[0].innerText;
            var itemQuantity = parseInt(row.cells[1].innerText);
            var itemTotalPrice = parseFloat(row.cells[2].innerText.split('Php ')[1]);

            items.push({
                name: itemName,
                quantity: itemQuantity,
                totalPrice: itemTotalPrice
            });
        }

        var totalPrice = calculateTotalPrice();

        // Save items and total price to local storage
        localStorage.setItem('selectedItems', JSON.stringify(items));
        localStorage.setItem('totalPrice', totalPrice.toFixed(2));
    }

    function loadItemsFromLocalStorage() {
        var selectedItemsTableBody = document.getElementById('selectedItemsTableBody');
        var totalPriceElement = document.getElementById('totalPrice');
        var items = JSON.parse(localStorage.getItem('selectedItems'));

        if (items) {
            for (var i = 0; i < items.length; i++) {
                var item = items[i];
                var newRow = selectedItemsTableBody.insertRow();
                newRow.innerHTML = `<td>${item.name}</td><td>${item.quantity}</td><td>Php ${item.totalPrice.toFixed(2)}</td><td>
            <button class="btn btn-secondary btn-sm" onclick="reduceQuantity('${item.name}', ${item.totalPrice})">
                <i class="fas fa-minus"></i>
            </button>
            <button class="btn btn-danger btn-sm" onclick="removeItem('${item.name}', ${item.totalPrice})">
                <i class="fas fa-times"></i>
            </button>
        </td>`;
            }

            // Update the total price
            var totalPrice = calculateTotalPrice();
            totalPriceElement.innerText = 'Php ' + totalPrice.toFixed(2);
        }
    }
</script>



<?php include __DIR__ . '/../include/some-script.php' ?>

<style>
    body,
    html {
        height: 100%;
        overflow: hidden;
    }

    .list {
        height: 350px;
        /* Set your preferred max-width */
        overflow-y: auto;
    }
</style>