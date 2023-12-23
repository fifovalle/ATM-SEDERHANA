<?php
include('config/connection.php');
if (!isset($_SESSION['ID_NASABAH'])) {
    $_SESSION['alert'] = array(
        'type' => 'warning',
        'message' => 'Silahkan daftar terlebih dahulu.'
    );
    header("Location: pages/login.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
                                    <?php
                                    $saldo_awal = isset($_SESSION['SALDO_AWAL']) ? $_SESSION['SALDO_AWAL'] : 0;
                                    $jumlah_uang_tersedia = isset($_SESSION['JUMLAH_UANG_YANG_TERSEDIA']) ? $_SESSION['JUMLAH_UANG_YANG_TERSEDIA'] : 0;
                                    ?>
                                    <div class="row mx-0">
                                        <ul class="token-distribution-list col-md-12 mb-0">
                                            <li class="crowd-sale">
                                                Saldo Awal
                                                <span class="float-right text-muted">
                                                    Rp <?php echo number_format($saldo_awal); ?>
                                                </span>
                                            </li>
                                            <li class="advisors">
                                                Jumlah Uang Yang Tersedia
                                                <span class="float-right text-muted">
                                                    Rp <?php echo number_format($jumlah_uang_tersedia); ?>
                                                </span>
                                            </li>
                                        </ul>
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
                                    <form class="form-horizontal form-purchase-token row" action="config/transactions.php" method="POST">
                                        <div class="col-md-2 col-12">
                                            <fieldset class="form-label-group mb-0">
                                                <input type="number" class="form-control" id="ico-token" placeholder="No Rekening" required="" autofocus="" name="no_rekening">
                                                <label for="ico-token">No Rekening</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-1 col-12 text-center">
                                            <span class="la la-arrow-right"></span>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <fieldset class="form-label-group mb-0">
                                                <input type="number" class="form-control" id="selected-crypto" placeholder="Jumlah Uang" autofocus="" name="jumlah_transaksi">
                                                <label for="selected-crypto">Jumlah Transaksi</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4 col-12 mb-1">
                                            <fieldset class="form-label-group mb-0">
                                                <select name="jenis_transaksi" id="" class="form-control">
                                                    <option value="" selected>Metode Transaksi</option>
                                                    <option value="TRANSFER">Transafer</option>
                                                    <option value="TARIK TUNAI">Tarik Tunai</option>
                                                    <option value="MENABUNG">Menabung</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3 col-12 text-center">
                                            <button type="submit" name="kirim" class="btn-gradient-secondary">Kirim Sekarang</button>
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
                                            <?php
                                            $saldo_rekening = isset($_SESSION['SALDO_REKENING']) ? $_SESSION['SALDO_REKENING'] : 0;
                                            $saldo_awal = isset($_SESSION['SALDO_AWAL']) ? $_SESSION['SALDO_AWAL'] : 0;
                                            $jumlah_uang_tersedia = isset($_SESSION['JUMLAH_UANG_YANG_TERSEDIA']) ? $_SESSION['JUMLAH_UANG_YANG_TERSEDIA'] : 0;
                                            $selisih_saldo = $saldo_rekening - $saldo_awal;
                                            $persentase = ($selisih_saldo / $saldo_awal) * 100;
                                            $warna_text = ($persentase >= 0) ? 'text-success' : 'text-danger';
                                            ?>
                                            <div class="col-md-8 col-12">
                                                <p><strong>Saldo Anda:</strong></p>
                                                <h1>Rp <?php echo number_format($saldo_rekening, 0, ',', '.'); ?></h1>
                                                <p class="mb-0">Saldo Anda <strong class="<?php echo $warna_text; ?>"><?php echo number_format($persentase, 0, ',', '.'); ?>%</strong></p>
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
                                    <?php
                                    $baris_per_halaman = 5;
                                    $halaman_sekarang = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
                                    $offset = ($halaman_sekarang - 1) * $baris_per_halaman;

                                    $query_transaksi = "SELECT JENIS_TRANSAKSI, JUMLAH_TRANSAKSI, TANGGAL_DAN_WAKTU_TRANSAKSI FROM transaksi LIMIT $offset, $baris_per_halaman";
                                    $result_transaksi = mysqli_query($koneksi, $query_transaksi);

                                    if ($result_transaksi) {
                                    ?>
                                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                                            <thead>
                                                <tr class="text-center">
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
                                                    <td colspan="3" class="text-center">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination" style="align-items: center; justify-content: center; display: flex;">
                                                                <?php
                                                                $query_jumlah_data = "SELECT COUNT(*) AS jumlah_data FROM transaksi";
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
    </div>

    <!-- FOOTER -->
    <?php include 'partials/footer.php' ?>
    <!-- FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    include "partials/alert.php";
    ?>
    <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app.js" type="text/javascript"></script>
    <?php
    include 'partials/chart.php';
    ?>
</body>

</html>