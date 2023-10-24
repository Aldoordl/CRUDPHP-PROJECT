<?php
$host = "localhost";
$username = ""; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = ""; // Ganti dengan database

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
