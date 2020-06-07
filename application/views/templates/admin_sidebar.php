

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-fw fa-user-shield"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Erinnear</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Administrator
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - My Profile -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin')  ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>My Profile</span></a>
      </li>

      <!-- Nav Item - Edit Profile -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/edit')  ?>">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Edit Profile</span></a>
      </li>

      <!-- Nav Item - View Order -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/order')  ?>">
          <i class="fas fa-fw fa-store"></i>
          <span>Order</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Log Out -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
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
