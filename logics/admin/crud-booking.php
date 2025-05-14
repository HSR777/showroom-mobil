<?php
include '../../connections/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $id = (int)$_POST['id_transaksi'];
    $status = mysqli_real_escape_string($connection, $_POST['status_transaksi']);
    $q = mysqli_query($connection, "UPDATE tr_pembelian_mobil_tbl SET status_transaksi='$status', updated_at=NOW() WHERE id_transaksi=$id");
    if ($q) {
        // Kurangi stok mobil jika status selesai
        if ($status === 'selesai') {
            // Ambil id_mobil dan stok_dibeli dari transaksi
            $res = mysqli_query($connection, "SELECT id_mobil, stok_dibeli FROM tr_pembelian_mobil_tbl WHERE id_transaksi=$id LIMIT 1");
            if ($row = mysqli_fetch_assoc($res)) {
                $id_mobil = (int)$row['id_mobil'];
                $stok_dibeli = (int)$row['stok_dibeli'];
                // Kurangi stok mobil
                mysqli_query($connection, "UPDATE dm_mobil_tbl SET stok_mobil = GREATEST(stok_mobil - $stok_dibeli, 0) WHERE id_mobil = $id_mobil");
            }
        }
        // Kirim email jika status on-going
        if ($status === 'on-going' && !empty($_POST['buyer_email'])) {
            $email = $_POST['buyer_email'];
            $name = $_POST['buyer_name'];
            $mobil = $_POST['mobil'];
            // Ambil tanggal_jam_janjian dari database
            $tanggal_jam_janjian = null;
            $res = mysqli_query($connection, "SELECT tanggal_jam_janjian FROM tr_pembelian_mobil_tbl WHERE id_transaksi=$id LIMIT 1");
            if ($row = mysqli_fetch_assoc($res)) {
                $tanggal_jam_janjian = $row['tanggal_jam_janjian'];
            }
            include_once('mailer.php');
            send_on_going_email($email, $name, $mobil, $tanggal_jam_janjian);
        }
        // Kirim email invoice jika status selesai
        if ($status === 'selesai' && !empty($_POST['buyer_email'])) {
            $email = $_POST['buyer_email'];
            $name = $_POST['buyer_name'];
            $mobil = $_POST['mobil'];
            $tanggal_jam_janjian = null;
            $harga = '';
            $invoice_url = '../../logics/admin/invoice.php?id=' . $id;
            $res = mysqli_query($connection, "SELECT tanggal_jam_janjian, harga_deal FROM tr_pembelian_mobil_tbl WHERE id_transaksi=$id LIMIT 1");
            if ($row = mysqli_fetch_assoc($res)) {
                $tanggal_jam_janjian = $row['tanggal_jam_janjian'];
                $harga = 'Rp. ' . number_format($row['harga_deal'], 0, ',', '.');
            }
            include_once('mailer_2.php');
            send_invoice_email($email, $name, $mobil, $harga, $tanggal_jam_janjian, $invoice_url);
        }
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