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
    <link rel="apple-touch-icon" href="app-assets/images/icons/1.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/icons/1.jpg">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-compact-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ico.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">
    <!-- NAVIGASI -->
    <?php include 'partials/navbar.php' ?>
    <!-- NAVIGASI -->

    <!-- MENU -->
    <?php include 'partials/sidebar.php' ?>
    <!-- MENU -->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row match-height">
                    <div class="col-xl-8 col-12">
                        <div class="card card-transparent">
                            <div class="card-header card-header-transparent py-20">
                                <div class="btn-group dropdown">
                                    <h6>Riwayat Transaksi</h6>
                                </div>
                            </div>
                            <div id="ico-token-supply-demand-chart" class="height-300"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card card-transparent">
                            <div class="card-header card-header-transparent">
                                <h6 class="card-title">Grafik Saldo</h6>
                            </div>
                            <div class="card-content">
                                <div id="token-distribution-chart" class="height-200 donut donutShadow"></div>
                                <div class="card-body">
                                    <div class="row mx-0">
                                        <ul class="token-distribution-list col-md-12 mb-0">
                                            <li class="crowd-sale">Saldo Awal <span class="float-right text-muted">41%</span></li>
                                            <li class="team">Saldo Akhir <span class="float-right text-muted">18%</span>
                                            </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card pull-up">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form-horizontal form-purchase-token row" action="buy-ico.html">
                                        <div class="col-md-2 col-12">
                                            <fieldset class="form-label-group mb-0">
                                                <input type="text" class="form-control" id="ico-token" value="5000" required="" autofocus="">
                                                <label for="ico-token">No Rekening</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-1 col-12 text-center">
                                            <span class="la la-arrow-right"></span>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <fieldset class="form-label-group mb-0">
                                                <input type="text" class="form-control" id="selected-crypto" value="1" required="" autofocus="">
                                                <label for="selected-crypto">Jumlah Uang</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4 col-12 mb-1">
                                            <fieldset class="form-label-group mb-0">
                                                <select name="" id="" class="form-control">
                                                    <option value="" selected>Metode Transaksi</option>
                                                    <option value="">Transafer</option>
                                                    <option value="">Tarik Tunai</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3 col-12 text-center">
                                            <button type="submit" class="btn-gradient-secondary">Kirim Sekarang</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12">
                        <h6 class="my-2">Sisa Saldo</h6>
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-8 col-12">
                                                <p><strong>Saldo Anda:</strong></p>
                                                <h1>Rp Saldo</h1>
                                                <p class="mb-0">Bunga <strong>+30%</strong>
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-12 text-center text-md-right">
                                                <button type="button" class="btn-gradient-secondary mt-2">Tarik Tunai <i class="la la-angle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <h6 class="my-2">Transaksi Terakhir</h6>
                        <div class="card">
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Date</th>
                                                <th class="border-top-0">Amount</th>
                                                <th class="border-top-0">Currency</th>
                                                <th class="border-top-0">Currency</th>
                                                <th class="border-top-0">Tokens (CIC)</th>
                                                <th class="border-top-0">Details</th>
                                                <th class="border-top-0"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid
                                                </td>
                                                <td class="text-truncate"><a href="#">2018-01-03</a></td>
                                                <td class="text-truncate">
                                                    <a href="#" class="mb-0 btn-sm btn btn-outline-success round">Deposit</a>
                                                </td>
                                                <td class="text-truncate p-1">5.34111</td>
                                                <td>
                                                    <i class="cc ETH-alt"></i> ETH
                                                </td>
                                                <td>-</td>
                                                <td class="text-truncate">Deposit to your Balance</td>
                                                <td><i class="la la-thumbs-up warning float-right"></i></td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate"><i class="la la-dot-circle-o warning font-medium-1 mr-1"></i> in
                                                    Process</td>
                                                <td class="text-truncate"><a href="#">2018-01-21</a></td>
                                                <td class="text-truncate">
                                                    <a href="#" class="mb-0 btn-sm btn btn-outline-warning round">Referral</a>
                                                </td>
                                                <td class="text-truncate p-1">-</td>
                                                <td>-</td>
                                                <td>200.88</td>
                                                <td class="text-truncate">Referral Promo Bonus</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>
                                                    Pending</td>
                                                <td class="text-truncate"><a href="#">2018-01-25</a></td>
                                                <td class="text-truncate">
                                                    <a href="#" class="mb-0 btn-sm btn btn-outline-danger round">Withdrawal</a>
                                                </td>
                                                <td class="text-truncate p-1">-</td>
                                                <td>-</td>
                                                <td>-3,458.88</td>
                                                <td class="text-truncate">Tokens withdrawn</td>
                                                <td><i class="la la-dollar warning float-right"></i></td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid
                                                </td>
                                                <td class="text-truncate"><a href="#">2018-01-28</a></td>
                                                <td class="text-truncate">
                                                    <a href="#" class="mb-0 btn-sm btn btn-outline-danger round">Deposit</a>
                                                </td>
                                                <td class="text-truncate p-1">0.8791</td>
                                                <td><i class="cc BTC-alt"></i> BTC</td>
                                                <td>--</td>
                                                <td class="text-truncate">Deposit to your Balance</td>
                                                <td><i class="la la-thumbs-up warning float-right"></i></td>
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
    <?php include 'partials/footer.php' ?>
    <!-- FOOTER -->

    <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/pages/dashboard-ico.js" type="text/javascript"></script>
</body>

</html>