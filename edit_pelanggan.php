<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Pelanggan</title>
</head>
<body>
  <!-- Form Edit Pelanggan -->
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
    <input type="hidden" name="id_pelanggan" value="<?php echo $_GET['id']; ?>">
    <button type="submit" name="update">Edit Pelanggan</button>
</form>
</body>
</html>