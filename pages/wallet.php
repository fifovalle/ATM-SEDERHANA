<?php
include('../config/connection.php');
if (!isset($_SESSION['ID_NASABAH'])) {
  $_SESSION['alert'] = array(
    'type' => 'warning',
    'message' => 'Silahkan daftar terlebih dahulu.'
  );
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="CryptoDash admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, CryptoDash Cryptocurrency Dashboard Template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="ThemeSelection">
  <title>ATM SEDERHANA</title>
  <link rel="apple-touch-icon" href="../app-assets/images/icons/1.jpg">
  <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/icons/1.jpg">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-compact-menu.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/cryptocoins/cryptocoins.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/wallet.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body class="vertical-layout vertical-compact-menu content-detached-right-sidebar   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="content-detached-right-sidebar">
  <!-- NAVIGASI -->
  <?php include '../partials/navbar.php' ?>
  <!-- NAVIGASI -->

  <!-- MENU -->
  <?php include '../partials/sidebar.php' ?>
  <!-- MENU -->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Dompet</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/TUBES%20BASIS%20DATA/">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Dompet
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
          <div class="btn-group float-md-right"><a class="btn-gradient-secondary btn-sm white" href="http://localhost/TUBES%20BASIS%20DATA/pages/transactions.php">Transaksi Saya</a></div>
        </div>
      </div>
      <div id="wallet-sidebar" class="sidebar-content">
        <div class="row">
          <p class="py-1 text-capitalize col-12">Saldo Anda</p>
        </div>
        <div class="card">
          <div class="card-header">
            <h6 class="card-title text-center">Saldo Anda</h6>
          </div>
          <div class="card-content collapse show">
            <div class="card-body">
              <div class="text-center row clearfix mb-2">
                <div class="col-12">
                  <i class="icon-layers font-large-3 bg-warning bg-glow white rounded-circle p-3 d-inline-block"></i>
                </div>
              </div>
              <h3 class="text-center">Rp <?php echo isset($_SESSION['SALDO_REKENING']) ? number_format($_SESSION['SALDO_REKENING'], 0, ',', '.') : '0'; ?></h3>
            </div>
            <div class="table-responsive">
              <table class="table table-de mb-0">
                <?php
                $halaman_sekarang = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $batas_per_halaman = 5;
                $batas_awal = ($halaman_sekarang - 1) * $batas_per_halaman;

                $idNasabah = $_SESSION['ID_NASABAH']; // Ambil ID Nasabah dari sesi
                $query_transaksi = "SELECT * FROM transaksi WHERE ID_NASABAH = '$idNasabah' LIMIT $batas_awal, $batas_per_halaman";

                $result_transaksi = mysqli_query($koneksi, $query_transaksi);

                if ($result_transaksi) {
                ?>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_transaksi)) {
                      $kelas_warna = '';
                      if ($row['JENIS_TRANSAKSI'] == 'TRANSFER' || $row['JENIS_TRANSAKSI'] == 'TARIK TUNAI') {
                        $kelas_warna = 'text-danger';
                      } elseif ($row['JENIS_TRANSAKSI'] == 'MENABUNG') {
                        $kelas_warna = 'text-success';
                      }
                    ?>
                      <tr>
                        <td class="<?= $kelas_warna ?>"><?= $row['JENIS_TRANSAKSI'] ?></td>
                        <td><i class="icon-layers"></i> <?= $row['JUMLAH_TRANSAKSI'] ?></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
              </table>
              <nav aria-label="Page navigation example">
                <ul class="pagination" style="align-items: center; justify-content: center; display: flex;">
                  <?php
                  $query_jumlah_transaksi = "SELECT COUNT(*) as jumlah_transaksi FROM transaksi WHERE ID_NASABAH = '$idNasabah'";
                  $result_jumlah_transaksi = mysqli_query($koneksi, $query_jumlah_transaksi);
                  $row_jumlah = mysqli_fetch_assoc($result_jumlah_transaksi);
                  $jumlah_halaman = ceil($row_jumlah['jumlah_transaksi'] / $batas_per_halaman);
                  for ($halaman = 1; $halaman <= $jumlah_halaman; $halaman++) {
                    echo "<li class='page-item " . ($halaman == $halaman_sekarang ? 'active' : '') . "'>";
                    echo "<a class='page-link' href='?halaman=$halaman'>$halaman</a>";
                    echo "</li>";
                  }
                  ?>
                </ul>
              </nav>
            <?php
                } else {
                  echo 'Error: ' . mysqli_error($koneksi);
                }
                mysqli_close($koneksi);
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php include '../partials/footer.php' ?>
  <!-- FOOTER -->
  <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="../app-assets/js/core/app.js" type="text/javascript"></script>
</body>

</html>