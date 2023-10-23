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
            height: 90vh;
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
    </style>
</head>
<body>
    <h1>Tambah Buku Baru</h1>
    <form method="post" action="save.php">
        Judul Buku: <input type="text" name="judul"><br>
        Penulis: <input type="text" name="penulis"><br>
        Penerbit: <input type="text" name="penerbit"><br>
        Nomor Inventaris: <input type="text" name="nomor_inventaris"><br>
        <input type="submit" value="Simpan">
    </form>
    <a href="index.php">Kembali ke Daftar Buku</a>
</body>
</html>
