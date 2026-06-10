<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama      = $_POST['nama_pengunjung'];
    $kelas     = $_POST['kelas'];
    $tanggal   = $_POST['tanggal'];
    $keperluan = $_POST['keperluan'];

    $queryTambah = mysqli_query($koneksi, "INSERT INTO riwayat_kunjungan (id, nama_pengunjung, kelas, tanggal, keperluan) VALUES (NULL, '$nama', '$kelas', '$tanggal', '$keperluan')");

    if ($queryTambah) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal menambah data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengunjung</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Pengunjung</h2>
        <a href="index.php" class="btn btn-danger">◀ Kembali</a>

        <form action="" method="POST">
            <label>Nama Pengunjung</label>
            <input type="text" name="nama_pengunjung" required placeholder="Masukkan nama lengkap">

            <label>Kelas</label>
            <input type="text" name="kelas" required placeholder="Contoh: X DPPLG 1">

            <label>Tanggal Kunjungan</label>
            <input type="date" name="tanggal" required value="<?= date('Y-m-d'); ?>">

            <label>Keperluan</label>
            <textarea name="keperluan" rows="4" required placeholder="Membaca buku, meminjam buku..."></textarea>

            <button type="submit" name="submit" class="btn" style="border:none; cursor:pointer;">Simpan Data</button>
        </form>
    </div>
</body>
</html>