<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 90vh;
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 0 2em 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 20px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fff;
        }
        a {
            text-decoration: none;
            color: #333;
        }
        a:hover {
            text-decoration: underline;
        }
        .button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
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
    <h1>Daftar Buku</h1>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Nomor Inventaris</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        include 'koneksi.php';
        session_start();
        
        $query = "SELECT * FROM buku";
        $result = $koneksi->query($query);
        
        $no = 1; // Variabel nomor urut
        
        if (isset($_GET['success'])) {
            echo '<div class="success">Buku berhasil dihapus!</div>';
        } elseif (isset($_GET['error'])) {
            echo '<div class="error">Terjadi kesalahan saat menghapus buku.</div>';
        }
        
        if (isset($_SESSION['success_message'])) {
            echo '<div class="success">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
        } elseif (isset($_SESSION['error_message'])) {
            echo '<div class="error">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']);
        }
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row['judul'] . "</td>";
                echo "<td>" . $row['penulis'] . "</td>";
                echo "<td>" . $row['penerbit'] . "</td>";
                echo "<td>" . $row['nomor_inventaris'] . "</td>";
                echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                echo "</tr>";
                $no++; // Tambahkan nomor urut
            }
        } else {
            echo '<tr><td colspan="6">Tidak ada data buku.</td></tr>';
        }
        
        $koneksi->close();
        ?>
    </table>
    <a class="button" href="create.php">Tambah Buku Baru</a>
</body>
</html>
