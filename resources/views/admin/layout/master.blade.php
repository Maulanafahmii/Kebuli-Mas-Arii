<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebuli | Mas Ari @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Styling Sidebar Modern */
        .main-sidebar {
            background-color: #222d32;
            transition: width 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        }
        .brand-link {
            background-color: #1a2226;
            padding: 15px;
            transition: all 0.3s ease;
        }
        .brand-link:hover {
            background-color: #1e2a30;
        }
        .brand-image {
            width: 40px;
            height: 40px;
        }
        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link {
            padding: 12px 20px;
            color: #b8c7ce;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active,
        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link:hover {
            background-color: #1e2a30;
            color: #ffffff;
            border-left: 4px solid #00c0ef;
        }
        .nav-icon {
            margin-right: 10px;
        }
        .user-panel {
            padding: 15px;
            background-color: #1a2226;
            margin-bottom: 10px;
        }
        .user-panel .image img {
            width: 35px;
            height: 35px;
            object-fit: cover;
        }
        .user-panel .info a {
            color: #b8c7ce;
            font-size: 14px;
        }
        .form-control-sidebar {
            border-radius: 20px;
            padding: 5px 15px;
        }
        .btn-sidebar {
            background-color: #00c0ef;
            border-radius: 0 20px 20px 0;
        }

        /* Responsivitas */
        @media (max-width: 767.98px) {
            .main-sidebar {
                margin-left: -250px;
                transition: margin-left 0.3s ease;
            }
            .main-sidebar.open {
                margin-left: 0;
            }
            .navbar .nav-link {
                padding: 5px 10px;
            }
            .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link {
                padding: 10px 15px;
                font-size: 13px;
            }
            .user-panel .image img {
                width: 30px;
                height: 30px;
            }
        }

        /* Animasi Toggle Sidebar */
        [data-widget="pushmenu"] {
            transition: all 0.3s ease;
        }
        [data-widget="pushmenu"].active {
            color: #00c0ef;
        }

        /* Style untuk gambar di navbar */
        .navbar .img-circle {
            width: 25px;
            height: 25px;
            object-fit: cover;
        }

        /* Pastikan logout berada di bawah */
        .sidebar .nav-sidebar:last-child {
            margin-top: auto;
        }
    </style>
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- Messages dropdown content -->
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- Notifications dropdown content -->
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img src="{{ asset('assets/img/admin.png') }}" class="img-circle" alt="User Image" style="width: 25px; height: 25px;">
                    <span class="ml-1">Admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User dropdown content -->
                </div>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
            <span class="brand-text font-weight-bold text-white">Kebuli Mas Ari</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                <div class="image">
                    <img src="{{ asset('assets/img/admin.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info ml-2">
                    <a href="#" class="d-block text-white">Admin</a>
                </div>
            </div>
            <div class="form-inline">
                <div class="input-group w-100" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar bg-dark text-white" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar bg-info">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('menus.index') }}" class="nav-link {{ Route::is('menus.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-utensils"></i>
                            <p>Menu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sales.index') }}" class="nav-link {{ Route::is('sales.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Penjualan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('testimoni.index') }}" class="nav-link {{ Route::is('testimoni.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-comment"></i>
                            <p>Testimoni</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Logout dipindahkan ke bagian bawah -->
            <nav class="mt-auto">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('header')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('breadcrumb')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>
</div>
<!-- Di bagian bawah admin.layout.master -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@yield('scripts')
</body>
</html>
