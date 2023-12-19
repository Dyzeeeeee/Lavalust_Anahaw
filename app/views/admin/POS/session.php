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
                <div class="col-8 pl-4">
                    <div class="row">
                        <?php foreach ($menu as $mi) : ?>
                            <div class="col-md-4 col-lg-3">
                                <div class="card">
                                    <div class="d-flex justify-content-end">
                                        <a href="#" class="btn btn-success" onclick="addItem('<?= $mi['name'] ?>', <?= $mi['price'] ?>)">
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
                <div class="col-4 selected bg-white pr-4">
                    <div class="list">
                        <ul id="selectedItems">
                        </ul>
                    </div>

                    <div class="bg-grey" style="background-color: grey">
                        <p><b>Total: <span id="totalPrice">0.00</span></b></p>

                        <div class="actions bg-white justify-content-end text-end row p-2">
                            <a href="<?= site_url('/admin/pos/payment')?>">
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

<script>
    // Load the items from local storage on page load
    document.addEventListener("DOMContentLoaded", function() {
        loadItemsFromLocalStorage();
    });

    function addItem(name, price) {
        var selectedItems = document.getElementById('selectedItems');
        var totalPriceElement = document.getElementById('totalPrice');

        // Check if the item is already in the list
        var existingItem = findExistingItem(name);

        if (existingItem) {
            // If the item exists, update its quantity and total price
            existingItem.quantity++;
            existingItem.totalPrice += parseFloat(price);
            existingItem.element.innerHTML = name + ' (x' + existingItem.quantity + '): Php' + existingItem.totalPrice.toFixed(2);
        } else {
            // If the item is not in the list, add a new list item
            var listItem = document.createElement('li');
            listItem.innerHTML = name + ' (x1): Php' + price;

            // Append the new item to the list
            selectedItems.appendChild(listItem);
        }

        // Update the total price
        var totalPrice = calculateTotalPrice();
        totalPriceElement.innerText = 'Php' + totalPrice.toFixed(2);

        // Save items to local storage
        saveItemsToLocalStorage();
    }

    function findExistingItem(name) {
        var selectedItems = document.getElementById('selectedItems').children;

        for (var i = 0; i < selectedItems.length; i++) {
            var item = selectedItems[i];
            var itemName = item.innerText.split(' (x')[0]; // Extract the item name

            if (itemName === name) {
                // If the item already exists, return its details
                return {
                    element: item,
                    quantity: parseInt(item.innerText.split('x')[1]),
                    totalPrice: parseFloat(item.innerText.split('Php')[1])
                };
            }
        }

        // If the item is not found, return null
        return null;
    }

    function calculateTotalPrice() {
        var selectedItems = document.getElementById('selectedItems').children;
        var totalPrice = 0;

        for (var i = 0; i < selectedItems.length; i++) {
            var item = selectedItems[i];
            var itemPrice = parseFloat(item.innerText.split('Php')[1]);
            totalPrice += itemPrice;
        }

        return totalPrice;
    }

    function saveItemsToLocalStorage() {
        var selectedItems = document.getElementById('selectedItems').innerHTML;
        var totalPrice = calculateTotalPrice();

        // Save items and total price to local storage
        localStorage.setItem('selectedItems', selectedItems);
        localStorage.setItem('totalPrice', totalPrice.toFixed(2));
    }

    function loadItemsFromLocalStorage() {
        var selectedItems = localStorage.getItem('selectedItems');
        var totalPrice = localStorage.getItem('totalPrice');
        var selectedItemsElement = document.getElementById('selectedItems');
        var totalPriceElement = document.getElementById('totalPrice');

        if (selectedItems && totalPrice) {
            selectedItemsElement.innerHTML = selectedItems;
            totalPriceElement.innerText = 'Php' + totalPrice;
        }
    }
</script>

<!-- ... (your existing styles) ... -->


<!-- ... (your existing styles) ... -->



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