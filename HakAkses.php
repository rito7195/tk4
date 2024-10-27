<?php
// Class HakAkses dengan CRUD
class HakAkses {
  private $conn;
  private $table = 'HakAkses';

  public function __construct($db) {
      $this->conn = $db;
  }

  public function create($NamaAkses, $Keterangan) {
      $query = "INSERT INTO " . $this->table . " (NamaAkses, Keterangan) VALUES (?, ?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("ss", $NamaAkses, $Keterangan);
      return $stmt->execute();
  }

  public function read() {
      $query = "SELECT * FROM " . $this->table;
      return $this->conn->query($query);
  }

  public function update($IdAkses, $NamaAkses, $Keterangan) {
      $query = "UPDATE " . $this->table . " SET NamaAkses = ?, Keterangan = ? WHERE IdAkses = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("ssi", $NamaAkses, $Keterangan, $IdAkses);
      return $stmt->execute();
  }

  public function delete($IdAkses) {
      $query = "DELETE FROM " . $this->table . " WHERE IdAkses = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("i", $IdAkses);
      return $stmt->execute();
  }
}
?>