<?php include 'include/head.php' ?>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include 'include/navbar.php' ?>
        <?php include 'include/sidebar.php' ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Menu</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>


            <div class="row px-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($menuItems as $mi) : ?>
                                        <tr>
                                            <td><?= $mi['name'] ?></td>
                                            <td><?= $mi['description'] ?></td>
                                            <td><?= $mi['image'] ?></td>
                                            <td><?= $mi['price'] ?></td>
                                            <td><?= $mi['quantity'] ?></td>
                                            <td><?= $mi['category_name'] ?></td>
                                            <td>
                                                <!-- Add your delete and edit links/buttons here -->
                                                <a href="#">Delete</a> || <a href="#">Edit</a>
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
<?php include 'include/some-script.php' ?>