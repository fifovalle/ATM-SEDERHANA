<?php
include('connection.php');

if (isset($_POST['simpan'])) {
    $nama_nasabah = $_POST['nama'];
    $alamat_nasabah = $_POST['alamat_nasabah'];
    $kata_sandi_nasabah = $_POST['kata_sandi'];

    if (isset($_SESSION['ID_NASABAH'])) {
        $id_nasabah = $_SESSION['ID_NASABAH'];

        $query_update = "UPDATE `nasabah` SET `NAMA`='$nama_nasabah', `ALAMAT_NASABAH`='$alamat_nasabah', `KATA_SANDI`='$kata_sandi_nasabah' WHERE `ID_NASABAH`='$id_nasabah'";
        $result_update = mysqli_query($koneksi, $query_update);

        if ($result_update) {
            $_SESSION['alert'] = array(
                'type' => 'success',
                'message' => 'Perubahan berhasil disimpan.'
            );
            header('Location: ../pages/account.php');
            exit();
        } else {
            $_SESSION['alert'] = array(
                'type' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan perubahan.'
            );
            header('Location: ../pages/account.php');
            exit();
        }
    } else {
        $_SESSION['alert'] = array(
            'type' => 'error',
            'message' => 'ID Nasabah tidak ditemukan.'
        );
        header('Location: ../pages/account.php');
        exit();
    }
}

mysqli_close($koneksi);
