<?= $this->extend('admin_layout') ?>

<?= $this->section('content') ?>
<h1>Daftar Pengguna</h1>
<a href="/users/create" class="btn btn-primary">Tambah Pengguna</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Email</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['nama'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['nip'] ?></td>
            <td><?= $user['jabatan'] ?></td>
            <td>
                <a href="/users/edit/<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="/users/delete/<?= $user['id'] ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
