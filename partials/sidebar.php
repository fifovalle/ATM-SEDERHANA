<div class="main-menu menu-fixed menu-dark menu-bg-default rounded menu-accordion menu-shadow">
    <div class="main-menu-content"><a class="navigation-brand d-none d-md-block d-lg-block d-xl-block" href="http://localhost/ATM-SEDERHANA/">
            <h1 style="font-size: 20px; color: white; margin-left: 6px;">KEL 4</h1>
        </a>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <?php
            $url_sekarang = $_SERVER['REQUEST_URI'];
            ?>
            <li <?php echo $url_sekarang == '/TUBES%20BASIS%20DATA/' ? 'class="active"' : ''; ?>>
                <a href="http://localhost/ATM-SEDERHANA/">
                    <i class="icon-grid"></i>
                    <span class="menu-title">Beranda</span>
                </a>
            </li>
            <li <?php echo strpos($url_sekarang, '/pages/wallet.php') !== false ? 'class="active"' : ''; ?>>
                <a href="http://localhost/ATM-SEDERHANA/pages/wallet.php">
                    <i class="icon-wallet"></i>
                    <span class="menu-title">Dompet</span>
                </a>
            </li>
            <li <?php echo strpos($url_sekarang, '/pages/transactions.php') !== false ? 'class="active"' : ''; ?>>
                <a href="http://localhost/ATM-SEDERHANA/pages/transactions.php">
                    <i class="icon-shuffle"></i>
                    <span class="menu-title">Transaksi</span>
                </a>
            </li>
        </ul>
    </div>
</div>