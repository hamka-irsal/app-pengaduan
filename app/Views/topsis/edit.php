<!-- app/Views/edit_weight.php -->
<?= $this->extend('admin_layout') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Bobot Kriteria</title>
</head>
<body>
    <h1>Edit Bobot Kriteria</h1>
    
    <form action="/topsis/update_weight" method="post">
        <input type="hidden" name="report_id" value="<?= $report['id']; ?>">
        
        <label for="darurat">Darurat:</label>
        <input type="text" id="darurat" name="darurat" value="<?= $report['darurat']; ?>"><br><br>
        
        <label for="mendesak">Mendesak:</label>
        <input type="text" id="mendesak" name="mendesak" value="<?= $report['mendesak']; ?>"><br><br>
        
        <label for="jangka_panjang">Jangka Panjang:</label>
        <input type="text" id="jangka_panjang" name="jangka_panjang" value="<?= $report['jangka_panjang']; ?>"><br><br>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</body>
</html>
<?= $this->endSection() ?>
