

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-fw fa-tshirt text-warning"></i>
        </div>
        <div class="sidebar-brand-text text-warning mx-3">Erinnear</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Admin
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt text-warning"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - My Profile -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin')  ?>">
          <i class="fas fa-fw fa-user text-warning"></i>
          <span>My Profile</span></a>
      </li>

      <!-- Nav Item - Edit Profile -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/edit')  ?>">
          <i class="fas fa-fw fa-user-cog text-warning"></i>
          <span>Edit Profile</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - View Order -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/order')  ?>">
          <i class="fas fa-fw fa-store text-warning"></i>
          <span>Order</span></a>
      </li>

      <!-- Nav Item - View Order History -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/orderHistory')  ?>">
          <i class="fas fa-fw fa-clock text-warning"></i>
          <span>Riwayat Pesanan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Log Out -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt text-warning"></i>
          <span>Log Out</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
