<?php
require_once 'config.php';
function calculateProfitLoss() {
    global $conn;

    $totalPenjualan = mysqli_query($conn, "SELECT Barang.IdBarang, SUM(Penjualan.HargaJual * Penjualan.JumlahPenjualan) as total_penjualan FROM Barang JOIN Pengguna ON Barang.IdPengguna = Pengguna.IdPengguna JOIN Penjualan ON Pengguna.IdPengguna = Penjualan.IdPengguna GROUP BY Barang.IdBarang");
    $totalPembelian = mysqli_query($conn, "SELECT Barang.IdBarang, SUM(Pembelian.HargaBeli * Pembelian.JumlahPembelian) as total_pembelian FROM Barang JOIN Pengguna ON Barang.IdPengguna = Pengguna.IdPengguna JOIN Pembelian ON Pengguna.IdPengguna = Pembelian.IdPengguna GROUP BY Barang.IdBarang");

    $profitLossData = [];

    while ($rowPenjualan = mysqli_fetch_assoc($totalPenjualan)) {
        $barangId = $rowPenjualan['IdBarang'];
        $penjualan = $rowPenjualan['total_penjualan'];
        $pembelian = 0;

        foreach ($totalPembelian as $rowPembelian) {
            if ($rowPembelian['IdBarang'] == $barangId) {
                $pembelian = $rowPembelian['total_pembelian'];
                break;
            }
        }

        $profitLossData[] = [
            'IdBarang' => $barangId,
            'penjualan' => $penjualan,
            'pembelian' => $pembelian,
            'laba_rugi' => $penjualan - $pembelian,
        ];
    }

    return $profitLossData;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<a href="/tk4"><button>Menu Utama</button></a>
<h2>Laporan Rugi Laba</h2>
<table>
    <tr>
        <th>Barang ID</th>
        <th>Total Penjualan</th>
        <th>Total Pembelian</th>
        <th>Laba/Rugi</th>
    </tr>
    <?php
    $profitLossData = calculateProfitLoss();
    foreach ($profitLossData as $data) {
        echo "<tr>";
        echo "<td>" . $data['IdBarang'] . "</td>";
        echo "<td>" . $data['penjualan'] . "</td>";
        echo "<td>" . $data['pembelian'] . "</td>";
        echo "<td>" . $data['laba_rugi'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>