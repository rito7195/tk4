<?php
require_once 'config.php';
require_once 'HakAkses.php';
require_once 'Pengguna.php';
require_once 'Supplier.php';
require_once 'Pelanggan.php';
require_once 'Barang.php';
require_once 'Pembelian.php';
require_once 'Penjualan.php';

$hakAkses = new HakAkses($conn);
$pengguna = new Pengguna($conn);
$supplier = new Supplier($conn);
$pelanggan = new Pelanggan($conn);
$barang = new Barang($conn);
$pembelian = new Pembelian($conn);
$penjualan = new Penjualan($conn);

//Login
if (str_contains($_SERVER['REQUEST_URI'], 'index')) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaPengguna = $_POST['nama_pengguna'];
    $password = $_POST['password'];
    $result = $pengguna->get($namaPengguna);
    if ($result['Password'] == $password) {
      session_start();
      $_SESSION["name"] = $result['NamaAkses'];
      header("Location: Home.php");
    } else {
      echo "Username atau Password salah";
    }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['logout'])) {
    session_start();
    unset($_SESSION["name"]);
    session_destroy();
    header("Location: index.php");
  }
}

// HakAkses
if (str_contains($_SERVER['REQUEST_URI'], 'hakakses')) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['create'])) {
          $namaAkses = $_POST['nama_akses'];
          $keterangan = $_POST['keterangan'];
          $hakAkses->create($namaAkses, $keterangan);
          echo "Hak Akses added successfully!";
      } elseif (isset($_POST['update'])) {
          $id = $_POST['id_akses'];
          $namaAkses = $_POST['nama_akses'];
          $keterangan = $_POST['keterangan'];
          $hakAkses->update($id, $namaAkses, $keterangan);
          echo "Hak Akses updated successfully!";
      }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
      $id = $_GET['id'];
      $hakAkses->delete($id);
      echo "Hak Akses deleted successfully!";
  }
}

// Pengguna
if (str_contains($_SERVER['REQUEST_URI'], 'pengguna')) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['create'])) {
          $namaPengguna = $_POST['nama_pengguna'];
          $password = $_POST['password'];
          $namaDepan = $_POST['nama_depan'];
          $namaBelakang = $_POST['nama_belakang'];
          $noHp = $_POST['no_hp'];
          $alamat = $_POST['alamat'];
          $idAkses = $_POST['id_akses'];
          $pengguna->create($namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses);
          echo "Pengguna added successfully!";
      } elseif (isset($_POST['update'])) {
          $id = $_POST['id_pengguna'];
          $namaPengguna = $_POST['nama_pengguna'];
          $password = $_POST['password'];
          $namaDepan = $_POST['nama_depan'];
          $namaBelakang = $_POST['nama_belakang'];
          $noHp = $_POST['no_hp'];
          $alamat = $_POST['alamat'];
          $idAkses = $_POST['id_akses'];
          $pengguna->update($id, $namaPengguna, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $idAkses);
          echo "Pengguna updated successfully!";
      }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
      $id = $_GET['id'];
      $pengguna->delete($id);
      echo "Pengguna deleted successfully!";
  }
}

// Supplier
if (str_contains($_SERVER['REQUEST_URI'], 'supplier')) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['create'])) {
          $namaSupplier = $_POST['nama_supplier'];
          $alamatSupplier = $_POST['alamat_supplier'];
          $noTelp = $_POST['no_telp'];
          $supplier->create($namaSupplier, $alamatSupplier, $noTelp);
          echo "Supplier added successfully!";
      } elseif (isset($_POST['update'])) {
          $id = $_POST['id_supplier'];
          $namaSupplier = $_POST['nama_supplier'];
          $alamatSupplier = $_POST['alamat_supplier'];
          $noTelp = $_POST['no_telp'];
          $supplier->update($id, $namaSupplier, $alamatSupplier, $noTelp);
          header("Location: view_supplier.php");
      }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
      $id = $_GET['id'];
      $supplier->delete($id);
      echo "Supplier deleted successfully!";
  }
}

// Pelanggan
if (str_contains($_SERVER['REQUEST_URI'], 'pelanggan')) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['create'])) {
          $namaPelanggan = $_POST['nama_pelanggan'];
          $alamatPelanggan = $_POST['alamat_pelanggan'];
          $nomorTelp = $_POST['nomor_telp'];
          $email = $_POST['email'];
          $pelanggan->create($namaPelanggan, $alamatPelanggan, $nomorTelp, $email);
          echo "Pelanggan added successfully!";
      } elseif (isset($_POST['update'])) {
          $id = $_POST['id_pelanggan'];
          $namaPelanggan = $_POST['nama_pelanggan'];
          $alamatPelanggan = $_POST['alamat_pelanggan'];
          $nomorTelp = $_POST['nomor_telp'];
          $email = $_POST['email'];
          $pelanggan->update($id, $namaPelanggan, $alamatPelanggan, $nomorTelp, $email);
          header("Location: view_pelanggan.php");
      }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
      $id = $_GET['id'];
      $pelanggan->delete($id);
      echo "Pelanggan deleted successfully!";
  }
}

// Barang
if (str_contains($_SERVER['REQUEST_URI'], 'barang')) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['create'])) {
          $namaBarang = $_POST['nama_barang'];
          $keterangan = $_POST['keterangan'];
          $satuan = $_POST['satuan'];
          $idPengguna = $_POST['id_pengguna'];
          $idSupplier = $_POST['id_supplier'];
          $barang->create($namaBarang, $keterangan, $satuan, $idPengguna, $idSupplier);
          echo "Barang added successfully!";
      } elseif (isset($_POST['update'])) {
          $id = $_POST['id_barang'];
          $namaBarang = $_POST['nama_barang'];
          $keterangan = $_POST['keterangan'];
          $satuan = $_POST['satuan'];
          $idPengguna = $_POST['id_pengguna'];
          $idSupplier = $_POST['id_supplier'];
          $barang->update($id, $namaBarang, $keterangan, $satuan, $idPengguna, $idSupplier);
          header("Location: view_barang.php");
      }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
      $id = $_GET['id'];
      $barang->delete($id);
      echo "Barang deleted successfully!";
  }
}

// Pembelian
if (str_contains($_SERVER['REQUEST_URI'], 'pembelian')) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['create'])) {
          $jumlahPembelian = $_POST['jumlah_pembelian'];
          $hargaBeli = $_POST['harga_beli'];
          $idPengguna = $_POST['id_pengguna'];
          $pembelian->create($jumlahPembelian, $hargaBeli, $idPengguna);
          echo "Pembelian added successfully!";
      } elseif (isset($_POST['update'])) {
          $id = $_POST['id_pembelian'];
          $jumlahPembelian = $_POST['jumlah_pembelian'];
          $hargaBeli = $_POST['harga_beli'];
          $idPengguna = $_POST['id_pengguna'];
          $pembelian->update($id, $jumlahPembelian, $hargaBeli, $idPengguna);
          header("Location: view_pembelian.php");
      }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
      $id = $_GET['id'];
      $pembelian->delete($id);
      echo "Pembelian deleted successfully!";
  }
}

// Penjualan
if (str_contains($_SERVER['REQUEST_URI'], 'penjualan')) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['create'])) {
          $jumlahPenjualan = $_POST['jumlah_penjualan'];
          $hargaJual = $_POST['harga_jual'];
          $idPengguna = $_POST['id_pengguna'];
          $idPelanggan = $_POST['id_pelanggan'];
          $penjualan->create($jumlahPenjualan, $hargaJual, $idPengguna, $idPelanggan);
          echo "Penjualan added successfully!";
      } elseif (isset($_POST['update'])) {
          $id = $_POST['id_penjualan'];
          $jumlahPenjualan = $_POST['jumlah_penjualan'];
          $hargaJual = $_POST['harga_jual'];
          $idPengguna = $_POST['id_pengguna'];
          $idPelanggan = $_POST['id_pelanggan'];
          $penjualan->update($id, $jumlahPenjualan, $hargaJual, $idPengguna, $idPelanggan);
          header("Location: view_penjualan.php");
      }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
      $id = $_GET['id'];
      $penjualan->delete($id);
      echo "Penjualan deleted successfully!";
  }
}
?>