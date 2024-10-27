<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Barang</title>
</head>
<body>
  <!-- Form Edit Barang -->
  <h3>Edit Barang</h3>
<form action="edit_barang.php" method="POST">
    <label>Nama Barang:</label>
    <input type="text" name="nama_barang" required><br>
    <label>Keterangan:</label>
    <textarea name="keterangan"></textarea><br>
    <label>Satuan:</label>
    <input type="text" name="satuan"><br>
    <label>Pengguna:</label>
    <select name="id_pengguna" required>
        <?php
        $users = $pengguna->read();
        foreach ($users as $user) {
            echo "<option value='{$user['IdPengguna']}'>{$user['NamaPengguna']}</option>";
        }
        ?>
    </select><br>
    <label>Suplier:</label>
    <select name="id_supplier" required>
        <?php
        $suppliers = $supplier->read();
        foreach ($suppliers as $supplier) {
            echo "<option value='{$supplier['IdSupplier']}'>{$supplier['NamaSupplier']}</option>";
        }
        ?>
    </select><br>
    <input type="hidden" name="id_barang" value="<?php echo $_GET['id']; ?>">
    <button type="submit" name="update">Edit Barang</button>
</form>
</body>
</html>