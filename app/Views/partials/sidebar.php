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
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('topsis') ?>">
            <i class="fas fa-fw fa-urgent"></i>
            <span>SPK Topsis</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Add more menu items here -->

</ul>
