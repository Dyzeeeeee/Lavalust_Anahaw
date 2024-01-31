<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>/website" class="brand-link">
    <img src="<?= base_url() ?>/public/admin/images/anahaw_logo.png" alt="AdminLTE Logo" class="brand-image img-circle " style="opacity: 2">
    <span class="brand-text font-weight-light">Anahaw Logo</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>/public/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $user['firstName']; ?> <?= $user['lastName']; ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= base_url() ?>/admin/dashboard" class="nav-link">
            <i class="nav-icon fas fa-gauge"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">Restaurant</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>/admin/menu" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Menu
            </p>
          </a>
        </li>
        <li class="nav-header">Inventory</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>/admin/inventory/food-stocks" class="nav-link">
            <i class="nav-icon fas fa-boxes-stacked"></i>
            <p>
              Stocks
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>/admin/inventory/suppliers" class="nav-link">
            <i class="nav-icon fas fa-store"></i>
            <p>
              Suppliers
            </p>
          </a>
        </li>

        <li class="nav-header">Point of Sale</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>/admin/pos/session" class="nav-link">
            <i class="nav-icon fas fa-bell-concierge"></i>
            <p>
              Counter
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>/admin/pos/orders" class="nav-link">
            <i class="nav-icon fas fa-file-invoice"></i>
            <p>
              Orders
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>/admin/pos/customers" class="nav-link">
            <i class="nav-icon fas fa-people-group"></i>
            <p>
              Customers
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
            </p>
          </a>
        </li> -->
        <li class="nav-header">Activity</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>/email-sender" class="nav-link">
            <i class="nav-icon fa fa-paper-plane"></i>
            <p>
              Email Sender
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>/chats/3" class="nav-link">
            <i class="nav-icon fa fa-comments "></i>
            <p>
              Chats
            </p>
          </a>
        </li>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>