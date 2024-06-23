<?= $this->extend('admin_layout') ?>

<?= $this->section('content') ?>
<h1>Daftar Laporan</h1>
<!-- <a href="/reports/create" class="btn btn-primary">Tambah Laporan</a> -->
<?php if (session()->getFlashdata('message')) : ?>
    <p><?= session()->getFlashdata('message') ?></p>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Tanggal Pelaporan</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>Jenis Kerusakan</th>
            <th>Gambar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($reports as $report): ?>
        <tr>
            <td><?= $report['id'] ?></td>
            <td><?= $report['email'] ?></td>
            <td><?= $report['tanggal_pelaporan'] ?></td>
            <td><?= $report['nama'] ?></td>
            <td><?= $report['nip'] ?></td>
            <td><?= $report['jabatan'] ?></td>
            <td><?= $report['jenis_kerusakan'] ?></td>
            <td><img src="/uploads/<?= $report['gambar'] ?>" width="100" alt="gambar"></td>
            <td>
                <?php if ($report['status'] == 'pending') : ?>
                    <a href="/report/confirm/<?= $report['id'] ?>" class="btn btn-warning" >Konfirmasi</a>
                <?php endif; ?>
                <?php if ($report['status'] == 'confirmed') : ?>
                    <a class="btn btn-success" >Selesai</a>
                    <a href="/report/delete/<?= $report['id'] ?>" class="btn btn-danger">Hapus</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
