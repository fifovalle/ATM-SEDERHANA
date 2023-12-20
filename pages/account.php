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
  <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
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
          <h3 class="content-header-title mb-0 d-inline-block">Profil Akun</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/TUBES%20BASIS%20DATA/">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Profil Akun
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
        <div class="row">
          <div class="col-12 col-md-8">
            <section class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-2 col-12">
                        <img src="../app-assets/images/portrait/medium/avatar-m-1.png" class="rounded-circle height-100" alt="Card image" />
                      </div>
                      <div class="col-md-10 col-12">
                        <div class="row">
                          <div class="col-12 col-md-4">
                            <p class="text-bold-700 text-uppercase mb-0">Transaksi</p>
                            <p class="mb-0">12/14</p>
                          </div>
                          <div class="col-12 col-md-4">
                            <p class="text-bold-700 text-uppercase mb-0">Pembuatan Rekening</p>
                            <p class="mb-0">2018-04-30 16:44:04</p>
                          </div>
                          <div class="col-12 col-md-4">
                            <p class="text-bold-700 text-uppercase mb-0">IP</p>
                            <p class="mb-0">43.228.229.172</p>
                          </div>
                        </div>
                        <hr />
                        <form class="form-horizontal form-user-profile row mt-2" action="index.html">
                          <div class="col-6">
                            <fieldset class="form-label-group">
                              <input type="text" class="form-control" id="first-name" value="John" required="" autofocus="">
                              <label for="first-name">Nama Awal</label>
                            </fieldset>
                          </div>
                          <div class="col-6">
                            <fieldset class="form-label-group">
                              <input type="text" class="form-control" id="last-name" value="Doe" required="" autofocus="">
                              <label for="last-name">Nama Akhir</label>
                            </fieldset>
                          </div>
                          <div class="col-6">
                            <fieldset class="form-label-group">
                              <input type="text" class="form-control" id="user-name" value="johndoe9016" required="" autofocus="">
                              <label for="user-name">Nama Pengguna</label>
                            </fieldset>
                          </div>
                          <div class="col-6">
                            <fieldset class="form-label-group">
                              <input type="text" class="form-control" id="email-address" value="johndoe9016@gmail.com" required="" autofocus="">
                              <label for="email-address">Email</label>
                            </fieldset>
                          </div>
                          <div class="col-6">
                            <fieldset class="form-label-group">
                              <input type="password" class="form-control" id="old-password" placeholder="Enter Password" required="" autofocus="">
                              <label for="old-password">Sandi Lama</label>
                            </fieldset>
                          </div>
                          <div class="col-6">
                            <fieldset class="form-label-group">
                              <input type="password" class="form-control" id="new-password" placeholder="Enter Password" required="" autofocus="">
                              <label for="new-password">Sandi Baru</label>
                            </fieldset>
                          </div>
                          <div class="col-12 text-right">
                            <button type="submit" class="btn-gradient-primary my-1">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="col-12 col-md-4">
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
                  <h3 class="text-center">Rp Saldo Anda</h3>
                </div>
                <div class="table-responsive">
                  <table class="table table-de mb-0">
                    <tbody>
                      <tr>
                        <td>CIC Token</td>
                        <td><i class="icon-layers"></i> 3,258 CIC</td>
                      </tr>
                      <tr>
                        <td>CIC Referral</td>
                        <td><i class="icon-layers"></i> 200.88 CIC</td>
                      </tr>
                      <tr>
                        <td>CIC Price</td>
                        <td><i class="cc BTC-alt"></i> 0.0001 BTC</td>
                      </tr>
                      <tr>
                        <td>Raised BTC</td>
                        <td><i class="cc BTC-alt"></i> 2154 BTC</td>
                      </tr>
                      <tr>
                        <td>Raised USD</td>
                        <td><i class="la la-dollar"></i> 4.52 M</td>
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
  <script src="../app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
  <script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="../app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/forms/account-profile.js" type="text/javascript"></script>
</body>

</html>