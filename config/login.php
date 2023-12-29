<?php
include('connection.php');

if (isset($_POST['masuk'])) {
    $no_rekening = $_POST['no_rekening'];
    $kata_sandi = $_POST['kata_sandi'];

    $query = "SELECT DISTINCT nasabah.*, atm.*, transaksi.*
    FROM nasabah
    JOIN atm ON nasabah.ID_NASABAH = atm.ID_ATM
    LEFT JOIN transaksi ON nasabah.ID_NASABAH = transaksi.ID_NASABAH
    WHERE nasabah.NO_REKENING = '$no_rekening'";

    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        $num_rows = mysqli_num_rows($hasil);

        if ($num_rows == 1) {
            $data_nasabah_atm = mysqli_fetch_assoc($hasil);

            if ($kata_sandi == $data_nasabah_atm['KATA_SANDI']) {
                $_SESSION['NO_REKENING'] = $data_nasabah_atm['NO_REKENING'];
                $_SESSION['ID_ATM'] = $data_nasabah_atm['ID_ATM'];
                $_SESSION['ALAMAT_NASABAH'] = $data_nasabah_atm['ALAMAT_NASABAH'];
                $_SESSION['TANGGAL_PEMBUATAN_ATM'] = $data_nasabah_atm['TANGGAL_PEMBUATAN_ATM'];
                $_SESSION['ID_NASABAH'] = $data_nasabah_atm['ID_NASABAH'];
                $_SESSION['NAMA_NASABAH'] = $data_nasabah_atm['NAMA'];
                $_SESSION['SALDO_REKENING'] = $data_nasabah_atm['SALDO_REKENING'];
                $_SESSION['SALDO_AWAL'] = $data_nasabah_atm['SALDO_AWAL'];
                $_SESSION['JUMLAH_UANG_YANG_TERSEDIA'] = $data_nasabah_atm['JUMLAH_UANG_YANG_TERSEDIA'];

                date_default_timezone_set('Asia/Jakarta');
                $jam = date('H');
                $pesan = ($jam >= 6 && $jam < 12) ? "Selamat Pagi" : (($jam >= 12 && $jam < 15) ? "Selamat Siang" : (($jam >= 15 && $jam < 18) ? "Selamat Sore" : "Selamat Malam"));

                $_SESSION['alert'] = array(
                    'type' => 'success',
                    'message' => "Halo $pesan, " . $_SESSION['NAMA_NASABAH'] . "!"
                );

                header('Location: ../index.php');
                exit();
            } else {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Kata Sandi salah.'
                );
                header('Location: ../pages/login.php');
                exit();
            }
        } elseif ($num_rows == 0) {
            $_SESSION['alert'] = array(
                'type' => 'error',
                'message' => 'No Rekening tidak ditemukan.'
            );
            header('Location: ../pages/login.php');
            exit();
        } else {
            $_SESSION['alert'] = array(
                'type' => 'error',
                'message' => 'Terjadi kesalahan. Silakan coba lagi.'
            );
            header('Location: ../pages/login.php');
            exit();
        }
    } else {
        $_SESSION['alert'] = array(
            'type' => 'error',
            'message' => 'Terjadi kesalahan. Silakan coba lagi.'
        );
        header('Location: ../pages/login.php');
        exit();
    }

    mysqli_close($koneksi);
}
