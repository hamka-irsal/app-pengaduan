<!-- app/Views/dashboard.php -->
<?= $this->extend('admin_layout') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('header') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">

<!-- Content Row -->

<!-- Content Row -->

<?php
    $session = session();
    if(!$session->get('logged_in')) {
        return redirect()->to('/auth/login');
    }
    echo "Welcome to the Dashboard, " . $session->get('nama') . " (" . $session->get('role') . ")";
?>

</div>
<?= $this->endSection() ?>
