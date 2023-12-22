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
        if ($jenis_transaksi == 'TRANSFER' && $saldo_nasabah < $jumlah_transaksi) {
            $_SESSION['alert'] = array(
                'type' => 'error',
                'message' => 'Saldo tidak mencukupi untuk transfer ini.'
            );
            header('Location: ../index.php');
            exit();
        }

        if ($jenis_transaksi == 'TRANSFER' || $jenis_transaksi == 'TARIK TUNAI') {
            $saldo_nasabah -= $jumlah_transaksi;
        } elseif ($jenis_transaksi == 'MENABUNG') {
            $saldo_nasabah += $jumlah_transaksi;
        }

        $query_update_saldo_nasabah = "UPDATE `nasabah` SET `SALDO_REKENING`='$saldo_nasabah' WHERE `ID_NASABAH`='$id_nasabah'";
        $result_update_saldo_nasabah = mysqli_query($koneksi, $query_update_saldo_nasabah);

        $query_update_saldo_atm = "UPDATE `atm` SET `JUMLAH_UANG_YANG_TERSEDIA`='$saldo_nasabah' WHERE `ID_ATM`='$id_atm'";
        $result_update_saldo_atm = mysqli_query($koneksi, $query_update_saldo_atm);

        $query_insert_transaksi = "INSERT INTO `transaksi` (`ID_ATM`, `ID_NASABAH`, `JENIS_TRANSAKSI`, `JUMLAH_TRANSAKSI`, `TANGGAL_DAN_WAKTU_TRANSAKSI`) 
        VALUES ('$id_atm', '$id_nasabah', '$jenis_transaksi', '$jumlah_transaksi', NOW())";
        $result_insert_transaksi = mysqli_query($koneksi, $query_insert_transaksi);

        if ($result_update_saldo_nasabah && $result_update_saldo_atm && $result_insert_transaksi) {
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
