<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Pembelian</title>
</head>
<body>
<a href="/tk4"><button>Menu Utama</button></a>
  <!-- Form Tambah Pembelian -->
  <h3>Create Pembelian</h3>
<form action="view_pembelian.php" method="POST">
    <label>Jumlah Pembelian:</label>
    <input type="number" name="jumlah_pembelian" required><br>
    <label>Harga Beli:</label>
    <input type="text" name="harga_beli" required><br>
    <label>Pengguna:</label>
    <select name="id_pengguna" required>
        <?php
        $users = $pengguna->read();
        foreach ($users as $user) {
            echo "<option value='{$user['IdPengguna']}'>{$user['NamaPengguna']}</option>";
        }
        ?>
    </select><br>
    <button type="submit" name="create">Tambah Pembelian</button>
</form>

<!-- Daftar Pembelian -->
<h3>Daftar Pembelian</h3>
<table>
    <tr>
        <th>Jumlah Pembelian</th>
        <th>Harga Beli</th>
        <th>Pengguna</th>
        <th>Aksi</th>
    </tr>
    <?php
    $data = $pembelian->read();
    foreach ($data as $row) {
        echo "<tr>
                <td>{$row['JumlahPembelian']}</td>
                <td>{$row['HargaBeli']}</td>
                <td>{$row['NamaPengguna']}</td>
                <td>
                    <a href='edit_pembelian.php?id={$row['IdPembelian']}'>Edit</a>
                    <a href='view_pembelian.php?delete=1&id={$row['IdPembelian']}'>Hapus</a>
                </td>
              </tr>";
    }
    ?>
</table>
</body>
</html>