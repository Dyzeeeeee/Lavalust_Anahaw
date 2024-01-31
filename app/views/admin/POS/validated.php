<?php include __DIR__ . '/../include/head.php' ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include __DIR__ . '/../include/navbar.php' ?>
        <?php include __DIR__ . '/../include/sidebar.php' ?>

        <?php foreach ($orders as $order) : ?>
            <?php if ($order['id'] == $currentRouteId) : ?>
                <div class="content-wrapper">
                    <section class="content-header bg-yellow mb-2">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6 d-flex align-items-center text-center">
                                    <h1 class="ml-2"> Payment Successful</h1>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="row">
                        <div class="col-8 row justify-content-center" style="margin: 10px;">
                            <div class="col-12 bg-white p-2 m-2 pb-2" style="height: 380px;">
                                <h2 class="text-center">P<?= $order['total_order_price'] ?></h2>
                                <a href="<?= site_url('/admin/pos/download/' .  $order['id']) ?>">
                                    <button type="submit" class="btn btn-info mt-3 w-100">Download Receipt</button>
                                </a>
                                <div class="input-group mt-3">
                                    <input type="text" class="form-control" placeholder="Send receipt via email">
                                    <button class="btn btn-info" type="button" id="sendButton">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 bg-white new-order sticky-bottom" style="padding: 20px;">
                                <a href="<?= site_url('/admin/pos/session') ?>">
                                    <button class="btn btn-success mt-3 sticky-bottom w-100" onclick="clearLocalStorage()">
                                        New Order
                                    </button>

                                </a>
                            </div>
                        </div>
                        <div class="col-3" style="padding: 10px;">
                            <div class="col-12 receipt-container" style="height: 450px; background-color: white;">
                                <!-- Receipt Placeholder -->
                                <div class="receipt">
                                    <h3>Receipt</h3>
                                    <h5>Order No: <?= $order['id'] ?></h5>
                                    <hr>
                                    <p>Order Date: <?= $order['order_date'] ?></p>


                                    <!-- Display selected items in the receipt -->
                                    <table class="table receipt-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orderItems as $item) : ?>
                                                <?php if ($item['order_id'] == $currentRouteId) : ?>
                                                    <tr>
                                                        <td><?= $item['menu_item'] ?></td>
                                                        <td><?= $item['quantity'] ?></td>
                                                        <td>P<?= $item['total_price'] ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="text-align: left;">Total Price: </p>
                                        </div>
                                        <div class="col-5 text-right pr-2">
                                            <b><em>P<?= $order['total_order_price'] ?></em></b>
                                        </div>
                                    </div>
                                    <p>Payment Method: Cash</p>
                                    <hr>
                                    <p>Thank you for your purchase!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</body>

<!-- ... Your existing JavaScript ... -->

<?php include __DIR__ . '/../include/some-script.php' ?>

<style>
    body,
    html {
        height: 100%;
        overflow: hidden;
    }

    .sticky-bottom {
        position: sticky;
        bottom: 0;
        margin-bottom: 15px;
        /* Adjust margin as needed */
    }

    .receipt-container {
        height: 450px;
        overflow-y: auto;
        background-color: white;
        padding: 10px;
    }

    /* Add a class to style the receipt table */
    .receipt-table {
        width: 100%;
    }
</style>
<script>
    // Load the items from local storage on page load
    document.addEventListener("DOMContentLoaded", function() {
        loadItemsFromLocalStorage();
    });

    function addItem(name, price) {
        // ... Your existing addItem function ...

        // Save items to local storage
        saveItemsToLocalStorage();
    }

    // ... Your existing JavaScript functions ...

    function clearLocalStorage() {
        // Clear the items and total price from local storage
        localStorage.removeItem('selectedItems');
        localStorage.removeItem('totalPrice');
    }
</script>

</html>