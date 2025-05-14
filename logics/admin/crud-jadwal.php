<?php
require_once('../../connections/koneksi.php');

$days = [
    'senin',
    'selasa',
    'rabu',
    'kamis',
    'jumat',
    'sabtu',
    'minggu'
];

foreach ($days as $day) {
    $id_jadwal = isset($_POST["id_jadwal_$day"]) ? intval($_POST["id_jadwal_$day"]) : 0;
    $jam_buka = isset($_POST["start_time_$day"]) ? $_POST["start_time_$day"] : '';
    $jam_tutup = isset($_POST["end_time_$day"]) ? $_POST["end_time_$day"] : '';

    if ($jam_buka && $jam_tutup) {
        if ($id_jadwal > 0) {
            // Update
            $stmt = mysqli_prepare($connection, "UPDATE dm_jadwal_tbl SET jam_buka=?, jam_tutup=? WHERE id_jadwal=?");
            mysqli_stmt_bind_param($stmt, "ssi", $jam_buka, $jam_tutup, $id_jadwal);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } else {
            // Insert
            $stmt = mysqli_prepare($connection, "INSERT INTO dm_jadwal_tbl (hari_jadwal, jam_buka, jam_tutup) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sss", $day, $jam_buka, $jam_tutup);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

// Redirect kembali ke halaman manajemen booking
header('Location: ../../views/admin/manajemen-booking.php');
exit;
