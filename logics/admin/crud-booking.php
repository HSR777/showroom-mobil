<?php
include '../../connections/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $id = (int)$_POST['id_transaksi'];
    $status = mysqli_real_escape_string($connection, $_POST['status_transaksi']);
    $q = mysqli_query($connection, "UPDATE tr_pembelian_mobil_tbl SET status_transaksi='$status', updated_at=NOW() WHERE id_transaksi=$id");
    if ($q) {
        header("Location: ../../views/admin/manajemen-booking.php?status=sukses");
    } else {
        header("Location: ../../views/admin/manajemen-booking.php?status=gagal");
    }
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'simpan' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $q = mysqli_query($connection, "UPDATE tr_pembelian_mobil_tbl SET status_transaksi='selesai', updated_at=NOW() WHERE id_transaksi=$id");
    if ($q) {
        echo "<script>alert('Status booking berhasil disimpan!');window.location.href='../../views/admin/manajemen-booking.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan status!');window.location.href='../../views/admin/manajemen-booking.php';</script>";
    }
    exit;
}

?>