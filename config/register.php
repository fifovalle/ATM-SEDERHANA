<?php
include('connection.php');

if (isset($_POST['daftar'])) {
    $no_rekening = $_POST['no_rekening'];
    $kata_sandi = $_POST['kata_sandi'];
    $saldo_rekening = $_POST['saldo_rekening'];
    $jenis_atm = $_POST['jenis_atm'];

    $query_cek_terdaftar = "SELECT * FROM `nasabah` WHERE `NO_REKENING` = '$no_rekening'";
    $hasil_cek_terdaftar = mysqli_query($koneksi, $query_cek_terdaftar);

    if (mysqli_num_rows($hasil_cek_terdaftar) > 0) {
        $_SESSION['alert'] = array(
            'type' => 'error',
            'message' => 'Nomor Rekening sudah terdaftar. Pilih nomor rekening lain.'
        );
        mysqli_close($koneksi);
        header('Location: ../pages/register.php');
        exit();
    }

    if ($saldo_rekening >= 100000) {
        if (isset($_POST['setuju_syarat'])) {
            $lokasi_default = 'Cimahi';

            $query_nasabah = "INSERT INTO `nasabah` (`NAMA`, `NO_REKENING`, `KATA_SANDI`, `SALDO_REKENING`, `ALAMAT_NASABAH`) VALUES ('Nama Nasabah', '$no_rekening', '$kata_sandi', $saldo_rekening, 'Alamat Nasabah')";
            $hasil_nasabah = mysqli_query($koneksi, $query_nasabah);

            $query_atm = "INSERT INTO `atm` (`JENIS_ATM`, `TANGGAL_PEMBUATAN_ATM`, `SALDO_AWAL`, `JUMLAH_UANG_YANG_TERSEDIA`, `LOKASI`) VALUES ('$jenis_atm', NOW(), $saldo_rekening, $saldo_rekening, '$lokasi_default')";
            $hasil_atm = mysqli_query($koneksi, $query_atm);

            if ($hasil_nasabah && $hasil_atm) {
                $_SESSION['alert'] = array(
                    'type' => 'success',
                    'message' => 'Pendaftaran berhasil!'
                );
                header('Location: ../pages/login.php');
                exit();
            } else {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Terjadi kesalahan saat mendaftar.'
                );
            }
        } else {
            $_SESSION['alert'] = array(
                'type' => 'error',
                'message' => 'Anda harus menyetujui syarat ATM untuk melanjutkan pendaftaran.'
            );
        }
    } else {
        $_SESSION['alert'] = array(
            'type' => 'error',
            'message' => 'Saldo rekening minimal untuk menabung adalah Rp 100.000,-'
        );
    }
    mysqli_close($koneksi);
    header('Location: ../pages/register.php');
    exit();
}
