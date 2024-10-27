<?php
  require_once 'Controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TK 4</title>
</head>
<body>
  <h1>Silahkan Pilih Menu</h1>
  <?php
    session_start();
    if (isset($_SESSION["name"])) {
      if($_SESSION["name"] == "Admin") {
        echo "<a href='view_hakakses.php'><button>Hak Akses</button></a>  ";
        echo "<a href='view_pengguna.php'><button>Pengguna</button></a> ";
        echo "<a href='view_barang.php'><button>Barang</button></a> ";
        echo "<a href='view_pembelian.php'><button>Pembelian</button></a> ";
        echo "<a href='view_penjualan.php'><button>Penjualan</button></a> ";
        echo "<a href='view_supplier.php'><button>Supplier</button></a> ";
        echo "<a href='view_pelanggan.php'><button>Pelanggan</button></a> ";
        echo "<a href='LabaRugi.php'><button>Laba Rugi</button></a> ";
        echo "<a href='index.php?logout=1'><button>Logout</button></a>";
      } elseif ($_SESSION["name"] == "Kasir") {
        echo "<a href='view_penjualan.php'><button>Penjualan</button></a> ";
        echo "<a href='LabaRugi.php'><button>Laba Rugi</button></a> ";
        echo "<a href='index.php?logout=1'><button>Logout</button></a>";
      } else {
        echo "<a href='LabaRugi.php'><button>Laba Rugi</button></a> ";
        echo "<a href='index.php?logout=1'><button>Logout</button></a>";
      }
    }
  ?>
</body>
</html>