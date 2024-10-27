<?php
// Class Pelanggan dengan CRUD
class Pelanggan {
  private $conn;
  private $table = 'Pelanggan';

  public function __construct($db) {
      $this->conn = $db;
  }

  public function create($NamaPelanggan, $AlamatPelanggan, $NomorTelp, $Email) {
      $query = "INSERT INTO " . $this->table . " (NamaPelanggan, AlamatPelanggan, NomorTelp, Email) VALUES (?, ?, ?, ?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("ssss", $NamaPelanggan, $AlamatPelanggan, $NomorTelp, $Email);
      return $stmt->execute();
  }

  public function read() {
      $query = "SELECT * FROM " . $this->table;
      return $this->conn->query($query);
  }

  public function update($IdPelanggan, $NamaPelanggan, $AlamatPelanggan, $NomorTelp, $Email) {
      $query = "UPDATE " . $this->table . " SET NamaPelanggan = ?, AlamatPelanggan = ?, NomorTelp = ?, Email = ? WHERE IdPelanggan = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("ssssi", $NamaPelanggan, $AlamatPelanggan, $NomorTelp, $Email, $IdPelanggan);
      return $stmt->execute();
  }

  public function delete($IdPelanggan) {
      $query = "DELETE FROM " . $this->table . " WHERE IdPelanggan = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("i", $IdPelanggan);
      return $stmt->execute();
  }
}
?>