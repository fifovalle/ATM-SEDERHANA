<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
    <div class=" navbar-wrapper">
        <div class="navbar-container">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"> </i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Cari Riwayat Transaksi..">
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-id"></i><span class="selected-language"></span></a>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="http://localhost/ATM-SEDERHANA/pages/wallet.php"><i class="ficon icon-wallet"></i></a></li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="avatar avatar-online"><img src="http://localhost/ATM-SEDERHANA/assets/img/1.jpg" alt="avatar">
                            </span><span class="mr-1">Rp<span class="user-name text-bold-700"><?php echo isset($_SESSION['SALDO_REKENING']) ? number_format($_SESSION['SALDO_REKENING']) : '0'; ?></span></span></a>
                        <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="#"><i class="ft-award"></i><?php echo isset($_SESSION['NAMA_NASABAH']) ? $_SESSION['NAMA_NASABAH'] : 'Nama Nasabah'; ?>
                            </a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="http://localhost/ATM-SEDERHANA/pages/account.php?ID_NASABAH=<?php echo isset($_SESSION['ID_NASABAH']) ? $_SESSION['ID_NASABAH'] : ''; ?>">
                                <i class="ft-user"></i> Akun
                            </a>
                            <a class="dropdown-item" href="http://localhost/ATM-SEDERHANA/pages/wallet.php"><i class="icon-wallet"></i> Dompet
                                Saya</a><a class="dropdown-item" href="http://localhost/ATM-SEDERHANA/pages/transactions.php"><i class="ft-check-square"></i>
                                Transaksi </a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="http://localhost/ATM-SEDERHANA/config/logout.php"><i class="ft-power"></i> Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>