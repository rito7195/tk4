<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Supplier</title>
</head>
<body>
<a href="/tk4"><button>Menu Utama</button></a>
<!-- Form Tambah Supplier -->
<h3>Create Supplier</h3>
<form action="view_supplier.php" method="POST">
    <label>Nama Supplier:</label>
    <input type="text" name="nama_supplier" required><br>
    <label>Alamat:</label>
    <textarea name="alamat_supplier"></textarea><br>
    <label>No Telp:</label>
    <input type="text" name="no_telp"><br>
    <button type="submit" name="create">Tambah Supplier</button>
</form>

<!-- Daftar Supplier -->
<h3>Daftar Supplier</h3>
<table>
    <tr>
        <th>Nama Supplier</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Aksi</th>
    </tr>
    <?php
    $data = $supplier->read();
    foreach ($data as $row) {
        echo "<tr>
                <td>{$row['NamaSupplier']}</td>
                <td>{$row['AlamatSupplier']}</td>
                <td>{$row['NoTelp']}</td>
                <td>
                    <a href='edit_supplier.php?id={$row['IdSupplier']}'>Edit</a>
                    <a href='view_supplier.php?delete=1&id={$row['IdSupplier']}'>Hapus</a>
                </td>
              </tr>";
    }
    ?>
</table>
</body>
</html>