<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Penjualan</title>
</head>
<body>
  <!-- Form Edit Penjualan -->
  <h3>Create Penjualan</h3>
<form action="edit_penjualan.php" method="POST">
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
    <input type="hidden" name="id_penjualan" value="<?php echo $_GET['id']; ?>">
    <button type="submit" name="update">Update Penjualan</button>
</form>
</body>
</html>