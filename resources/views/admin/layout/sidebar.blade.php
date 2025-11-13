<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Nasi Kebuli Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Fahmyy</a>
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
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Menu -->
        <li class="nav-item">
          <a href="{{ route('menus.index') }}" class="nav-link {{ Route::is('menus.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-utensils"></i>
            <p>Menu</p>
          </a>
        </li>

        <!-- Penjualan -->
        <li class="nav-item">
          <a href="{{ route('sales.index') }}" class="nav-link {{ Route::is('sales.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Penjualan</p>
          </a>
        </li>

        <!-- Testimoni -->
        <li class="nav-item">
          <a href="{{ route('testimoni.index') }}" class="nav-link {{ Route::is('testimoni.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comment"></i>
            <p>Testimoni</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
