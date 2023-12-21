<div class="container-fluid nav-bar">
    <div class="container">
        <nav class="navbar navbar-light navbar-expand-lg py-4">
            <a href="" class="navbar-brand">
                <img src="<?= base_url() ?>/public/website/img/logo.png" alt="" class="logo" style="width: 200px;">
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="<?= base_url() ?>/website/home" class="nav-item nav-link active">Home</a>
                    <a href="<?= base_url() ?>/website/about" class="nav-item nav-link">About</a>
                    <a href="<?= base_url() ?>/website/service" class="nav-item nav-link">Services</a>
                    <a href="<?= base_url() ?>/website/event" class="nav-item nav-link">Events</a>
                    <a href="<?= base_url() ?>/website/menu" class="nav-item nav-link">Menu</a>
                    <div class="nav-item dropdown">
                        <a href="<?= base_url() ?>/website/#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light">
                            <a href="<?= base_url() ?>/website/book" class="dropdown-item">Booking</a>
                            <a href="<?= base_url() ?>/website/blog" class="dropdown-item">Our Blog</a>
                            <a href="<?= base_url() ?>/website/team" class="dropdown-item">Our Team</a>
                            <a href="<?= base_url() ?>/website/testimonial" class="dropdown-item">Testimonial</a>
                            <a href="<?= base_url() ?>/website/404" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="<?= base_url() ?>/website/contact" class="nav-item nav-link">Contact</a>

                    <!-- Check if the user is logged in -->

                </div>
                <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                <?php if (isset($_SESSION['logged_in'])) {
                ?>
                    <a href="<?= base_url() ?>/logout" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Logout</a>
                <?php } else { ?>
                    <!-- <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button> -->
                    <a href="<?= base_url() ?>/login" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Login</a>
                <?php } ?>


            </div>
        </nav>
    </div>
</div>