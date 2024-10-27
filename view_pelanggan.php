<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Pelanggan</title>
</head>
<body>
<a href="/tk4"><button>Menu Utama</button></a>
<a href='index.php?logout=1'><button>Logout</button></a>
  <!-- Form Tambah Pelanggan -->
  <h3>Create Pelanggan</h3>
<form action="view_pelanggan.php" method="POST">
    <label>Nama Pelanggan:</label>
    <input type="text" name="nama_pelanggan" required><br>
    <label>Alamat:</label>
    <textarea name="alamat_pelanggan"></textarea><br>
    <label>No Telp:</label>
    <input type="text" name="nomor_telp"><br>
    <label>Email:</label>
    <input type="email" name="email"><br>
    <button type="submit" name="create">Tambah Pelanggan</button>
</form>

<!-- Daftar Pelanggan -->
<h3>Daftar Pelanggan</h3>
<table>
    <tr>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    <?php
    $data = $pelanggan->read();
    foreach ($data as $row) {
        echo "<tr>
                <td>{$row['NamaPelanggan']}</td>
                <td>{$row['AlamatPelanggan']}</td>
                <td>{$row['NomorTelp']}</td>
                <td>{$row['Email']}</td>
                <td>
                    <a href='edit_pelanggan.php?id={$row['IdPelanggan']}'>Edit</a>
                    <a href='view_pelanggan.php?delete=1&id={$row['IdPelanggan']}'>Hapus</a>
                </td>
              </tr>";
    }
    ?>
</table>
</body>
</html>