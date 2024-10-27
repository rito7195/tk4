<?php
// Class Penjualan dengan CRUD
class Penjualan {
  private $conn;
  private $table = 'Penjualan';

  public function __construct($db) {
      $this->conn = $db;
  }

  public function create($JumlahPenjualan, $HargaJual, $IdPengguna, $IdPelanggan) {
      $query = "INSERT INTO " . $this->table . " (JumlahPenjualan, HargaJual, IdPengguna, IdPelanggan) VALUES (?, ?, ?, ?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("idii", $JumlahPenjualan, $HargaJual, $IdPengguna, $IdPelanggan);
      return $stmt->execute();
  }

  public function read() {
      $query = "SELECT * FROM " . $this->table . " JOIN Pengguna ON " . $this->table . ".IdPengguna = Pengguna.IdPengguna JOIN Pelanggan ON " . $this->table . ".IdPelanggan = Pelanggan.IdPelanggan";
      return $this->conn->query($query);
  }

  public function update($IdPenjualan, $JumlahPenjualan, $HargaJual, $IdPengguna, $IdPelanggan) {
      $query = "UPDATE " . $this->table . " SET JumlahPenjualan = ?, HargaJual = ?, IdPengguna = ?, IdPelanggan = ? WHERE IdPenjualan = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("idiii", $JumlahPenjualan, $HargaJual, $IdPengguna, $IdPelanggan, $IdPenjualan);
      return $stmt->execute();
  }

  public function delete($IdPenjualan) {
      $query = "DELETE FROM " . $this->table . " WHERE IdPenjualan = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("i", $IdPenjualan);
      return $stmt->execute();
  }
}
?>