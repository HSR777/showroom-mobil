<?php
include('../../connections/koneksi.php');

// Ambil data dari POST
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$date = trim($_POST['date']);
$time = trim($_POST['time']);
$id_mobil = intval($_POST['id_mobil']);

// Validasi sederhana
if (!$firstName || !$lastName || !$email || !$phone || !$date || !$time || !$id_mobil) {
    echo "<script>alert('Data tidak lengkap!');history.back();</script>";
    exit;
}

// Cek apakah email sudah ada di dm_calon_buyer_tbl
$q = mysqli_query($connection, "SELECT * FROM dm_calon_buyer_tbl WHERE email_calon_buyer='$email' LIMIT 1");
if ($row = mysqli_fetch_assoc($q)) {
    $id_calon_buyer = $row['id_calon_buyer'];
} else {
    // Insert calon buyer
    $stmt = mysqli_prepare($connection, "INSERT INTO dm_calon_buyer_tbl (nama_depan_calon_buyer, nama_belakang_calon_buyer, email_calon_buyer, nomor_telepon_calon_buyer) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $email, $phone);
    mysqli_stmt_execute($stmt);
    $id_calon_buyer = mysqli_insert_id($connection);
    mysqli_stmt_close($stmt);
}

// Insert transaksi booking
$tanggal_jam_janjian = $date . ' ' . $time . ':00';
$tanggal_transaksi = date('Y-m-d');
$stok_dibeli = 1; // default 1
$harga_deal = 0;
$id_akun = 1; // default admin, bisa diubah jika ada login user

// Ambil harga mobil
$qm = mysqli_query($connection, "SELECT harga_mobil FROM dm_mobil_tbl WHERE id_mobil=$id_mobil");
if ($rm = mysqli_fetch_assoc($qm)) {
    $harga_deal = $rm['harga_mobil'];
}

$stmt = mysqli_prepare($connection, "INSERT INTO tr_pembelian_mobil_tbl (id_calon_buyer, id_mobil, stok_dibeli, tanggal_jam_janjian, tanggal_transaksi, harga_deal, status_transaksi, id_akun) VALUES (?, ?, ?, ?, ?, ?, 'pending', ?)");
mysqli_stmt_bind_param($stmt, "iiissdi", $id_calon_buyer, $id_mobil, $stok_dibeli, $tanggal_jam_janjian, $tanggal_transaksi, $harga_deal, $id_akun);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

echo "<script>alert('Booking berhasil! Kami akan menghubungi Anda.');window.location.href='collection.php';</script>";
exit;
