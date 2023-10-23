<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku Baru</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        form {
            background: #fff;
            width: 400px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 2em;
        }
        input[type="text"] {
            width: 95%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        a {
            text-decoration: none;
            color: #333;
        }
        a:hover {
            text-decoration: underline;
        }
        .success, .error {
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 1em;
        }

        .success {
            color: green;
            background-color: #c8f7c5;
        }

        .error {
            color: red;
            background-color: #fccaca;
        }
    </style>
</head>
<body>
    <h1>Edit Buku</h1>
    <?php
    include 'koneksi.php';

    // Cek apakah ada parameter success atau error dalam URL
    if (isset($_GET['success'])) {
        echo '<div class="success">Buku berhasil diperbarui!</div>';
    } elseif (isset($_GET['error'])) {
        echo '<div class="error">Terjadi kesalahan saat memperbarui buku.</div>';
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM buku WHERE id = $id";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $nomor_inventaris = $_POST['nomor_inventaris'];

        $query = "UPDATE buku SET judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', nomor_inventaris = '$nomor_inventaris' WHERE id = $id";

        // Eksekusi query
        if (mysqli_query($koneksi, $query)) {
            // Buku berhasil diperbarui, arahkan kembali ke halaman edit dengan notifikasi success
            header("Location: edit.php?id=$id&success=1");
        } else {
            // Terjadi kesalahan saat memperbarui buku, arahkan kembali ke halaman edit dengan notifikasi error
            header("Location: edit.php?id=$id&error=1");
        }
    }
    ?>
    <form method="post">
        Judul Buku: <input type="text" name="judul" value="<?php echo $row['judul']; ?>"><br>
        Penulis: <input type="text" name="penulis" value="<?php echo $row['penulis']; ?>"><br>
        Penerbit: <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>"><br>
        Nomor Inventaris: <input type="text" name="nomor_inventaris" value="<?php echo $row['nomor_inventaris']; ?>"><br>
        <input type="submit" value="Simpan">
    </form>
    <a href="index.php">Kembali ke Daftar Buku</a>
</body>
</html>
