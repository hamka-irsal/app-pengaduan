<?= $this->extend('admin_layout') ?>

<?= $this->section('content') ?>
<h1>Daftar Penilaian</h1>
<a href="/assessments/create" class="btn btn-primary">Tambah Penilaian</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Tanggal Penilaian</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>Isi Penilaian</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($assessments as $assessment): ?>
        <tr>
            <td><?= $assessment['id'] ?></td>
            <td><?= $assessment['email'] ?></td>
            <td><?= $assessment['tanggal_penilaian'] ?></td>
            <td><?= $assessment['nama'] ?></td>
            <td><?= $assessment['nip'] ?></td>
            <td><?= $assessment['jabatan'] ?></td>
            <td><?= $assessment['isi_penilaian'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
