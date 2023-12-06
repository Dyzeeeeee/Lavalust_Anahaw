<?php include 'website/include/head.php' ?>
<?php include 'website/include/some_script.php' ?>

<div class="container-fluid service py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <!-- <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our
                Services</small> -->
            <a href="<?= base_url() ?>/" class="navbar-brand">
                <!-- <h1 class="text-primary fw-bold mb-0">Cater<span class="text-dark">Serv</span> </h1> -->
                <img src="<?= base_url() ?>/public/website/img/logo.png" alt="" class="logo pb-4 mb-4" style="width: 200px;">
            </a>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded ">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <h4 class="mb-3">Login to your account</h4>
                            <form action="<?= site_url('/login') ?>" method="post" class="row">
                                <input class="mb-3" type="text" name="email" placeholder="Email" id="email">
                                <input class="mb-3" type="password" name="password" placeholder="Password"
                                    id="password">
                                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">Login</button>
                            </form>

                            <a href="<?= base_url() ?>/register">
                                <p class="mb-4 mt-4">wala ka pa acc?</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

