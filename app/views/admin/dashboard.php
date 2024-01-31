<?php include 'include/head.php' ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include 'include/navbar.php' ?>
        <?php include 'include/sidebar.php' ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row p-3">
                <!-- Card 1: Today's Total Orders -->
                <div class="col-md-6 row">
                    <div class="col-md-6">
                        <div class="card" style="background-color: #BEEC9D;">
                            <h1 class="card-title p-3">Total Orders</h1>
                            <div class="card-body text-center d-flex justify-content-between align-items-center">
                                <h3 class="mb-0"><b>72</b></h3>
                                <div class="ml-auto"><i class="fa fa-bell-concierge fa-xl"></i></div>
                            </div>
                            <div class="card-footer" style="background-color: #98BF7C;">
                                More info <i class="fa fa-caret-right"></i>
                            </div>
                        </div>
                    </div>


                    <!-- Card 2: Today's Total Customers -->
                    <div class="col-md-6">
                        <div class="card" style="background-color: #E8EF60;">
                            <h1 class="card-title p-3">Total Customers</h1>
                            <div class="card-body text-center d-flex justify-content-between align-items-center">
                                <h3 class="mb-0"><b>21</b></h3>
                                <div class="ml-auto"><i class="fa fa-people-line fa-xl"></i></div>
                            </div>
                            <div class="card-footer" style="background-color: #E0E835;">
                                More info <i class="fa fa-caret-right"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Today's Total Earnings -->
                    <div class="col-md-6">
                        <div class="card" style="background-color: #F687A5;">
                            <h1 class="card-title p-3">Total Earnings</h1>
                            <div class="card-body text-center d-flex justify-content-between align-items-center">
                                <h3 class="mb-0"><b>20, 230</b></h3>
                                <div class="ml-auto"><i class="fa fa-coins fa-xl"></i></div>
                            </div>
                            <div class="card-footer" style="background-color: #EA4E78;">
                                More info <i class="fa fa-caret-right"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card" style="background-color: #8E80E7;">
                            <h1 class="card-title p-3">Total Bookings</h1>
                            <div class="card-body text-center d-flex justify-content-between align-items-center">
                                <h3 class="mb-0"><b>12</b></h3>
                                <div class="ml-auto"><i class="fa fa-bookmark fa-xl"></i></div>
                            </div>
                            <div class="card-footer" style="background-color: #6C59E5">
                                More info <i class="fa fa-caret-right"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card" style="background-color: #9BE1E8;">
                            <h1 class="card-title p-3">Total Guests</h1>
                            <div class="card-body text-center d-flex justify-content-between align-items-center">
                                <h3 class="mb-0"><b>20</b></h3>
                                <div class="ml-auto"><i class="fa fa-bed fa-xl"></i></div>
                            </div>
                            <div class="card-footer" style="background-color: #64C2CB;">
                                More info <i class="fa fa-caret-right"></i>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card" style="background-color: #F687A5;">
                            <h1 class="card-title p-3">Total Earnings</h1>
                            <div class="card-body text-center d-flex justify-content-between align-items-center">
                                <h3 class="mb-0"><b>P20, 348.98</b></h3>
                                <div class="ml-auto"><i class="fa fa-coins fa-xl"></i></div>
                            </div>
                            <div class="card-footer" style="background-color: #EA4E78;">
                                More info <i class="fa fa-caret-right"></i>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="card" style="background-color: #F9F9F9;">
                        <h1 class="card-title p-3">All Orders</h1>
                        <div class="card-body text-center">
                            <canvas id="donutChart" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row p-3">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title p-3">Food Stock Alerts</h1>
                        </div>
                        <div class="card-body text-center">
                            <div id="stockAlertsCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $stockAlerts = array_filter($foodStocks, function ($foodStock) {
                                        $percentage = ($foodStock['quantity'] / $foodStock['ideal']) * 100;
                                        return $percentage < 30;
                                    });

                                    // Display alerts in batches of 5
                                    $chunks = array_chunk($stockAlerts, 5);
                                    foreach ($chunks as $index => $chunk) {
                                    ?>
                                        <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                                            <div class="d-flex justify-content-around">
                                                <?php foreach ($chunk as $alert) { ?>
                                                    <div class="bar-graph-container m-1">
                                                        <?php
                                                        $percentage = $alert['quantity'] / $alert['ideal'] * 100;
                                                        ?>
                                                        <div class="bar-graph bg-danger" style="height: <?= $percentage ?>%;"></div>
                                                        <div class="bar-text">
                                                            <h5><b><?= $alert['ingredient_name'] ?> (<?= number_format($percentage, 2) ?>%)</b></h5>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <a class="carousel-control-prev" href="#stockAlertsCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true" style="color: black;"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#stockAlertsCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true" style="color: black;"></span>
                                    <span class="sr-only">Next</span>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'include/some-script.php' ?>


        <style>
            .bar-graph-container {
                height: 150px;
                /* Set the height of the bar graph container */
                width: 100px;
                /* Set the width of the bar */
                background-color: #f2f2f2;
                /* Set the background color of the bar graph container */
                margin-top: 10px;
                /* Adjust the margin as needed */
                position: relative;
            }

            .bar-graph {
                /* background-color: #EA4E78; */
                /* Set the color of the bar */
                position: absolute;
                bottom: 0;
                width: 100%;
            }

            .bar-text {
                position: absolute;
                bottom: 5px;
                /* Adjust this value to move the text up or down within the bar graph */
                left: 50%;
                /* Center the text horizontally */
                transform: translateX(-50%);
                /* Adjust for centering */
                text-align: center;
                color: black;
                /* Set the color of the text */
            }

            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                filter: invert(100%) !important;
            }

            #donutChart {
                width: 100%;
                height: 100%;
            }
        </style>




    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mock data for orders, you should replace this with your actual data
        var ordersData = {
            labels: ["Completed", "Pending", "Canceled"],
            datasets: [{
                data: [500, 50, 20],
                backgroundColor: ["#52CC52", "#FDB45C", "#F64946"],
            }],
        };

        // Donut chart configuration
        var donutChartConfig = {
            type: "doughnut",
            data: ordersData,
            options: {
                responsive: true,
                cutout: "80%", // Adjust the cutout to control the thickness of the donut
                legend: {
                    display: false,
                },
                title: {
                    display: false,
                },
            },
        };

        // Get the canvas element
        var donutChartCanvas = document.getElementById("donutChart");

        // Create and render the donut chart
        new Chart(donutChartCanvas, donutChartConfig);
    });
</script>