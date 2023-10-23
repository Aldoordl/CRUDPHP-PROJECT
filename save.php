<?php
include 'koneksi.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $nomor_inventaris = $_POST['nomor_inventaris'];

    $query = "INSERT INTO buku (judul, penulis, penerbit, nomor_inventaris) VALUES ('$judul', '$penulis', '$penerbit', '$nomor_inventaris')";
    
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['success_message'] = "Buku berhasil disimpan.";
    } else {
        $_SESSION['error_message'] = "Terjadi kesalahan. Buku tidak dapat disimpan.";
    }
}

header("Location: index.php");
?>
