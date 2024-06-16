<?= $this->extend('admin_layout') ?>

<?= $this->section('content') ?>
<h1>Edit Pengguna</h1>
<form action="/users/update/<?= $user['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
    </div>
    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" name="nip" class="form-control" value="<?= $user['nip'] ?>" required>
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="<?= $user['jabatan'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?= $this->endSection() ?>
