<?php
// Class Pengguna dengan CRUD
class Pengguna {
  private $conn;
  private $table = 'Pengguna';

  public function __construct($db) {
      $this->conn = $db;
  }

  public function create($NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHp, $Alamat, $IdAkses) {
      $query = "INSERT INTO " . $this->table . " (NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("ssssssi", $NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHp, $Alamat, $IdAkses);
      return $stmt->execute();
  }

  public function read() {
      $query = "SELECT * FROM " . $this->table;
      return $this->conn->query($query);
  }

  public function update($IdPengguna, $NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHp, $Alamat, $IdAkses) {
      $query = "UPDATE " . $this->table . " SET NamaPengguna = ?, Password = ?, NamaDepan = ?, NamaBelakang = ?, NoHp = ?, Alamat = ?, IdAkses = ? WHERE IdPengguna = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("ssssssii", $NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHp, $Alamat, $IdAkses, $IdPengguna);
      return $stmt->execute();
  }

  public function delete($IdPengguna) {
      $query = "DELETE FROM " . $this->table . " WHERE IdPengguna = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("i", $IdPengguna);
      return $stmt->execute();
  }
}
?>