<?php
// Class Barang dengan CRUD
class Barang {
  private $conn;
  private $table = 'Barang';

  public function __construct($db) {
      $this->conn = $db;
  }

  public function create($NamaBarang, $Keterangan, $Satuan, $IdPengguna, $IdSupplier) {
      $query = "INSERT INTO " . $this->table . " (NamaBarang, Keterangan, Satuan, IdPengguna, IdSupplier) VALUES (?, ?, ?, ?, ?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("sssii", $NamaBarang, $Keterangan, $Satuan, $IdPengguna, $IdSupplier);
      return $stmt->execute();
  }

  public function read() {
      $query = "SELECT * FROM " . $this->table . " JOIN Pengguna ON " . $this->table . ".IdPengguna = Pengguna.IdPengguna JOIN Supplier ON " . $this->table . ".IdSupplier = Supplier.IdSupplier";
      return $this->conn->query($query);
  }

  public function update($IdBarang, $NamaBarang, $Keterangan, $Satuan, $IdPengguna, $IdSupplier) {
      $query = "UPDATE " . $this->table . " SET NamaBarang = ?, Keterangan = ?, Satuan = ?, IdPengguna = ?, IdSupplier = ? WHERE IdBarang = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("sssiii", $NamaBarang, $Keterangan, $Satuan, $IdPengguna, $IdSupplier, $IdBarang);
      return $stmt->execute();
  }

  public function delete($IdBarang) {
      $query = "DELETE FROM " . $this->table . " WHERE IdBarang = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("i", $IdBarang);
      return $stmt->execute();
  }
}
?>