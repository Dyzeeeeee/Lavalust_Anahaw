<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">Receipt</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p><strong>Order Date:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
                <p><strong>Order ID:</strong> #130</p>
            </div>
            <div class="col-6 text-right">
                <p><strong>Customer Name:</strong> N/A</p>
                <p><strong>Payment Method:</strong> Cash</p>
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
                            <td>Sprite</td>
                            <td>2</td>
                            <td>P21.00</td>
                            <td>P42.00</td>
                        </tr>
                        <tr>
                            <td>Vanilla Ice Cream</td>
                            <td>3</td>
                            <td>P25.00</td>
                            <td>P75.00</td>
                        </tr>

                        <tr>
                            <td>crab</td>
                            <td>1</td>
                            <td>P200.00</td>
                            <td>P200.00</td>
                        </tr>
                        <!-- Add more rows for each item -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-right">
                <p><strong>Subtotal:</strong> P292.00</p>
                <p><strong>Tax (10%):</strong> P29.20</p>
                <p><strong>Total:</strong> P262.8</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <p>Thank you for your purchase!</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>