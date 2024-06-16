<!-- app/Views/partials/sidebar.php -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">APP PENGADUAN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('users') ?>">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Data Diri</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('reports') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pelaporan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('assessments') ?>">
            <i class="fas fa-fw fa-star"></i>
            <span>Penilaian</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pengaduan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" class="nav-link" href="<?= base_url('reports') ?>">Belum Selesai</a>
                <a class="collapse-item" class="nav-link" href="<?= base_url('reports') ?>">Proses</a>
                <a class="collapse-item" class="nav-link" href="<?= base_url('reports') ?>">Selesai</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Add more menu items here -->

</ul>
