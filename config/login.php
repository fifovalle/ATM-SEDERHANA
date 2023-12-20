<?php
include('connection.php');

if (isset($_POST['masuk'])) {
    $no_rekening = $_POST['no_rekening'];
    $kata_sandi = $_POST['kata_sandi'];

    $query = "SELECT * FROM `nasabah` WHERE `NO_REKENING` = '$no_rekening' AND `KATA_SANDI` = '$kata_sandi'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            header('Location: ../index.php');
        } else {
            echo "No Rekening atau Kata Sandi salah.";
        }
    } else {
        echo "Terjadi kesalahan. Silakan coba lagi.";
    }

    mysqli_close($koneksi);
}
