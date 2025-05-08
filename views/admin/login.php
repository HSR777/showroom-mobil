<?php
session_start();
include '../../connections/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = "SELECT * FROM dm_akun_tbl WHERE username_akun = '$username' AND password_akun = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .image-container img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- col 01 -->
            <div class="col-4 bg-dark text-white text-center vh-100 d-flex align-items-center justify-content-center">
                <div class="w-100 p-5 mb-5">
                    <h1 class="mb-5">Login</h1>
                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error_message ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post" class="mb-3">
                        <div class="mb-3">
                            <!-- <label for="username" class="form-label">Username</label> -->
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="password" class="form-label">Password</label> -->
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <p>Lupa Password Anda? Verifikasi <a href="verifikasi-akun.php">Disini</a></p>
                </div>
            </div>
            <!-- col 01 end -->
            <!-- col 02 -->
            <div class="col-8 bg-light text-center vh-100 d-flex align-items-center justify-content-center image-container p-0">
                <img src="../../statics/images/admin/2005-BMW-M3-GTR-Need-For-Speed-003-2160.jpg" alt="BMW M3 GTR">
            </div>
            <!-- col 02 end -->
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>