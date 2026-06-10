<?php
include 'koneksi.php';

// Fitur Hapus Data (Delete)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM riwayat_kunjungan WHERE id = '$id'");
    if ($queryHapus) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Riwayat Kunjungan Perpustakaan</h2>
        <a href="tambah.php" class="btn">⁺ Tambah Pengunjung</a>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengunjung</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Keperluan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM riwayat_kunjungan ORDER BY id DESC");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($data['nama_pengunjung']); ?></td>
                    <td><?= htmlspecialchars($data['kelas']); ?></td>
                    <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                    <td><?= htmlspecialchars($data['keperluan']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-warning" style="margin:0; padding: 4px 8px;">Edit</a>
                        <a href="index.php?hapus=<?= $data['id']; ?>" class="btn btn-danger" style="margin:0; padding: 4px 8px;" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>