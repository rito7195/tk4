<?php
// Class Supplier dengan CRUD
class Supplier {
  private $conn;
  private $table = 'Supplier';

  public function __construct($db) {
      $this->conn = $db;
  }

  public function create($NamaSupplier, $AlamatSupplier, $NoTelp) {
      $query = "INSERT INTO " . $this->table . " (NamaSupplier, AlamatSupplier, NoTelp) VALUES (?, ?, ?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("sss", $NamaSupplier, $AlamatSupplier, $NoTelp);
      return $stmt->execute();
  }

  public function read() {
      $query = "SELECT * FROM " . $this->table;
      return $this->conn->query($query);
  }

  public function update($IdSupplier, $NamaSupplier, $AlamatSupplier, $NoTelp) {
      $query = "UPDATE " . $this->table . " SET NamaSupplier = ?, AlamatSupplier = ?, NoTelp = ? WHERE IdSupplier = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("sssi", $NamaSupplier, $AlamatSupplier, $NoTelp, $IdSupplier);
      return $stmt->execute();
  }

  public function delete($IdSupplier) {
      $query = "DELETE FROM " . $this->table . " WHERE IdSupplier = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("i", $IdSupplier);
      return $stmt->execute();
  }
}
?>