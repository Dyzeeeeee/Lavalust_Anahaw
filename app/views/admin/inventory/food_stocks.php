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
                            <h3 class="card-title">Responsive Hover Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <!-- Add button starts here -->
                                        <button class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                            <i class="fas fa-plus"></i> Add
                                        </button>

                                        <!-- Add Modal -->
                                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Add Food Stock Item</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Add your add form fields here -->
                                                        <form action="<?= site_url('/admin/inventory/food-stocks/add') ?>" method="post">
                                                            <div class="mb-3">
                                                                <label for="ingredientName" class="form-label">Ingredient Name</label>
                                                                <input type="text" class="form-control" id="ingredientName" name="ingredientName" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="quantity" class="form-label">Quantity</label>
                                                                <input type="text" class="form-control" id="quantity" name="quantity" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="unitOfMeasurement" class="form-label">Unit of Measurement</label>
                                                                <input type="text" class="form-control" id="unitOfMeasurement" name="unitOfMeasurement" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="purchaseDate" class="form-label">Purchase Date</label>
                                                                <input type="text" class="form-control" id="purchaseDate" name="purchaseDate" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="expirationDate" class="form-label">Expiration Date</label>
                                                                <input type="text" class="form-control" id="expirationDate" name="expirationDate" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="supplierName" class="form-label">Supplier Name</label>
                                                                <input type="text" class="form-control" id="supplierName" name="supplierName" required>
                                                            </div>
                                                            <!-- Add more form fields as needed -->

                                                            <button type="submit" class="btn btn-primary">Add Food Stock Item</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                        <th>Ingredient Name</th>
                                        <th>Quantity</th>
                                        <th>Unit of Measurement</th>
                                        <th>Purchase Date</th>
                                        <th>Expiration Date</th>
                                        <th>Supplier Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($foodStocks as $foodStock) : ?>
                                        <tr>
                                            <td><?= $foodStock['ingredient_name'] ?></td>
                                            <td><?= $foodStock['quantity'] ?></td>
                                            <td><?= $foodStock['unit_of_measurement'] ?></td>
                                            <td><?= $foodStock['purchase_date'] ?></td>
                                            <td><?= $foodStock['expiration_date'] ?></td>
                                            <td><?= $foodStock['supplier_name'] ?></td>
                                            <td>
                                                <a href="#" class="text-primary" title="Edit" data-toggle="modal" data-target="#editModal<?= $foodStock['id'] ?>"><i class="fas fa-edit"></i></a>
                                                ||
                                                <form action="<?= site_url('/admin/inventory/food-stocks/delete/' . $foodStock['id']) ?>" method="post" style="display:inline;">
                                                    <button type="submit" class="btn text-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editModal<?= $foodStock['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Food Stock Item</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Add your edit form fields here -->
                                                        <form action="<?= site_url('/admin/inventory/food-stocks/edit/' . $foodStock['id']) ?>" method="post">
                                                            <div class="mb-3">
                                                                <label for="ingredientName" class="form-label">Ingredient Name</label>
                                                                <input type="text" class="form-control" id="ingredientName" name="ingredientName" value="<?= $foodStock['ingredient_name'] ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="quantity" class="form-label">Quantity</label>
                                                                <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $foodStock['quantity'] ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="unitOfMeasurement" class="form-label">Unit of Measurement</label>
                                                                <input type="text" class="form-control" id="unitOfMeasurement" name="unitOfMeasurement" value="<?= $foodStock['unit_of_measurement'] ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="purchaseDate" class="form-label">Purchase Date</label>
                                                                <input type="text" class="form-control" id="purchaseDate" name="purchaseDate" value="<?= $foodStock['purchase_date'] ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="expirationDate" class="form-label">Expiration Date</label>
                                                                <input type="text" class="form-control" id="expirationDate" name="expirationDate" value="<?= $foodStock['expiration_date'] ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="supplierName" class="form-label">Supplier Name</label>
                                                                <input type="text" class="form-control" id="supplierName" name="supplierName" value="<?= $foodStock['supplier_name'] ?>" required>
                                                            </div>
                                                            <!-- Add more form fields as needed -->

                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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