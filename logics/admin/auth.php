<?php
include '../../connections/koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = "SELECT * FROM dm_akun_tbl WHERE username_akun = '$username' AND password_akun = '$password'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $_SESSION['username'] = $username;
        $_SESSION['admin_logged_in'] = true;
        header('Location: ../../views/admin/dashboard.php');
        exit;
    }
    $_SESSION['error_message'] = "Username atau password salah.";
    header('Location: ../../views/admin/login.php');
    exit;
}
?>