<?php
// Class Pembelian dengan CRUD
class Pembelian {
  private $conn;
  private $table = 'Pembelian';

  public function __construct($db) {
      $this->conn = $db;
  }

  public function create($JumlahPembelian, $HargaBeli, $IdPengguna) {
      $query = "INSERT INTO " . $this->table . " (JumlahPembelian, HargaBeli, IdPengguna) VALUES (?, ?, ?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("idi", $JumlahPembelian, $HargaBeli, $IdPengguna);
      return $stmt->execute();
  }

  public function read() {
      $query = "SELECT * FROM " . $this->table . " JOIN Pengguna WHERE " . $this->table . ".IdPengguna = Pengguna.IdPengguna";
      return $this->conn->query($query);
  }

  public function update($IdPembelian, $JumlahPembelian, $HargaBeli, $IdPengguna) {
      $query = "UPDATE " . $this->table . " SET JumlahPembelian = ?, HargaBeli = ?, IdPengguna = ? WHERE IdPembelian = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("idii", $JumlahPembelian, $HargaBeli, $IdPengguna, $IdPembelian);
      return $stmt->execute();
  }

  public function delete($IdPembelian) {
      $query = "DELETE FROM " . $this->table . " WHERE IdPembelian = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("i", $IdPembelian);
      return $stmt->execute();
  }
}
?>