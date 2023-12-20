<?php
include('connection.php');

if (isset($_POST['masuk'])) {
    $no_rekening = $_POST['no_rekening'];
    $kata_sandi = $_POST['kata_sandi'];

    $query = "SELECT * FROM `nasabah` WHERE `NO_REKENING` = '$no_rekening' AND `KATA_SANDI` = '$kata_sandi'";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        if (mysqli_num_rows($hasil) == 1) {
            $data_nasabah = mysqli_fetch_assoc($hasil);
            $_SESSION['NAMA_NASABAH'] = $data_nasabah['NAMA'];
            $_SESSION['SALDO_REKENING'] = $data_nasabah['SALDO_REKENING'];
            header('Location: ../index.php');
            exit();
        } else {
            $_SESSION['alert'] = array(
                'type' => 'error',
                'message' => 'No Rekening atau Kata Sandi salah.'
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
