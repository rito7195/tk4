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

  public function get($NamaPengguna) {
    $query = "SELECT * FROM " . $this->table . " JOIN HakAkses ON " . $this->table . ".IdAkses = HakAkses.IdAkses WHERE NamaPengguna = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("s", $NamaPengguna);
    $stmt->execute();

    // Dapatkan hasil
    $result = $stmt->get_result();

    // Validasi hasil
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row; 
    } else {
        return null;
    }
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