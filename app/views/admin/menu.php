<?php include 'include/head.php' ?>
<?php include 'include/navbar.php' ?>

<div id="layoutSidenav">
    <?php include 'include/sidenav.php' ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tables</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tables</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        DataTables is a third party plugin that is used to generate the demo table below. For more
                        information about DataTables, please visit the
                        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                        .
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($menu as $item): ?>

                                    <tr>
                                        <td>
                                            <?= $item['category'] ?>
                                        </td>
                                        <td>
                                            <?= $item['subcategory'] ?>
                                        </td>
                                        <td>
                                            <?= $item['item'] ?>
                                        </td>
                                        <td>
                                            <?= $item['descriptiom'] ?>
                                        </td>
                                        <td>
                                            <?= $item['image'] ?>
                                        </td>
                                        <td>
                                            <?= $item['price'] ?>
                                        </td>
                                        <td><a href="">delete</a> || <a href="">edit</a></td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>

<?php include 'include/some-script.php' ?>