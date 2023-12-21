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
          <div class="btn-group float-md-right"><a class="btn-gradient-secondary btn-sm white" href="wallet.html">Tarik
              Tunai</a></div>
        </div>
      </div>
      <div class="content-detached content-left">
        <div class="content-body">
          <div id="wallet">
            <div class="wallet-table-th d-none d-md-block">
              <div class="row">
                <div class="col-md-6 col-12 py-1">
                  <p class="mt-0 text-capitalize">Cryptocurrency</p>
                </div>
                <div class="col-md-2 col-12 py-1 text-center">
                  <p class="mt-0 text-capitalize">Available</p>
                </div>
                <div class="col-md-4 col-12 py-1 text-center">
                  <p class="mt-0 text-capitalize">Transect</p>
                </div>
              </div>
            </div>
            <!-- BTC -->
            <section class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-6 col-12 py-1">
                        <div class="media">
                          <i class="cc BTC mr-2 font-large-2 warning"></i>
                          <div class="media-body">
                            <h5 class="mt-0 text-capitalize">Bitcoin</h5>
                            <p class="text-muted mb-0 font-small-3 wallet-address">
                              0xe834a970619218d0a7db4ee5a3c87022e71e177f</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 col-12 py-1 text-center">
                        <h6>0.019842 BTC</h6>
                        <p class="text-muted mb-0 font-small-3">~ $2650.78</p>
                      </div>
                      <div class="col-md-2 col-12 py-1 text-center">
                        <a href="#" class="line-height-3">Nabung</a>
                      </div>
                      <div class="col-md-2 col-12 py-1 text-center">
                        <a href="#" class="line-height-3">Tarik Tunai</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
      <div class="sidebar-detached sidebar-right"="">
        <div class="sidebar">
          <div id="wallet-sidebar" class="sidebar-content">
            <div class="row">
              <p class="py-1 text-capitalize col-12">Saldo Anda</p>
            </div>
            <div class="card">
              <div class="card-header">
                <h6 class="card-title text-center">Saldo</h6>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">

                  <div class="text-center row clearfix mb-2">
                    <div class="col-12">
                      <i class="icon-layers font-large-3 bg-warning bg-glow white rounded-circle p-3 d-inline-block"></i>
                    </div>
                  </div>
                  <h3 class="text-center">Rp Saldo</h3>
                </div>
                <div class="table-responsive">
                  <table class="table table-de mb-0">
                    <tbody>
                      <tr>
                        <td>CIC Token</td>
                        <td><i class="icon-layers"></i> 3,258 CIC</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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