<?php
session_start();
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
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-compact-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/account-login.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="vertical-layout vertical-compact-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-compact-menu" data-col="1-column">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="account-login" class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0 text-center d-none d-md-block">
                            <div class="border-grey border-lighten-3 m-0 box-shadow-0 card-account-left height-500">
                                <h1 style="color: white; padding-top: 250px; font-weight: bold">KELOMPOK 4</h1>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0">
                            <div class="card border-grey border-lighten-3 m-0 box-shadow-0 card-account-right height-500">
                                <div class="card-content">
                                    <div class="card-body p-3">
                                        <p class="text-center h5 text-capitalize">Mulai Dengan ATM</p>
                                        <p class="mb-3 text-center">Silahkan Buat Akun Anda</p>
                                        <form class="form-horizontal form-signin" action="../config/register.php" method="POST">
                                            <fieldset class="form-label-group">
                                                <input type="text" class="form-control" id="no-rekening" placeholder="No Rekening Anda" required="" autofocus="" name="no_rekening">
                                                <label for="no-rekening">No Rekening Anda</label>
                                            </fieldset>
                                            <fieldset class="form-label-group">
                                                <input type="password" class="form-control" id="kata-sandi" placeholder="Kata Sandi Anda" required="" autofocus="" name="kata_sandi">
                                                <label for="kata-sandi">Kata Sandi Anda</label>
                                            </fieldset>
                                            <fieldset class="form-label-group">
                                                <input type="number" class="form-control" id="nabung" placeholder="Penabungan" required="" autofocus="" name="saldo_rekening">
                                                <label for="nabung">Penabungan</label>
                                            </fieldset>
                                            <fieldset class="form-label-group">
                                                <select name="jenis_atm" id="" class="form-control">
                                                    <option value="" selected>Pilih Jenis Kartu ATM</option>
                                                    <option value="GOLD">Gold</option>
                                                    <option value="SILVER">Silver</option>
                                                    <option value="PREMIUM">Premium</option>
                                                </select>
                                            </fieldset>
                                            <input type="hidden" class="form-control" name="saldo_awal">
                                            <input type="hidden" class="form-control" name="tanggal_pembuatan_atm">
                                            <input type="hidden" class="form-control" name="jumlah_uang_yang_tersedia">
                                            <input type="hidden" class="form-control" name="lokasi">
                                            <div class="form-group row">
                                                <div class="col-12 text-center text-sm-left">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember" name="setuju_syarat">
                                                        <label for="remember-me"> Saya setuju dengan syarat ATM</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn-gradient-primary btn-block my-1" name="daftar">Daftar</button>
                                            <p class="text-center"><a href="login.php" class="card-link">Masuk</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    include "../partials/alert.php";
    ?>
    <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="../app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="../app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
</body>

</html>