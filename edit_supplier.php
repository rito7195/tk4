<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Supplier</title>
</head>
<body>
  <!-- Form Edit Supplier -->
<h3>Edit Supplier</h3>
<form action="edit_supplier.php" method="POST">
    <label>Nama Supplier:</label>
    <input type="text" name="nama_supplier" required><br>
    <label>Alamat:</label>
    <textarea name="alamat_supplier"></textarea><br>
    <label>No Telp:</label>
    <input type="text" name="no_telp"><br>
    <input type="hidden" name="id_supplier" value="<?php echo $_GET['id']; ?>">
    <button type="submit" name="update">Edit Supplier</button>
</form>
</body>
</html>