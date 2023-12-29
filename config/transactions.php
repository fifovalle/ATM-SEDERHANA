<?php
include('connection.php');

if (isset($_POST['kirim'])) {
    $no_rekening = $_POST['no_rekening'];
    $jumlah_transaksi = $_POST['jumlah_transaksi'];
    $jenis_transaksi = $_POST['jenis_transaksi'];

    if (empty($jenis_transaksi)) {
        $_SESSION['alert'] = array(
            'type' => 'error',
            'message' => 'Pilih Metode Transaksi terlebih dahulu.'
        );
        header('Location: ../index.php');
        exit();
    }

    if (isset($_SESSION['ID_NASABAH']) && isset($_SESSION['ID_ATM'])) {
        $id_nasabah = $_SESSION['ID_NASABAH'];
        $id_atm = $_SESSION['ID_ATM'];
        $saldo_nasabah = $_SESSION['SALDO_REKENING'];

        $query_check_norekening = "SELECT COUNT(*) AS jumlah FROM `nasabah` WHERE `NO_REKENING`='$no_rekening'";
        $result_check_norekening = mysqli_query($koneksi, $query_check_norekening);
        $row_check_norekening = mysqli_fetch_assoc($result_check_norekening);

        if ($row_check_norekening['jumlah'] == 0) {
            $_SESSION['alert'] = array(
                'type' => 'error',
                'message' => 'Nomor rekening tidak terdaftar.'
            );
            header('Location: ../index.php');
            exit();
        }

        if ($jenis_transaksi == 'TARIK TUNAI') {

            if ($no_rekening != $_SESSION['NO_REKENING']) {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Anda hanya dapat menarik tunai dari akun Anda sendiri.'
                );
                header('Location: ../index.php');
                exit();
            }

            if ($saldo_nasabah < $jumlah_transaksi) {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Saldo tidak mencukupi untuk menarik tunai.'
                );
                header('Location: ../index.php');
                exit();
            }

            $saldo_nasabah -= $jumlah_transaksi;

            $query_update_saldo_nasabah = "UPDATE `nasabah` SET `SALDO_REKENING`='$saldo_nasabah' WHERE `ID_NASABAH`='$id_nasabah'";
            $result_update_saldo_nasabah = mysqli_query($koneksi, $query_update_saldo_nasabah);

            $query_update_saldo_atm = "UPDATE `atm` SET `JUMLAH_UANG_YANG_TERSEDIA`='$saldo_nasabah' WHERE `ID_ATM`='$id_atm'";
            $result_update_saldo_atm = mysqli_query($koneksi, $query_update_saldo_atm);

            $query_insert_transaksi = "INSERT INTO `transaksi` (`ID_ATM`, `ID_NASABAH`, `JENIS_TRANSAKSI`, `JUMLAH_TRANSAKSI`, `TANGGAL_DAN_WAKTU_TRANSAKSI`) 
            VALUES ('$id_atm', '$id_nasabah', '$jenis_transaksi', '$jumlah_transaksi', NOW())";
            $result_insert_transaksi = mysqli_query($koneksi, $query_insert_transaksi);

            if ($result_update_saldo_nasabah && $result_insert_transaksi && $result_update_saldo_atm) {
                $_SESSION['SALDO_REKENING'] = $saldo_nasabah;
                $_SESSION['alert'] = array(
                    'type' => 'success',
                    'message' => 'Transaksi berhasil!'
                );
                header('Location: ../index.php');
                exit();
            } else {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Terjadi kesalahan saat memproses transaksi.'
                );
                header('Location: ../index.php');
                exit();
            }
        }

        if ($jenis_transaksi == 'TRANSFER') {
            if ($no_rekening == $_SESSION['NO_REKENING']) {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Transfer tidak dapat dilakukan ke akun anda.'
                );
                header('Location: ../index.php');
                exit();
            }

            $query_check_transfer = "SELECT COUNT(*) AS jumlah FROM `nasabah` WHERE `NO_REKENING`='$no_rekening'";
            $result_check_transfer = mysqli_query($koneksi, $query_check_transfer);
            $row_check_transfer = mysqli_fetch_assoc($result_check_transfer);

            if ($row_check_transfer['jumlah'] == 0) {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Nomor rekening tujuan transfer tidak terdaftar.'
                );
                header('Location: ../index.php');
                exit();
            }

            $query_get_saldo_tujuan = "SELECT `SALDO_REKENING` FROM `nasabah` WHERE `NO_REKENING`='$no_rekening'";
            $result_get_saldo_tujuan = mysqli_query($koneksi, $query_get_saldo_tujuan);
            $saldo_tujuan = mysqli_fetch_assoc($result_get_saldo_tujuan)['SALDO_REKENING'];

            if ($saldo_nasabah < $jumlah_transaksi) {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Saldo tidak mencukupi untuk melakukan transfer.'
                );
                header('Location: ../index.php');
                exit();
            }

            $saldo_nasabah -= $jumlah_transaksi;
            $query_update_saldo_nasabah = "UPDATE `nasabah` SET `SALDO_REKENING`='$saldo_nasabah' WHERE `ID_NASABAH`='$id_nasabah'";
            $result_update_saldo_nasabah = mysqli_query($koneksi, $query_update_saldo_nasabah);

            $saldo_tujuan += $jumlah_transaksi;
            $query_update_saldo_tujuan = "UPDATE `nasabah` SET `SALDO_REKENING`='$saldo_tujuan' WHERE `NO_REKENING`='$no_rekening'";
            $result_update_saldo_tujuan = mysqli_query($koneksi, $query_update_saldo_tujuan);

            $query_update_saldo_atm_pengirim = "UPDATE `atm` SET `JUMLAH_UANG_YANG_TERSEDIA` = `JUMLAH_UANG_YANG_TERSEDIA` - '$jumlah_transaksi' WHERE `ID_ATM`='$id_atm'";
            $result_update_saldo_atm_pengirim = mysqli_query($koneksi, $query_update_saldo_atm_pengirim);

            $query_update_saldo_atm_penerima = "UPDATE `atm` SET `JUMLAH_UANG_YANG_TERSEDIA` = `JUMLAH_UANG_YANG_TERSEDIA` + '$jumlah_transaksi' WHERE `ID_ATM`='$id_atm_tujuan'";
            $result_update_saldo_atm_penerima = mysqli_query($koneksi, $query_update_saldo_atm_penerima);

            $query_insert_transaksi = "INSERT INTO `transaksi` (`ID_ATM`, `ID_NASABAH`, `JENIS_TRANSAKSI`, `JUMLAH_TRANSAKSI`, `TANGGAL_DAN_WAKTU_TRANSAKSI`) 
            VALUES ('$id_atm', '$id_nasabah', '$jenis_transaksi', '$jumlah_transaksi', NOW())";
            $result_insert_transaksi = mysqli_query($koneksi, $query_insert_transaksi);

            if ($result_update_saldo_nasabah && $result_update_saldo_tujuan && $result_insert_transaksi && $result_update_saldo_atm_pengirim && $result_update_saldo_atm_penerima) {
                $_SESSION['SALDO_REKENING'] = $saldo_nasabah;
                $_SESSION['alert'] = array(
                    'type' => 'success',
                    'message' => 'Transaksi berhasil!'
                );
                header('Location: ../index.php');
                exit();
            } else {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Terjadi kesalahan saat memproses transaksi.'
                );
                header('Location: ../index.php');
                exit();
            }
        }

        if ($jenis_transaksi == 'MENABUNG') {
            if ($no_rekening != $_SESSION['NO_REKENING']) {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Anda hanya dapat menabung ke akun Anda sendiri.'
                );
                header('Location: ../index.php');
                exit();
            }

            $saldo_nasabah += $jumlah_transaksi;

            $query_update_saldo_nasabah = "UPDATE `nasabah` SET `SALDO_REKENING`='$saldo_nasabah' WHERE `ID_NASABAH`='$id_nasabah'";
            $result_update_saldo_nasabah = mysqli_query($koneksi, $query_update_saldo_nasabah);

            $query_update_saldo_atm = "UPDATE `atm` SET `JUMLAH_UANG_YANG_TERSEDIA`='$saldo_nasabah' WHERE `ID_ATM`='$id_atm'";
            $result_update_saldo_atm = mysqli_query($koneksi, $query_update_saldo_atm);

            $query_insert_transaksi = "INSERT INTO `transaksi` (`ID_ATM`, `ID_NASABAH`, `JENIS_TRANSAKSI`, `JUMLAH_TRANSAKSI`, `TANGGAL_DAN_WAKTU_TRANSAKSI`) 
            VALUES ('$id_atm', '$id_nasabah', '$jenis_transaksi', '$jumlah_transaksi', NOW())";
            $result_insert_transaksi = mysqli_query($koneksi, $query_insert_transaksi);

            if ($result_update_saldo_nasabah && $result_insert_transaksi && $result_update_saldo_atm) {
                $_SESSION['SALDO_REKENING'] = $saldo_nasabah;
                $_SESSION['alert'] = array(
                    'type' => 'success',
                    'message' => 'Transaksi menabung berhasil!'
                );
                header('Location: ../index.php');
                exit();
            } else {
                $_SESSION['alert'] = array(
                    'type' => 'error',
                    'message' => 'Terjadi kesalahan saat memproses transaksi menabung.'
                );
                header('Location: ../index.php');
                exit();
            }
        }
    } else {
        $_SESSION['alert'] = array(
            'type' => 'error',
            'message' => 'ID Nasabah atau ID ATM tidak ditemukan.'
        );
        header('Location: ../index.php');
        exit();
    }
}

mysqli_close($koneksi);
