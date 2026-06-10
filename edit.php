<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
$queryData = mysqli_query($koneksi, "SELECT * FROM riwayat_kunjungan WHERE id = '$id'");
$data = mysqli_fetch_array($queryData);

// Proses Update Data
if (isset($_POST['update'])) {
    $nama      = $_POST['nama_pengunjung'];
    $kelas     = $_POST['kelas'];
    $tanggal   = $_POST['tanggal'];
    $keperluan = $_POST['keperluan'];

    $queryUpdate = mysqli_query($koneksi, "UPDATE riwayat_kunjungan SET 
                    nama_pengunjung = '$nama', 
                    kelas = '$kelas', 
                    tanggal = '$tanggal', 
                    keperluan = '$keperluan' 
                    WHERE id = '$id'");

    if ($queryUpdate) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal mengubah data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengunjung</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Pengunjung</h2>
        <a href="index.php" class="btn btn-danger">◀ Kembali</a>

        <form action="" method="POST">
            <label>Nama Pengunjung</label>
            <input type="text" name="nama_pengunjung" value="<?= htmlspecialchars($data['nama_pengunjung']); ?>" required>

            <label>Kelas</label>
            <input type="text" name="kelas" value="<?= htmlspecialchars($data['kelas']); ?>" required>

            <label>Tanggal Kunjungan</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required>

            <label>Keperluan</label>
            <textarea name="keperluan" rows="4" required><?= htmlspecialchars($data['keperluan']); ?></textarea>

            <button type="submit" name="update" class="btn btn-warning" style="border:none; cursor:pointer;">Perbarui Data</button>
        </form>
    </div>
</body>
</html>