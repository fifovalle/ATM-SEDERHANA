<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idNasabah = $_SESSION['ID_NASABAH'];

    $queryDelete = "DELETE nasabah, atm, transaksi FROM nasabah
    LEFT JOIN atm ON nasabah.ID_NASABAH = atm.ID_ATM
    INNER JOIN transaksi ON nasabah.ID_NASABAH = transaksi.ID_NASABAH
    WHERE nasabah.ID_NASABAH = '$idNasabah'";

    $resultDelete = mysqli_query($koneksi, $queryDelete);

    if ($resultDelete) {
        unset($_SESSION['ID_NASABAH']);
        unset($_SESSION['SALDO_REKENING']);
        unset($_SESSION['TANGGAL_PEMBUATAN_ATM']);

        $_SESSION['alert'] = array(
            'type' => 'success',
            'message' => 'Akun berhasil dihapus. Anda akan dialihkan ke halaman login.'
        );

        header("Location: ../pages/login.php");
        exit();
    } else {
        $_SESSION['alert'] = array(
            'type' => 'error',
            'message' => 'Gagal menghapus akun. Silakan coba lagi.'
        );

        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
} else {
    $_SESSION['alert'] = array(
        'type' => 'error',
        'message' => 'Akses tidak sah. Silakan coba lagi.'
    );

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
