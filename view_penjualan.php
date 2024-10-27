<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Penjualan</title>
</head>
<body>
<a href="/tk4"><button>Menu Utama</button></a>
<a href='index.php?logout=1'><button>Logout</button></a>
  <!-- Form Tambah Penjualan -->
  <h3>Create Penjualan</h3>
<form action="view_penjualan.php" method="POST">
    <label>Jumlah Penjualan:</label>
    <input type="number" name="jumlah_penjualan" required><br>
    <label>Harga Jual:</label>
    <input type="text" name="harga_jual" required><br>
    <label>Pengguna:</label>
    <select name="id_pengguna" required>
        <?php
        $users = $pengguna->read();
        foreach ($users as $user) {
            echo "<option value='{$user['IdPengguna']}'>{$user['NamaPengguna']}</option>";
        }
        ?>
    </select><br>
    <label>Pelanggan:</label>
    <select name="id_pelanggan" required>
        <?php
        $clients = $pelanggan->read();
        foreach ($clients as $client) {
            echo "<option value='{$client['IdPelanggan']}'>{$client['NamaPelanggan']}</option>";
        }
        ?>
    </select><br>
    <button type="submit" name="create">Tambah Penjualan</button>
</form>

<!-- Daftar Penjualan -->
<h3>Daftar Penjualan</h3>
<table>
    <tr>
        <th>Jumlah Penjualan</th>
        <th>Harga Jual</th>
        <th>Pengguna</th>
        <th>Pelanggan</th>
        <th>Aksi</th>
    </tr>
    <?php
    $data = $penjualan->read();
    foreach ($data as $row) {
        echo "<tr>
                <td>{$row['JumlahPenjualan']}</td>
                <td>{$row['HargaJual']}</td>
                <td>{$row['NamaPengguna']}</td>
                <td>{$row['NamaPelanggan']}</td>
                <td>
                    <a href='edit_penjualan.php?id={$row['IdPenjualan']}'>Edit</a>
                    <a href='view_penjualan.php?delete=1&id={$row['IdPenjualan']}'>Hapus</a>
                </td>
              </tr>";
    }
    ?>
</table>
</body>
</html>