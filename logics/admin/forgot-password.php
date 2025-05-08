<?php
session_start();
include '../../connections/koneksi.php';

if (isset($_POST['verify'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $recovery_key = mysqli_real_escape_string($connection, $_POST['recovery_key']);

    $query = "SELECT * FROM dm_akun_tbl WHERE username_akun = '$username' AND recovery_key = '$recovery_key'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['verified_user'] = $username;
        header('Location: ../../views/admin/ganti-password.php');
        exit;
    } else {
        $_SESSION['error_message'] = "Username atau kode pemulihan salah.";
        header('Location: ../../views/admin/verifikasi-akun.php');
        exit;
    }
}

if (isset($_POST['change_password'])) {
    if (!isset($_SESSION['verified_user'])) {
        header('Location: ../../views/admin/verifikasi-akun.php');
        exit;
    }

    $username = $_SESSION['verified_user'];
    $new_password = mysqli_real_escape_string($connection, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);

    if ($new_password !== $confirm_password) {
        $_SESSION['error_message'] = "Password tidak cocok.";
        header('Location: ../../views/admin/ganti-password.php');
        exit;
    }

    $new_recovery_key = rand(10000000, 99999999); // Generate a new 8-digit recovery key

    $query = "UPDATE dm_akun_tbl SET password_akun = '$new_password', recovery_key = '$new_recovery_key' WHERE username_akun = '$username'";
    if (mysqli_query($connection, $query)) {
        session_destroy();
        header('Location: ../../views/admin/login.php');
        exit;
    } else {
        $_SESSION['error_message'] = "Terjadi kesalahan. Silakan coba lagi.";
        header('Location: ../../views/admin/ganti-password.php');
        exit;
    }
}
?>
