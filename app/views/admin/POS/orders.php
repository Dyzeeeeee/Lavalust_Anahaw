<?php include __DIR__ . '/../include/head.php' ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include __DIR__ . '/../include/navbar.php' ?>
        <?php include __DIR__ . '/../include/sidebar.php' ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Food Stocks</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="row px-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <!-- Add button starts here -->
                                        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                            <i class="fas fa-plus"></i> Add
                                        </button> -->

                                        <!-- Add Modal -->
                                        <!-- Add button ends here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order) : ?>
                                        <tr>
                                            <td><?= $order['id'] ?></td>
                                            <td><?= $order['customer_id'] ?></td>
                                            <td><?= $order['order_date'] ?></td>
                                            <td><?= $order['total_order_price'] ?></td>
                                            <td>
                                                <button href="#" class="btn text-primary" title="View" data-toggle="modal" data-target="#editModal<?= $order['id'] ?>"><i class="fas fa-eye"></i></button>
                                                <a href="<?= site_url('/admin/pos/download/' . $order['id'])  ?>" method="post" style="display:inline;">
                                                    <button type="submit" class="btn text-success" title="Download"><i class="fas fa-download"></i></button>
                                                </a>
                                                <!-- <button href="#" class="btn text-download" title="Edit" data-toggle="modal" data-target="#editModal<?= $order['id'] ?>"><i class="fas fa-file-arrow-down"></i></button> -->
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</body>
<?php include __DIR__ . '/../include/some-script.php' ?>