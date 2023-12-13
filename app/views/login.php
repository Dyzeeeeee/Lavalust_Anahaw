<?php include 'website/include/head.php' ?>
<?php include 'website/include/some_script.php' ?>

<div class="container-fluid service d-flex align-items-center justify-content-center py-6 px-4" style="background-color: rgba(0, 0, 0, 0); height: 100vh;">
    <div class="row justify-content-center w-100">
        <div class="col-lg-4 col-md-4 col-sm-5 col-7 d-flex align-items-center justify-content-end">
            <a href="<?= base_url() ?>/" class="navbar-brand me-3">
                <img src="<?= base_url() ?>/public/website/img/logo.png" alt="" class="logo" style="width: 250px;">
            </a>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-3"></div> <!-- Adjusted empty column size for increased spacing -->
        <div class="col-lg-6 col-md-6 col-sm-7 col-12">
            <div class="card bg-light rounded" style="outline: 1px solid #d4a762; padding: 20px; width: 75%;">
                <div class="card-body text-center">
                    <h4 class="card-title mb-3">Login to your account</h4>
                    <form action="<?= site_url('/login') ?>" method="post" class="row">
                        <div class="mb-3">
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill" style="background-color: #d4a762;">Login</button>
                    </form>

                    <p class="mb-4 mt-4" style="color: #d4a762;">Don't have an account? <a href="<?= base_url() ?>/register">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
