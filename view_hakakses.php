<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Hak Akses</title>
</head>
<body>

<!-- create_hakakses.php -->
<a href="/tk4"><button>Menu Utama</button></a>
<h2>Create Hak Akses</h2>
<form action="view_hakakses.php" method="POST">
    <label>Nama Akses:</label>
    <input type="text" name="nama_akses" required><br>
    <label>Keterangan:</label>
    <textarea name="keterangan" required></textarea><br>
    <button type="submit" name="create">Add Hak Akses</button>
</form>

<!-- read_hakakses.php -->
<h2>Read Hak Akses</h2>
<?php
$data = $hakAkses->read();
?>

<table>
    <tr><th>Id Akses</th><th>Nama Akses</th><th>Keterangan</th></tr>
    <?php foreach ($data as $row): ?>
    <tr>
        <td><?= $row['IdAkses'] ?></td>
        <td><?= $row['NamaAkses'] ?></td>
        <td><?= $row['Keterangan'] ?></td>
        <td><a href="view_hakakses.php?delete=1&id=<?= $row['IdAkses'] ?>">Hapus</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- update_hakakses.php -->
<h2>Update Hak Akses</h2>
<form action="view_hakakses.php" method="POST">
    <label>Id Akses:</label>
    <input type="number" name="id_akses" required><br>
    <label>Nama Akses:</label>
    <input type="text" name="nama_akses" required><br>
    <label>Keterangan:</label>
    <textarea name="keterangan" required></textarea><br>
    <button type="submit" name="update">Update Hak Akses</button>
</form>
</body>
</html>