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
      <div class="content-body">
        <div id="transactions">
          <div class="transactions-table-th d-none d-md-block">
            <div class="col-12">
              <div class="row px-1">
                <div class="col-md-2 col-12 py-1">
                  <p class="mb-0">Date</p>
                </div>
                <div class="col-md-2 col-12 py-1">
                  <p class="mb-0">Type</p>
                </div>
                <div class="col-md-2 col-12 py-1">
                  <p class="mb-0">Amount</p>
                </div>
                <div class="col-md-1 col-12 py-1">
                  <p class="mb-0">Currency</p>
                </div>
                <div class="col-md-2 col-12 py-1">
                  <p class="mb-0">Tokens (CIC)</p>
                </div>
                <div class="col-md-3 col-12 py-1">
                  <p class="mb-0">Details</p>
                </div>
              </div>
            </div>
          </div>
          <div class="transactions-table-tbody">
            <section class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Date: </span>2018-01-03</p>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <span class="d-inline-block d-md-none text-bold-700">Type: </span> <span class="d-inline-block d-md-none text-bold-700">Type: </span> <a href="#" class="mb-0 btn-sm btn btn-outline-warning round">Deposit</a>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Amount: </span> 5.34111
                        </p>
                      </div>
                      <div class="col-md-1 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Currency: </span> <i class="cc ETH-alt"></i> ETH</p>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Tokens: </span> - </p>
                      </div>
                      <div class="col-md-3 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Details: </span> Deposit to
                          your Balance <i class="la la-thumbs-up warning float-right"></i></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Date:</span> 2018-01-03</p>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <span class="d-inline-block d-md-none text-bold-700">Type: </span> <a href="#" class="mb-0 btn-sm btn btn-outline-success round">Deposit</a>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Amount: </span> 5.34111
                        </p>
                      </div>
                      <div class="col-md-1 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Currency: </span> <i class="cc ETH-alt"></i> ETH</p>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Tokens: </span> 3,258</p>
                      </div>
                      <div class="col-md-3 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Details: </span> Tokens
                          Purchase</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Date:</span> 2018-01-03</p>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <span class="d-inline-block d-md-none text-bold-700">Type: </span> <a href="#" class="mb-0 btn-sm btn btn-outline-info round">Referral</a>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Amount: </span> - </p>
                      </div>
                      <div class="col-md-1 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Currency: </span> - </p>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Tokens: </span> 200.88</p>
                      </div>
                      <div class="col-md-3 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Details: </span> Referral
                          Promo Bonus</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Date:</span> 2018-01-21</p>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <span class="d-inline-block d-md-none text-bold-700">Type: </span> <a href="#" class="mb-0 btn-sm btn btn-outline-danger round">Withdrawal</a>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Amount: </span> - </p>
                      </div>
                      <div class="col-md-1 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Currency: </span> - </p>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Tokens: </span> - 3,458.88
                        </p>
                      </div>
                      <div class="col-md-3 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Details: </span> Tokens
                          withdrawn <i class="la la-dollar warning float-right"></i></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Date:</span> 2018-01-25</p>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <span class="d-inline-block d-md-none text-bold-700">Type: </span> <a href="#" class="mb-0 btn-sm btn btn-outline-warning round">Deposit</a>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Amount: </span> 0.8791 </p>
                      </div>
                      <div class="col-md-1 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Currency: </span> <i class="cc BTC-alt"></i> BTC</p>
                      </div>
                      <div class="col-md-2 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Tokens: </span> - </p>
                      </div>
                      <div class="col-md-3 col-12 py-1">
                        <p class="mb-0"><span class="d-inline-block d-md-none text-bold-700">Details: </span> Deposit to
                          your Balance <i class="la la-thumbs-up warning float-right"></i></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center pagination-separate pagination-flat">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">« Prev</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">Next »</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
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