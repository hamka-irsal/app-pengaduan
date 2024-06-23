<?= $this->extend('admin_layout') ?>

<?= $this->section('content') ?>

<h1>SPK Topsis</h1>
    
    <h2>Bobot Kriteria</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Darurat</th>
                <th>Mendesak</th>
                <th>Jangka Panjang</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $weights[0]; ?></td>
                <td><?= $weights[1]; ?></td>
                <td><?= $weights[2]; ?></td>
            </tr>
        </tbody>
    </table>
    
    <h2>Daftar Laporan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Jenis Kerusakan</th>
                <th>Darurat</th>
                <th>Mendesak</th>
                <th>Jangka Panjang</th>
                <th>Score</th>
                <th>Ubah Bobot</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report): ?>
                <tr>
                    <td><?= $report['jenis_kerusakan']; ?></td>
                    <td><?= $report['darurat']; ?></td>
                    <td><?= $report['mendesak']; ?></td>
                    <td><?= $report['jangka_panjang']; ?></td>
                    <td><?= $report['score']; ?></td>
                    <td>
                        <a href="<?= base_url('topsis/edit/' . $report['id']); ?>" class="btn btn-warning">Ubah</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <h2>Jumlah Total Score</h2>
    <p><?= $total_score; ?></p>
<?= $this->endSection() ?>