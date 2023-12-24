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
  <title>TUGAS BASDAT KELOMPOK 4</title>
  <link rel="apple-touch-icon" href="../app-assets/images/icons/1.jpg">
  <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/icons/1.jpg">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-compact-menu.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/cryptocoins/cryptocoins.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/transactions.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">
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
          <h3 class="content-header-title mb-0 d-inline-block">Transaksi</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/TUBES%20BASIS%20DATA/">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Transaksi
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
          <div class="btn-group float-md-right"><a class="btn-gradient-secondary btn-sm white" href="wallet.html">Layanan</a></div>
        </div>
      </div>
      <div class="row">
        <div id="recent-transactions" class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="table-responsive">
                <?php
                $baris_per_halaman = 5;
                $halaman_sekarang = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
                $offset = ($halaman_sekarang - 1) * $baris_per_halaman;

                $idNasabah = $_SESSION['ID_NASABAH'];
                $query_transaksi = "SELECT transaksi.JENIS_TRANSAKSI, transaksi.JUMLAH_TRANSAKSI, transaksi.TANGGAL_DAN_WAKTU_TRANSAKSI, nasabah.NAMA, nasabah.NO_REKENING, atm.JUMLAH_UANG_YANG_TERSEDIA
                            FROM transaksi
                            JOIN nasabah ON transaksi.ID_NASABAH = nasabah.ID_NASABAH
                            JOIN atm ON transaksi.ID_ATM = atm.ID_ATM
                            WHERE nasabah.ID_NASABAH = '$idNasabah'
                            LIMIT $offset, $baris_per_halaman";

                $result_transaksi = mysqli_query($koneksi, $query_transaksi);

                if ($result_transaksi) {
                ?>
                  <table id="recent-orders" class="table table-hover table-xl mb-0">
                    <thead>
                      <tr class="text-center">
                        <th class="border-top-0">Nama Nasabah</th>
                        <th class="border-top-0">No Rekening</th>
                        <th class="border-top-0">Jumlah Uang Yang Tersedia</th>
                        <th class="border-top-0">Jenis Transaksi</th>
                        <th class="border-top-0">Jumlah Transaksi</th>
                        <th class="border-top-0">Tanggal Dan Waktu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($row = mysqli_fetch_assoc($result_transaksi)) {
                        $class = ($row['JENIS_TRANSAKSI'] == 'MENABUNG') ? 'btn-outline-success' : 'btn-outline-danger';
                      ?>
                        <tr class="text-center">
                          <td class="text-truncate"><?php echo $row['NAMA']; ?></td>
                          <td class="text-truncate"><?php echo $row['NO_REKENING']; ?></td>
                          <td class="text-truncate"><?php echo $row['JUMLAH_UANG_YANG_TERSEDIA']; ?></td>
                          <td class="text-truncate">
                            <a href="#" class="mb-0 btn-sm btn <?php echo $class; ?> round"><?php echo $row['JENIS_TRANSAKSI']; ?></a>
                          </td>
                          <td class="text-truncate p-1"><?php echo $row['JUMLAH_TRANSAKSI']; ?></td>
                          <td class="text-truncate"><a href="#"><?php echo $row['TANGGAL_DAN_WAKTU_TRANSAKSI']; ?></a></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6" class="text-center">
                          <nav aria-label="Page navigation example">
                            <ul class="pagination" style="align-items: center; justify-content: center; display: flex;">
                              <?php
                              $query_jumlah_data = "SELECT COUNT(*) AS jumlah_data FROM transaksi WHERE ID_NASABAH = '$idNasabah'";
                              $result_jumlah_data = mysqli_query($koneksi, $query_jumlah_data);
                              $row_jumlah_data = mysqli_fetch_assoc($result_jumlah_data);
                              $jumlah_halaman = ceil($row_jumlah_data['jumlah_data'] / $baris_per_halaman);

                              for ($i = 1; $i <= $jumlah_halaman; $i++) {
                                echo "<li class='page-item " . ($i == $halaman_sekarang ? 'active' : '') . "'>";
                                echo "<a class='page-link' href='?halaman=$i'>$i</a>";
                                echo "</li>";
                              }
                              ?>
                            </ul>
                          </nav>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                <?php
                } else {
                  echo 'Error: ' . mysqli_error($koneksi);
                }
                ?>
              </div>
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