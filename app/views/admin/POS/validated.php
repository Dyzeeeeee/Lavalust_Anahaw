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
                                    <h1 class="ml-2">  Payment Successful</h1>
                                </div>
                            </div>
                        </div>
                    </section>



                    <div class="row">
                        <div class="col-8 row justify-content-center" style="margin: 10px;">
                            <div class="col-12 bg-white p-2 m-2 pb-2" style="height: 380px;">
                                <h2 class="text-center"><?= $order['total_order_price'] ?></h2>
                                <button class="btn btn-info mt-3 sticky-bottom w-100">Print Receipt</button>

                                <div class="input-group mt-3">
                                    <input type="text" class="form-control" placeholder="Send receipt via email">
                                    <button class="btn btn-info" type="button" id="sendButton">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 bg-white new-order sticky-bottom" style="padding: 20px;">
                                <a href="<?= site_url('/admin/pos/session') ?>">
                                    <button class="btn btn-success mt-3 sticky-bottom w-100 h-100">New Order</button>
                                </a>
                            </div>
                        </div>
                        <div class="col-3" style="padding: 10px;">
                            <div class="col-12" style="height: 450px; background-color: white;">
                                <!-- Receipt Placeholder -->
                                <div class="receipt">
                                    <h3>Receipt</h3>
                                    <hr>
                                    <p>Order Date: <?= $order['order_date'] ?></p>
                                    <p>Total Price: <?= $order['total_order_price'] ?></p>
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
</style>