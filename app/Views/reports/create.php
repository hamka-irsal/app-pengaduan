<?= $this->extend('admin_layout') ?>

<?= $this->section('content') ?>
<h1>Tambah Laporan</h1>
<form action="/reports/store" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal_pelaporan">Tanggal Pelaporan</label>
        <input type="date" name="tanggal_pelaporan" class="form-control" required>
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
        <label for="jenis_kerusakan">Jenis Kerusakan</label>
        <select name="jenis_kerusakan" class="form-control" required>
            <option value="Peralatan Lab & Bengkel">Peralatan Lab & Bengkel</option>
            <option value=" Instalasi Kelistrikan"> Instalasi Kelistrikan</option>
            <option value="Kendaraan Dinas">Kendaraan Dinas</option>
            <option value="Perangkat Komputer/Elektronik">Perangkat Komputer/Elektronik</option>
            <option value="Pompa Air">Pompa Air</option>
            <option value="Air Conditioner (AC)">Air Conditioner (AC)</option>
        </select>
    </div>
    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" class="form-control-file" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?= $this->endSection() ?>
