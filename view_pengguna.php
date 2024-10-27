<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pengguna</title>
</head>
<body>
<a href="/tk4"><button>Menu Utama</button></a>
<a href='index.php?logout=1'><button>Logout</button></a>
<!-- create_pengguna.php -->
<h2>Create Pengguna</h2>
<form action="view_pengguna.php" method="POST">
    <label>Nama Pengguna:</label>
    <input type="text" name="nama_pengguna" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <label>Nama Depan:</label>
    <input type="text" name="nama_depan" required><br>
    <label>Nama Belakang:</label>
    <input type="text" name="nama_belakang"><br>
    <label>No HP:</label>
    <input type="text" name="no_hp"><br>
    <label>Alamat:</label>
    <textarea name="alamat"></textarea><br>
    <label>Id Akses:</label>
    <input type="number" name="id_akses"><br>
    <button type="submit" name="create">Add Pengguna</button>
</form>

<!-- read_pengguna.php -->
<h2>Read Pengguna</h2>
<?php
$data = $pengguna->read();
?>

<table>
    <tr><th>Id Pengguna</th><th>Nama Pengguna</th><th>Nama Depan</th><th>Nama Belakang</th></tr>
    <?php foreach ($data as $row): ?>
    <tr>
        <td><?= $row['IdPengguna'] ?></td>
        <td><?= $row['NamaPengguna'] ?></td>
        <td><?= $row['NamaDepan'] ?></td>
        <td><?= $row['NamaBelakang'] ?></td>
        <td><a href="view_pengguna.php?delete=1&id=<?= $row['IdPengguna'] ?>">Hapus</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- update_pengguna.php -->
<h2>Update Pengguna</h2>
<form action="view_pengguna.php" method="POST">
    <label>Id Pengguna:</label>
    <input type="number" name="id_pengguna" required><br>
    <label>Nama Pengguna:</label>
    <input type="text" name="nama_pengguna" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <label>Nama Depan:</label>
    <input type="text" name="nama_depan" required><br>
    <label>Nama Belakang:</label>
    <input type="text" name="nama_belakang"><br>
    <label>No HP:</label>
    <input type="text" name="no_hp"><br>
    <label>Alamat:</label>
    <textarea name="alamat"></textarea><br>
    <label>Id Akses:</label>
    <input type="number" name="id_akses"><br>
    <button type="submit" name="update">Update Pengguna</button>
</form>

</body>
</html>
