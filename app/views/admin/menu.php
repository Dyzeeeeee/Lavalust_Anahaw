<?php include 'include/head.php' ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include 'include/navbar.php' ?>
        <?php include 'include/sidebar.php' ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <h1>Menu</h1>
                        </div>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-success" data-toggle="modal" data-target="#filterModal">
                                <i class="fas fa-filter"></i>
                            </button>
                            <!-- Filter Modal -->
                            <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="filterModalLabel">Filter Menu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= site_url('/admin/menu/filter') ?>" method="post">
                                                <div class="mb-3">
                                                    <label for="categoryFilter" class="form-label">Category</label>
                                                    <select class="form-select" id="categoryFilter" name="categoryFilter">
                                                        <option value="">All</option>
                                                        <?php foreach ($uniqueCategories as $category) : ?>
                                                            <option value="<?= $category ?>"><?= $category ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary" name="filterButton">
                                                        <i class="fas fa-filter"></i> Filter
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Filter Modal -->
                        </div>


                        <div class="input-group input-group-sm col-sm-5 d-flex justify-content-end align-items-center">
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
                                                <h5 class="modal-title" id="addModalLabel">Add Menu Item</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Add your add form fields here -->
                                                <form action="<?= site_url('/admin/menu/add') ?>" method="post">
                                                    <div class="mb-3">
                                                        <label for="addName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="addName" name="addName" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="addDescription" class="form-label">Description</label>
                                                        <textarea class="form-control" id="addDescription" name="addDescription" rows="3" required></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="addPrice" class="form-label">Price</label>
                                                        <input type="text" class="form-control" id="addPrice" name="addPrice" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="addQuantity" class="form-label">Quantity</label>
                                                        <input type="text" class="form-control" id="addQuantity" name="addQuantity" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="addCategory" class="form-label">Category</label>
                                                        <br>
                                                        <select class="form-select  form-select-sm" id="addCategory" name="addCategory" required>
                                                            <!-- Mock options, replace with actual category options -->
                                                            <option value="Drinks">Drinks</option>
                                                            <option value="Ulam">Ulam</option>
                                                            <option value="Desserts">Dessert</option>
                                                            <option value="Meals">Meals</option>
                                                        </select>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Add Menu Item</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group align-items-center pr-2">
                            <button class="btn btn-info border" id="listViewButton">
                                <i class="fas fa-th-list"></i>
                            </button>
                            <button class="btn btn-info border" id="cardViewButton">
                                <i class="fas fa-th-large"></i>
                            </button>
                        </div>


                    </div><!-- /.container-fluid -->
            </section>

            <div id="listContainer">
                <div class="row px-4">
                    <div class="col-12">
                        <div class="card">
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
                                        <?php foreach ($menu as $mi) : ?>
                                            <tr>
                                                <td><?= $mi['name'] ?></td>
                                                <td><?= $mi['description'] ?></td>
                                                <td><?= $mi['image'] ?></td>
                                                <td><?= $mi['price'] ?></td>
                                                <td><?= $mi['quantity'] ?></td>
                                                <td><?= $mi['category'] ?></td>
                                                <td>
                                                    <a href="#" class="text-primary" title="Edit" data-toggle="modal" data-target="#editModal<?= $mi['id'] ?>"><i class="fas fa-edit"></i></a>
                                                    ||
                                                    <form action="<?= site_url('/admin/menu/delete/' . $mi['id']) ?>" method="post" style="display:inline;">
                                                        <button type="submit" class="btn text-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="editModal<?= $mi['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Menu Item</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Add your edit form fields here -->
                                                            <form action="<?= site_url('/admin/menu/edit/' . $mi['id']) ?>" method="post">
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" id="name" name="name" value="<?= $mi['name'] ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="description" class="form-label">Description</label>
                                                                    <textarea class="form-control" id="description" name="description" rows="3" required><?= $mi['description'] ?></textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="price" class="form-label">Price</label>
                                                                    <input type="text" class="form-control" id="price" name="price" value="<?= $mi['price'] ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="quantity" class="form-label">Quantity</label>
                                                                    <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $mi['quantity'] ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="category" class="form-label">Category</label>
                                                                    <br>
                                                                    <select class="form-select" id="category" name="category" required>
                                                                        <!-- Mock options, replace with actual category options -->
                                                                        <option value="1">Category 1</option>
                                                                        <option value="2">Category 2</option>
                                                                        <option value="3">Category 3</option>
                                                                    </select>
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

            <div id="cardContainer" class="card-container" style="display: none;">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($menu as $mi) : ?>
                        <div class="col mb-3">
                            <div class="card">
                                <div class="d-flex justify-content-end">
                                    <a href="#" class="btn btn-primary mr-2" title="Edit" data-toggle="modal" data-target="#editModals<?= $mi['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?= site_url('/admin/menu/delete/' . $mi['id']) ?>" method="post" style="display:inline;">
                                        <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this item?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $mi['name'] ?></h5>
                                    <p class="card-text"><?= $mi['description'] ?></p>
                                    <p class="card-text">Price: <?= $mi['price'] ?></p>
                                    <p class="card-text">Quantity: <?= $mi['quantity'] ?></p>
                                    <p class="card-text">Category: <?= $mi['category'] ?></p>
                                    <!-- Add more card details as needed -->

                                    <div class="modal fade" id="editModals<?= $mi['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Menu Item</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Add your edit form fields here -->
                                                    <form action="<?= site_url('/admin/menu/edit/' . $mi['id']) ?>" method="post">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="<?= $mi['name'] ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea class="form-control" id="description" name="description" rows="3" required><?= $mi['description'] ?></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Price</label>
                                                            <input type="text" class="form-control" id="price" name="price" value="<?= $mi['price'] ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="quantity" class="form-label">Quantity</label>
                                                            <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $mi['quantity'] ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category" class="form-label">Category</label>
                                                            <br>
                                                            <select class="form-select" id="category" name="category" required>
                                                                <!-- Mock options, replace with actual category options -->
                                                                <option value="1">Category 1</option>
                                                                <option value="2">Category 2</option>
                                                                <option value="3">Category 3</option>
                                                            </select>
                                                        </div>
                                                        <!-- Add more form fields as needed -->

                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    <?php endforeach ?>
                </div>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const listViewButton = document.getElementById("listViewButton");
            const cardViewButton = document.getElementById("cardViewButton");
            const listContainer = document.getElementById("listContainer");
            const cardContainer = document.getElementById("cardContainer");

            // Initial view state (list view)
            listContainer.style.display = "block";
            cardContainer.style.display = "none";

            listViewButton.addEventListener("click", function() {
                listContainer.style.display = "block";
                cardContainer.style.display = "none";
            });

            cardViewButton.addEventListener("click", function() {
                listContainer.style.display = "none";
                cardContainer.style.display = "block";
            });
        });
    </script>

</body>
<?php include 'include/some-script.php' ?>