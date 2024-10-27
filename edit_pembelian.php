<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Pembelian</title>
</head>
<body>
  <!-- Form Edit Pembelian -->
  <h3>Edit Pembelian</h3>
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
    <input type="hidden" name="id_pembelian" value="<?php echo $_GET['id']; ?>">
    <button type="submit" name="update">Edit Pembelian</button>
</form>
</body>
</html>