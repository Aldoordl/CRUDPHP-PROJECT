<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM buku WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        // Buku berhasil dihapus, arahkan kembali ke halaman daftar buku dengan notifikasi.
        header("Location: index.php?success=1");
    } else {
        // Jika terjadi kesalahan saat menghapus, arahkan kembali ke halaman daftar buku dengan notifikasi.
        header("Location: index.php?error=1");
    }
} else {
    header("Location: index.php");
}
?>
