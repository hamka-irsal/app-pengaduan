<?= $this->extend('admin_layout') ?>

<?= $this->section('content') ?>
<h1>Tambah Penilaian</h1>
<form action="/assessments/store" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal_penilaian">Tanggal Penilaian</label>
        <input type="date" name="tanggal_penilaian" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" name="nip" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="isi_penilaian">Isi Penilaian</label>
        <select name="isi_penilaian" class="form-control" required>
            <option value="Baik">Baik</option>
            <option value="Cukup">Cukup</option>
            <option value="Kurang">Kurang</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?= $this->endSection() ?>
