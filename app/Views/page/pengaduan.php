<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Pengaduan</h2>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="/reports/store" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_pelaporan" class="form-label">Tanggal Pelaporan</label>
                <input type="date" class="form-control" id="tanggal_pelaporan" name="tanggal_pelaporan" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kerusakan" class="form-label">Jenis Kerusakan</label>
                <select name="jenis_kerusakan" class="form-control" required>
                    <option value="Peralatan Lab & Bengkel">Peralatan Lab & Bengkel</option>
                    <option value=" Instalasi Kelistrikan"> Instalasi Kelistrikan</option>
                    <option value="Kendaraan Dinas">Kendaraan Dinas</option>
                    <option value="Perangkat Komputer/Elektronik">Perangkat Komputer/Elektronik</option>
                    <option value="Pompa Air">Pompa Air</option>
                    <option value="Air Conditioner (AC)">Air Conditioner (AC)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/" class="btn btn-danger">Kembali</a>
        </form>
    </div>
</body>
</html>
