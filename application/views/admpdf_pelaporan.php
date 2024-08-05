<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengaduan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Laporan Pengaduan</h1>
    <table>
        <thead>
            <tr>
                <th>Field</th>
                <th>Description</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pengaduan_data as $row): ?>
            <tr>
                <td>No Laporan</td>
                <td><?php echo $row['no_laporan']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Nama Alat</td>
                <td><?php echo $row['nama_alat']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Spesifikasi</td>
                <td><?php echo $row['spesifikasi']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Kejadian</td>
                <td><?php echo $row['kejadian']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Kerusakan</td>
                <td><?php echo $row['kerusakan']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>No Inventori</td>
                <td><?php echo $row['no_inventori']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><?php echo $row['tanggal']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><?php echo $row['jurusan']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td><?php echo $row['program_studi']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo $row['nama']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td><?php echo $row['nip']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Tanda Tangan</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Catatan Tambahan</td>
                <td><?php echo $row['catatan_tambahan']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Dokumentasi</td>
                <td><?php echo $row['dokumentasi']; ?></td>
                <td></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
