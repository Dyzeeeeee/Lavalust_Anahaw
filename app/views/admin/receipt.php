<meta charset="utf-8">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<title>Admin View</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url() ?>/public/admin/dist/css/adminlte.min.css">
<!-- Add this in your HTML file, preferably in the <head> section -->


<style>
    .color-palette {
        height: 35px;
        line-height: 35px;
        text-align: right;
        padding-right: .75rem;
    }

    .color-palette.disabled {
        text-align: center;
        padding-right: 0;
        display: block;
    }

    .color-palette-set {
        margin-bottom: 15px;
    }

    .color-palette span {
        display: none;
        font-size: 12px;
    }

    .color-palette:hover span {
        display: block;
    }

    .color-palette.disabled span {
        display: block;
        text-align: left;
        padding-left: .75rem;
    }

    .color-palette-box h4 {
        position: absolute;
        left: 1.25rem;
        margin-top: .75rem;
        color: rgba(255, 255, 255, 0.8);
        font-size: 12px;
        display: block;
        z-index: 7;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="mb-4">Receipt</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <p><strong>Order Date:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
            <p><strong>Order ID:</strong> #123456</p>
        </div>
        <div class="col-6 text-right">
            <p><strong>Customer Name:</strong> John Doe</p>
            <p><strong>Payment Method:</strong> Credit Card</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example item, replace with dynamic data -->
                    <tr>
                        <td>Product A</td>
                        <td>2</td>
                        <td>$20.00</td>
                        <td>$40.00</td>
                    </tr>
                    <!-- Add more rows for each item -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 text-right">
            <p><strong>Subtotal:</strong> $40.00</p>
            <p><strong>Tax (10%):</strong> $4.00</p>
            <p><strong>Total:</strong> $44.00</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 text-center">
            <p>Thank you for your purchase!</p>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>/public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/public/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/public/admin/dist/js/demo.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        // Get the current URL
        var currentUrl = window.location.href;

        // Iterate through each navigation link
        $('.nav-link').each(function() {
            var linkUrl = $(this).attr('href');

            // Check if the current URL contains the link URL
            if (currentUrl.indexOf(linkUrl) !== -1) {
                // Add the active class to the matching link
                $(this).addClass('active');
            }
        });

        // Trigger the printReceipt function
        window.print();
    });
</script>