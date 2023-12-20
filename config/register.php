<?php
include('connection.php');

if (isset($_POST['daftar'])) {
    $no_rekening = $_POST['no_rekening'];
    $kata_sandi = $_POST['kata_sandi'];
    $saldo_rekening = $_POST['saldo_rekening'];
    $jenis_atm = $_POST['jenis_atm'];

    if ($saldo_rekening >= 100000) {
        if (isset($_POST['setuju_syarat'])) {
            $lokasi_default = 'Cimahi';

            $query_nasabah = "INSERT INTO `nasabah` (`NAMA`, `NO_REKENING`, `KATA_SANDI`, `SALDO_REKENING`, `ALAMAT_NASABAH`) VALUES ('Nama Nasabah', '$no_rekening', '$kata_sandi', $saldo_rekening, 'Alamat Nasabah')";
            $result_nasabah = mysqli_query($koneksi, $query_nasabah);

            $query_atm = "INSERT INTO `atm` (`JENIS_ATM`, `TANGGAL_PEMBUATAN_ATM`, `SALDO_AWAL`, `JUMLAH_UANG_YANG_TERSEDIA`, `LOKASI`) VALUES ('$jenis_atm', NOW(), $saldo_rekening, $saldo_rekening, '$lokasi_default')";
            $result_atm = mysqli_query($koneksi, $query_atm);

            if ($result_nasabah && $result_atm) {
                echo "Pendaftaran berhasil!";
            } else {
                echo "Terjadi kesalahan saat mendaftar.";
            }
        } else {
            echo "Anda harus menyetujui syarat ATM untuk melanjutkan pendaftaran.";
        }
    } else {
        echo "Saldo rekening minimal untuk menabung adalah Rp 100.000,-";
    }

    mysqli_close($koneksi);
}
