<?php
include('connection.php');

if (isset($_POST['daftar'])) {
    $no_rekening = $_POST['no_rekening'];
    $kata_sandi = $_POST['kata_sandi'];
    $saldo_rekening = $_POST['saldo_rekening'];
    $jenis_atm = $_POST['jenis_atm'];

    if (empty($jenis_atm) || $jenis_atm == "") {
        $_SESSION['alert'] = array(
            'type' => 'error',
            'message' => 'Pilih Jenis Kartu ATM.'
        );
        header('Location: ../pages/register.php');
        exit();
    }

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

    if ($saldo_rekening >= 50000) {
        if (isset($_POST['setuju_syarat'])) {
            $lokasi_default = 'Cimahi';

            $query_nasabah = "INSERT INTO `nasabah` (`NAMA`, `NO_REKENING`, `KATA_SANDI`, `SALDO_REKENING`, `ALAMAT_NASABAH`) VALUES ('Nama Nasabah', '$no_rekening', '$kata_sandi', $saldo_rekening, 'Alamat Nasabah')";
            $hasil_nasabah = mysqli_query($koneksi, $query_nasabah);

            $query_atm = "INSERT INTO `atm` (`JENIS_ATM`, `TANGGAL_PEMBUATAN_ATM`, `SALDO_AWAL`, `JUMLAH_UANG_YANG_TERSEDIA`, `LOKASI`) VALUES ('$jenis_atm', NOW(), $saldo_rekening, $saldo_rekening, '$lokasi_default')";
            $hasil_atm = mysqli_query($koneksi, $query_atm);

            if ($hasil_nasabah && $hasil_atm) {
                $id_nasabah = mysqli_insert_id($koneksi);
                $id_atm = mysqli_insert_id($koneksi);

                $query_insert_transaksi = "INSERT INTO `transaksi` (`ID_ATM`, `ID_NASABAH`, `JENIS_TRANSAKSI`, `JUMLAH_TRANSAKSI`, `TANGGAL_DAN_WAKTU_TRANSAKSI`) 
                VALUES ('$id_atm', '$id_nasabah', 'MENABUNG', $saldo_rekening, NOW())";

                $hasil_insert_transaksi = mysqli_query($koneksi, $query_insert_transaksi);

                if ($hasil_insert_transaksi) {
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
            'message' => 'Saldo rekening minimal untuk menabung adalah Rp 50.000,-'
        );
    }
    mysqli_close($koneksi);
    header('Location: ../pages/register.php');
    exit();
}
