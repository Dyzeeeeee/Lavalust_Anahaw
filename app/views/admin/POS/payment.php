<?php include __DIR__ . '/../include/head.php' ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include __DIR__ . '/../include/navbar.php' ?>
        <?php include __DIR__ . '/../include/sidebar.php' ?>

        <div class="content-wrapper">
            <section class="content-header bg-yellow mb-2">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6 d-flex align-items-center">
                            <a href="<?= site_url('/admin/pos/session') ?>" class="btn btn-success">
                                <i class="fas fa-angle-left"></i>
                            </a>
                            <h1 class="ml-2">Payment</h1>
                        </div>
                    </div>
                </div>
            </section>



            <div class="row">
                <div class="col-3">
                    Payment method dapat dito
                </div>
                <div class="col-6 row justify-content-center">
                    <div class="col-12 bg-white p-2 m-2 pb-2">
                        <h2>Total Price:<b> <span id="displayTotalPrice">0.00</b></span></h2>
                        <h3 id="displayPayment">Payment: Php0.00</h3>
                        <h3 id="displayChange" class="row justify-content-end pr-2">Change: Php0.00</h3>
                    </div>
                    <div class="col-12 bg-white numpad">
                        <!-- Numpad -->
                        <div class="row justify-content-center text-center">
                            <button class="btn  btn-outline-secondary m-1 p-3 col-3" onclick="addValue('10')">+10</button>
                            <button class="btn  btn-outline-secondary m-1 p-3 col-3" onclick="addValue('20')">+20</button>
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="addValue('50')">+50 </button>
                        </div>
                        <div class="row justify-content-center text-center">
                            <button class="btn  btn-outline-secondary m-1 p-3 col-3" onclick="appendDigit('1')">1</button>
                            <button class="btn  btn-outline-secondary m-1 p-3 col-3" onclick="appendDigit('2')">2</button>
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="appendDigit('3')">3</button>
                        </div>
                        <div class="row justify-content-center text-center ">
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="appendDigit('4')">4</button>
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="appendDigit('5')">5</button>
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="appendDigit('6')">6</button>
                        </div>
                        <div class="row justify-content-center text-center">
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="appendDigit('7')">7</button>
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="appendDigit('8')">8</button>
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="appendDigit('9')">9</button>
                        </div>
                        <div class="row justify-content-center text-center">
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="appendDecimalPoint('.')">.</button>
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="appendDigit('0')">0</button>
                            <button class="btn btn-outline-secondary m-1 p-3 col-3" onclick="appendBackspace()">
                                <i class="fas fa-backspace"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="col-12" style="height: 450px;">
                        customer saka invoice dito
                    </div>
                    <!--add a validate button at the bottom part of this div-->
                    <div class="col-12 justify-content-end text-end row">
                        <button class="btn btn-success mt-3 sticky-bottom w-100">Validate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- ... (your existing HTML) ... -->

<script>
    // Retrieve the total price, payment, and change from local storage
    var storedTotalPrice = parseFloat(localStorage.getItem('totalPrice')) || 0.00;
    var storedPayment = parseFloat(localStorage.getItem('payment')) || 0.00;

    // Display the total price, payment, and change
    var displayChangeElement = document.getElementById('displayChange');
    var displayTotalPriceElement = document.getElementById('displayTotalPrice');
    var displayPaymentElement = document.getElementById('displayPayment');
    if (!isNaN(storedTotalPrice)) {
        displayTotalPriceElement.textContent = 'Php' + storedTotalPrice.toFixed(2);
    } else {
        displayTotalPriceElement.textContent = 'Php0.00';
    }
    if (!isNaN(storedPayment)) {
        displayPaymentElement.textContent = 'Payment: Php' + storedPayment.toFixed(2);
    } else {
        displayPaymentElement.textContent = 'Payment: Php0.00';
    }

    // Initialize change based on the relationship between payment and total price
    var changeAmount = storedPayment - storedTotalPrice;
    if (isNaN(changeAmount) || changeAmount < 0) {
        displayChangeElement.textContent = 'Total Due: Php' + Math.abs(changeAmount).toFixed(2);
    } else {
        displayChangeElement.textContent = 'Change: Php' + changeAmount.toFixed(2);
    }

    function addValue(value) {
        storedPayment += parseFloat(value);
        displayPaymentElement.textContent = 'Payment: Php' + storedPayment.toFixed(2);
        updateLocalStorage('payment', storedPayment);
        updatePaymentAndChange(storedPayment, storedTotalPrice);
    }

    // Function to append digit to the payment
    function appendDigit(digit) {
        storedPayment = parseFloat(storedPayment.toString() + digit);
        displayPaymentElement.textContent = 'Payment: Php' + storedPayment.toFixed(2);
        updateLocalStorage('payment', storedPayment);
        updatePaymentAndChange(storedPayment);
    }

    // Function to handle backspace for payment
    function appendBackspace() {
        storedPayment = Math.floor(storedPayment / 10);
        displayPaymentElement.textContent = 'Payment: Php' + storedPayment.toFixed(2);
        updateLocalStorage('payment', storedPayment);
        updatePaymentAndChange(storedPayment);
    }

    // Function to update the total price and payment in local storage
    function updateLocalStorage(key, value) {
        localStorage.setItem(key, value.toString());
    }

    // Function to update payment and change display
    function updatePaymentAndChange(addedAmount) {
        var totalAmount = parseFloat(storedTotalPrice);
        var changeAmount = addedAmount - totalAmount;

        var paymentElement = document.getElementById('displayPayment');
        var changeElement = document.getElementById('displayChange');

        if (isNaN(changeAmount) || changeAmount < 0) {
            paymentElement.textContent = 'Payment: Php' + addedAmount.toFixed(2);
            changeElement.textContent = 'Total Due: Php' + Math.abs(changeAmount).toFixed(2);
        } else {
            paymentElement.textContent = 'Payment: Php' + addedAmount.toFixed(2);
            changeElement.textContent = 'Change: Php' + changeAmount.toFixed(2);
        }
    }
</script>

<!-- ... (your existing script) ... -->





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