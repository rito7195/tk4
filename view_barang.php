<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Barang</title>
</head>
<body>
  <a href="Home.php"><button>Menu Utama</button></a>
  <a href='index.php?logout=1'><button>Logout</button></a>
  <!-- Form Tambah Barang -->
  <h3>Create Barang</h3>
<form action="view_barang.php" method="POST">
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
    <button type="submit" name="create">Tambah Barang</button>
</form>

<!-- Daftar Barang -->
<h3>Daftar Barang</h3>
<table>
    <tr>
        <th>Nama Barang</th>
        <th>Keterangan</th>
        <th>Satuan</th>
        <th>Pengguna</th>
        <th>Supplier</th>
        <th>Aksi</th>
    </tr>
    <?php
    $data = $barang->read();
    foreach ($data as $row) {
        echo "<tr>
                <td>{$row['NamaBarang']}</td>
                <td>{$row['Keterangan']}</td>
                <td>{$row['Satuan']}</td>
                <td>{$row['NamaPengguna']}</td>
                <td>{$row['NamaSupplier']}</td>
                <td>
                    <a href='edit_barang.php?id={$row['IdBarang']}'>Edit</a>
                    <a href='view_barang.php?delete=1&id={$row['IdBarang']}'>Hapus</a>
                </td>
              </tr>";
    }
    ?>
</table>
</body>
</html>